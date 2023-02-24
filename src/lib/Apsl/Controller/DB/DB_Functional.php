<?php

namespace Apsl\Controller\DB;

class DB_Functional{
    public static function hash(string $text) : string
    {
        return md5($text);
    }

    public static function checkEmail(string $email) : bool
    {
        return filter_var($email,FILTER_VALIDATE_EMAIL);
    }

    public static function checkPassword(string $password) : bool
    {
        $regex_formula = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,16}$/';

        return preg_match($regex_formula,$password);
    }

    public static function date_diff(string $date1,string $date2){
        
    }
}