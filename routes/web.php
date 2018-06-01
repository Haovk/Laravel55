<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('userquestion', 'UserQuestionController@index');
Route::post('userquestion', 'UserQuestionController@store');

Route::get('/gamehelp', function () {
    return view('gamehelp');
});

Route::get('/calladmin', function () {
    return view('calladmin');
});

Route::get('/activitynotice', function () {
    return view('activitynotice');
});

Route::get('/systemnotice', function () {
    return view('systemnotice');
});

Route::get('/test', function () {
    return view('test');
});

