<?php

namespace SoNotion;

use SoNotion\Endpoints\Database;
use SoNotion\Endpoints\Databases;
use SoNotion\Endpoints\Search;

class SoNotion
{
    const BASE_URI = "https://api.notion.com/v1";
    const VERSION = '2021-08-16';

    protected string $accessKey;

    function __construct(string $accessKey)
    {
        $this->accessKey = $accessKey;
    }

    function getAccessKey()
    {
        return $this->accessKey;
    }

    function getVersion()
    {
        return static::VERSION;
    }

    function getBaseUrl()
    {
        return static::BASE_URI;
    }

    function databases()
    {
        return new Databases($this);
    }

    function database(string $databaseId)
    {
        return new Database($this, $databaseId);
    }

    function search()
    {
        return new Search($this);
    }
}
