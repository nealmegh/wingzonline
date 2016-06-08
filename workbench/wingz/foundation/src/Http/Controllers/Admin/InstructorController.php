<?php

namespace Wingz\Foundation\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Routing\Controller;
use Orchestra\Support\Facades\Facile;
use Illuminate\Support\Fluent;
use Illuminate\Contracts\Support\Arrayable;
use Orchestra\Support\Facades\Form;
use Wingz\Foundation\Http\Presenters\InstructorPresenter as Presenter;
use Orchestra\Contracts\Foundation\Foundation;
use Illuminate\Support\Facades\Event;
use Wingz\Foundation\Http\Requests\InstructorRequest;
use Wingz\Foundation\Model\User;


class InstructorController extends Controller
{
    public function __construct(Presenter $presenter, Foundation $foundation)
    {
        $this->presenter  = $presenter;
        $this->foundation = $foundation;
        $this->model      = $foundation->make('Wingz\Foundation\Model\Instructors');

//        $this->middleware('instructor');
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

        set_meta('title', 'Instructor');

        return view('wingz/foundation::admin.table.instructors', compact('eloquent', 'table'));
    }

    public function create() {
        set_meta('title', 'New Instructor');
        return $this->presenter->form($this->model);
    }


    public function store(InstructorRequest $request) {
        $this->save($request);
        return Redirect::to(handles('orchestra::wingz/instructors'));
    }

    public function save($request) {

        $user = new User();
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = Hash::make($request->password);
        $user->email = $request->personal_email;
        $user->address = $request->personal_address;
        $user->city = $request->personal_city;
        $user->state = $request->personal_state;
        $user->zip = $request->personal_zip;
        $user->phone = $request->personal_phone;
        $user->fax = $request->personal_fax;

        //        $roles = app('orchestra.role');
//        dd($roles->where('name', 'Company')->get('id'));

        $user->save();
        $user->roles()->sync(['6']); //4 Company role id

        $this->model->user_id = $user->id;
        $this->model->company_id = $request->company_id;
        $this->model->last_flight_review_date = $request->last_flight_review_date;
        $this->model->custom_flight_date = $request->custom_flight_date;
        $this->model->medical_class = $request->medical_class;
        $this->model->medical_class_date = $request->medical_class_date;

        $this->model->save();
    }

    protected function fireEvent($type, array $parameters = [])
    {
        Event::fire("orchestra.control.{$type}: instructors", $parameters);
    }

}
