<?php

namespace SoNotion\Query;

use ReflectionClass;

/**
 * 쿼리 빌더
 */
class QueryBuilder
{

    function make()
    {
        $results = [];
        $ref = new ReflectionClass($this);

        foreach ($ref->getProperties() as $property) {
            $property->setAccessible(true);
            $name = $property->getName();
            $value = $property->getValue($this);

            if (is_null($value)) continue;

            $results[$name] = $value;
        }

        return $results;
    }
}
