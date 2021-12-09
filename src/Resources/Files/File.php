<?php

namespace SoNotion\Resources\Files;

use SoNotion\Resources\Resource;

/**
 * 노션 파일 객체
 */
class File extends Resource
{
    /**
     * 타입 목록: ["external", "file"]
     */
    protected string $type;

    protected ?UploadedFile $file = null;

    protected ?ExternalFile $external = null;

    function __construct(array $data)
    {
        $this->type = $data["type"];

        switch ($this->type) {
            case "file":
                $this->file = UploadedFile::new($data["file"]);
                break;
            case "external":
                $this->external = ExternalFile::new($data["external"]);
                break;
        }
    }

    function getHiddenProperties(): array
    {
        switch ($this->type) {
            case "file":
                return ["external"];
            case "external":
                return ["file"];
        }

        return [];
    }

    function getType()
    {
        return $this->type;
    }

    function getFile()
    {
        return $this->file;
    }

    function getExternal()
    {
        return $this->external;
    }
}
