<?php

namespace Apsl\Controller\DB;

use Apsl\Controller\DB\MySQL_CRUD;
use Apsl\Controller\DB\DB_Functional;

class Registration{
    private string $email;
    private string $password;

    public function __construct(string $email,string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function insertData() : bool
    {
        $crud = new MySQL_CRUD();
        
        $query_result = $crud->pushQuery("SELECT * FROM _User WHERE _email = '$this->email'");

        if($query_result != null && count($query_result) > 0)
        {
            return false;
        }

        if(!DB_Functional::checkEmail($this->email) || !DB_Functional::checkPassword($this->password))
        {
            return false;
        }

        $insert_query = "INSERT INTO _User (_email,_password) VALUES ('" . $this->email . "','" . DB_Functional::hash($this->password) . "');";
        $query_result = $crud->pushQuery($insert_query);

        return $query_result == null;
    }
}