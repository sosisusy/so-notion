<?php

namespace SoNotion\Enum;

class DirectionTypes extends Enum
{
    const ASCENDING = 'ascending';
    const DESCENDING = 'descending';

    static function types()
    {
        return [
            static::ASCENDING,
            static::DESCENDING,
        ];
    }
}
