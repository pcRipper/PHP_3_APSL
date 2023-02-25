<?php

namespace Apsl\Inf03\Webdev\Pages\RestorePassword;


use DateTime;
use Apsl\Controller\DB\MySQL_CRUD;
use Apsl\Controller\Page;
use Apsl\Http\Response;
use Symfony\Component\Mime\Email;


class UpdatePasswordForm extends Page
{
    const HASH_VALID_TIME = 60*60;
    public function createResponse(): void
    {
        $email = $this->emailFromHash($this->request->getGetValue('hash'));

        if($email == null)
        {
            $this->response->redirect("/",Response::STATUS_CODE_200_OK);
            $this->response->useTemplate('templates/index.html.php', [
                'title' => 'Main'
            ]);
        }
        else
        {
            $this->response->addHeader(Response::HEADER_CONTENT_TYPE, 'text/html');
            $this->response->useTemplate('templates/new-password.html.php', [
                'title' => 'Password Update',
                'email' => $email
            ]);
        }
    }

    private function emailFromHash($hash) : ?string
    {
        $crud = new MySQL_CRUD();
        $select_query = "SELECT * FROM _UserHash WHERE _hash = '$hash' AND TIMESTAMPDIFF(SECOND,_createdTime,NOW()) < ".self::HASH_VALID_TIME;

        $result = $crud->pushQuery($select_query);

        if(is_array($result) && count($result) > 0){
            return $result[0][0];
        }

        return null;
    }
}