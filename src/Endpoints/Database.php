<?php

namespace SoNotion\Endpoints;

use SoNotion\Endpoints\Builders\DatabaseQueryBuilder;
use SoNotion\Resources\Lists\DatabaseList;
use SoNotion\Resources\Records\Database as RecordsDatabase;

/**
 * 데이터베이스 endpoint 
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

    /**
     * 데이터베이스 조회
     */
    function find(string $dbId): ?RecordsDatabase
    {
        $path = "/databases/{$dbId}";

        $res = $this->notion->get($path);
        $body = json_decode($res->body(), 1);

        return new RecordsDatabase($body);
    }

    /**
     * 쿼리 빌더 리턴
     */
    function query(string $dbId)
    {
        return new DatabaseQueryBuilder($this->notion, $dbId);
    }
}
