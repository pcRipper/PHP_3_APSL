<?php

require_once 'vendor/autoload.php';

use Apsl\Controller\Application;
use Apsl\Controller\MySQL_CRUD;
use Apsl\Controller\Registration;
use Apsl\Controller\DB_Functional;
use Apsl\Controller\RestorePassword;


$app = new Application();
$app->run();

