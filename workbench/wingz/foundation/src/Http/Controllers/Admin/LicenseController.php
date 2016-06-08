<?php

namespace Wingz\Foundation\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Routing\Controller;
use Orchestra\Support\Facades\Form;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use Wingz\Foundation\Http\Presenters\LicensePresenter as Presenter;
use Wingz\Foundation\Http\Requests\LicenseRequest;
use Orchestra\Contracts\Foundation\Foundation;
use Illuminate\Support\Facades\Event;



class LicenseController extends Controller
{

    public function __construct(Presenter $presenter, Foundation $foundation)
    {
        $this->presenter  = $presenter;
        $this->foundation = $foundation;
        $this->model      = $foundation->make('Wingz\Foundation\Model\Licenses');

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

        set_meta('title', 'License');

        return view('wingz/foundation::admin.table', compact('eloquent', 'table'));
    }

    public function create() {
        set_meta('title', 'New License');
        return $this->presenter->form($this->model);
    }

    public function store(LicenseRequest $request) {

        $this->model->license_name = $request->license_name;
        $this->model->license_description = $request->license_description;

        $this->model->save();

        return Redirect::to(handles('orchestra::wingz/license'));
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
