<?php

namespace SoNotion;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \SoNotion\Endpoints\Database database(string $databaseId)
 * @method static \SoNotion\Endpoints\Databases databases()
 * @method static \SoNotion\Endpoints\Search search()
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
