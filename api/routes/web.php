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

// Routes pour la table documents

$router->get('Documents', 'DocumentsController@index' );
$router->get('/Documents/{id}', 'DocumentsController@show');
$router->post('/Documents', 'DocumentsController@create');
$router->put('/Documents/{id}', 'DocumentsController@update');
$router->patch('/Documents/{id}', 'DocumentsController@archive');
$router->delete('/Documents/{id}', 'DocumentsController@delete');

// Routes pour la table roles

$router->get('Roles', 'RolesController@index' );
$router->get('/Roles/{id}', 'RolesController@show');
$router->post('/Roles', 'RolesController@create');
$router->put('/Roles/{id}', 'RolesController@update');
$router->delete('/Roles/{id}', 'RolesController@delete');

// Routes pour la table appointments

$router->get('Appointments', 'AppointmentsController@index' );
$router->get('/Appointments/{id}', 'AppointmentsController@show');
$router->post('/Appointments', 'AppointmentsController@create');
$router->put('/Appointments/{id}', 'AppointmentsController@update');
$router->delete('/Appointments/{id}', 'AppointmentsController@delete');