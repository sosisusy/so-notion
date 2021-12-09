<?php

namespace SoNotion\Resources;

class User extends Resource
{

    /**
     * 항목: ["user"]
     */
    protected string $object;

    protected string $id;

    /**
     * 항목: ["person", "bot"]
     */
    protected string $type;

    protected string $name;

    protected string $avatar_url;

    function __construct(array $data)
    {
        $this->object = $data["object"];
        $this->id = $data["id"];
        $this->type = $data["type"];
        $this->name = $data["name"];
        $this->avatar_url = $data["avatar_url"];
    }

    function getObject()
    {
        return $this->object;
    }

    function getId()
    {
        return $this->id;
    }

    function getType()
    {
        return $this->type;
    }

    function getName()
    {
        return $this->name;
    }

    function getAvatarUrl()
    {
        return $this->avatar_url;
    }
}
