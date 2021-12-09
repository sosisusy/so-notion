<?php

namespace SoNotion\Resources;

use SoNotion\Resources\Files\File;
use SoNotion\Resources\Icon;
use SoNotion\Resources\ParentObject;
use SoNotion\Resources\Resource;

/**
 * 노션 데이터베이스 객체
 */
class Database extends Resource
{
    /**
     * 항목: ["database"]
     */
    protected string $object;

    protected string $id;

    protected string $created_time;

    protected string $last_edited_time;

    protected ?array $title;

    protected ?Icon $icon = null;

    protected ?File $cover = null;

    protected array $properties;

    protected ParentObject $parent;

    protected string $url;

    function __construct(array $data)
    {
        $this->object = $data["object"];
        $this->id = $data["id"];
        $this->created_time = $data["created_time"];
        $this->last_edited_time = $data["last_edited_time"];
        $this->title = $this->makeTitle($data["title"]);
        $this->icon = !empty($data["icon"]) ? Icon::new($data["icon"]) : null;
        $this->cover = !empty($data["cover"]) ? File::new($data["cover"]) : null;
        $this->properties = $data["properties"];
        $this->parent = ParentObject::new($data["parent"]);
        $this->url = $data["url"];
    }

    function makeTitle(array $title)
    {
        $results = [];

        foreach ($title as $item) $results[] = RichText::new($item);

        return $results;
    }

    function getObject()
    {
        return $this->object;
    }

    function getId()
    {
        return $this->id;
    }

    function getCretedTime()
    {
        return $this->created_time;
    }

    function getLastEditedTime()
    {
        return $this->last_edited_time;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getIcon()
    {
        return $this->icon;
    }

    function getCover()
    {
        return $this->cover;
    }

    function getProperties()
    {
        return $this->properties;
    }

    function getUrl()
    {
        return $this->url;
    }
}
