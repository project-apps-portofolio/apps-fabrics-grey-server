<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// header('Access-Control-Allow-Origin: *');
header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );
header( 'Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods:*');

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['namespace' => 'Auth'], function() use ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['namespace' => 'Fabric', 'prefix' => 'fabric'], function () use ($router) {
        $router->get('/', 'FabricController@index');
        $router->post('/store', 'FabricController@store');
        $router->put('/update/{id}', 'FabricController@update');
        $router->delete('/delete/{id}', 'FabricController@delete');
        $router->get('/show/{id}', 'FabricController@show');
    });
    $router->group(['namespace' => 'Machine', 'prefix' => 'machine'], function () use ($router) {
        $router->get('/', 'MachineController@index');
        $router->post('/store', 'MachineController@store');
        $router->put('/update/{id}', 'MachineController@update');
        $router->delete('/delete/{id}', 'MachineController@delete');
        $router->get('/show/{id}', 'MachineController@show');
    });

    $router->group(['namespace' => 'Schedule', 'prefix' => 'schedules'], function () use ($router) {
        $router->get('/', 'ScheduleController@index');
        $router->post('/store', 'ScheduleController@store');
        $router->get('/show/{id}', 'ScheduleController@show');
        $router->delete('/delete/{id}', 'ScheduleController@delete');
    });

    $router->group(['namespace' => 'Job', 'prefix' => 'job'], function () use ($router) {
        $router->post('/store', 'JobController@store');
        $router->get('/', 'JobController@index');
    });

    $router->group(['namespace' => 'Customer', 'prefix' => 'customers'], function () use ($router) {
        $router->get('/', 'CustomerController@index');
        $router->post('/store', 'CustomerController@store');
        $router->put('/update/{id}', 'CustomerController@update');
        $router->delete('/delete/{id}', 'CustomerController@delete');
    });

    $router->group(['namespace' => 'ColorNumber', 'prefix' => 'color_number'], function() use ($router) {
        $router->get('/', 'ColorNumberController@index');
        $router->post('/store', 'ColorNumberController@store');
        $router->get('/edit/{id}', 'ColorNumberController@edit');
        $router->put('/update/{id}', 'ColorNumberController@update');
        $router->delete('/delete/{id}', 'ColorNumberController@destroy');
    });
});
