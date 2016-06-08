<?php

namespace Wingz\Foundation\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Orchestra\Routing\Controller;
use Orchestra\Support\Facades\Form;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use Wingz\Foundation\Http\Presenters\AircraftPresenter;
use Wingz\Foundation\Http\Requests\AircraftRequest;
use Orchestra\Contracts\Foundation\Foundation;
use Illuminate\Support\Facades\Event;



class AircraftController extends Controller
{

    public function __construct(AircraftPresenter $presenter, Foundation $foundation)
    {
        $this->presenter  = $presenter;
        $this->foundation = $foundation;
        $this->model      = $foundation->make('Wingz\Foundation\Model\Aircraft');
        $this->middleware('company');
    }


    public function index() {

        $eloquent = $this->model->where('company_id', '=', Auth::user()->company->id);
        $table    = $this->presenter->table($eloquent);

        $this->fireEvent('list', [$eloquent, $table]);

        // Once all event listening to `orchestra.list: role` is executed,
        // we can add we can now add the final column, edit and delete
        // action for roles.
        $this->presenter->actions($table);

        set_meta('title', 'Aircraft');

        return view('wingz/foundation::admin.table', compact('eloquent', 'table'));

    }

    public function create() {
        set_meta('title', 'New Aircraft');
        return $this->presenter->form($this->model);
    }

    public function store(AircraftRequest $request) {

//        dd($request->all());
        $this->model->name = $request->name;
        $this->model->date_added = $request->date_added;
        $this->model->aircraft_model = $request->aircraft_model;
        $this->model->aircraft_make = $request->aircraft_make;
        $this->model->tail_no = $request->tail_no;
        $this->model->number_of_seats = $request->number_of_seats;
        $this->model->price_per_hour = $request->price_per_hour;
        $this->model->company_id = $request->company;
        $this->model->airport_id = $request->airport;
        $this->model->view = $request->view;


        $imageName = $request->name.'.'.$request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(
            public_path('images/aircraft/'), $imageName
        );

        $this->model->image = 'images/aircraft/'.$imageName;




        $this->model->save();

        return Redirect::to(handles('orchestra::wingz/companies/aircraft'));
    }

    public function edit($id) {
        $aircraft = $this->model->findOrFail($id);
        
        set_meta('title', 'Edit Aircraft');
        return $this->presenter->form($aircraft, 'PATCH');
    }

    public function update($id, AircraftRequest $request) {
        $aircraft = $this->model->find($id);

        $aircraft->name = $request->name;
        $aircraft->date_added = $request->date_added;
        $aircraft->aircraft_model = $request->aircraft_model;
        $aircraft->aircraft_make = $request->aircraft_make;
        $aircraft->tail_no = $request->tail_no;
        $aircraft->number_of_seats = $request->number_of_seats;
        $aircraft->price_per_hour = $request->price_per_hour;
        $aircraft->company_id = $request->company;
        $aircraft->airport_id = $request->airport;
        $aircraft->view = $request->view;

        if ($request->file('image') != null):
            $imageName = $request->name.'.'.$request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(
                public_path('images/aircraft/'), $imageName
            );

            $aircraft->image = 'images/aircraft/'.$imageName;
        endif;



        $aircraft->save();

        return Redirect::to(handles('orchestra::wingz/companies/aircraft'));
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
