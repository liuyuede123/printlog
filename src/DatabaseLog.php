<?php


namespace Liuyuede123\Printlog;


class DatabaseLog implements Log
{
    public function write()
    {
        echo 'this is database log' . PHP_EOL;
    }
}