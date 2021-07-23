<?php

namespace Ajifatur\FaturLMS;

class FaturLMS
{
    public static function routes()
    {
        require __DIR__.'/../routes/web.php';
    }

    public static function APIroutes()
    {
        require __DIR__.'/../routes/api.php';
    }
}