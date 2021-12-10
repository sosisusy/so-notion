<?php

namespace Tests\Endpoints;

use Tests\SoNotionTest;
use Illuminate\Support\Arr;
use SoNotion\Endpoints\Database;
use SoNotion\Resources\Collection;
use Illuminate\Support\Facades\Http;
use SoNotion\Exceptions\SoNotionBadRequestException;
use SoNotion\Exceptions\SoNotionUnauthorizedException;
use SoNotion\Resources\Database as ResourcesDatabase;
use SoNotion\Resources\Entities\Database as EntitiesDatabase;
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
    // function 데이터베이스_목록_조회()
    // {
    //     $testData = json_decode(file_get_contents('tests/responses/databases/database_all_200.json'), true);

    //     Http::fake([
    //         'https://api.notion.com/v1/databases' => Http::response($testData, 200, ['Headers']),
    //     ]);

    //     $results = SoNotionFacade::database()->all();

    //     $this->assertInstanceOf(Collection::class, $results);
    //     $this->assertEquals($testData, $results->toArray());

    //     $databases = $results->getResults();

    //     $this->assertCount(2, $databases);
    //     $this->assertInstanceOf(ResourcesDatabase::class, Arr::first($databases));
    // }

    // /**
    //  * @test
    //  */
    // function 데이터베이스_빈_목록_조회()
    // {
    //     $testData = json_decode(file_get_contents('tests/responses/databases/database_all_empty_200.json'), true);

    //     Http::fake([
    //         'https://api.notion.com/v1/databases' => Http::response($testData, 200, ['Headers']),
    //     ]);

    //     $results = SoNotionFacade::database()->all();

    //     $this->assertInstanceOf(Collection::class, $results);
    //     $this->assertEquals($testData, $results->toArray());
    // }

    // /**
    //  * @test
    //  */
    // function 데이터베이스_목록_401_예외()
    // {
    //     $testData = json_decode(file_get_contents('tests/responses/401.json'), true);

    //     Http::fake([
    //         'https://api.notion.com/v1/databases' => Http::response($testData, 401, ['Headers']),
    //     ]);

    //     $this->expectException(SoNotionUnauthorizedException::class);
    //     $this->expectExceptionMessage("API token is invalid.");

    //     SoNotionFacade::database()->all();
    // }

    // /**
    //  * @test
    //  */
    function 단일_데이터베이스_조회()
    {
        $testData = json_decode(file_get_contents('tests/responses/databases/database_find_200.json'), true);


        $aa = EntitiesDatabase::new($testData);

        dd($aa);


        // Http::fake([
        //     'https://api.notion.com/v1/databases/a3cc6ba5fe394397a9b9c7c645701f09' => Http::response($testData, 200, ['Headers']),
        // ]);

        // $result = SoNotionFacade::database()->find('a3cc6ba5fe394397a9b9c7c645701f09');

        // $this->assertInstanceOf(ResourcesDatabase::class, $result);
        // $this->assertEquals($testData, $result->toArray());
    }

    // /**
    //  * @test
    //  */
    // function 단일_데이터베이스_401_예외()
    // {
    //     $testData = json_decode(file_get_contents('tests/responses/401.json'), true);

    //     Http::fake([
    //         'https://api.notion.com/v1/databases/a3cc6ba5fe394397a9b9c7c645701f09' => Http::response($testData, 401, ['Headers']),
    //     ]);

    //     $this->expectException(SoNotionUnauthorizedException::class);
    //     $this->expectExceptionMessage("API token is invalid.");

    //     SoNotionFacade::database()->all();
    // }

    // /**
    //  * @test
    //  */
    // function 단일_데이터베이스_400_예외()
    // {
    //     $testData = json_decode(file_get_contents('tests/responses/databases/database_find_400.json'), true);

    //     Http::fake([
    //         'https://api.notion.com/v1/databases/a3cc6ba5fe394397a9b9c7c645701f0' => Http::response($testData, 400, ['Headers']),
    //     ]);

    //     $this->expectException(SoNotionBadRequestException::class);
    //     $this->expectExceptionMessage("path failed validation");

    //     SoNotionFacade::database()->find('a3cc6ba5fe394397a9b9c7c645701f0');
    // }
}
