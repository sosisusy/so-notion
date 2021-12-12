<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\Date;

class DateProperty extends Property
{
    protected ?Date $date;

    function getDate()
    {
        return $this->date;
    }

    function getContents()
    {
        if (empty($this->date)) return null;

        return $this->date->toArray();
    }
}
