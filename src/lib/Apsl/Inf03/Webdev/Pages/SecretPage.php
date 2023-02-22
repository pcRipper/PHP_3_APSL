<?php

namespace Apsl\Inf03\Webdev\Pages;

use Apsl\Controller\Page;
use Apsl\Http\Response;

class SecretPage extends Page
{
    public function createResponse(): void
    {
        $this->response->useTemplate('templates/secret.html.php', [
            'title' => 'Secret'
        ]);
    }
}