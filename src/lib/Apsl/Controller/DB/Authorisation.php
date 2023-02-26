<?php

namespace Apsl\Controller\DB;

use Apsl\Controller\DB\MySQL;
use Apsl\Controller\DB\DB_Functional;

class Authorisation{
    public static function authorise(string $email,string $password): bool
    {   
        $select_query = "SELECT * FROM _User WHERE _email = '$email' AND _password = '".DB_Functional::hash($password)."';";

        $crud = new MySQL();
        $crud->connect();
        $query_result = $crud->pushQuery($select_query);
        
        if(is_array($query_result) && count($query_result) > 0){

            return true;
        
        }

        return false;
    }
}