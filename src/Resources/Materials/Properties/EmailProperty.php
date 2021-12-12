<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\Email;

class EmailProperty extends Property
{
    protected ?Email $email;

    function getEmail()
    {
        return $this->email;
    }

    function getContents()
    {
        if (empty($this->email)) return null;

        return $this->email->toArray();
    }
}
