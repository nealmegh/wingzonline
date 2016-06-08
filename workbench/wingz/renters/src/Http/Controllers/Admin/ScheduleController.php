<?php

namespace Wingz\Renters\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Routing\Controller;
use Wingz\Renters\Http\Presenters\SchedulePresenter as Presenter;
use Wingz\Renters\Http\Requests\AircraftRequest;
use Orchestra\Contracts\Foundation\Foundation;
use Illuminate\Support\Facades\Event;


class ScheduleController extends Controller
{

    public function __construct(Presenter $presenter, Foundation $foundation)
    {
        $this->presenter  = $presenter;
        $this->foundation = $foundation;
        $this->model      = $foundation->make('Wingz\Foundation\Model\Booking');

        $this->middleware('auth');

    }
    
    public function index() {
        $eloquent = $this->model->where('renter_id', '=', Auth::user()->renter->id);
//        dd($eloquent->get());
        $table    = $this->presenter->table($eloquent);

        $this->fireEvent('list', [$eloquent, $table]);

        // Once all event listening to `orchestra.list: role` is executed,
        // we can add we can now add the final column, edit and delete
        // action for roles.
        $this->presenter->actions($table);

        set_meta('title', 'Render Schedule');
        set_meta('search-title', 'Search Schedule:');
        return view('wingz/renters::admin.schedule', compact('eloquent', 'table'));
    }

    public function delete($id)
    {
        $booking = $this->model->findOrFail($id);
        $booking->delete();

        messages('success', 'Delete Successfully');

        return Redirect::back();
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
        Event::fire("orchestra.control.{$type}: render-schedule", $parameters);
    }

}
