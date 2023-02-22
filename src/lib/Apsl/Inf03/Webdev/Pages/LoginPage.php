<?php

namespace Apsl\Inf03\Webdev\Pages;

use Apsl\Controller\Page;
use Apsl\Http\Response;

class LoginPage extends Page
{
    public function createResponse(): void
    {
        $this->response->useTemplate('templates/login.html.php', [
            'title' => 'Login'
        ]);
    }
}