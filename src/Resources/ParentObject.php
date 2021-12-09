<?php

namespace SoNotion\Resources;

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
        switch ($this->type) {
            case "page_id":
                return ["workspace", "database_id"];
            case "workspace":
                return ["page_id", "database_id"];
            case "database_id":
                return ["workspace", "page_id"];
        }

        return [];
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
