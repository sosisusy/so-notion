<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\People;

class PeopleProperty extends Property
{
    protected People $people;

    function getPeople()
    {
        return $this->people;
    }
}
