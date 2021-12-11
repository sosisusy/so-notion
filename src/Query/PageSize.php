<?php

namespace SoNotion\Query;

class PageSize
{
    protected int $page_size;

    function __construct(int $page_size = 100)
    {
        $this->setPageSize($page_size);
    }

    function setPageSize(int $size)
    {
        $this->page_size = min($size, 100);

        return $this;
    }

    function getPageSize()
    {
        return $this->page_size;
    }
}
