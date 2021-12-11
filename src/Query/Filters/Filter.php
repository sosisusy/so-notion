<?php

namespace SoNotion\Query\Filters;

use SoNotion\Query\Query;
use SoNotion\Query\Filters\FilterType;
use SoNotion\Exceptions\HandlingException;

abstract class Filter extends Query
{
    protected string $property;
    protected array $params;

    function __construct(string $property, array $params)
    {
        $this->property = $property;
        $this->params = $params;

        $this->validate();
    }

    /**
     * 연산자 목록
     */
    abstract static function operators(): array;

    function setProperty(string $property)
    {
        $this->property = $property;

        return $this;
    }

    function getProperty()
    {
        return $this->property;
    }

    function setParams(array $params)
    {
        $this->params = $params;

        return $this;
    }

    function getParams()
    {
        return $this->params;
    }

    function addParam(string $key, $value)
    {
        $this->params[$key] = $value;

        return $this;
    }

    function getParam(string $key, $default = null)
    {
        return $this->params[$key] ?? $default;
    }

    /**
     * 필드 유효성 검사
     */
    function validate()
    {
        $allowedOperators = $this->operators();

        foreach ($this->getParams() as $k => $v) {
            if (!in_array($k, $allowedOperators)) throw new HandlingException("invalid operator: '{$k}' is not allowed operator");
        }
    }

    function toArray(): array
    {
        $types = FilterType::mapp();
        $class = $this::class;
        $type = '';

        foreach ($types as $k => $v) {
            if ($class == $v) {
                $type = $k;
                break;
            }
        }

        if (empty($type)) throw new HandlingException("{$class} is not registered with the type");

        return [
            'property' => $this->getProperty(),
            $type => $this->getParams(),
        ];
    }
}
