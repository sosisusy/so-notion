<?php

namespace SoNotion\Endpoints;

use SoNotion\Entities\Database;
use SoNotion\Entities\EntityCollection;

class Databases extends Endpoint
{
    /**
     * 데이터베이스 목록 전체 조회
     */
    function all()
    {
        $path = "/databases";
        $params = [];

        if (!empty($this->startCursor)) $params['start_cursor'] = $this->startCursor;
        if (!empty($this->pageSize)) $params['page_size'] = $this->pageSize;

        $res = $this->notion->getConnection()->get($path, $params);

        return EntityCollection::fromJson($res->body());
    }

    /**
     * 데이터베이스 단일 조회
     */
    function find(string $dbId)
    {
        $path = "/databases/{$dbId}";
        $res = $this->notion->getConnection()->get($path, []);

        return Database::fromJson($res->body());
    }
}
