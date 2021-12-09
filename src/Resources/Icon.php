<?php

namespace SoNotion\Resources;

use Illuminate\Support\Arr;
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
        $hidden = ["file", "emoji"];

        return Arr::where($hidden, function ($value) {
            return $value != $this->type;
        });
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
