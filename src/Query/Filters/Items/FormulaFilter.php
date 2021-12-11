<?php

namespace SoNotion\Query\Filters\Items;

use SoNotion\Exceptions\HandlingException;
use SoNotion\Query\Filters\Filter;

class FormulaFilter extends Filter
{

    /**
     * 필드 유효성 검사
     */
    function validate()
    {
        $allowedOperators = $this->operators();

        foreach ($this->params as $k => $v) {
            if (!isset($allowedOperators[$k])) throw new HandlingException("invalid operator: '{$k}' is not allowed operator");

            foreach ($v as $kk => $vv) {
                if (!in_array($kk, $allowedOperators[$k])) throw new HandlingException("invalid operator: '{$k}.{$kk}' is not allowed operator");
            }
        }
    }

    static function operators(): array
    {
        return [
            'text' => TextFilter::operators(),
            'checkbox' => CheckboxFilter::operators(),
            'number' => NumberFilter::operators(),
            'date' => DateFilter::operators(),
        ];
    }
}
