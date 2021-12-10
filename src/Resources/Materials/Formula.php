<?php

namespace SoNotion\Resources\Materials;

use SoNotion\Resources\Resource;

class Formula extends Resource
{
    protected string $expression;

    function getExpression()
    {
        return $this->expression;
    }
}
