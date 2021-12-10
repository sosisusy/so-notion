<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\Url;

class UrlProperty extends Property
{
    protected Url $url;

    function getUrl()
    {
        return $this->url;
    }
}
