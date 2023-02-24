<?php

namespace Apsl\Inf03\Webdev\Pages\RestorePassword;

use Apsl\Controller\Page;
use Apsl\Http\Response;

use Apsl\Controller\DB\UpdatePassword;
use Apsl\Controller\DB\MySQL_CRUD;

class UpdatePassword extends Page
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

    private function checkHash() : bool
    {
        $hash = $this->request->getGetValue('hash');
        $crud = new MySQL_CRUD();

        $query_result = $crud->pushQuery("SELECT * FROM _UserHash WHERE _hash = '$hash'");
        
        if(!is_array($query_result) || !count($query_result) > 0){
            return false;
        }

        var_dump($query_result[0][2]);
        

        // var_dump($current_date->diff($hash_date)->format('%s'));

        return true;

    }
}