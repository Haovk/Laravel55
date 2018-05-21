<?php

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\WebConfig;
use App\Http\Resources\LogResource;
use App\Http\Resources\WebConfigResource;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/log', function (Request $request) {
    //return new LogResource(Log::find($id));
    return Log::find($request->id);
});

Route::get('getconfig/{id}', function ($id) {
    return WebConfig::find($id)->Content;
});

Route::get('getconfig', function (Request $request) {
    //return new WebConfigResource(WebConfig::find($request->id));
    return WebConfig::find($request->id)->Content;
});

Route::get('test', function () {
    return 'hello world';
});

Route::get('parameters', function (Request $request) {
    return $request->all();
});

Route::post('weixinpay', function (Request $request) {
    
    return $request->all();
});