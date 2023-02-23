<?php

namespace Apsl\Inf03\Webdev\Pages;

use Apsl\Controller\Page;
use Apsl\Http\Response;
use Apsl\Controller\DB\Authorisation;

class LoginPage extends Page
{
    public function createResponse(): void
    {
        if(Authorisation::authorise())
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
                'db_access_result' => 'Failed to login!'
            ]);
        }

    }
}