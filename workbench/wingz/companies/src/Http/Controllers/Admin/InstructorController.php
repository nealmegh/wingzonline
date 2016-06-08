<?php

namespace Wingz\Companies\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Notifier\Message;
use Orchestra\Routing\Controller;
use Wingz\Companies\Http\Presenters\InstructorPresenter as Presenter;
use Orchestra\Contracts\Foundation\Foundation;
use Illuminate\Support\Facades\Event;
use Wingz\Foundation\Model\Instructors;


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

    public function index() 
    {
        $eloquent = $this->model->where('company_id', '=', Auth::user()->company->id);
        $table    = $this->presenter->table($eloquent);
        $this->fireEvent('list', [$eloquent, $table]);

//        $this->presenter->actions($table);

        set_meta('title', 'Instructor');
        set_meta('search-title', 'Search Instructor');

        return view('wingz/companies::admin.instructor', compact('eloquent', 'table'));
    }
    
    public function activation($id, $token)
    {
        $instructor = $this->model->findOrFail($id);

        if($instructor->company_id != Auth::user()->company->id) {
            messages('warning', 'You are not Authorized');

        }

        if ($instructor->activation_token == $token) {
            $instructor->status = 1;
            $instructor->activation_token = null;
            $instructor->save();


            //mail to Instructor
            $user = $instructor->user;
            $subject = 'Instructor Approve';

            $data = [];
            $message = Message::create('emails.instructor.instructor-approval', $data, $subject);

            $user->notify($message);
            
            messages('success', 'Instructor Approved Successfully');
        }else {
            messages('error', 'Token Not Match');
        }

        return Redirect::to('admin/companies/instructors');

    }



    public function reject($id, $token)
    {
        $instructor = $this->model->findOrFail($id);

        if($instructor->company_id != Auth::user()->company->id) {
            messages('warning', 'You are not Authorized');
        }

        if ($instructor->activation_token == $token) {
            $instructor->status = 0;
            $instructor->activation_token = null;
            $instructor->save();

            $user = $instructor;
            $subject = 'Instructor Reject';

            $data = $instructor->toArray();
            $message = Message::create('emails.user.instructor-approval', $data, $subject);

            $user->notify($message);
            //mail to Instructor
            messages('success', 'Instructor Reject Successfully');
        }else {
            messages('error', 'Token Not Match');
        }

        return Redirect::to('admin/companies/instructors');

    }

    public function activate(Instructors $id)
    {
        $instructor = $id;
        if($instructor->status == 1) {
            $instructor->status = 0;
            $instructor->save();
        }else{
            $instructor->status = 1;
            $instructor->save();
        }
        messages('success', 'Instructor Approved Successfully');
        
        return redirect()->back();
    }


    protected function fireEvent($type, array $parameters = [])
    {
        Event::fire("orchestra.control.{$type}: instructors", $parameters);
    }

}
