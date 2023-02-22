<?php

namespace Apsl\Controller;

class RestorePassword {

    private string $email = '';

    public function __construct(string $email)
    {
        $config = new Config('config/db.php');
    }

    public function createHash()
    {
        return md5(date('d-m-y h:i:s'));
    }
}