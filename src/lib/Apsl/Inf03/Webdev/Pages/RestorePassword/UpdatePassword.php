<?php

namespace Apsl\Inf03\Webdev\Pages\RestorePassword;

use Apsl\Controller\DB\DB_Functional;
use Apsl\Controller\DB\MySQL_CRUD;
use Apsl\Controller\Page;
use Apsl\Http\Response;

class UpdatePassword extends Page
{
    const HASH_VALID_TIME = 60*60;
    public function createResponse(): void
    {
        $this->checkData();

        $this->response->redirect("/",Response::STATUS_CODE_200_OK);
        $this->response->useTemplate('templates/index.html.php', [
            'title' => 'Main'
        ]);
    }

    private function checkData() : bool
    {
        $email = $this->request->getPostValue('email');
        $password = $this->request->getPostValue('new_password');
        $password_repeat = $this->request->getPostValue('new_password_repeat');

        if($password != $password_repeat)
        {
            return false;
        }
        else if(DB_Functional::checkPassword($password) == false)
        {
            return false;
        }
        else if(DB_Functional::checkEmail($email) == false)
        {
            return false;
        }

        return $this->writeToDB($email,$password) == null;
    }

    private function writeToDB(string $email, string $password) : \PDOException | null
    {
        $crud = new MySQL_CRUD();
        $update_query = "UPDATE _User SET _password = '".DB_Functional::hash($password)."' WHERE _email = '$email'";
        $clean_query =  "DELETE FROM _UserHash WHERE _email = '$email'";

        $crud->pushQuery($clean_query);
        $crud->pushQuery($update_query);

        return null;
    }


}