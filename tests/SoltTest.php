<?php

namespace Tests\Endpoints;

use SoNotion\Query\Sort;
use Tests\SoNotionTest;

class SoltTest extends SoNotionTest
{
    /**
     * @test
     */
    function 정렬_값_비교()
    {
        $expect = [
            'property' => 'property',
            'timestamp' => 'created_time',
            'direction' => 'ascending',
        ];

        $sort = new Sort('property');

        $this->assertEquals($expect, $sort->toArray());
    }
}
