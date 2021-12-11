<?php

namespace SoNotion\Query\Filters\Items;

use SoNotion\Query\Filters\Filter;
use SoNotion\Query\Filters\FilterOperator;

class FilesFilter extends Filter
{

    static function operators(): array
    {
        return [
            FilterOperator::IS_EMPTY,
            FilterOperator::IS_NOT_EMPTY,
        ];
    }
}
