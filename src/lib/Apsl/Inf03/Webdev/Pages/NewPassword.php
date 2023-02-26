<?php

namespace Apsl\Inf03\Webdev\Pages;

use Apsl\Controller\DB\Entity\_UserHash;
use Apsl\Controller\DB\MySQL;
use Apsl\Controller\PageHash;
use Apsl\Http\Response;
class NewPassword extends PageHash
{
    public function createResponse() : void
    {
        $email = $this->emailFromHash($this->request->getGetValue('hash'));

        if($email == '')
        {
            $this->response->redirect('/');
        }
        else
        {
            $this->response->useTemplate('templates/new-password.html.php',[
                'title' => 'Password change',
                'email' => $email
            ]);
        }

    }

    private function emailFromHash($_hash) : string
    {
        $db = new MySQL();
        $db->connect();

        $check_query = "SELECT * FROM _UserHash WHERE _hash = '$_hash' AND TIMESTAMPDIFF(SECOND,_createdTime,NOW()) < ".self::HASH_VALID_TIME.";";

        $query_result = $db->pushQuery($check_query);

        if(!is_array($query_result) || count($query_result) < 1){
            return '';
        }

        $_userHash = new _UserHash();
        $_userHash->fromQuery($query_result[0]);

        return $_userHash->_email;
    }
}