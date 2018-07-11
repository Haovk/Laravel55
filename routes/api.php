<?php

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\WebConfig;
use App\Http\Resources\LogResource;
use App\Http\Resources\WebConfigResource;
use Illuminate\Support\Facades\Storage;
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

Route::get('getwebconfig/{id}', function ($id) {
    return WebConfig::find($id)->Content;
});

Route::get('getwebconfig', function (Request $request) {
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

Route::post('uploadHead', function (Request $request) {
    $msgArr=['Status'=>20001,'Url'=>'','Message'=>'上传失败'];
    $file = $request->file('picture');
    try {
        if ($file->isValid()) {
            //获取文件的扩展名
            $ext = $file->getClientOriginalExtension();

            //获取文件的绝对路径
            $path = $file->getRealPath();

            //定义文件名
            $filename = 'mytouxiang'.date('Y-m-d-h-i-s').'.'.$ext;
            //存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
            Storage::disk('mytouxiang')->put($filename, file_get_contents($path));
            $url = Storage::disk('mytouxiang')->url($filename);
            $msgArr=['Status'=>20000,'Url'=>$url,'Message'=>'上传成功'];
        }
        return json_encode($msgArr);
    }
    catch(Exception $exc)
    {
        return json_encode($msgArr);
    }
});