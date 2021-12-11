<?php

namespace SoNotion\Query;

use Illuminate\Contracts\Support\Arrayable;

abstract class Query implements QueryInterface, Arrayable
{

    function toQuery(): array
    {
        return $this->toArray();
    }
}
