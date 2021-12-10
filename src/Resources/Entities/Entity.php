<?php

namespace SoNotion\Resources\Entities;

use SoNotion\Resources\Resource;

class Entity extends Resource
{
    protected string $object;
    protected string $id;
    protected ?string $created_time = null;
    protected ?string $last_edited_time = null;

    function getObject()
    {
        return $this->object;
    }

    function getId()
    {
        return $this->id;
    }

    function getCreatedTime()
    {
        return $this->created_time;
    }

    function getLastEditedTime()
    {
        return $this->last_edited_time;
    }
}
