<?php

namespace SoNotion\Query\Filters\Items;

use SoNotion\Query\Filters\Filter;
use SoNotion\Query\Filters\FilterOperator;

class TextFilter extends Filter
{

    static function operators(): array
    {
        return [
            FilterOperator::EQUALS,
            FilterOperator::DOES_NOT_EQUALS,
            FilterOperator::CONTAINS,
            FilterOperator::DOES_NOT_CONTAIN,
            FilterOperator::STARTS_WITH,
            FilterOperator::ENDS_WITH,
            FilterOperator::IS_EMPTY,
            FilterOperator::IS_NOT_EMPTY,
        ];
    }
}
