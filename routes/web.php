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


// ADMIN ROUTES

$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->post('login', 'Admin\AuthController@login');

    $router->group(['middleware' => ['auth:admin']], function () use ($router) {
        // Authentication
        $router->post('logout', 'Admin\AuthController@logout');
        $router->get('me', 'Admin\AuthController@me');
        $router->get('refresh', 'Admin\AuthController@refresh');

    });
});