<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\Relation;

class RelationProperty extends Property
{
    protected Relation $relation;

    function getRelation()
    {
        return $this->relation;
    }
}
