<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'companies'], function (Router $router) {

    $router->post('social-media', 'ProfileController@socialMedia');
    $router->get('business-hour/{id}/delete', 'ProfileController@businessHourDelete');
    $router->post('business-hour', 'ProfileController@businessHour');
    $router->patch('profile/update', 'ProfileController@profileUpdate');
    $router->get('profile', 'ProfileController@profile');

    $router->get('request/{id}/reject/{token}', 'ScheduleRequestController@reject');
    $router->get('request/{id}/approve/{token}', 'ScheduleRequestController@activation');

    $router->get('instructors/{id}/reject/{token}', 'InstructorController@reject');
    $router->get('instructors/{id}/activation/{token}', 'InstructorController@activation');
    $router->get('instructors/{id}/activate', 'InstructorController@activate');
    $router->get('instructors', 'InstructorController@index');
    $router->get('aircraft/{id}/view', 'AircraftController@view');
    $router->resource('aircraft', 'AircraftController');
    $router->resource('flight-history', 'FlightHistoryController');
    $router->resource('/', 'ScheduleController');

});
