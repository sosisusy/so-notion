<?php

namespace SoNotion\Resources\Lists;

use SoNotion\Resources\Resource;

class EntityList extends Resource
{
    protected string $object;
    protected bool $has_more;
    protected ?string $next_cursor = null;
    protected array $results;

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
