<?php

namespace SoNotion\Resources;

use Illuminate\Support\Arr;
use SoNotion\Resources\Resource;

/**
 * 상위 객체
 */
class ParentObject extends Resource
{
    /**
     * 항목: ["page_id", "workspace", "database_id"]
     */
    protected string $type;

    protected ?string $page_id = null;

    protected ?bool $workspace = null;

    protected ?string $database_id = null;

    function __construct(array $data)
    {
        $this->type = $data["type"];

        switch ($this->type) {
            case "page_id":
                $this->page_id = $data["page_id"];
                break;
            case "workspace":
                $this->workspace = $data["workspace"];
                break;
            case "database_id":
                $this->database_id = $data["database_id"];
                break;
        }
    }

    function getHiddenProperties(): array
    {
        $hidden = ["page_id", "workspace", "database_id"];

        return Arr::where($hidden, function ($value) {
            return $value != $this->type;
        });
    }

    function getType()
    {
        return $this->type;
    }

    function getPageId()
    {
        return $this->page_id;
    }

    function getWorkspace()
    {
        return $this->workspace;
    }

    function getDatabaseId()
    {
        return $this->database_id;
    }
}
