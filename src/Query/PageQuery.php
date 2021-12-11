<?php

namespace SoNotion\Query;

class PageQuery extends Query
{
    protected ?string $start_cursor;
    protected int $page_size;

    function __construct(?string $start_cursor = null, int $page_size = 100)
    {
        $this->setStartCursor($start_cursor);
        $this->setPageSize($page_size);
    }

    function setStartCursor(?string $cursor = null)
    {
        $this->start_cursor = $cursor;

        return $this;
    }

    function setPageSize(int $size)
    {
        $this->page_size = min($size, 100);

        return $this;
    }

    function getStartCursor()
    {
        return $this->start_cursor;
    }

    function getPageSize()
    {
        return $this->page_size;
    }

    function validate()
    {
    }

    function toArray(): array
    {
        $results = [];

        if (!empty($this->getStartCursor())) $results['start_cursor'] = $this->getStartCursor();
        if (!empty($this->getPageSize())) $results['page_size'] = $this->getPageSize();

        return $results;
    }
}
