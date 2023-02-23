<?php

namespace Apsl\Controller\DB;

use Apsl\Config\Config;
use PDO;
use PDOException;

class MySQL_CRUD {

    private $connection;

    public function __construct()
    {
        try{
            
            $config = new Config('config/db.php');
            
            $dsn = "mysql:host=".$config->getValue('host').";dbname=".$config->getValue('dbname').";charset=UTF8";

            $this->connection = new PDO($dsn,$config->getValue('user'),$config->getValue('password')) ?? null;
        
        } catch (PDOException $e){
            
            // echo $e->getMessage();
        
        }

    }

    public function pushQuery(string $query) : array | PDOException
    {
        if ($this->connection !== null)
        {
            try{

                return $this->connection->query($query)->fetchAll();

            } catch (PDOException $e){

                return $e;

            }
            
        }

        return new PDOException("connection does not exist!"); 
        
    }

    public function __destruct()
    {
        $this->connection = null;
    }

}