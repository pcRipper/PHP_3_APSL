<?php

namespace Apsl\Inf03\Webdev\Pages\RestorePassword;

use DateTime;
use Apsl\Controller\Page;
use Apsl\Http\Response;


class UpdatePasswordForm extends Page
{
    public function createResponse(): void
    {
        var_dump($_POST);
        $this->response->addHeader(Response::HEADER_CONTENT_TYPE, 'text/html');
        $this->response->useTemplate('templates/new-password.html.php', [
            'title' => 'Password Update'
        ]);
    }
}