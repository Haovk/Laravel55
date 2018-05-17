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
});
