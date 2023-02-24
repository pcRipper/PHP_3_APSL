<?php

namespace Apsl\Controller\DB\Entity;

interface Entity {
    public function fromQuery(array $row);
    public function toQuery() : string;
}