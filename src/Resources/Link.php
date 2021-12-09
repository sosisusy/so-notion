<?php

namespace SoNotion\Resources;

class Link extends Resource
{
    protected string $url;

    function __construct(array $data)
    {
        $this->url = $data["url"];
    }

    function getUrl()
    {
        return $this->url;
    }
}
