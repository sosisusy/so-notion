<?php

namespace SoNotion\Enum;

use SoNotion\Entities\Database;
use SoNotion\Entities\Page;

class EntityTypes extends Enum
{
    const DATABASE = 'database';
    const PAGE = 'page';
    const USER = 'user';
    const BLOCK = 'block';

    static function mapp()
    {
        return [
            static::DATABASE => Database::class,
            static::PAGE => Page::class,
        ];
    }
}
