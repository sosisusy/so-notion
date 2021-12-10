<?php

namespace SoNotion\Resources\Materials\Files\Items;

use SoNotion\Resources\Resource;

class External extends Resource
{
    protected string $url;

    function getUrl()
    {
        return $this->url;
    }
}
