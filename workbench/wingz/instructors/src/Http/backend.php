<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'instructors'], function (Router $router) {

    
    $router->patch('profile/password-change', 'ProfileController@passwordUpdate');
    $router->patch('profile/update', 'ProfileController@profileUpdate');
    $router->get('profile', 'ProfileController@profile');


    $router->get('request/{id}/reject/{token}', 'ScheduleRequestController@reject');
    $router->get('request/{id}/approve/{token}', 'ScheduleRequestController@activation');

    $router->get('time-off/{id}/delete', 'TimeOffController@delete');
    $router->resource('time-off', 'TimeOffController');

    $router->resource('flight-history', 'FlightHistoryController');
    $router->resource('/', 'ScheduleController');

});
