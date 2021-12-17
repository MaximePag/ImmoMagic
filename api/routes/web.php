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
// get('objet'), ('controller@methode');
$router->get('RealEstate', 'realestateController@showAllrealestateDetail' );
$router->get('/RealEstate/{id}', 'realestateController@showrealestateDetail');
$router->post('RealEstate', 'realestateController@createrealestate');
$router->put('/RealEstate/{id}', 'realestateController@updaterealestate');
$router->delete('/RealEstate/{id}', 'realestateController@deleterealestate');

// API route group
$router->group(['prefix' => 'api'], function () use ($router) {
    // Matches "/api/register
   $router->post('register', 'AuthController@register');

     // Matches "/api/login
    $router->post('login', 'AuthController@login');
});


/* $router->group(['prefix' => ''], function () use ($router) {
    $router->post('createrealestate', 'realestateController@createrealestate');
}); */


/** @var \Laravel\Lumen\Routing\Router $router */