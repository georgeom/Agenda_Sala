<?php

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

$router->get('/agenda', 'AgendaController@getAll');

$router->group(['prefix' => "/agenda"], function() use($router){
	$router->get('/{id}', 'AgendaController@get');
	$router->post('/', 'AgendaController@store');
	$router->put('/{id}', 'AgendaController@update');
	$router->delete('/{id}', 'AgendaController@destroy');
});
