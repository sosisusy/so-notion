<?php

namespace SoNotion\Resources\Lists;

use SoNotion\Resources\Resource;

class EntityList extends Resource
{
    protected ?string $object = null;
    protected ?string $start_cursor = null;
    protected ?int $page_size = null;
    protected ?bool $has_more = null;
    protected ?string $next_cursor = null;
    protected ?array $results = null;

    function setStartCursor(string $curosr)
    {
        $this->start_cursor = $curosr;

        return $this;
    }

    function setPageSize(int $size)
    {
        $this->page_size = min($size, 100);

        return $this;
    }

    function getObject()
    {
        return $this->object;
    }

    function getStartCursor()
    {
        return $this->start_cursor;
    }

    function getPageSize()
    {
        return $this->page_size;
    }

    function getHasMore()
    {
        return $this->has_more;
    }

    function getNextCursor()
    {
        return $this->next_cursor;
    }

    function getResults()
    {
        return $this->results;
    }
}
