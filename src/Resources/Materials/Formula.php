<?php

namespace SoNotion\Resources\Materials;

use SoNotion\Resources\Resource;

class Formula extends Resource
{
    protected ?string $type;
    protected ?string $expression;
    protected ?string $string;
    protected ?int $number;
    protected ?bool $boolean;
    protected ?string $date;

    function getType()
    {
        return $this->type;
    }

    function getExpression()
    {
        return $this->expression;
    }

    function getContent()
    {
        return $this->string ?? $this->number ?? $this->boolean ?? $this->date;
    }
}
