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
}
