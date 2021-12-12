<?php

namespace SoNotion\Endpoints\Builders;

use SoNotion\Resources\Lists\RecordList;

interface Builder
{
    /**
     * 값 조회
     */
    public function get(): RecordList;
}
