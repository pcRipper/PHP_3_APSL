<?php

namespace Apsl\Inf03\Webdev\Pages;
use Apsl\Controller\Page;

class RestorePassword extends Page{
	public function createResponse(): void
    {
        $this->response->useTemplate('templates/restore-password.html.php',[
            'title' => 'password restore'
        ]);
	}
}