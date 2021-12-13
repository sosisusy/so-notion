<?php

namespace Tests;

use Illuminate\Support\Facades\Http;
use SoNotion\Entities\Database;
use SoNotion\Entities\EntityCollection;
use SoNotion\SoNotionFacade;

class SearchTest extends SoNotionTest
{
    /**
     * @test
     */
    function 전체_조회()
    {
        $testData = file_get_contents(__DIR__ . '/responses/search/search_all_200.json');

        Http::fake([
            'https://api.notion.com/v1/search' => Http::response($testData, 200, ['Headers']),
        ]);

        $res = SoNotionFacade::search()->get();

        $this->assertInstanceOf(EntityCollection::class, $res);
    }

    /**
     * @test
     */
    function 페이지만_조회()
    {
        $testData = file_get_contents(__DIR__ . '/responses/search/search_only_page_200.json');

        Http::fake([
            'https://api.notion.com/v1/search' => Http::response($testData, 200, ['Headers']),
        ]);

        $res = SoNotionFacade::search()
            ->where('test')
            ->sortBy('ascending')
            ->get('page');

        $pages = $res->getResults('page');

        $this->assertInstanceOf(EntityCollection::class, $res);
        $this->assertSameSize($res->getResults(), $pages);
    }

    /**
     * @test
     */
    function 데이터베이스만_조회()
    {
        $testData = file_get_contents(__DIR__ . '/responses/search/search_only_database_200.json');

        Http::fake([
            'https://api.notion.com/v1/search' => Http::response($testData, 200, ['Headers']),
        ]);

        $res = SoNotionFacade::search()
            ->where('test')
            ->sortBy('ascending')
            ->only('database')
            ->get();

        $databases = $res->getResults('database');

        $this->assertInstanceOf(EntityCollection::class, $res);
        $this->assertSameSize($res->getResults(), $databases);
    }
}
