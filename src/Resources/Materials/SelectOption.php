<?php

namespace SoNotion\Resources\Materials;

use SoNotion\Resources\Resource;

class SelectOption extends Resource
{
    protected string $name;
    protected string $id;
    protected string $color;

    function getName()
    {
        return $this->name;
    }

    function getId()
    {
        return $this->id;
    }

    function getColor()
    {
        return $this->color;
    }
}
