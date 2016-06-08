<?php

namespace Wingz\Foundation\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Routing\Controller;
use Orchestra\Support\Facades\Form;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use Wingz\Foundation\Http\Presenters\CompaniesPresenter as Presenter;
use Wingz\Foundation\Http\Requests\CompaniesRequest;
use Orchestra\Contracts\Foundation\Foundation;
use Illuminate\Support\Facades\Event;
use Wingz\Foundation\Model\Companies;
use Wingz\Foundation\Model\User;


class CompaniesController extends Controller
{

    public function __construct(Presenter $presenter, Foundation $foundation)
    {
        $this->presenter  = $presenter;
        $this->foundation = $foundation;
        $this->model      = $foundation->make('Wingz\Foundation\Model\Companies');
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

        set_meta('title', 'Companies');

        return view('wingz/foundation::admin.table', compact('eloquent', 'table'));
    }

    public function create() {
        set_meta('title', 'Your Account');
        return $this->presenter->form($this->model);
    }

    public function store(CompaniesRequest $request) {
        
        $this->save($request);
        
        return Redirect::to(handles('orchestra::wingz/companies'));

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
        $user->roles()->sync(['4']); //4 Company role id

        $companies = new Companies();
        $companies->user_id = $user->id;
        $companies->name = $request->company_name;
        $companies->contact_name = null;
        $companies->address = $request->company_address;
        $companies->city = $request->company_city;
        $companies->state = $request->company_state;
        $companies->zip = $request->company_state;
        $companies->email = $request->company_email;
        $companies->website = null;
        $companies->phone = $request->company_phone;
        $companies->fax = null;
        $companies->airport_id = $request->airport_id;
        $companies->save();
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
        Event::fire("wingz.companies.{$type}: roles", $parameters);
    }

}
