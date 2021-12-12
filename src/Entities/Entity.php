<?php

namespace SoNotion\Entities;

use ReflectionClass;

class Entity
{
    function __construct(array $data)
    {
        $this->fillAllProperties($data);
    }

    static function fromArray(array $data)
    {
        return new static($data);
    }

    static function fromJson(string $json)
    {
        return new static(json_decode($json, true));
    }

    final function fillAllProperties(array $data)
    {
        $ref = new ReflectionClass($this);

        foreach ($ref->getMethods() as $method) {
            $methodName = $method->getName();

            if (preg_match('/fill.+/i', $methodName) && $methodName != __FUNCTION__) $this->{$methodName}($data);
        }
    }
}
