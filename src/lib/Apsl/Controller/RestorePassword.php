<?php

namespace Apsl\Controller;

use Apsl\Controller\MySQL_CRUD;
use Apsl\Controller\DB_Functional;
use Exception;

class RestorePassword {

    private string $email = '';

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function restore() : bool
    {
        $db_result = $this->writeToDB();
        $mail_result = $this->sendMail();

        if($db_result != null){
            echo $db_result->getMessage();
            return false;
        }
        if($mail_result != null){
            echo $mail_result->getMessage();
            return false;
        }

        return true;
    }

    private function writeToDB() : Exception | null
    {
        $crud = new MySQL_CRUD();

        $current_time = date('d-m-y h:i:s');
        $hash = DB_Functional::hash($current_time);
        $insert_query = "INSERT INTO _UserHash (_email,_hash,_createdTime) VALUES ('$this->email','$hash','$current_time');";

        try{

            $query_result = $crud->pushQuery($insert_query);
            var_dump($query_result);
            return null;

        } catch(Exception $e){
            return $e;
        }
    }

    private function sendMail() : Exception | null
    {
        return null;
    }
}