<?php

namespace SoNotion\Endpoints\Builders;

interface Builder
{
    /**
     * start_cursor 지정
     */
    public function startCursor(string $cursor);

    /**
     * 페이지 데이터 수량 지정
     */
    public function pageSize(int $size);

    /**
     * 값 조회
     */
    public function get();
}
