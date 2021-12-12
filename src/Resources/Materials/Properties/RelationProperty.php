<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\Relation;

class RelationProperty extends Property
{
    protected ?Relation $relation;

    function getRelation()
    {
        return $this->relation;
    }

    function getContents()
    {
        if (empty($this->relation)) return null;

        return $this->relation->toArray();
    }
}
