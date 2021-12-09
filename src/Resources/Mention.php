<?php

namespace SoNotion\Resources;

use Illuminate\Support\Arr;

/**
 * 멘션 객체
 */
class Mention extends Resource
{
    /**
     * 항목: ["user", "page", "database", "date", "link_preview"]
     */
    protected string $type;

    protected ?User $user = null;

    protected ?Page $page = null;

    protected ?Database $database = null;

    protected ?Date $date = null;

    protected ?LinkPreview $link_preview = null;

    function __construct(array $data)
    {
        $this->type = $data["type"];

        switch ($this->type) {
            case "user":
                $this->user = User::new($data["user"]);
                break;
            case "page":
                $this->page = User::new($data["page"]);
                break;
            case "database":
                $this->database = User::new($data["database"]);
                break;
            case "date":
                $this->date = User::new($data["date"]);
                break;
            case "link_preview":
                $this->link_preview = User::new($data["link_preview"]);
                break;
        }
    }

    function getHiddenProperties(): array
    {
        $hidden = ["user", "page", "database", "date", "link_preview"];

        return Arr::where($hidden, function ($value) {
            return $value != $this->type;
        });
    }

    function getUser()
    {
        return $this->user;
    }

    function getPage()
    {
        return $this->page;
    }

    function getDatabase()
    {
        return $this->database;
    }

    function getDate()
    {
        return $this->date;
    }

    function getLinkPreview()
    {
        return $this->link_preview;
    }
}
