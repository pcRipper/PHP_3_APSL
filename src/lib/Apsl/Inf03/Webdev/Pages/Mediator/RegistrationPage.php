<?php

namespace Apsl\Inf03\Webdev\Pages\Mediator;

use Apsl\Controller\DB\Entity\_User;
use Apsl\Controller\Page;
use Apsl\Http\Response;
use Apsl\Controller\DB\MySQL;
use Apsl\Controller\DB\DB_Functional;

class RegistrationPage extends Page
{
    public function createResponse(): void
    {
        $_user = new _User(
            $this->request->getPostValue('login'),
            $this->request->getPostValue('password')
        );

        $reg_result = $this->registrate($_user);

        if(count($reg_result) == 0)
        {
            $this->response->useTemplate('templates/secret.html.php', [
                'title' => 'Personal page'
            ]);
        }
        else
        {
            $errors_string = "Registrations errors : ";

            foreach ($reg_result as $key => $value) {
                $errors_string .= $value.",";
            }

            $errors_string = substr($errors_string,0,strlen($errors_string)-1);

            $this->response->redirect("/",Response::STATUS_CODE_200_OK);
            $this->response->useTemplate('templates/index.html.php', [
                'title' => 'Main',
                'message' => $errors_string
            ]);
        }

    }

    private function registrate($_user) : array
    {
        $errors = array();

        $crud = new MySQL();
        $crud->connect();

        $query_result = $crud->pushQuery("SELECT * FROM _User WHERE _email = '$_user->_email'");

        if(!is_array($query_result) || count($query_result) > 0)
        {
            $errors[] = "The email is in use";
        }

        if(!DB_Functional::checkEmail($_user->_email))
        {
            $errors[] = "Invalid email!";
        }
        if(!DB_Functional::checkPassword($_user->_password))
        {
            $errors[] = "Invalid password!";
        }

        if(count($errors) > 0)return $errors;

        $insert_query = "INSERT INTO _User (_email,_password) VALUES ('$_user->_email','" . DB_Functional::hash($_user->_password) . "');";
        $query_result = $crud->pushQuery($insert_query);

        return $errors;
    }
}