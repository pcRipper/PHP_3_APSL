<?php

namespace Apsl\Inf03\Webdev\Pages\RestorePassword;

use Apsl\Controller\Page;
use Apsl\Http\Response;

use Apsl\Controller\DB\UpdatePassword;

class SendPassword extends Page
{
    public function createResponse(): void
    {
        $restorer = new UpdatePassword($_POST['login']);

        $restorer->restore();

        $this->response->redirect("/",Response::STATUS_CODE_200_OK);
        $this->response->useTemplate('templates/index.html.php', [
            'title' => 'Main',
            'db_access_result' => 'Failed to registrate!'
        ]);
    }
}