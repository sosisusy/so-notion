<?php

namespace SoNotion\Resources;

/**
 * 미리보기 객체
 */
class LinkPreview extends Resource
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
