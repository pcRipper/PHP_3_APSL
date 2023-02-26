<?php

namespace Apsl\Inf03\Webdev\Pages\Mediator;

use Apsl\Controller\Page;
use Apsl\Http\Response;

use Apsl\Controller\DB\MySQL;
use Apsl\Controller\DB\DB_Functional;
use Exception;

class LoginPage extends Page
{
    public function createResponse(): void
    {
        $auth_result = $this->authorise(
            $this->request->getPostValue('login'),
            $this->request->getPostValue('password')
        );

        if($auth_result == null)
        {
            $this->response->useTemplate('templates/secret.html.php', [
                'title' => 'Personal page'
            ]);
        }
        else
        {
            $this->response->redirect("/",Response::STATUS_CODE_200_OK);
            $this->response->useTemplate('templates/index.html.php', [
                'title' => 'Login',
                'message' => "Failed to login : ".$auth_result->getMessage()
            ]);
        }

    }
    private function authorise(string $email,string $password) : ?Exception
    {   
        $select_query = "SELECT * FROM _User WHERE _email = '$email' AND _password = '".DB_Functional::hash($password)."';";

        $crud = new MySQL();
        $crud->connect();
        $query_result = $crud->pushQuery($select_query);


        if(is_array($query_result) && count($query_result) > 0){
            return null;
        }
        if(is_array($query_result) && count($query_result) == 0){
            return new Exception("Invalid data");
        }

        return new Exception($query_result->getMessage());
    }
}