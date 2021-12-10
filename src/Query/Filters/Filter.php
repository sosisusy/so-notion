<?php

namespace SoNotion\Query\Filters;

abstract class Filter
{
    protected string $property;

    function __construct(string $property)
    {
        $this->property = $property;
    }
}
