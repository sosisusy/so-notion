<?php

namespace SoNotion\Factories;

use SoNotion\Entities\Entity;
use SoNotion\Enum\EntityTypes;

class EntityFactory
{
    static function make(string $entityType, array $data): Entity
    {
        $mapping = EntityTypes::mapp();

        return $mapping[$entityType]::fromArray($data);
    }
}
