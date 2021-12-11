<?php

namespace SoNotion\Query\Filters\Items;

use SoNotion\Query\Filters\Filter;
use SoNotion\Query\Filters\FilterOperator;

class DateFilter extends Filter
{

    static function operators(): array
    {
        return [
            FilterOperator::EQUALS,
            FilterOperator::BEFORE,
            FilterOperator::AFTER,
            FilterOperator::ON_OR_BEFORE,
            FilterOperator::IS_EMPTY,
            FilterOperator::IS_NOT_EMPTY,
            FilterOperator::ON_OR_AFTER,
            FilterOperator::PAST_WEEK,
            FilterOperator::PAST_MONTH,
            FilterOperator::PAST_YEAR,
            FilterOperator::NEXT_WEEK,
            FilterOperator::NEXT_MONTH,
            FilterOperator::NEXT_YEAR,
        ];
    }
}
