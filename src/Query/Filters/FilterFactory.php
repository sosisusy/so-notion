<?php

namespace SoNotion\Query\Filters;

use SoNotion\Exceptions\HandlingException;

class FilterFactory
{
    static function make(string $filterType, string $property, array $params): Filter
    {
        $types = FilterType::mapp();

        if (!in_array($filterType, array_keys($types))) throw new HandlingException("invalid filter type: '{$filterType}' is not allowed filter type");

        return new ($types[$filterType])($property, $params);
    }
}
