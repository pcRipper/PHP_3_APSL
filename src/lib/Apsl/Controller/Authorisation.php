<?php

namespace Apsl\Controller;

class Authorisation{

    const LOGIN = 'admin';
    const PASSWORD = 'admin';

    public function authorise(): void{
        if (
            $_POST['login'] == self::LOGIN &&
            $_POST['password'] == self::PASSWORD
        ){

        }
        else {
            
        }
    }
}