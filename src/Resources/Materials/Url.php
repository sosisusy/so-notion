<?php

namespace SoNotion\Resources\Materials;

use SoNotion\Resources\Resource;

class Url extends Resource
{
    protected ?string $url = null;

    function getUrl()
    {
        return $this->url;
    }
}
