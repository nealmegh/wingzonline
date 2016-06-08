<?php

namespace Wingz\Foundation\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Routing\Controller;
use Orchestra\Support\Facades\Form;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use Wingz\Foundation\Http\Presenters\FlightSchedulesPresenter as Presenter;
use Wingz\Foundation\Http\Requests\FlightSchedulesRequest;
use Orchestra\Contracts\Foundation\Foundation;
use Illuminate\Support\Facades\Event;



class FlightSchedulesController extends Controller
{

    public function __construct(Presenter $presenter, Foundation $foundation)
    {
        $this->presenter  = $presenter;
        $this->foundation = $foundation;
        $this->model      = $foundation->make('Wingz\Foundation\Model\FlightSchedules');

        $this->middleware('auth');
    }
    
    public function index() {
        $eloquent = $this->model->newQuery();
        $table    = $this->presenter->table($eloquent);

        $this->fireEvent('list', [$eloquent, $table]);

        // Once all event listening to `orchestra.list: role` is executed,
        // we can add we can now add the final column, edit and delete
        // action for roles.
//        $this->presenter->actions($table);

        set_meta('title', 'Flight Schedules');

        return view('wingz/foundation::admin.table', compact('eloquent', 'table'));
    }

    public function create() {
        set_meta('title', 'New Flight Schedules');
        return $this->presenter->form($this->model);
    }

    public function store(FlightSchedulesRequest $request) {
        $this->model->date_added = $request->date_added;
        $this->model->aircraft_model = $request->aircraft_model;
        $this->model->aircraft_make = $request->aircraft_make;
        $this->model->tail_no = $request->tail_no;
        $this->model->number_of_seats = $request->number_of_seats;
        $this->model->price_per_hour = $request->price_per_hour;
        $this->model->company = $request->company;
        $this->model->airport = $request->airport;
        $this->model->view = $request->view;
        $this->model->image = $request->image;
        $this->model->created_at = $request->created_at;
        $this->model->updated_at = $request->updated_at;
        $this->model->save();

        return Redirect::to(handles('orchestra::wingz/aircraft'));
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
