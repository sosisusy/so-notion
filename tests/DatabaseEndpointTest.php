<?php

namespace Tests;

use Illuminate\Support\Facades\Http;
use SoNotion\Entities\Database;
use SoNotion\Entities\EntityCollection;
use SoNotion\SoNotionFacade;

class DatabaseEndpointTest extends SoNotionTest
{
    /**
     * @test
     */
    function 데이터베이스_목록_조회()
    {
        $testData = file_get_contents(__DIR__ . '/responses/databases/database_all_200.json');

        Http::fake([
            'https://api.notion.com/v1/databases*' => Http::response($testData, 200, ['Headers']),
        ]);

        $res = SoNotionFacade::databases()->all();
        $empty = $res->getResults('not entity type')->first();
        $databases = $res->getResults('database');

        $this->assertInstanceOf(EntityCollection::class, $res);
        $this->assertEmpty($empty);
        $this->assertInstanceOf(Database::class, $databases->first());
        $this->assertCount(2, $databases);
    }

    /**
     * @test
     */
    function 단일_데이터베이스_조회()
    {
        $testData = file_get_contents(__DIR__ . '/responses/databases/database_find_200.json');

        Http::fake([
            'https://api.notion.com/v1/databases/a3cc6ba5fe394397a9b9c7c645701f09' => Http::response($testData, 200, ['Headers']),
        ]);

        $res = SoNotionFacade::databases()->find('a3cc6ba5fe394397a9b9c7c645701f09');

        $this->assertInstanceOf(Database::class, $res);
    }

    /**
     * @test
     */
    function 데이터베이스_쿼리_조회()
    {
        $testData = file_get_contents(__DIR__ . '/responses/databases/database_query_200.json');

        Http::fake([
            'https://api.notion.com/v1/databases/a3cc6ba5fe394397a9b9c7c645701f09/query*' => Http::response($testData, 200, ['Headers']),
        ]);

        $res = SoNotionFacade::database('a3cc6ba5fe394397a9b9c7c645701f09')
            ->addFilter('text', '이름', ['contains' => '카드 1'])
            ->addSort('이름', 'created_time', 'descending')
            ->limit(50)
            ->get();

        $this->assertInstanceOf(EntityCollection::class, $res);
    }
}
