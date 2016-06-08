<?php

namespace Wingz\Foundation\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Routing\Controller;
use Orchestra\Support\Facades\Form;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use Wingz\Foundation\Http\Presenters\AircraftPresenter;
use Wingz\Foundation\Http\Requests\AircraftRequest;
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
        $booking = Booking::where('company_id', '=', Auth::user()->company->id)->get();
        $list = [];

        foreach ($booking as $key=>$book) {
            $list[$key]['id'] = $book->id;
            $list[$key]['title'] = $book->aircraft->name;
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

//        dd($today);

        set_meta('title', 'Schedule');
        return view('wingz/foundation::admin.schedule', compact('resources', 'events', 'today'));
    }

    public function create() {
        set_meta('title', 'New Aircraft');
    }

    public function store(AircraftRequest $request) {
       
    }

    public function edit($id) {
    }

    public function update() {
        dd('Not Complete yet');
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
