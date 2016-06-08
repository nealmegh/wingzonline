<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
//use Orchestra\Routing\Controller;
use App\Http\Presenters\CompaniesPresenter as Presenter;
use App\Http\Requests\CompaniesRequest;
use Orchestra\Contracts\Foundation\Foundation;
use Orchestra\Notifier\Message;
use Wingz\Foundation\Model\Companies;
use Wingz\Foundation\Model\User;


class CompaniesController extends Controller
{

    public function __construct(Presenter $presenter, Foundation $foundation)
    {
        $this->presenter  = $presenter;
        $this->foundation = $foundation;
        $this->model      = $foundation->make('Wingz\Foundation\Model\Companies');
    }


    public function create() {
        set_meta('title', 'Company Sign Up');
        set_meta('description', 'Sign up for a <strong>FREE</strong> account before<br> managing your aircraft with Wingz Online!');
        return $this->presenter->form($this->model);
    }

    public function store(CompaniesRequest $request) {

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
        $user->roles()->sync(['4']); //4 Company role id

        $companies = new Companies();
        $companies->user_id = $user->id;
        $companies->name = $request->company_name;
        $companies->contact_name = null;
        $companies->address = $request->company_address;
        $companies->city = $request->company_city;
        $companies->state = $request->company_state;
        $companies->zip = $request->company_state;
        $companies->companies_email = $request->company_email;
        $companies->website = null;
        $companies->phone = $request->company_phone;
        $companies->fax = null;
        $companies->airport_id = $request->airport_id;
        $companies->save();


        $subject = 'New Account Create';
        
        $data = [
            'username'=>$user->username,
            'password'=>$user->getAuthPassword()
        ];
        $message = Message::create('emails.common.common', $data, $subject);

        $receipt = $user->notify($message);

        if ($receipt->failed()) {
            //essage('');
        }else {

        }

        messages('success', 'Account Create Successfully');
        return Redirect::back();

    }



}
