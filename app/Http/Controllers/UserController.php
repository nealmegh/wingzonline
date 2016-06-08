<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Contracts\Html\Form\Grid as FormGrid;
use Orchestra\Support\Facades\Form;
use Wingz\Foundation\Model\Airport;
use Wingz\Foundation\Model\Companies;
use Wingz\Foundation\Model\Instructors;
use Wingz\Foundation\Model\Licenses;
use Wingz\Foundation\Model\Renters;
use Wingz\Foundation\Model\State;
use Wingz\Foundation\Model\User;
use Orchestra\Notifier\Message;



class UserController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
//        $this->middleware('auth');
          
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return mixed
     */
    public function create() {

        $airports = Airport::lists('name', 'id');
        $licenses = Licenses::all();
        $companies = Companies::all();
        
        $states = State::stateList();

        return view('frontend.userAccountCreate', compact('airports', 'licenses', 'companies', 'states'));

    }
    
    public function store(Request $request) {


        $this->validate($request, [
            'username' => 'required|unique:users|max:50',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users',
            'personal_address' => 'required',
            'personal_city' => 'required',
            'personal_state' => 'required',
            'personal_zip' => 'required',
            'personal_phone' => 'required',
            'personal_fax' => 'required',
            'terms_policy_agreement' => 'required',
            'account_type' => 'required'
        ]);

        if ($request->account_type == 'renter') {

            $this->validate($request, [
                'company_id' => '',
                'last_flight_review_date' => 'required',
                'custom_date' => '',
                'medical_class' => '',
                'medical_class_date' => '',
                'license_id' => 'required'
            ]);
            $user = $this->renter($request);

            $this->thankYou($user, []);

            messages('success', 'Renter Create Successfully');
//            return view('frontend.thankyou');
        }

        if ($request->account_type == 'instructor') {

            $this->validate($request, [
                'company_id' => '',
                'last_flight_review_date' => 'required',
                'custom_date' => '',
                'medical_class' => '',
                'medical_class_date' => '',
                'license_id' => 'required'
            ]);
            
            $user = $this->instructor($request);

            $this->thankYou($user, []);

            messages('success', 'Instructor Create Successfully');


//            return view('frontend.thankyou');

        }

        if ($request->account_type == 'company') {

            $this->validate($request, [
                'company_name' => '',
                'company_website' => 'required',
                'company_address' => '',
                'company_city' => '',
                'company_state' => '',
                'company_email' => 'required',
                'company_phone' => 'required',
                'company_fax' => 'required',
                'airport_id' => 'required'
            ]);

            $user = $this->company($request);

            $this->thankYou($user, []);

            messages('success', 'Company Create Successfully');


         }

        return Redirect::to('admin/login');

    }

    private function renter($request) {

        $request->last_flight_review_date = date('Y-m-d', strtotime($request->last_flight_review_date));
        $request->custom_date = date('Y-m-d', strtotime($request->custom_date));
        $request->medical_class_date = date('Y-m-d', strtotime($request->medical_class_date));


        $user = new User();
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->address = $request->address;
        $user->city = $request->personal_city;
        $user->state = $request->personal_state;
        $user->zip = $request->personal_zip;
        $user->phone = $request->personal_phone;
        $user->fax = $request->personal_fax;

//        $roles = app('orchestra.role');
//        dd($roles->where('name', 'Renter')->get('id'));

        $user->save();
        $user->roles()->sync(['5']); //4 Company role id

        $model = new Renters();
        $model->user_id = $user->id;
        $model->last_flight_review_date = $request->last_flight_review_date;
        $model->custom_flight_date = $request->custom_date;
        $model->medical_class = $request->medical_class;
        $model->medical_class_date = $request->medical_class_date;
        $model->save();

        return $user;

    }

    private function instructor($request) {

        $request->last_flight_review_date = date('Y-m-d', strtotime($request->last_flight_review_date));
        $request->custom_date = date('Y-m-d', strtotime($request->custom_date));
        $request->medical_class_date = date('Y-m-d', strtotime($request->medical_class_date));


        $user = new User();
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = Hash::make($request->password);
        $user->email = $request->personal_email;
        $user->address = $request->address;
        $user->city = $request->personal_city;
        $user->state = $request->personal_state;
        $user->zip = $request->personal_zip;
        $user->phone = $request->personal_phone;
        $user->fax = $request->personal_fax;

//        $roles = app('orchestra.role');
//        dd($roles->where('name', 'Company')->get('id'));

        $user->save();
        $user->roles()->sync(['6']); //4 Company role id

        $model = new Instructors();
        $model->user_id = $user->id;
        $model->company_id = $request->company_id;
        $model->last_flight_review_date = $request->last_flight_review_date;
        $model->custom_flight_date = $request->custom_date;
        $model->medical_class = $request->medical_class;
        $model->medical_class_date = $request->medical_class_date;
        $model->activation_token = $request->_token;

        $model->save();

        $this->notifyCompany($instructor = $model);

        return $user;
    }

    private function company($request) {
        $user = new User();
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = Hash::make($request->password);
        $user->email = $request->personal_email;
        $user->address = $request->address;
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

        return $user;


    }

    public function frontendForm()
    {

        $form = Form::of('wingz.user', function (FormGrid $form)  {

//          $form->setup($this, 'user', []);
            $form->layout('components.form');


            $form->fieldset('Register', function ($form) {
                $form->control('input:text', 'first_name')->label('')->attributes(['placeholder'=>'First Name']);
                $form->control('input:text', 'last_name')->label('')->attributes(['placeholder'=>'Last Name']);
                $form->control('input:text', 'username')->label('')->attributes(['placeholder'=>'Username']);
                $form->control('input:password', 'password')->label('')->attributes(['placeholder'=>'Password']);
                $form->control('input:password', 'confirm_password')->label('')->attributes(['placeholder'=>'Confirm Password']);
                $form->control('input:email', 'email')->label('')->attributes(['placeholder'=>'Email']);
            });

            $form->fieldset('Address', function ($form) {
                $form->control('input:text', 'address')->label('')->attributes(['placeholder'=>'address']);
                $form->control('input:text', 'city')->label('')->attributes(['placeholder'=>'City']);
                $form->control('input:select', 'state')->label('')->attributes(['placeholder'=>'State'])->options(['NY' => 'New York']);
                $form->control('input:text', 'zip')->label('')->attributes(['placeholder'=>'zip']);
                $form->control('input:text', 'phone')->label('')->attributes(['placeholder'=>'phone']);
            });

            $form->fieldset('Instructor\'s Company', function ($form) {
                $companies = Companies::lists('name', 'id');

                $form->control('input:select', 'company')->label('')->attributes(['placeholder'=>'Company'])->options($companies);
            });


        });
        return view('admin.form', compact('form'));


    }
    
    public function thankYou($user, $data)
    {

        $subject = 'New Account Create';
        $message = Message::create('emails.user.common', $data, $subject);

        $receipt = $user->notify($message);

        if ($receipt->failed()) {
            //essage('');
        }else {

        }

    }

    public function notifyCompany($instructor)
    {
        $company = $instructor->company;
        $user = $company->user;
        $subject = 'New Instructor Request';

        $data = $instructor->toArray();
        $message = Message::create('emails.user.instructor-activation', $data, $subject);

        $user->notify($message);
    }

}
