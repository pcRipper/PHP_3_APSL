<?php

namespace Apsl\Inf03\Webdev\Pages\RestorePassword;

use Apsl\Controller\Page;
use Apsl\Http\Response;

use Apsl\Controller\DB\UpdatePassword;

class SendPassword extends Page
{
    public function createResponse(): void
    {
        $result = (new UpdatePassword($_POST['login']))->restore();

        if(count($result) > 0 && isset($result['mail']))
        {
            $this->response->useTemplate('templates/local-link.html.php', [
                'title' => 'Main',
                'error' => $result['mail'],
                'link' => $result['link']
            ]);
        }
        else
        {
            $this->response->redirect("/",Response::STATUS_CODE_200_OK);
            $this->response->useTemplate('templates/index.html.php', [
                'title' => 'Main'
            ]);
        }


    }
}