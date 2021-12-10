<?php

namespace SoNotion\Resources\Materials\Mentions;

use Illuminate\Support\Arr;
use SoNotion\Exceptions\HandlingException;
use SoNotion\Resources\Resource;

class Mention extends Resource
{
    protected string $type;

    static function new(array $data)
    {
        $type = Arr::get($data, "type");

        switch ($type) {
            case "user":
                return new UserMention($data);
            case "page":
                return new PageMention($data);
            case "database":
                return new DatabaseMention($data);
            case "date":
                return new DateMention($data);
            case "link_preview":
                return new LinkPreviewMention($data);
        }

        throw new HandlingException("invalid type");
    }

    function getType()
    {
        return $this->type;
    }
}
