<?php

namespace Apsl\Inf03\Webdev\Pages\Mediator;

use Apsl\Controller\PageHash;
use Apsl\Controller\DB\Entity\_UserHash;
use Apsl\Controller\DB\MySQL;
use Apsl\Controller\DB\DB_Functional;
use Apsl\Http\Response;
use Exception;

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class SendHash extends PageHash {
    const MAILER_DSN = 'smtp://apsl-dev@gmx.com:apslDEV2023@mail.gmx.com:587';

    public function createResponse(): void
    {
        $current_time = date('Y-m-d H:i:s');

        $_userHash = new _UserHash(
            $this->request->getPostValue('login'),
            DB_Functional::hash($current_time),
            $current_time
        );

        $db_result = $this->writeToDB($_userHash);

        if($db_result != null){
            
            $this->response->redirect('/');
            return;
        }

        $mail_result = $this->sendMail($_userHash);

        if($mail_result != null){

            $this->response->addHeader(Response::HEADER_CONTENT_TYPE, 'text/html');
            $this->response->useTemplate('templates/local-link.html.php', [
                'title' => 'error',
                'link' => "/new-password?hash=".$_userHash->_hash,
                'error' => $mail_result->getMessage()
            ]);

        }
    }

    private function writeToDB(_UserHash $_userHash) : Exception | null
    {
        $db = new MySQL();
        $db->connect();

        $insert_query = "INSERT INTO _UserHash (_email,_hash,_createdTime) VALUES (".$_userHash->toQuery().");";
        $check_query  = "SELECT * FROM _UserHash WHERE _email = '$_userHash->_email' AND TIMESTAMPDIFF(SECOND,_createdTime,NOW()) < ".self::HASH_VALID_TIME."";

        try{

            $query_result = $db->pushQuery($check_query);

            if(!is_array($query_result) || count($query_result) > 0)
            {
                return new Exception("hash is still valid!");
            }

            $query_result = $db->pushQuery($insert_query);

            return null;

        } catch(Exception $e){
            return $e;
        }
    }

    private function sendMail(_UserHash $_userHash) : Exception | null
    {
        try {

            $transport = Transport::fromDsn(self::MAILER_DSN);
            $mailer = new Mailer($transport); 

            $email = (new Email())
                ->from('apsl-dev@gmx.com')
                ->to($_userHash->_email)
                ->subject('Test Email')
                ->text('')
                ->html("Click this <a href='localhost/restore_password/new-password?hash=$_userHash->_hash'>link</a> in order to restore your password");
            
            $mailer->send($email);

            return null;

        } catch (Exception $e) {

            return $e;
        
        }
    }
}