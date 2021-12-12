<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\LastEditedTime;

class LastEditedTimeProperty extends Property
{
    protected ?LastEditedTime $last_edited_time;

    function getLastEditedTime()
    {
        return $this->last_edited_time;
    }

    function getContents()
    {
        if (empty($this->last_edited_time)) return null;

        return $this->last_edited_time->toArray();
    }
}
