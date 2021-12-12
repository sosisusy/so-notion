<?php

namespace SoNotion;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \SoNotion\Endpoints\Database database() 데이터베이스 엔드포인트
 * @method static \SoNotion\Endpoints\Page page() 페이지 엔드포인트
 */
class SoNotionFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SoNotion::class;
    }
}
