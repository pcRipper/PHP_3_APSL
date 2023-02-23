<?php

namespace Apsl\Controller\DB;

use Apsl\Controller\DB\MySQL_CRUD;
use Apsl\Controller\DB\DB_Functional;
use Apsl\Session\Session;

class Authorisation{
    public static function authorise(string $email,string $password): bool
    {   
        $crud = new MySQL_CRUD();
        $query_result = $crud->pushQuery("SELECT * FROM _User WHERE _email = '$email' AND _password = '".DB_Functional::hash($password)."';");
        
        if(is_array($query_result) && count($query_result) > 0){

            return true;
        
        }

        return false;
    }
}