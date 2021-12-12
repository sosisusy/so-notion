<?php

namespace SoNotion\Endpoints;

use SoNotion\Resources\Records\Page as RecordsPage;

/**
 * 페이지 endpoint 
 */
class Page extends Endpoint
{
    /**
     * 페이지 조회
     */
    function find(string $pageId): ?RecordsPage
    {
        $path = "/pages/{$pageId}";

        $res = $this->notion->get($path);
        $body = json_decode($res->body(), 1);

        return new RecordsPage($body);
    }
}
