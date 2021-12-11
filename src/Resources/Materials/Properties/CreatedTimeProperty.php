<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\CreatedTime;

class CreatedTimeProperty extends Property
{
    protected ?CreatedTime $created_time;

    function getCreatedTime()
    {
        return $this->created_time;
    }
}
