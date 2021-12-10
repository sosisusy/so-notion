<?php

namespace SoNotion\Resources\Materials;

use SoNotion\Resources\Resource;

class Relation extends Resource
{
    protected string $database_id;
    protected ?string $synced_property_name = null;
    protected ?string $synced_property_id = null;

    function getDatabaseId()
    {
        return $this->database_id;
    }

    function getSyncedPropertyName()
    {
        return $this->synced_property_name;
    }

    function getSyncedPropertyId()
    {
        return $this->synced_property_id;
    }
}
