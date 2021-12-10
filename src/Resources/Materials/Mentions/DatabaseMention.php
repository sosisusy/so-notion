<?php

namespace SoNotion\Resources\Materials\Mentions;

use SoNotion\Resources\Entities\Database;

class DatabaseMention extends Mention
{
    protected Database $database;

    function getDatabase()
    {
        return $this->database;
    }
}
