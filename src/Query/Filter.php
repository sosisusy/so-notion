<?php

namespace SoNotion\Query;

use InvalidArgumentException;
use SoNotion\Enum\FilterOperators;
use SoNotion\Enum\FilterTypes;

class Filter implements Query
{
    protected string $type;
    protected string $property;
    protected array $where;

    /**
     * @see \SoNotion\Enum\FilterTypes
     */
    function __construct(string $type, string $property, array $where)
    {
        $this->type = $type;
        $this->property = $property;
        $this->where = $where;

        $this->validate();
    }

    function validate()
    {
        $this->validateType();
        $this->validateWhere();
    }

    function validateType()
    {
        if (!in_array($this->type, FilterTypes::types()))
            throw new InvalidArgumentException('invalid type');
    }

    function validateWhere()
    {
        $operators = FilterOperators::getOperators($this->type);

        foreach ($this->where as $k => $v) {
            if (!in_array($k, $operators))
                throw new InvalidArgumentException($k . ' is not a allowed filter operator');
        }
    }

    function toArray()
    {
        return [
            'property' => $this->property,
            $this->type => $this->where,
        ];
    }
}
