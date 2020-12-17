<?php


namespace Liuyuede123\Printlog;


class User
{
    private $log;

    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    public function login()
    {
        echo 'user login' . PHP_EOL;
        $this->log->write();
    }

}