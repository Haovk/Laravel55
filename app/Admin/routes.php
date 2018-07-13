<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    //管理员用户管理
    $router->resource('auth/users', AdminUserController::class);
    $router->resource('users', UserController::class);
    //
    $router->resource('log', LogController::class);
    //用户信息
    $router->resource('userinfo', UserInfoController::class);
    //游戏配置
    $router->resource('webconfig', WebConfigController::class);
    //时时乐开牌记录
    $router->resource('ThreeTotalRecord', ThreeTotalRecordController::class);
    //时时乐中奖记录
    $router->resource('Views/ThreeAwardRecord', Views\ThreeAwardRecordController::class);
    //时时乐押注/中奖记录
    $router->resource('Views/ThreeTotal', Views\ThreeTotalController::class);
    //时时乐押注记录
    $router->resource('Views/ThreeBetRecore', Views\ThreeBetRecoreController::class);
    //时时乐概率
    $router->resource('Views/ThreeAwardRank', Views\ThreeAwardRankController::class);
    //总况 / 游戏运营报告
    $router->resource('Views/GameOperationReport', Views\GameOperationReportController::class);
    //总况 / 用户活跃总况
    $router->resource('Views/TotalUserActivity', Views\TotalUserActivityController::class);
    //总况 / 用户付费总况
    $router->resource('Views/TotalUserPayment', Views\TotalUserPaymentController::class);
    //总况 / 各渠道用户总况
    $router->resource('Views/TotalChannelUsersActivity', Views\TotalChannelUsersActivityController::class);
    //总况 / 自然月指标分析
    $router->resource('Views/MonthlyIndexAnalysis', Views\MonthlyIndexAnalysisController::class);
    //总况 / 自然月指标分析
    $router->resource('Views/MonthlyChannelIndexAnalysis', Views\MonthlyChannelIndexAnalysisController::class);
    //总况 / 自然月指标分析
    $router->resource('Views/KeyIndexIntervalComparison', Views\KeyIndexIntervalComparisonController::class);
    //注册用户分析 / 用户注册分析
    $router->resource('Views/UserRegistrationAnalysis', Views\UserRegistrationAnalysisController::class);
    //注册用户分析 / 注册用户留存分析
    $router->resource('Views/RegisteredUserRetentionAnalysis', Views\RegisteredUserRetentionAnalysisController::class);
    //注册用户分析 / 注册用户流失分析
    $router->resource('Views/RegisteredUserFlowAwayAnalysis', Views\RegisteredUserFlowAwayAnalysisController::class);
    //注册用户分析 / 注册用户活跃度分析
    $router->resource('Views/RegisteredUserActivityAnalysis', Views\RegisteredUserActivityAnalysisController::class);
    //注册用户分析 / 注册用户充值转换分析
    $router->resource('Views/RegisteredUserPayChangeAnalysis', Views\RegisteredUserPayChangeAnalysisController::class);
    //注册用户分析 / 有效用户登录比
    $router->resource('Views/EffectiveUserLoginRatio', Views\EffectiveUserLoginRatioController::class);
    //注册用户分析 / 各渠道注册注册用户
    $router->resource('Views/ChannelRegisteredUserAnalysis', Views\ChannelRegisteredUserAnalysisController::class);
    //注册用户分析 / 各渠道注册用户留存分析
    $router->resource('Views/ChannelUserRetentionAnalysis', Views\ChannelUserRetentionAnalysisController::class);
    //注册用户分析 / 各渠道注册用户流失分析
    $router->resource('Views/ChannelUserFlowAwayAnalysis', Views\ChannelUserFlowAwayAnalysisController::class);
    //注册用户分析 / 各渠道注册用户充值转换分析
    $router->resource('Views/ChannelUserPayChangeAnalysis', Views\ChannelUserPayChangeAnalysisController::class);
    //活跃用户分析 / 用户活跃分析
    $router->resource('Views/UserActivityAnalysis', Views\UserActivityAnalysisController::class);
    //活跃用户分析 / 各渠道用户活跃分析
    $router->resource('Views/ChannelUserActivityAnalysis', Views\ChannelUserActivityAnalysisController::class);
    //付费用户分析 / 用户充值分析
    $router->resource('Views/UserPayAnalysis', Views\UserPayAnalysisController::class);
    //付费用户分析 / 用户消费分析
    $router->resource('Views/UserConsumeAnalysis', Views\UserConsumeAnalysisController::class);
    //付费用户分析 / 用户余额分析
    $router->resource('Views/UserBalanceAnalysis', Views\UserBalanceAnalysisController::class);
    //付费用户分析 / 充值消费平衡表
    $router->resource('Views/UserPayConsumeBalanceAnalysis', Views\UserPCBAnalysisController::class);
    //付费用户分析 / 各渠道充值分析
    $router->resource('Views/ChannelUserPayAnalysis', Views\ChannelUserPayAnalysisController::class);
    //付费用户分析 / 各渠道消费分析
    $router->resource('Views/ChannelUserConsumeAnalysis', Views\ChannelUserConsumeAnalysisController::class);
    //付费用户分析 / 各渠道余额分析
    $router->resource('Views/ChannelUserBalanceAnalysis', Views\ChannelUserBalanceAnalysisController::class);
    //付费用户分析 / 各渠道付费平衡表
    $router->resource('Views/ChannelUserPCBAnalysis', Views\ChannelUserPCBAnalysisController::class);
    $router->get('userinfo/{id}/EditGold', 'UserInfoController@EditGold');
    $router->post('userinfo/updategold','UserInfoController@updategold');
});
