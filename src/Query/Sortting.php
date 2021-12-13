<?php

namespace SoNotion\Query;

use InvalidArgumentException;
use SoNotion\Enum\DirectionTypes;
use SoNotion\Enum\TimestampTypes;

class Sortting implements Query
{

    protected ?string $property;
    protected ?string $timestamp;
    protected ?string $direction;

    /**
     * @see \SoNotion\Enum\TimestampTypes
     * @see \SoNotion\Enum\DirectionTypes
     */
    function __construct(?string $property = null, ?string $timestamp = null, ?string $direction = null)
    {
        $this->property = $property;
        $this->timestamp = $timestamp;
        $this->direction = $direction;

        $this->validate();
    }

    function validate()
    {
        $this->validateTimestampValue();
        $this->validateDirectionValue();
    }

    function validateTimestampValue()
    {
        if (!in_array($this->timestamp, TimestampTypes::types()))
            throw new InvalidArgumentException('invalid timestamp value');
    }

    function validateDirectionValue()
    {
        if (!in_array($this->direction, DirectionTypes::types()))
            throw new InvalidArgumentException('invalid direction value');
    }

    function toArray()
    {
        $results = [];

        if (!is_null($this->property)) $results['property'] = $this->property;
        if (!is_null($this->timestamp)) $results['timestamp'] = $this->timestamp;
        if (!is_null($this->direction)) $results['direction'] = $this->direction;

        return $results;
    }
}
