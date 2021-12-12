<?php

namespace SoNotion\Endpoints;

use SoNotion\SoNotion;

abstract class Endpoint
{
    protected SoNotion $notion;
    protected ?string $cursor = null;
    protected ?int $pageSize = null;

    function __construct(SoNotion $notion)
    {
        $this->notion = $notion;
    }

    function setStartCursor(string $cursor)
    {
        $this->startCursor = $cursor;
        return $this;
    }

    function setPageSize(int $pageSize)
    {
        $this->pageSize = min($pageSize, 100);
        return $this;
    }

    protected function makeParams(): array
    {
        $params = [];

        if (!is_null($this->cursor)) $params['start_cursor'] = $this->cursor;
        if (!is_null($this->pageSize)) $params['page_size'] = $this->pageSize;

        return $params;
    }

    function getParams(): array
    {
        return $this->makeParams();
    }
}
