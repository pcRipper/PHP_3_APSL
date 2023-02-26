<?php

namespace Apsl\Controller\DB;

use Apsl\Config\Config;
use PDO;
use PDOException;

class MySQL {

    private $connection;

    public function __construct()
    {
        $connection = null;
    }

    public function connect(Config $config = new Config('config/db.php')) : ?PDOException
    {
        try{

            $dsn = "mysql:host=".$config->getValue('host').";dbname=".$config->getValue('dbname').";charset=UTF8";

            $this->connection = new PDO($dsn,$config->getValue('user'),$config->getValue('password')) ?? null;
            
            return null;

        } catch (PDOException $e)
        {
            return $e;
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