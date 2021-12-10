<?php

namespace SoNotion\Resources\Materials;

use SoNotion\Resources\Resource;

class Number extends Resource
{
    protected string $format;

    function getFormat()
    {
        return $this->format;
    }
}
