<?php

namespace App\Http\Controllers;

use Orchestra\Notifier\Message;
use Wingz\Foundation\Model\LicenseRentersInstructors;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
//use Orchestra\Routing\Controller;
use Wingz\Foundation\Http\Presenters\RenterPresenter as Presenter;
use Orchestra\Contracts\Foundation\Foundation;
use Wingz\Foundation\Http\Requests\RenterRequest;
use Wingz\Foundation\Model\User;


class RenterController extends Controller
{
    public function __construct(Presenter $presenter, Foundation $foundation)
    {
        $this->presenter  = $presenter;
        $this->foundation = $foundation;
        $this->model      = $foundation->make('Wingz\Foundation\Model\Renters');
    }

    public function create() {
        set_meta('title', 'Renter Sign Up');
        set_meta('description', 'Sign Up for a <strong>FREE</strong> account before<br> booking a flight:');

        return $this->presenter->frontendForm($this->model);
    }


    public function store(RenterRequest $request) {
        $request->last_flight_review_date = date('Y-m-d', strtotime($request->last_flight_review_date));
        $request->custom_flight_date = date('Y-m-d', strtotime($request->custom_flight_date));
        $request->medical_class_date = date('Y-m-d', strtotime($request->medical_class_date));

        $request->issue_date = date('Y-m-d', strtotime($request->issue_date));
        $request->expiration_date = date('Y-m-d', strtotime($request->expiration_date));


        $user = new User();
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->address = $request->personal_address;
        $user->city = $request->personal_city;
        $user->state = $request->personal_state;
        $user->zip = $request->personal_zip;
        $user->phone = $request->personal_phone;
        $user->fax = $request->personal_fax;

//        $roles = app('orchestra.role');
//        dd($roles->where('name', 'Company')->get('id'));

        $user->save();
        $user->roles()->sync(['5']); //4 Company role id

        $model = $this->model;
        $model->user_id = $user->id;
        $model->last_flight_review_date = $request->last_flight_review_date;
        $model->custom_flight_date = $request->custom_flight_date;
        $model->medical_class = $request->medical_class;
        $model->medical_class_date = $request->medical_class_date;
        $model->save();


        $license = new LicenseRentersInstructors();
        $license->renter_id = $model->id;
        $license->license_type  = $request->license_type;
        $license->license_no = $request->license_no;
        $license->issue_date = $request->issue_date;
        $license->expiration_date = $request->expiration_date;
        $license->save();


        $data = [
            'username'=>$user->username,
            'password'=>$user->getAuthPassword()
        ];
        $this->thankYou($user, $data);

        messages('success', 'Your account has been created successfully!');
        return Redirect::back();
    }



    public function thankYou($user, $data)
    {

        $subject = 'Welcome to Wingz Online!';
        $message = Message::create('emails.common.common', $data, $subject);

        $receipt = $user->notify($message);

        if ($receipt->failed()) {
            //essage('');
        }else {

        }

    }


}
