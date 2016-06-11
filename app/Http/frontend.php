<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Orchestra\Notifier\Message;



$router->group(['middleware' => ['web']], function (Router $router) {

    $router->post('login', 'LoginController@login');
    
    $router->get('terms-conditions', 'HomeController@terms');
    $router->get('support', 'HomeController@support');

    //Done
    $router->get('renter/create', 'RenterController@create');
    $router->post('renter', 'RenterController@store');
    //Done
    $router->get('instructor/create', 'InstructorController@create');
    $router->post('instructor', 'InstructorController@store');
    //Done
    $router->get('company/create', 'CompaniesController@create');
    $router->post('company', 'CompaniesController@store');

    $router->get('thank-you', 'UserController@thankYou');
    $router->get('confirm-booking', 'BookingController@confirmBooking');


    //Done
    $router->get('create-user-account', 'UserController@create');
    $router->post('create-user-account', 'UserController@store');



    $router->get('questions', 'HomeController@questions');

    $router->get('privacy-policy', 'HomeController@privacy');
    $router->get('login', 'HomeController@login');



    $router->get('book-aircraft', 'HomeController@bookAircraft');
    $router->get('renter-access-only', 'HomeController@renterAccess');

    //Aircraft Booking
    $router->get('aircraft/available', 'AircraftController@flightAvailable');

//    $router->post('aircraft/booking/{id}', 'AircraftController@booking');

    $router->get('aircraft/booking/{id}', 'AircraftController@booking');
    $router->post('aircraft/booking/{id}', 'BookingController@store');



    $router->get('about', 'HomeController@about');

    $router->get('/', 'HomeController@index');
    $router->get('home', 'HomeController@index');

    $router->get('mail', function() {
        $data = ['HEllo World'];
        $user = \Orchestra\Model\User::find('34');

        $subject = 'New Subject';
        $message = Message::create('emails.user.renter', $data, $subject);

        $receipt = $user->notify($message);

        if ($receipt->failed()) {
            dd('Fail');
        }
        dd('Success');
    });

    $router->get('email', function() {
        set_meta('title', 'New Account');
        set_meta('subTitle', 'Subtitle');
        return view('orchestra/foundation::emails.layouts.action');
    });
});

