<?php

namespace SoNotion\Query\Filters\Items;

use SoNotion\Query\Filters\Filter;
use SoNotion\Query\Filters\FilterOperator;

class NumberFilter extends Filter
{

    static function operators(): array
    {
        return [
            FilterOperator::EQUALS,
            FilterOperator::DOES_NOT_EQUALS,
            FilterOperator::GREATER_THAN,
            FilterOperator::LESS_THAN,
            FilterOperator::GREATER_THAN_OR_EQUAL_TO,
            FilterOperator::LESS_THAN_OR_EQUAL_TO,
            FilterOperator::IS_EMPTY,
            FilterOperator::IS_NOT_EMPTY,
        ];
    }
}
