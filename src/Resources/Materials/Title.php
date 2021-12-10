<?php

namespace SoNotion\Resources\Materials;

use SoNotion\Resources\Resource;

class Title extends Resource
{
    protected string $start;
    protected ?string $end = null;

    function getStart()
    {
        return $this->start;
    }

    function getEnd()
    {
        return $this->end;
    }
}
