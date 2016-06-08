<?php

namespace Wingz\Companies\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Routing\Controller;
use Wingz\Companies\Http\Presenters\AircraftPresenter;
use Wingz\Companies\Http\Requests\AircraftRequest;
use Orchestra\Contracts\Foundation\Foundation;
use Illuminate\Support\Facades\Event;
use Wingz\Foundation\Model\Aircraft;


class AircraftController extends Controller
{

    public function __construct(AircraftPresenter $presenter, Foundation $foundation)
    {
        $this->middleware('company');
        $this->presenter  = $presenter;
        $this->foundation = $foundation;
        $this->model      = $foundation->make('Wingz\Foundation\Model\Aircraft');
    }


    public function index()
    {

        $eloquent = $this->model->where('company_id', '=', Auth::user()->company->id);
        $table    = $this->presenter->table($eloquent);

        $this->fireEvent('list', [$eloquent, $table]);

        // Once all event listening to `orchestra.list: role` is executed,
        // we can add we can now add the final column, edit and delete
        // action for roles.
        $this->presenter->actions($table);

        set_meta('title', 'Aircraft');
        set_meta('header::add-button', 'Add New Aircraft');
        set_meta('search-title', 'Search Aircraft');

        return view('wingz/companies::admin.aircraft', compact('eloquent', 'table'));

    }

    public function create()
    {
        set_meta('title', 'New Aircraft');
        return view('wingz/companies::admin.form.aircraft');
    }

    public function store(AircraftRequest $request)
    {
//        dd($request->all());
        if ($request->view == null) { $request->view = 'Hidden'; }


        $this->model->name = '';
        $this->model->date_added = Carbon::now();
        $this->model->aircraft_model = $request->aircraft_model;
        $this->model->aircraft_make = $request->aircraft_make;
        $this->model->tail_no = $request->tail_no;
        $this->model->number_of_seats = $request->number_of_seats;
        $this->model->price_per_hour = $request->price_per_hour;
        $this->model->company_id = Auth::user()->company->id;
        $this->model->airport_id = '';
        $this->model->view = $request->view;

        if ($request->file('image') != null):

            $imageName =  $request->tail_no.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                public_path('images/aircraft/'), $imageName
            );

            $this->model->image = 'images/aircraft/'.$imageName;

        endif;

        $this->model->save();

        messages('success', 'Aircraft Added Successfully');


        return Redirect::to(handles('orchestra::companies/aircraft'));
    }

    public function edit($id)
    {
        $aircraft = $this->model->findOrFail($id);
        
        set_meta('title', 'Edit Aircraft');
        set_meta('header::add-button', true);
//        return $this->presenter->form($aircraft, 'PATCH');
        return view('wingz/companies::admin.form.edit-aircraft', compact('aircraft'));

    }

    public function update($id, AircraftRequest $request)
    {
        $aircraft = $this->model->find($id);
//        dd($request->all());

        $aircraft->name = '';
        $aircraft->date_added = Carbon::now();
        $aircraft->aircraft_model = $request->aircraft_model;
        $aircraft->aircraft_make = $request->aircraft_make;
        $aircraft->tail_no = $request->tail_no;
        $aircraft->number_of_seats = $request->number_of_seats;
        $aircraft->price_per_hour = $request->price_per_hour;
        $aircraft->company_id = Auth::user()->company->id;
        $aircraft->airport_id = '';
        $aircraft->view = $request->view;

        if ($request->file('image') != null):
            $imageName = $request->tail_no.'.'.$request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(
                public_path('images/aircraft/'), $imageName
            );

            $aircraft->image = 'images/aircraft/'.$imageName;
        endif;

        $aircraft->save();

        messages('success', 'Aircraft Update Successfully');

        return Redirect::to(handles('orchestra::companies/aircraft'));
    }

    public function view(Aircraft $id)
    {
        $aircraft = $id;
        if($aircraft->view == 'Visible') {
            $aircraft->view = 'Hidden';
            $aircraft->save();
        }else{
            $aircraft->view = 'Visible';
            $aircraft->save();
        }
        return redirect()->back();
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
