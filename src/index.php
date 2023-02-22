<?php

require_once 'vendor/autoload.php';

use Apsl\Controller\Application;
use Apsl\Controller\MySQL_CRUD;

// $app = new Application();
// $app->run();

$crud = new MySQL_CRUD();

$query_res = $crud->pushQuery("SELECT * FROM _User;");
var_dump($query_res);
echo gettype($query_res);
