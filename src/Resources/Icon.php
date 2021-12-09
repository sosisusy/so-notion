<?php

namespace SoNotion\Resources;

use SoNotion\Resources\Files\UploadedFile;
use SoNotion\Resources\Resource;

/**
 * 노션 아이콘 객체
 */
class Icon extends Resource
{
    /**
     * 항목: ["emoji", "file"]
     */
    protected string $type;

    protected ?string $emoji = null;

    protected ?UploadedFile $file = null;

    function __construct(array $data)
    {
        $this->type = $data["type"];

        switch ($this->type) {
            case "emoji":
                $this->emoji = $data["emoji"];
                break;
            case "file":
                $this->file = UploadedFile::new($data["file"]);
                break;
        }
    }

    function getHiddenProperties(): array
    {
        switch ($this->type) {
            case "emoji":
                return ["file"];
            case "file":
                return ["emoji"];
        }

        return [];
    }

    function getType()
    {
        return $this->type;
    }

    function getEmoji()
    {
        return $this->emoji;
    }
}
