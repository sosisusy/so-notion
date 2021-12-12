<?php

namespace Tests\Endpoints;

use Illuminate\Support\Facades\Http;
use SoNotion\Resources\Records\Page;
use Tests\SoNotionTest;
use SoNotion\SoNotionFacade;

class PageEndpointTest extends SoNotionTest
{
    /**
     * @test
     */
    function 단일_페이지_조회()
    {
        $testData = json_decode(file_get_contents('tests/responses/pages/page_find_200.json'), true);

        Http::fake([
            'https://api.notion.com/v1/pages/a544af91aa9d4d0ebbd4b5067efb4e01' => Http::response($testData, 200, ['Headers']),
        ]);

        $result = SoNotionFacade::page()->find('a544af91aa9d4d0ebbd4b5067efb4e01');

        $this->assertSame('https://www.notion.so/images/page-cover/gradients_11.jpg', $result->getCover()->getUrl());
        $this->assertInstanceOf(Page::class, $result);
    }
}
