<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'wingzs'], function (Router $router) {
    $router->get('/', 'HomeController@index');
});
