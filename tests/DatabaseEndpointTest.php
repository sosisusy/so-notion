<?php

namespace Tests\Endpoints;

use Illuminate\Support\Facades\Http;
use Illuminate\Validation\UnauthorizedException;
use SoNotion\Endpoints\Database;
use SoNotion\Resources\Entities\Database as EntitiesDatabase;
use SoNotion\Resources\Lists\DatabaseList;
use Tests\SoNotionTest;
use SoNotion\SoNotionFacade;

class DatabaseEndpointTest extends SoNotionTest
{

    /**
     * @test
     */
    function 데이터베이스_엔드포인트()
    {
        $databaseEndpoint = SoNotionFacade::database();

        $this->assertInstanceOf(Database::class, $databaseEndpoint);
    }

    /**
     * @test
     */
    function 데이터베이스_목록_조회()
    {
        $testData = json_decode(file_get_contents('tests/responses/databases/database_all_200.json'), true);

        Http::fake([
            'https://api.notion.com/v1/databases' => Http::response($testData, 200, ['Headers']),
        ]);

        $results = SoNotionFacade::database()->all();

        $this->assertInstanceOf(DatabaseList::class, $results);

        $databases = $results->getResults();

        $this->assertCount(2, $databases);
    }

    /**
     * @test
     */
    function 데이터베이스_빈_목록_조회()
    {
        $testData = json_decode(file_get_contents('tests/responses/databases/database_all_empty_200.json'), true);

        Http::fake([
            'https://api.notion.com/v1/databases' => Http::response($testData, 200, ['Headers']),
        ]);

        $results = SoNotionFacade::database()->all();

        $this->assertInstanceOf(DatabaseList::class, $results);
    }

    /**
     * @test
     */
    function 데이터베이스_목록_401_예외()
    {
        $testData = json_decode(file_get_contents('tests/responses/401.json'), true);

        Http::fake([
            'https://api.notion.com/v1/databases' => Http::response($testData, 401, ['Headers']),
        ]);

        $this->unauthorizedException();

        SoNotionFacade::database()->all();
    }

    /**
     * @test
     */
    function 단일_데이터베이스_조회()
    {
        $testData = json_decode(file_get_contents('tests/responses/databases/database_find_200.json'), true);

        Http::fake([
            'https://api.notion.com/v1/databases/a3cc6ba5fe394397a9b9c7c645701f09' => Http::response($testData, 200, ['Headers']),
        ]);

        $result = SoNotionFacade::database()->find('a3cc6ba5fe394397a9b9c7c645701f09');

        $this->assertInstanceOf(EntitiesDatabase::class, $result);
    }

    /**
     * @test
     */
    function 단일_데이터베이스_401_예외()
    {
        $testData = json_decode(file_get_contents('tests/responses/401.json'), true);

        Http::fake([
            'https://api.notion.com/v1/databases/a3cc6ba5fe394397a9b9c7c645701f09' => Http::response($testData, 401, ['Headers']),
        ]);

        $this->unauthorizedException();

        SoNotionFacade::database()->find('a3cc6ba5fe394397a9b9c7c645701f09');
    }

    /**
     * @test
     */
    function 단일_데이터베이스_400_예외()
    {
        $testData = json_decode(file_get_contents('tests/responses/databases/database_find_400.json'), true);

        Http::fake([
            'https://api.notion.com/v1/databases/a3cc6ba5fe394397a9b9c7c645701f0' => Http::response($testData, 400, ['Headers']),
        ]);

        $this->badRequestException();

        SoNotionFacade::database()->find('a3cc6ba5fe394397a9b9c7c645701f0');
    }
}
