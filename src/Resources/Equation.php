<?php

namespace SoNotion\Resources;

class Equation extends Resource
{
    protected string $expression;

    function __construct(array $data)
    {
        $this->expression = $data["expression"];
    }

    function getExpression()
    {
        return $this->expression;
    }
}
