<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('auth/users', AdminUserController::class);
    $router->resource('users', UserController::class);
    $router->resource('log', LogController::class);
    $router->resource('userinfo', UserInfoController::class);    
    $router->resource('ThreeTotalRecord', ThreeTotalRecordController::class);
    $router->resource('Views/ThreeAwardRecord', Views\ThreeAwardRecordController::class);
    $router->resource('Views/ThreeTotal', Views\ThreeTotalController::class);
    $router->resource('Views/ThreeBetRecore', Views\ThreeBetRecoreController::class);
    $router->resource('Views/GameOperationReport', Views\GameOperationReportController::class);
    $router->resource('Views/TotalUserActivity', Views\TotalUserActivityController::class);
    $router->resource('Views/TotalUserPayment', Views\TotalUserPaymentController::class);
    $router->resource('Views/TotalChannelUsersActivity', Views\TotalChannelUsersActivityController::class);
    $router->resource('Views/MonthlyIndexAnalysis', Views\MonthlyIndexAnalysisController::class);
    $router->resource('Views/MonthlyChannelIndexAnalysis', Views\MonthlyChannelIndexAnalysisController::class);
    $router->resource('Views/KeyIndexIntervalComparison', Views\KeyIndexIntervalComparisonController::class);
    $router->resource('Views/ThreeAwardRank', Views\ThreeAwardRankController::class);
    $router->resource('Views/UserRegistrationAnalysis', Views\UserRegistrationAnalysisController::class);
    $router->resource('Views/RegisteredUserRetentionAnalysis', Views\RegisteredUserRetentionAnalysisController::class);
    $router->resource('Views/RegisteredUserFlowAwayAnalysis', Views\RegisteredUserFlowAwayAnalysisController::class);
    $router->resource('Views/RegisteredUserActivityAnalysis', Views\RegisteredUserActivityAnalysisController::class);
    $router->resource('Views/RegisteredUserPayChangeAnalysis', Views\RegisteredUserPayChangeAnalysisController::class);
    $router->resource('Views/EffectiveUserLoginRatio', Views\EffectiveUserLoginRatioController::class);
    $router->resource('Views/ChannelRegisteredUserAnalysis', Views\ChannelRegisteredUserAnalysisController::class);
    $router->resource('Views/ChannelUserRetentionAnalysis', Views\ChannelUserRetentionAnalysisController::class);
    $router->resource('Views/ChannelUserFlowAwayAnalysis', Views\ChannelUserFlowAwayAnalysisController::class);
    $router->resource('Views/ChannelUserPayChangeAnalysis', Views\ChannelUserPayChangeAnalysisController::class);
    $router->resource('Views/UserActivityAnalysis', Views\UserActivityAnalysisController::class);
    $router->resource('Views/ChannelUserActivityAnalysis', Views\ChannelUserActivityAnalysisController::class);
    $router->resource('Views/UserPayAnalysis', Views\UserPayAnalysisController::class);
    $router->resource('Views/UserConsumeAnalysis', Views\UserConsumeAnalysisController::class);
    $router->resource('Views/UserBalanceAnalysis', Views\UserBalanceAnalysisController::class);
    $router->resource('Views/UserPayConsumeBalanceAnalysis', Views\UserPayConsumeBalanceAnalysisController::class);
    $router->resource('Views/ChannelUserPayAnalysis', Views\ChannelUserPayAnalysisController::class);
    $router->resource('Views/ChannelUserConsumeAnalysis', Views\ChannelUserConsumeAnalysisController::class);
    $router->resource('Views/ChannelUserBalanceAnalysis', Views\ChannelUserBalanceAnalysisController::class);
    $router->resource('Views/ChannelUserPCBAnalysis', Views\ChannelUserPCBAnalysisController::class);
    $router->get('userinfo/{id}/EditGold', 'UserInfoController@EditGold');
    $router->post('userinfo/updategold','UserInfoController@updategold');
});
