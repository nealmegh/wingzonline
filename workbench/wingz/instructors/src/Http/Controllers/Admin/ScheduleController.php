<?php

namespace Wingz\Instructors\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Orchestra\Routing\Controller;
use Wingz\Instructors\Http\Presenters\InstructorPresenter as Presenter;
use Wingz\Instructors\Http\Requests\AircraftRequest;
use Orchestra\Contracts\Foundation\Foundation;
use Illuminate\Support\Facades\Event;
use Wingz\Foundation\Model\Booking;


class ScheduleController extends Controller
{

    public function __construct(Presenter $presenter, Foundation $foundation)
    {
        $this->presenter  = $presenter;
        $this->foundation = $foundation;
        $this->model      = $foundation->make('Wingz\Foundation\Model\FlightSchedules');

        $this->middleware('auth');

    }
    
    public function index() {

        $booking = Booking::where('instructor_id', '=', Auth::user()->instructor->id)->get();
        $list = [];
        foreach ($booking as $key=>$book) {
            $list[$key]['id'] = $book->id;
            $list[$key]['title'] = $book->aircraft->aircraft_model;
        }

        $resources = json_encode($list);

        foreach ($booking as $key=>$book) {
            $list[$key]['id'] = $book->id;
            $list[$key]['resourceId'] = $book->id;
            $list[$key]['start'] =  Carbon::parse($book->dt_pick_up)->format('Y-m-d\TH:i:s');
            $list[$key]['end'] = Carbon::parse($book->dt_return)->format('Y-m-d\TH:i:s');
            $list[$key]['title'] = $book->instructor->user->first_name.' '.$book->instructor->user->last_name;
            $list[$key]['color'] = 'orange';
        }

        $events = json_encode($list);

        $today = Carbon::now()->toDateString();
        $upcomingEvents = Booking::where('instructor_id', '=', Auth::user()->instructor->id)->where('dt_pick_up', '>', $today)->take(5)->get();
        
        set_meta('title', 'Schedule');
        return view('wingz/instructors::admin.schedule', compact('resources', 'events', 'today', 'upcomingEvents'));
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
        Event::fire("orchestra.control.{$type}: instructor", $parameters);
    }

}
