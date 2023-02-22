<?php

require_once 'vendor/autoload.php';

use Apsl\Controller\Application;
use Apsl\Controller\MySQL_CRUD;
use Apsl\Controller\Registration;
use Apsl\Controller\DB_Functional;
use Apsl\Controller\RestorePassword;
// $app = new Application();
// $app->run();

// $crud = new MySQL_CRUD();

// echo date('d-m-y h:i:s');

$registration = new Registration("maximuspro100@gmail.com","helloWorld2*");
$registration->insertData();

$restorePassword = new RestorePassword("hello@gmail.com");
$restorePassword->restore();
