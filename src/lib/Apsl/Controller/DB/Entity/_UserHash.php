<?php

namespace Apsl\Controller\DB\Entity;

use DateTime;
use Apsl\Controller\DB\Entity\Entity;

class _UserHash implements Entity
{
    private const DateTimeFormat = "Y-m-d H:i:s";
    public string $_email;
    public string $_hash;
    public ?DateTime $_createdTime;

    public function __construct(string $_email = "",string $_hash = "",string $_createdTime = null)
    {
        $this->_email = "";
        $this->_hash = "";
        $this->_createdTime = null;
    }
	public function fromQuery(array $row)
    {
        $this->_email = $row['_email'];
        $this->_hash = $row['_hash'];
        $this->_createdTime = DateTime::createFromFormat(self::DateTimeFormat,$row['_createdTime']);
	}
	
	public function toQuery() : string
    {
        return "$this->_email,$this->_hash,".$this->_createdTime->format(self::DateTimeFormat);
	}
}