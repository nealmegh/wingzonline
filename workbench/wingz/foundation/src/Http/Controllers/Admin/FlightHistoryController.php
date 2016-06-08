<?php

namespace Wingz\Foundation\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Routing\Controller;
use Orchestra\Support\Facades\Form;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use Wingz\Foundation\Http\Presenters\FlightHistoryPresenter as Presenter;
use Wingz\Foundation\Http\Requests\AircraftRequest;
use Orchestra\Contracts\Foundation\Foundation;
use Illuminate\Support\Facades\Event;



class FlightHistoryController extends Controller
{

    public function __construct(Presenter $presenter, Foundation $foundation)
    {
        $this->presenter  = $presenter;
        $this->foundation = $foundation;
        $this->model      = $foundation->make('Wingz\Foundation\Model\Booking');        
        
        $this->middleware('auth');
    }
    
    public function index() {

        $eloquent = $this->model->where('company_id', '=', Auth::user()->company->id);
        $table    = $this->presenter->table($eloquent);

        $this->fireEvent('list', [$eloquent, $table]);

        // Once all event listening to `orchestra.list: role` is executed,
        // we can add we can now add the final column, edit and delete
        // action for roles.
        $this->presenter->actions($table);

        set_meta('title', 'Flight History');

        return view('wingz/foundation::admin.table-sidebar', compact('eloquent', 'table'));
    }

    public function create() {
        set_meta('title', 'New Aircraft');
        return $this->presenter->form($this->model);
    }

    public function store(AircraftRequest $request) {
        $this->model->aircraft_id = $request->aircraft_id;
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
        $this->model->save();

        return Redirect::to(handles('orchestra::wingz/aircraft'));
    }

    public function edit($id) {
        $aircraft = $this->model->where('aircraft_id', $id)->first();
        
        set_meta('title', 'Edit Aircraft');
        return $this->presenter->form($aircraft, 'PATCH');
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
