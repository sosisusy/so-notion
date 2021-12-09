<?php

namespace SoNotion\Resources;

use DateTime;

class Date extends Resource
{
    protected DateTime $start;

    protected ?DateTime $end = null;

    function __construct(array $data)
    {
        $this->start = $data["start"];
        $this->end = $data["end"] ?? null;
    }

    function getStart()
    {
        return $this->start;
    }

    function getEnd()
    {
        return $this->end;
    }
}
