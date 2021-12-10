<?php

namespace SoNotion\Resources\Materials;

use SoNotion\Resources\Resource;

class Date extends Resource
{
    protected ?string $start = null;
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
