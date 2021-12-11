<?php

namespace SoNotion\Query\Filters\Items;

use SoNotion\Query\Filters\Filter;
use SoNotion\Query\Filters\FilterOperator;

class CheckboxFilter extends Filter
{

    static function operators(): array
    {
        return [
            FilterOperator::EQUALS,
            FilterOperator::DOES_NOT_EQUALS,
        ];
    }
}
