<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\Number;

class NumberProperty extends Property
{
    protected ?Number $number;

    function getNumber()
    {
        return $this->number;
    }
}
