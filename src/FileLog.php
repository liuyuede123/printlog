<?php


namespace Liuyuede123\Printlog;


class FileLog implements Log
{
    public function write()
    {
        echo 'this is file log' . PHP_EOL;
    }
}