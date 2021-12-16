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
    $router->get('/', function () use ($router) {
        return phpinfo();
    });
});

$router->group(['prefix' => 'user'], function () use ($router) {
    $router->get('index', 'AuthController@index');
    $router->get('show/{id}', 'AuthController@show');
    $router->post('register', 'AuthController@register');
    $router->put('update/{id}', 'AuthController@update');
    $router->delete('delete/{id}', 'AuthController@delete');
});

$router->group(['prefix' => 'appointmentssubjects'], function () use ($router) {
    $router->get('show/{id}', 'appointmentssubjectsController@show');
    $router->post('register', 'appointmentssubjectsController@register');
    $router->put('update/{id}', 'appointmentssubjectsController@update');
    $router->delete('delete/{id}', 'appointmentssubjectsController@delete');
});