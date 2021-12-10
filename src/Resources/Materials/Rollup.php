<?php

namespace SoNotion\Resources\Materials;

use SoNotion\Resources\Resource;

class Rollup extends Resource
{
    protected string $relation_property_name;
    protected string $relation_property_id;
    protected string $rollup_property_name;
    protected string $rollup_property_id;
    protected string $function;

    function getRelationPropertyName()
    {
        return $this->relation_property_name;
    }

    function getRelationPropertyId()
    {
        return $this->relation_property_id;
    }

    function getRollupPropertyName()
    {
        return $this->rollup_property_name;
    }

    function getRollupPropertyId()
    {
        return $this->rollup_property_id;
    }

    function getFunction()
    {
        return $this->function;
    }
}
