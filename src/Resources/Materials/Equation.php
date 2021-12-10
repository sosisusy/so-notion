<?php

namespace SoNotion\Resources\Materials;

use SoNotion\Resources\Resource;

class Equation extends Resource
{
    protected string $expression;

    function getExpression()
    {
        return $this->expression;
    }
}
