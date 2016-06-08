<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'wingz'], function (Router $router) {

    $router->resource('license', 'LicenseController');
    $router->resource('renters', 'RenterController');
    $router->resource('flight-schedule', 'FlightSchedulesController');
    
    $router->resource('companies/instructors', 'InstructorController');
    $router->resource('companies/airport', 'AirportController');
    $router->resource('companies/aircraft', 'AircraftController');
    $router->resource('companies/flight-history', 'FlightHistoryController');
    $router->resource('companies/schedule', 'ScheduleController');

    $router->resource('companies', 'CompaniesController');
    
    $router->get('company-profile', 'HomeController@companyProfile');

    $router->resource('booking', 'BookingController');
//    $router->resource('account', 'AccountController');
    $router->get('/', 'HomeController@index');
});


$router->group(['prefix' => 'users'], function (Router $router) {
    $router->patch('profile/password-change', 'ProfileController@passwordUpdate');
    $router->patch('profile/update', 'ProfileController@profileUpdate');
    $router->get('profile', 'ProfileController@profile');
});