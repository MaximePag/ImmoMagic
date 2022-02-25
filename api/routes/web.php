<?php

use Laravel\Lumen\Routing\Router;



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


/** @var Router $router */
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['middleware' => 'auth','prefix' => 'api'], function ($router)
{
    $router->get('me', 'AuthController@me');
});

// API route group
$router->group(['prefix' => 'api'], function () use ($router)
{
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
});

// get('objet'), ('controller@methode');
$router->get('RealEstate', 'realestateController@showAllrealestateDetail' );
$router->get('/RealEstate/{id}', 'realestateController@showrealestateDetail');
$router->post('RealEstate', 'realestateController@createrealestate');
$router->put('/RealEstate/{id}', 'realestateController@updaterealestate');
$router->delete('/RealEstate/{id}', 'realestateController@deleterealestate');

/* $router->group(['prefix' => ''], function () use ($router) {
    $router->post('createrealestate', 'realestateController@createrealestate');
}); */


/** @var Router $router */

$router->group(['middleware'=>'auth.jwt', 'prefix' => 'user'],  function () use ($router) {
    $router->get('index', 'AuthController@index');
    $router->get('show/{id}', 'AuthController@show');
    $router->patch('archive/{id}', 'AuthController@archive');
    $router->put('update/{id}', 'AuthController@update');
    $router->delete('delete/{id}', 'AuthController@delete');
    $router->get('profile', 'UserController@profile');
    $router->get('users/{id}', 'UserController@singleUser');
    $router->get('users', 'UserController@allUsers');
});


$router->group(['prefix' => 'appointmentssubjects'], function () use ($router) {
    $router->get('show/{id}', 'appointmentssubjectsController@show');
    $router->post('register', 'appointmentssubjectsController@register');
    $router->put('update/{id}', 'appointmentssubjectsController@update');
    $router->delete('delete/{id}', 'appointmentssubjectsController@delete');
});

$router->group(['prefix' => 'typeofrealestates'], function () use ($router) {
    $router->get('show/{id}', 'typeofrealestatesController@show');
    $router->post('register', 'typeofrealestatesController@register');
    $router->put('update/{id}', 'typeofrealestatesController@update');
    $router->delete('delete/{id}', 'typeofrealestatesController@delete');
});

// Routes pour la table documents

$router->get('Documents', 'DocumentsController@index' );
$router->get('Documents/{id}', 'DocumentsController@show');
$router->post('Documents', 'DocumentsController@create');
$router->put('Documents/{id}', 'DocumentsController@update');
$router->patch('Documents/{id}', 'DocumentsController@archive');
$router->delete('Documents/{id}', 'DocumentsController@delete');

// Routes pour la table roles

$router->get('Roles', 'RolesController@index' );
$router->get('Roles/{id}', 'RolesController@show');
$router->post('Roles', 'RolesController@create');
$router->put('Roles/{id}', 'RolesController@update');
$router->delete('Roles/{id}', 'RolesController@delete');

// Routes pour la table appointments

$router->get('Appointments', 'AppointmentsController@index' );
$router->get('Appointments/{id}', 'AppointmentsController@show');
$router->post('Appointments', 'AppointmentsController@create');
$router->put('Appointments/{id}', 'AppointmentsController@update');
$router->delete('Appointments/{id}', 'AppointmentsController@delete');

// Routes pour la table pictures

$router->get('Pictures', 'PicturesController@index' );
$router->get('Pictures/{id}', 'PicturesController@show');
$router->post('Pictures', 'PicturesController@create');
$router->put('Pictures/{id}', 'PicturesController@update');
$router->delete('Pictures/{id}', 'PicturesController@delete');

// Routes pour la table typesOfContract

$router->get('TypesOfContract', 'TypesOfContractController@index' );
$router->get('TypesOfContract/{id}', 'TypesOfContractController@show');
$router->post('TypesOfContract', 'TypesOfContractController@create');
$router->put('TypesOfContract/{id}', 'TypesOfContractController@update');
$router->delete('TypesOfContract/{id}', 'TypesOfContractController@delete');

// Routes pour la table typesOfHeating

$router->get('TypesOfHeating', 'TypesOfHeatingController@index' );
$router->get('TypesOfHeating/{id}', 'TypesOfHeatingController@show');
$router->post('TypesOfHeating', 'TypesOfHeatingController@create');
$router->put('TypesOfHeating/{id}', 'TypesOfHeatingController@update');
$router->delete('TypesOfHeating/{id}', 'TypesOfHeatingController@delete');

// Routes pour la table cities

$router->get('Cities', 'Cities@index' );
$router->get('Cities/{id}', 'Cities@show');

// Routes pour la table typesOfWaterEvacuation

$router->get('TypesOfWaterEvacuation', 'TypesOfWaterEvacuationController@index' );
$router->get('TypesOfWaterEvacuation/{id}', 'TypesOfWaterEvacuationController@show');
$router->post('TypesOfWaterEvacuation', 'TypesOfWaterEvacuationController@create');
$router->put('TypesOfWaterEvacuation/{id}', 'TypesOfWaterEvacuationController@update');
$router->delete('TypesOfWaterEvacuation/{id}', 'TypesOfWaterEvacuationController@delete');

/**
 * Routers for Extras
 */
$router->get('/extras', 'ExtrasController@index');
$router->get('/extras/{id}', 'ExtrasController@show');
$router->post('/extras', 'ExtrasController@create');
$router->put('/extras/{id}', 'ExtrasController@update');
$router->delete('/extras/{id}', 'ExtrasController@delete');
