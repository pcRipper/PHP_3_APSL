<?php

namespace Apsl\Controller\DB;

use Apsl\Controller\DB\MySQL_CRUD;
use Apsl\Controller\DB\DB_Functional;

class Registration{
    public static function registrate(string $email,string $password): bool
    {
        $crud = new MySQL_CRUD();
        
        $query_result = $crud->pushQuery("SELECT * FROM _User WHERE _email = '$email'");

        if($query_result != null && count($query_result) > 0)
        {
            return false;
        }

        if(!DB_Functional::checkEmail($email) || !DB_Functional::checkPassword($password))
        {
            return false;
        }

        $insert_query = "INSERT INTO _User (_email,_password) VALUES ('$email','" . DB_Functional::hash($password) . "');";
        $query_result = $crud->pushQuery($insert_query);

        return $query_result == null;
    }
}