<?php

namespace Apsl\Inf03\Webdev\Pages;

use Apsl\Controller\Page;
use Apsl\Http\Response;

class ContactPage extends Page
{
    public function createResponse(): void
    {
        $this->response->useTemplate('templates/contact.html.php', [
            'title' => 'Contact'
        ]);
    }
}
