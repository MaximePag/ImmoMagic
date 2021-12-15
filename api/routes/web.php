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

/* $router->get('/', function () use ($router) {
    return $router->app->version();
}); */

$router->group(['prefix' => ''], function () use ($router) {
    $router->post('createrealestate', 'realestateController@createrealestate');
});
// $router->get('realestate', 'realestateController@index' );
// $router->get('/realestate/{id}', 'realestateController@show');
/* $router->post('createrealestate', 'realestateController@createrealestate'); */
// $router->put('/realestate/{id}', 'realestateController@update');
// $router->delete('/realestate/{id}', 'realestateController@delete');

/** @var \Laravel\Lumen\Routing\Router $router */

