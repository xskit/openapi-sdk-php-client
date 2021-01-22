<?php


namespace AlibabaCloud\Client;


use Hyperf\Utils\ApplicationContext;
use Hyperf\Guzzle\CoroutineHandler;
use Swoole\Coroutine as SwooleCo;

class HyperfCoroutineHandler
{

    public static function inCoroutine()
    {
        return SwooleCo::getCid() > 0;
    }


    public static function getHandler()
    {
        if (class_exists(ApplicationContext::class)) {
            return make(CoroutineHandler::class);
        }

        return new CoroutineHandler();
    }
}