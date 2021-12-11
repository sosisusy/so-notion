<?php

namespace SoNotion\Query\Filters\Items;

use SoNotion\Query\Filters\Filter;
use SoNotion\Query\Filters\FilterOperator;

class MultiSelectFilter extends Filter
{

    static function operators(): array
    {
        return [
            FilterOperator::CONTAINS,
            FilterOperator::DOES_NOT_CONTAIN,
            FilterOperator::IS_EMPTY,
            FilterOperator::IS_NOT_EMPTY,
        ];
    }
}
