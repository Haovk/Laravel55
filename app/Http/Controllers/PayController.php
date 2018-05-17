<?php

namespace App\Http\Controllers;

use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;

class PayController extends Controller
{
    protected $config = [
        'appid' => 'wx1b397e94b8210b8b', // APP APPID
        'app_id' => 'wxb3fxxxxxxxxxxx', // 公众号 APPID
        'miniapp_id' => 'wxb3fxxxxxxxxxxx', // 小程序 APPID
        'mch_id' => '1490907642',
        'key' => 'd65617d1ac47ad51bce9b09f9e13ac98',
        'notify_url' => 'http://yanda.net.cn/pay/wechatappnotify',
        'cert_client' => './cert/apiclient_cert.pem', // optional，退款等情况时用到
        'cert_key' => './cert/apiclient_key.pem',// optional，退款等情况时用到
        'log' => [ // optional
            'file' => './logs/wechat.log',
            'level' => 'debug'
        ],
        'mode' => 'dev', // optional, dev/hk;当为 `hk` 时，为香港 gateway。
    ];

    public function wechatapp()
    {
        $order = [
            'out_trade_no' => time(),
            'total_fee' => '1', // **单位：分**
            'body' => 'test body - 测试',
        ];

        $pay = Pay::wechat($this->config)->app($order);

        return json($pay);

        // $pay->appId
        // $pay->timeStamp
        // $pay->nonceStr
        // $pay->package
        // $pay->signType
    }

    public function wechatappnotify()
    {
        $pay = Pay::wechat($this->config);

        try{
            $data = $pay->verify(); // 是的，验签就这么简单！

            Log::debug('Wechat notify', $data->all());
        } catch (Exception $e) {
            // $e->getMessage();
        }

        return $pay->success();// laravel 框架中请直接 `return $pay->success()`
    }
}