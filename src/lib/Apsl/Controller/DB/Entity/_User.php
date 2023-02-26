<?php

namespace Apsl\Controller\DB\Entity;

use Apsl\Controller\DB\Entity\Entity;

class _User implements Entity
{
    public string $_email;
    public string $_password;

    public function __construct()
    {
        $this->_email = "";
        $this->_password = "";
    }
	public function fromQuery(array $row)
    {
        $this->_email = $row['_email'];
        $this->_password = $row['_password'];
	}
	
	public function toQuery() : string
    {
        return "$this->_email,$this->_password";
	}
}