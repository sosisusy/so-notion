<?php

namespace SoNotion\Resources\Materials\Files;

use Illuminate\Support\Arr;
use SoNotion\Exceptions\HandlingException;
use SoNotion\Resources\Resource;

abstract class File extends Resource
{
    protected string $type;

    abstract function getUrl(): string;

    static function new(?array $data)
    {
        if (is_null($data)) return null;

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
