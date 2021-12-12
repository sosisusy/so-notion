<?php

namespace SoNotion\Endpoints;

use SoNotion\SoNotion;
use SoNotion\SoNotionClient;

class Endpoint
{
    protected SoNotion $notion;
    protected SoNotionClient $client;

    protected ?string $startCursor;
    protected int $pageSize = 100;

    function __construct(SoNotion $notion)
    {
        $this->notion = $notion;
        $this->client = new SoNotionClient(
            $notion->getBaseUrl(),
            $notion->getAccessKey(),
            $notion->getVersion()
        );
    }

    function limit(int $size)
    {
        $this->pageSize = min($size, 100);
        return $this;
    }

    function offset(string $startCursor)
    {
        $this->startCursor = $startCursor;
        return $this;
    }
}
