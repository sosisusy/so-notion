<?php

namespace SoNotion\Query\Filters;

use SoNotion\Query\Filters\Items\DateFilter;
use SoNotion\Query\Filters\Items\TextFilter;
use SoNotion\Query\Filters\Items\FilesFilter;
use SoNotion\Query\Filters\Items\NumberFilter;
use SoNotion\Query\Filters\Items\PeopleFilter;
use SoNotion\Query\Filters\Items\SelectFilter;
use SoNotion\Query\Filters\Items\FormulaFilter;
use SoNotion\Query\Filters\Items\CheckboxFilter;
use SoNotion\Query\Filters\Items\RelationFilter;
use SoNotion\Query\Filters\Items\MultiSelectFilter;

class FilterType
{
    const TEXT = "text";
    const NUMBER = "number";
    const CHECKBOX = "checkbox";
    const SELECT = "select";
    const MULTI_SELECT = "multi_select";
    const DATE = "date";
    const PEOPLE = "people";
    const FILES = "files";
    const RELATION = "relation";
    const FORMULA = "formula";

    static function mapp()
    {
        return [
            static::TEXT => TextFilter::class,
            static::NUMBER => NumberFilter::class,
            static::CHECKBOX => CheckboxFilter::class,
            static::SELECT => SelectFilter::class,
            static::MULTI_SELECT => MultiSelectFilter::class,
            static::DATE => DateFilter::class,
            static::PEOPLE => PeopleFilter::class,
            static::FILES => FilesFilter::class,
            static::RELATION => RelationFilter::class,
            static::FORMULA => FormulaFilter::class,
        ];
    }
}
