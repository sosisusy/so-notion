<?php

namespace SoNotion\Endpoints;

use SoNotion\SoNotion;

abstract class Endpoint
{
    protected SoNotion $notion;

    function __construct(SoNotion $notion)
    {
        $this->notion = $notion;
    }
}
