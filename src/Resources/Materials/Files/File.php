<?php

namespace SoNotion\Resources\Materials\Files;

use Illuminate\Support\Arr;
use SoNotion\Exceptions\HandlingException;
use SoNotion\Resources\Resource;

class File extends Resource
{
    protected string $type;

    static function new(array $data)
    {
        $type = Arr::get($data, "type");

        switch ($type) {
            case "external":
                return new ExternalFile($data);
            case "file":
                return new UploadedFile($data);
        }

        throw new HandlingException("invalid type");
    }

    function getType()
    {
        return $this->type;
    }
}
