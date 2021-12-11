<?php

namespace Tests\Endpoints;

use SoNotion\Exceptions\HandlingException;
use SoNotion\Query\Filters\FilterFactory;
use SoNotion\Query\Filters\Items\DateFilter;
use SoNotion\Query\Filters\Items\FilesFilter;
use SoNotion\Query\Filters\Items\FormulaFilter;
use SoNotion\Query\Filters\Items\MultiSelectFilter;
use SoNotion\Query\Filters\Items\PeopleFilter;
use SoNotion\Query\Filters\Items\RelationFilter;
use SoNotion\Query\Filters\Items\SelectFilter;
use SoNotion\Query\Filters\Items\TextFilter;
use Tests\SoNotionTest;

class FilterTest extends SoNotionTest
{
    /**
     * @test
     */
    function 필터_생성()
    {
        $property = '프로퍼티';

        $this->assertInstanceOf(TextFilter::class, FilterFactory::make('text', $property, []));
        $this->assertInstanceOf(SelectFilter::class, FilterFactory::make('select', $property, []));
        $this->assertInstanceOf(MultiSelectFilter::class, FilterFactory::make('multi_select', $property, []));
        $this->assertInstanceOf(FormulaFilter::class, FilterFactory::make('formula', $property, []));
        $this->assertInstanceOf(FilesFilter::class, FilterFactory::make('files', $property, []));
        $this->assertInstanceOf(PeopleFilter::class, FilterFactory::make('people', $property, []));
        $this->assertInstanceOf(DateFilter::class, FilterFactory::make('date', $property, []));
        $this->assertInstanceOf(RelationFilter::class, FilterFactory::make('relation', $property, []));
    }

    /**
     * @test
     */
    function 텍스트_필터_배열_리턴()
    {
        $filterType = 'text';
        $property = '프로퍼티';
        $params = [
            'does_not_equal' => '이건 안돼',
        ];
        $expect = [
            'property' => '프로퍼티',
            'text' => [
                'does_not_equal' => '이건 안돼',
            ]
        ];

        $filter = FilterFactory::make($filterType, $property, $params);

        $this->assertEquals($expect, $filter->toArray());
    }

    /**
     * @test
     */
    function Formula_필터_배열_리턴()
    {
        $filterType = 'formula';
        $property = '프로퍼티';
        $params = [
            'text' => [
                'does_not_equal' => "이건 안돼"
            ],
        ];
        $expect = [
            'property' => '프로퍼티',
            'formula' => [
                'text' => [
                    'does_not_equal' => '이건 안돼',
                ]
            ]
        ];

        $filter = FilterFactory::make($filterType, $property, $params);

        $this->assertEquals($expect, $filter->toArray());
    }

    /**
     * @test
     */
    function 허용되지_않은_연산자_사용()
    {
        $filterType = 'text';
        $property = '프로퍼티';
        $params = [
            'next_month' => [],
        ];

        $this->expectException(HandlingException::class);

        FilterFactory::make($filterType, $property, $params);
    }
}
