<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use EasyWeChat\Kernel\Log;
use EasyWeChat;
use EasyWeChat\Factory;

class WechatController extends Controller
{
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        $config = config('wechat.official_account.default');
        $app    = Factory::officialAccount($config);
        $app->server->push(function($message){
            return "您好！欢迎关注 roystore！";
        });
        $response =  $app->server->serve();
        $response->send();
    }
}
