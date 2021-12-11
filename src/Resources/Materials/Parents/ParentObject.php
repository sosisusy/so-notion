<?php

namespace SoNotion\Resources\Materials\Parents;

use Illuminate\Support\Arr;
use SoNotion\Exceptions\HandlingException;
use SoNotion\Resources\Resource;

class ParentObject extends Resource
{
    protected string $type;

    static function new(?array $data)
    {
        if (empty($data)) return null;

        $type = Arr::get($data, "type");

        switch ($type) {
            case "database_id":
                return new DatabaseParent($data);
            case "page_id":
                return new PageParent($data);
            case "workspace":
                return new WorkspaceParent($data);
        }

        throw new HandlingException("invalid type");
    }

    function getType()
    {
        return $this->start;
    }
}
