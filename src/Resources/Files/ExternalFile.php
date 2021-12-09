<?php

namespace SoNotion\Resources\Files;

use SoNotion\Resources\Resource;

/**
 * 노션 외부 파일 객체
 */
class ExternalFile extends Resource
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
