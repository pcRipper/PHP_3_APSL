<?php

namespace Apsl\Controller\DB;

use Apsl\Controller\DB\MySQL_CRUD;
use Apsl\Controller\DB\DB_Functional;
use Exception;
use DateTime;

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class UpdatePassword {
    const HASH_VALID_TIME = 60*60;
    const MAILER_DSN = 'smtp://apsl-dev@gmx.com:apslDEV2023@mail.gmx.com:587';
    private string $email = '';

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function restore() : array
    {
        $response = [];
        $current_time = (new DateTime())->format('y-m-d H:i:s.u');
        $db_result = $this->writeToDB($current_time);

        if($db_result != null){
            $response['db'] = $db_result->getMessage();
            return $response;
        }

        $mail_result = $this->sendMail($current_time);

        if($mail_result != null){
            $response['mail'] = $mail_result->getMessage();
            $response['link'] = '/restore-password/new-password?hash='.DB_Functional::hash($current_time);
        }

        return $response;
    }

    private function writeToDB($current_time) : Exception | null
    {
        $crud = new MySQL_CRUD();

        $hash = DB_Functional::hash($current_time);

        $insert_query = "INSERT INTO _UserHash (_email,_hash,_createdTime) VALUES ('$this->email','$hash','$current_time');";
        $check_query  = "SELECT * FROM _UserHash WHERE _email = '$this->email' AND TIMESTAMPDIFF(SECOND,_createdTime,NOW()) < ".self::HASH_VALID_TIME."";

        try{

            $query_result = $crud->pushQuery($check_query);

            if(!is_array($query_result) || count($query_result) > 0)
            {
                return new Exception("hash is still valid!");
            }

            $query_result = $crud->pushQuery($insert_query);

            return null;

        } catch(Exception $e){
            return $e;
        }
    }

    private function sendMail(string $current_time) : Exception | null
    {
        try {

            $hash = DB_Functional::hash($current_time);
            $transport = Transport::fromDsn(self::MAILER_DSN);
            $mailer = new Mailer($transport); 

            $email = (new Email())
                ->from('apsl-dev@gmx.com')
                ->to($this->email)
                ->subject('Test Email')
                ->text('')
                ->html("Click this <a href='localhost/restore_password/new-password?hash=$hash'>link</a> in order to restore your password");
            
            $mailer->send($email);

            return null;

        } catch (Exception $e) {
            return $e;
        }
    }
}