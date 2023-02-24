<?php

namespace Apsl\Controller\DB\Entity;

use DateTime;
use Apsl\Controller\DB\Entity\Entity;

class _UserHash implements Entity
{
    public string $_email;
    public string $_password;
    public ?DateTime $_createdTime;

    public function __construct(string $_email = "",string $_password = "",string $_createdTime = null)
    {
        $this->_email = "";
        $this->_password = "";
        $this->_createdTime = null;
    }
	public function fromQuery(array $row)
    {
        $this->_email = $row['_email'];
        $this->_password = $row['password'];
	}
	
	public function toQuery() : string
    {
        return "";
	}
}