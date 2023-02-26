<?php

namespace Apsl\Controller\DB\Entity;

use DateTime;
use Apsl\Controller\DB\Entity\Entity;

class _UserHash implements Entity
{
    private const DATE_TIME_FORMAT = "Y-m-d H:i:s";
    public string $_email;
    public string $_hash;
    public ?DateTime $_createdTime;

    public function __construct(string $_email = "",string $_hash = "",string $_createdTime = "")
    {
        $this->_email = $_email;
        $this->_hash = $_hash;

        $parse = DateTime::createFromFormat(self::DATE_TIME_FORMAT,$_createdTime);

        $this->_createdTime = is_bool($parse)? null : $parse ;
    }
	public function fromQuery(array $row)
    {
        $this->_email = $row['_email'];
        $this->_hash = $row['_hash'];
        $this->_createdTime = DateTime::createFromFormat(self::DATE_TIME_FORMAT,$row['_createdTime']);
	}
	
	public function toQuery() : string
    {
        return "'$this->_email','$this->_hash','".$this->_createdTime->format(self::DATE_TIME_FORMAT)."'";
	}
}