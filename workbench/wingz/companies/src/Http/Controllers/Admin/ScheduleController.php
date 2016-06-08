<?php

namespace Wingz\Companies\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Orchestra\Routing\Controller;
use Wingz\Companies\Http\Presenters\AircraftPresenter;
use Wingz\Companies\Http\Requests\AircraftRequest;
use Orchestra\Contracts\Foundation\Foundation;
use Illuminate\Support\Facades\Event;
use Wingz\Foundation\Model\Booking;


class ScheduleController extends Controller
{

    public function __construct(AircraftPresenter $presenter, Foundation $foundation)
    {
        $this->presenter  = $presenter;
        $this->foundation = $foundation;
        $this->model      = $foundation->make('Wingz\Foundation\Model\FlightSchedules');

        $this->middleware('auth');

    }
    
    public function index() {
        $booking = Booking::where('company_id', '=', Auth::user()->company->id)->where('status', '=', 1)->get();
        $list = [];

        if (count($booking) > 0) {
            foreach ($booking as $key=>$book) {
                $list[$key]['id'] = $book->id;
                $list[$key]['title'] = $book->aircraft->aircraft_model;
            }


            foreach ($booking as $key=>$book) {
                $list[$key]['id'] = $book->id;
                $list[$key]['resourceId'] = $book->id;
                $list[$key]['start'] =  Carbon::parse($book->dt_pick_up)->format('Y-m-d\TH:i:s');
                $list[$key]['end'] = Carbon::parse($book->dt_return)->format('Y-m-d\TH:i:s');
                $list[$key]['title'] = $book->instructor->user->first_name.' '.$book->instructor->user->last_name;
                $list[$key]['color'] = 'orange';
            }
        }

        $resources = json_encode($list);

        $events = json_encode($list);

//        dd($events);

        $today = Carbon::now()->toDateString();


        set_meta('title', 'Schedule');

        $upcomingEvents = Booking::where('company_id', '=', Auth::user()->company->id)->where('status', '=', 1)->where('dt_pick_up', '>', $today)->take(5)->get();
        $pendingEvents = Booking::where('company_id', '=', Auth::user()->company->id)->where('status', '=', 0)->where('dt_pick_up', '>', $today)->take(5)->get();

        return view('wingz/companies::admin.schedule', compact('resources', 'events', 'today', 'upcomingEvents', 'pendingEvents'));
    }

    public function create() {
        set_meta('title', 'New Aircraft');
    }

    public function store(AircraftRequest $request) {
       
    }

    public function edit($id) {
    }

    public function update() {
        //
    }

    /**
     * Fire Event related to eloquent process.
     *
     * @param  string  $type
     * @param  array   $parameters
     *
     * @return void
     */
    protected function fireEvent($type, array $parameters = [])
    {
        Event::fire("orchestra.control.{$type}: aircraft", $parameters);
    }

}
