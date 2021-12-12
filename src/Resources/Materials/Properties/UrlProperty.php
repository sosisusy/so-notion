<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\Url;

class UrlProperty extends Property
{
    protected ?Url $url;

    function getUrl()
    {
        return $this->url;
    }

    function getContents()
    {
        if (empty($this->url)) return null;

        return $this->url->toArray();
    }
}
