<?php

namespace SoNotion\Endpoints;

use SoNotion\SoNotion;

class Endpoint
{
    protected SoNotion $notion;

    protected ?string $startCursor;
    protected int $pageSize = 100;

    function __construct(SoNotion $notion)
    {
        $this->notion = $notion;
    }

    function limit(int $size)
    {
        $this->pageSize = min($size, 100);
        return $this;
    }

    function offset(string $startCursor)
    {
        $this->startCursor = $startCursor;
        return $this;
    }
}
