<?php

namespace SoNotion\Enum;

class FilterOperators extends Enum
{
    const EQUALS = 'equals';
    const DOES_NOT_EQUAL = 'does_not_equal';
    const CONTAINS = 'contains';
    const DOES_NOT_CONTAIN = 'does_not_contain';
    const STARTS_WITH = 'starts_with';
    const ENDS_WITH = 'ends_with';
    const IS_EMPTY = 'is_empty';
    const IS_NOT_EMPTY = 'is_not_empty';
    const BEFORE = 'before';
    const AFTER = 'after';
    const ON_OR_BEFORE = 'on_or_before';
    const ON_OR_AFTER = 'on_or_after';
    const PAST_WEEK = 'past_week';
    const PAST_MONTH = 'past_month';
    const PAST_YEAR = 'past_year';
    const NEXT_WEEK = 'next_week';
    const NEXT_MONTH = 'next_month';
    const NEXT_YEAR = 'next_year';
    const GREATER_THAN = 'greater_than';
    const LESS_THAN = 'less_than';
    const GREATER_THAN_OR_EQUAL_TO = 'greater_than_or_equal_to';
    const LESS_THAN_OR_EQUAL_TO = 'less_than_or_equal_to';

    static function getOperators(string $filterType): array
    {
        if (!in_array($filterType, FilterTypes::types())) return [];

        return static::{$filterType}();
    }

    private static function text()
    {
        return [
            static::EQUALS,
            static::DOES_NOT_EQUAL,
            static::CONTAINS,
            static::DOES_NOT_CONTAIN,
            static::STARTS_WITH,
            static::ENDS_WITH,
            static::IS_EMPTY,
            static::IS_NOT_EMPTY,
        ];
    }

    private static function number()
    {
        return [
            static::EQUALS,
            static::DOES_NOT_EQUAL,
            static::GREATER_THAN,
            static::LESS_THAN,
            static::GREATER_THAN_OR_EQUAL_TO,
            static::LESS_THAN_OR_EQUAL_TO,
            static::IS_EMPTY,
            static::IS_NOT_EMPTY,
        ];
    }
}
