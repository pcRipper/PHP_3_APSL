<?php

namespace Apsl\Inf03\Webdev\Pages\RestorePassword;

use Apsl\Controller\Page;
use Apsl\Http\Response;

class RestorePassword extends Page
{
    public function createResponse(): void
    {
        $this->response->addHeader(Response::HEADER_CONTENT_TYPE, 'text/html');
        $this->response->useTemplate('templates/restore-password.html.php', [
            'title' => 'Restore Password'
        ]);
    }
}