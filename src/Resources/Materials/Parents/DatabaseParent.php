<?php

namespace SoNotion\Resources\Materials\Parents;

class DatabaseParent extends ParentObject
{
    protected string $database_id;

    function getDatabaseId()
    {
        return $this->database_id;
    }
}
