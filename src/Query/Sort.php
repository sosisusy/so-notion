<?php

namespace SoNotion\Query;

use InvalidArgumentException;
use SoNotion\Query\Query;

class Sort extends Query
{
    // 정렬 기준
    const TIMESTAMP_CREATED_TIME = 'created_time';
    const TIMESTAMP_LAST_EDITED_TIME = 'last_edited_time';

    // 정렬
    const DIRECTION_ASC = 'ascending';
    const DIRECTION_DESC = 'descending';

    protected string $property;
    protected string $timestamp;
    protected string $direction;

    function __construct(string $property, string $timestamp = 'created_time', string $direction = 'ascending')
    {
        $this->property = $property;
        $this->timestamp = $timestamp;
        $this->direction = $direction;

        $this->validate();
    }

    function setProperty(string $property)
    {
        $this->property = $property;

        return $this;
    }

    function setTimestamp(string $timestamp)
    {
        $this->timestamp = $timestamp;
        $this->validate();

        return $this;
    }

    function setDirection(string $direction)
    {
        $this->direction = $direction;
        $this->validate();

        return $this;
    }

    function getProperty()
    {
        return $this->property;
    }

    function getTimestamp()
    {
        return $this->timestamp;
    }

    function getDirection()
    {
        return $this->direction;
    }

    /**
     * 정렬 기준 값 체크
     */
    private function checkTimestampValue()
    {
        if (in_array($this->timestamp, [static::TIMESTAMP_CREATED_TIME, static::TIMESTAMP_LAST_EDITED_TIME])) return;

        throw new InvalidArgumentException("{$this->timestamp} is not allowed value");
    }

    /**
     * 정렬 메서드 값 체크
     */
    private function checkDirectionValue()
    {
        if (in_array($this->direction, [static::DIRECTION_ASC, static::DIRECTION_DESC])) return;

        throw new InvalidArgumentException("{$this->direction} is not allowed value");
    }

    function validate()
    {
        $this->checkTimestampValue();
        $this->checkDirectionValue();
    }

    function toArray(): array
    {
        return [
            'property' => $this->getProperty(),
            'timestamp' => $this->getTimestamp(),
            'direction' => $this->getDirection(),
        ];
    }
}
