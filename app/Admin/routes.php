<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('users', UserController::class);
    $router->resource('log', LogController::class);
    $router->resource('userinfo', UserInfoController::class);
    $router->resource('ViewThreeAwardRecord', ViewThreeAwardRecordController::class);
    $router->resource('ViewThreeTotal', ViewThreeTotalController::class);
    $router->resource('ViewThreeBetRecore', ViewThreeBetRecoreController::class);
    $router->resource('ThreeTotalRecord', ThreeTotalRecordController::class);
});
