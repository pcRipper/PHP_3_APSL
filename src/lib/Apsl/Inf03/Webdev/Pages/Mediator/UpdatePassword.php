<?php

namespace Apsl\Inf03\Webdev\Pages\Mediator;

use Apsl\Controller\DB\DB_Functional;
use Apsl\Controller\DB\Entity\_User;
use Apsl\Controller\DB\MySQL;
use Apsl\Controller\PageHash;

class UpdatePassword extends PageHash
{
	public function createResponse() : void 
    {
        $_user = new _User(
            $this->request->getPostValue('email'),
            DB_Functional::hash($this->request->getPostValue('new_password'))
        );

        if($_user->_password != $this->request->getPostValue('new_password_repeat'))
        {
            $this->response->redirect('/');
        }
        else if(!DB_Functional::checkPassword($_user->_password))
        {
            $this->response->redirect('/');
        }

        $db = new MySQL();
        $db->connect();

        $update_query = "UPDATE _User SET _password = '$_user->_password' WHERE _email = '$_user->_email';";
        $clean_query = "DELETE FROM _UserHash WHERE _email = '$_user->_email'";

        $update_result = $db->pushQuery($update_query);
        
        if(is_array($update_result))
        {
            $db->pushQuery($clean_query);
        }

        $this->response->redirect('/');
	}
}