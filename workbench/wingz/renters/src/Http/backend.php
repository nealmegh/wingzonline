<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'renters'], function (Router $router) {

    
    $router->patch('profile/update', 'ProfileController@profileUpdate');
    $router->get('profile', 'ProfileController@profile');

    $router->resource('flight-history', 'FlightHistoryController');
    $router->get('booking/{id}/delete', 'ScheduleController@delete');

    $router->resource('/', 'ScheduleController');

});
