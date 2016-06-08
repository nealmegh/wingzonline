<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Wingz\Foundation\Model\Aircraft;
use Wingz\Foundation\Model\Booking;
use Wingz\Foundation\Model\Companies;
use Wingz\Foundation\Model\Instructors;

class AircraftController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('renter', ['except' => ['flightAvailable']]);
    }

    public function flightAvailable(Request $request)
    {
        /*
          "dt_pick_up" => "06/05/2016 6:30pm"
          "dt_return" => "06/06/2016 7:00pm"
          "search_keyword" => ""
          "airport_id" => ""
          "airport_zip" => ""
          "aircraft_make_id" => ""
          "number_of_seats" => ""
          "price_range_begin" => ""
          "price_range_end" => ""
          "company_id" => ""
         */

        $this->validate($request, [
            'dt_pick_up' => 'required',
            'dt_return' => 'required',
        ]);
        
        $pickUp = Carbon::parse($request->get('dt_pick_up'));
        $return = Carbon::parse($request->get('dt_return'));

        $allAircrafts =  Aircraft::where('view', '=', 'Visible');

        if ($request->has('search_keyword') && $request->has('search_keyword') != null) {
            $allAircrafts = Aircraft::where('company_id', '=', $request->get('search_keyword'))->orWhere('airport_id', '=', $request->get('search_keyword'))->where('view', '=', 'Visible');
        }

        $bookedAircraft = $this->bookedAircraft($pickUp, $return);

        $allAircrafts = $allAircrafts->whereNotIn('id', $bookedAircraft);

        $aircrafts = $allAircrafts->get();
        $time['dt_pick_up'] = $request->get('dt_pick_up');
        $time['dt_return'] = $request->get('dt_return');

        return view('frontend.flightAvailable', compact('aircrafts', 'time'));
    }

    public function booking(Request $request, $id)
    {
        $aircraft = Aircraft::find($id);
        $instructors = $aircraft->company->instructors()->where('status', '=', 1)->get();
 

        $time['dt_pick_up'] = $request->get('dt_pick_up');
        $time['dt_return'] = $request->get('dt_return');

        return view('frontend.bookAircraft', compact('aircraft', 'time', 'instructors'));

    }

    public function bookedAircraft($pickUp, $return)
    {
//        $var = Booking::where('dt_pick_up', '<=', $pickUp->toDateTimeString());
//        return Booking::where('dt_pick_up', '=<', $pickUp->toDateTimeString())->where('dt_return', '>=', $return->toDateTimeString())->get();
        $booking = new Booking();

        $stage1 = $booking->where('dt_pick_up', '<=', $pickUp->toDateTimeString())->whereOr('dt_pick_up', '<=', $return->toDateTimeString());
        $stage1 = $stage1->where('dt_return', '>=', $pickUp->toDateTimeString())->whereOr('dt_return', '<=', $return->toDateTimeString());

//        $stage2 = $booking->where('dt_pick_up', '>=', $pickUp->toDateTimeString())->whereOr('dt_pick_up', '<=', $return->toDateTimeString());
//        $stage2 = $stage1->where('dt_return', '>=', $pickUp->toDateTimeString())->whereOr('dt_return', '>=', $return->toDateTimeString());
//
//        $stage3 = $booking->where('dt_pick_up', '>=', $pickUp->toDateTimeString())->whereOr('dt_pick_up', '<=', $return->toDateTimeString());
//        $stage3 = $stage1->where('dt_return', '>=', $pickUp->toDateTimeString())->whereOr('dt_return', '<=', $return->toDateTimeString());
         return $stage1->lists('aircraft_id')->toArray();
    }


}
