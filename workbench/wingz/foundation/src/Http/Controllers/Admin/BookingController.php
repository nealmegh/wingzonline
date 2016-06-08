<?php

namespace Wingz\Foundation\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Routing\Controller;
use Orchestra\Support\Facades\Facile;
use Illuminate\Support\Fluent;
use Illuminate\Contracts\Support\Arrayable;
use Orchestra\Support\Facades\Form;
use Wingz\Foundation\Http\Presenters\BookingPresenter as Presenter;
use Orchestra\Contracts\Foundation\Foundation;
use Illuminate\Support\Facades\Event;
use Wingz\Foundation\Http\Requests\BookingRequest;


class BookingController extends Controller
{
    public function __construct(Presenter $presenter, Foundation $foundation)
    {
        $this->presenter  = $presenter;
        $this->foundation = $foundation;
        $this->model      = $foundation->make('Wingz\Foundation\Model\Booking');
        $this->middleware('renter');

    }

    public function index() {
        $eloquent = $this->model->newQuery();
        $table    = $this->presenter->table($eloquent);

        $this->fireEvent('list', [$eloquent, $table]);

        // Once all event listening to `orchestra.list: role` is executed,
        // we can add we can now add the final column, edit and delete
        // action for roles.
//        $this->presenter->actions($table);

        set_meta('title', 'Aircraft');

        return view('wingz/foundation::admin.table', compact('eloquent', 'table'));
    }

    public function create() {
        set_meta('title', 'New Booking');
        return $this->presenter->form($this->model);
    }


    public function store(BookingRequest $request) {
//        dd($request->all());
        $this->model->date_added = $request->date_added;
        $this->model->pick_up_date = $request->pick_up_date;
        $this->model->return_date = $request->return_date;
        $this->model->return_date = $request->return_date;
        $this->model->return_time = $request->return_time;
        $this->model->company = $request->company;
        $this->model->airport = $request->airport;
        $this->model->aircraft_make = $request->aircraft_make;
        $this->model->aircraft_model = $request->aircraft_model;
        $this->model->price = $request->price;
        $this->model->status = $request->status;
        $this->model->save();

        return Redirect::to(handles('orchestra::wingz/booking'));
    }


    protected function fireEvent($type, array $parameters = [])
    {
        Event::fire("orchestra.control.{$type}: booking", $parameters);
    }

}
