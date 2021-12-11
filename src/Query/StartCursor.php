<?php

namespace SoNotion\Query;

class StartCursor
{
    protected string $start_cursor;

    function __construct(string $cursor)
    {
        $this->setStartCursor($cursor);
    }

    function setStartCursor(string $cursor)
    {
        $this->start_cursor = $cursor;

        return $this;
    }

    function getStartCursor()
    {
        return $this->start_cursor;
    }
}
