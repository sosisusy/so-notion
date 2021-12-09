<?php

namespace SoNotion\Endpoints;

use SoNotion\Resources\Collection;
use SoNotion\Resources\Database as ResourcesDatabase;
use SoNotion\Resources\ResourceGenerator;

/**
 * 데이터베이스 API 
 */
class Database extends Endpoint
{

    /**
     * 데이터베이스 전체 목록 조회
     */
    function all(): ?Collection
    {
        $path = "/databases";

        $res = $this->notion->get($path, []);
        $body = json_decode($res->body(), 1);

        return ResourceGenerator::parse($body);
    }

    function find(string $dbId): ?ResourcesDatabase
    {
        $path = "/databases/{$dbId}";

        $res = $this->notion->get($path);
        $body = json_decode($res->body(), 1);

        return ResourceGenerator::parse($body);
    }
}
