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
        $router->group(['prefix' => 'category'], function () use ($router) {
            $router->get('all', 'Admin\CategoryController@index');
            $router->get('detail/{id}', 'Admin\CategoryController@show');
            $router->post('add', 'Admin\CategoryController@store');
            $router->post('update/{id}', 'Admin\CategoryController@update');
            $router->post('delete/{id}', 'Admin\CategoryController@destroy');
        });
    });
});


// SELLER ROUTES
$router->group(['prefix' => 'seller'], function () use ($router) {
    $router->post('login', 'Seller\AuthController@login');
    $router->post('login-by-google', 'Seller\AuthController@loginByGoogle');

    $router->group(['middleware' => ['auth:seller']], function () use ($router) {
        // Authentication
        $router->post('logout', 'Seller\AuthController@logout');
        $router->get('me', 'Seller\AuthController@me');
        $router->get('refresh', 'Seller\AuthController@refresh');
    });
});

// BUYER ROUTES
$router->group(['prefix' => 'buyer'], function () use ($router) {
    $router->post('login', 'Buyer\AuthController@login');
    $router->post('login-by-google', 'Buyer\AuthController@loginByGoogle');

    $router->group(['middleware' => ['auth:buyer']], function () use ($router) {
        // Authentication
        $router->post('logout', 'Buyer\AuthController@logout');
        $router->get('me', 'Buyer\AuthController@me');
        $router->get('refresh', 'Buyer\AuthController@refresh');
    });
});
