<?php

namespace Wingz\Instructors\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Routing\Controller;
use Orchestra\Support\Facades\Form;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use Wingz\Instructors\Http\Presenters\TimeOffPresenter as Presenter;
use Wingz\Instructors\Http\Requests\InstructorsRequest;
use Orchestra\Contracts\Foundation\Foundation;
use Illuminate\Support\Facades\Event;


class TimeOffController extends Controller
{

    public function __construct(Presenter $presenter, Foundation $foundation)
    {
        $this->middleware('auth');

        $this->presenter  = $presenter;
        $this->foundation = $foundation;
        $this->model      = $foundation->make('Wingz\Foundation\Model\InstructorsTimeOff');
    }
    
    public function index()
    {
        $eloquent = $this->model->where('instructor_id', '=', Auth::user()->instructor->id);
        $table    = $this->presenter->table($eloquent);

        $this->presenter->actions($table);

        $this->fireEvent('list', [$eloquent, $table]);

        set_meta('title', 'Time Off');
        set_meta('search-title', 'Search Time Off');
        return view('wingz/instructors::admin.time-off', compact('eloquent', 'table'));
    }


    public function store(Request $request)
    {
//        dd($request->all());
        if ($request->all_day == true) {
            $request->start_date = date("Y-m-d", strtotime($request->start_date));
            $request->start_time = date("H:i:s", strtotime(0));
            $request->end_date = date("Y-m-d", strtotime($request->end_date));
            $request->end_time = date("H:i:s", strtotime(0));
            $request->all_day = 1;

        }else {
            $request->start_date = date("Y-m-d", strtotime($request->start_date));
            $request->start_time = date("H:i:s", strtotime($request->start_time));
            $request->end_date = date("Y-m-d", strtotime($request->end_date));
            $request->end_time = date("H:i:s", strtotime($request->end_time));
            $request->all_day = 0;
        }

        $this->model->instructor_id = Auth::user()->instructor->id;
        $this->model->start_date = $request->start_date;
        $this->model->start_time = $request->start_time;
        $this->model->end_date = $request->end_date;
        $this->model->end_time = $request->end_time;
        $this->model->all_day = $request->all_day;

        $this->model->save();

        messages('success', 'Time Off Added Successfully');
        return Redirect::back();
    }

    public function delete($id)
    {
        $timeOff = $this->model->findOrFail($id);
        $timeOff->delete();

        messages('Success', 'Delete Successfully');
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
        Event::fire("wingz.instructors.{$type}: time-off", $parameters);
    }

}
