<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\CreatedBy;

class CreatedByProperty extends Property
{
    protected ?CreatedBy $created_by;

    function getCreatedBy()
    {
        return $this->created_by;
    }

    function getContents()
    {
        if (empty($this->created_by)) return null;

        return $this->created_by->toArray();
    }
}
