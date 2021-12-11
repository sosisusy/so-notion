<?php

namespace SoNotion\Endpoints;

use SoNotion\Resources\Entities\Database as EntitiesDatabase;
use SoNotion\Resources\Lists\DatabaseList;

/**
 * 데이터베이스 API 
 */
class Database extends Endpoint
{

    /**
     * 데이터베이스 전체 목록 조회
     */
    function all(): ?DatabaseList
    {
        $path = "/databases";

        $res = $this->notion->get($path, []);
        $body = json_decode($res->body(), 1);

        if (empty($body)) return null;

        return new DatabaseList($body);
    }

    function find(string $dbId): ?EntitiesDatabase
    {
        $path = "/databases/{$dbId}";

        $res = $this->notion->get($path);
        $body = json_decode($res->body(), 1);

        return new EntitiesDatabase($body);
    }

    function query()
    {
    }
}
