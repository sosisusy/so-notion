<?php

namespace SoNotion\Resources\Blocks;

use SoNotion\Resources\Resource;

/**
 * 블럭 객체
 */
class Block extends Resource
{
    /**
     * 항목: ["block"]
     */
    protected string $object;

    protected string $id;

    protected string $type;

    protected string $created_time;

    protected string $last_edited_time;

    protected bool $archived;

    protected bool $has_children;

    function __construct(array $data)
    {
        $this->object = $data["object"];
        $this->id = $data["id"];
        $this->created_time = $data["created_time"];
        $this->last_edited_time = $data["last_edited_time"];
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
}
