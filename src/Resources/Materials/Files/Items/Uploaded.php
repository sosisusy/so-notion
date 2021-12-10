<?php

namespace SoNotion\Resources\Materials\Files;

use SoNotion\Resources\Resource;

class Uploaded extends Resource
{
    protected string $url;
    protected string $expiry_time;

    function getUrl()
    {
        return $this->url;
    }

    function getExpiryTime()
    {
        return $this->expiry_time;
    }
}
