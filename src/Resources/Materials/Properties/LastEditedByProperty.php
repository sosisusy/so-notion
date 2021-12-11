<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\LastEditedBy;

class LastEditedByProperty extends Property
{
    protected ?LastEditedBy $last_edited_by;

    function getLastEditedBy()
    {
        return $this->last_edited_by;
    }
}
