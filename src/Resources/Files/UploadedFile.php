<?php

namespace SoNotion\Resources\Files;

use SoNotion\Resources\Resource;

/**
 * 업로드된 파일 객체
 */
class UploadedFile extends Resource
{

    protected string $url;

    protected string $expiry_time;

    function __construct(array $data)
    {
        $this->url = $data["url"];
        $this->expiry_time = $data["expiry_time"];
    }

    function getUrl()
    {
        return $this->url;
    }

    function getExpiryTime()
    {
        return $this->expiry_time;
    }
}
