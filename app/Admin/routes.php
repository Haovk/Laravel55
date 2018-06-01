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
    $router->resource('ViewGameOperationReport', ViewGameOperationReportController::class);
    $router->resource('ViewTotalUserActivity', ViewTotalUserActivityController::class);
    $router->resource('ViewTotalUserPayment', ViewTotalUserPaymentController::class);
    $router->resource('ViewTotalChannelUsersActivity', ViewTotalChannelUsersActivityController::class);
    $router->resource('ViewMonthlyIndexAnalysis', ViewMonthlyIndexAnalysisController::class);
    $router->resource('ViewMonthlyChannelIndexAnalysis', ViewMonthlyChannelIndexAnalysisController::class);
    $router->resource('ViewKeyIndexIntervalComparison', ViewKeyIndexIntervalComparisonController::class);
    $router->resource('ViewThreeAwardRank', ViewThreeAwardRankController::class);
    $router->get('userinfo/{id}/EditGold', 'UserInfoController@EditGold');
    $router->post('userinfo/updategold','UserInfoController@updategold');
});
