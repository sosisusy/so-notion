<?php

namespace SoNotion\Enum;

use ReflectionClass;

class Enum
{
    static function types()
    {
        $ref = new ReflectionClass(static::class);

        return array_values($ref->getConstants());
    }
}
