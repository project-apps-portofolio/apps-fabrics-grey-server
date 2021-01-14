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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['namespace' => 'Auth'], function() use ($router) {
    $router->post('register', 'AuthController@register');
});

$router->group(['prefix' => 'api', 'middleware' => ['api.jwt', 'cors']], function () use ($router) {
    $router->group(['namespace' => 'Fabric', 'prefix' => 'fabric'], function () use ($router) {
        $router->get('/', 'FabricController@index');
    });
    $router->group(['namespace' => 'Machine', 'prefix' => 'machine'], function () use ($router) {
        $router->get('/', 'MachineController@index');
    });
});
