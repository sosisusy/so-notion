<?php

namespace SoNotion\Entities;

use SoNotion\Entities\Property;
use SoNotion\Exceptions\HandlingException;

class Database extends Entity
{
    protected string $id;
    protected string $created_time;
    protected string $last_edited_time;
    protected string $title;
    protected ?string $cover = null;
    protected array $properties;
    protected string $url;

    function fillId(array $data)
    {
        $this->id = $data['id'];
    }

    function fillCreatedTime(array $data)
    {
        $this->created_time = $data['created_time'];
    }

    function fillLastEditedTime(array $data)
    {
        $this->last_edited_time = $data['last_edited_time'];
    }

    function fillTitle(array $data)
    {
        $title = $data['title'] ?? '';

        if (!is_array($title)) $this->title = $title;

        $this->title = '';

        foreach ($title as $v) {
            if (!empty($v['plain_text'])) $this->title .= $v['plain_text'];
        }
    }

    function fillCover(array $data)
    {
        $cover = $data['cover'] ?? null;

        if (empty($cover)) return;
        if (empty($cover['type']) || empty($cover[$cover['type']]['url'])) throw new HandlingException('invalid data');

        $this->cover = $cover[$cover['type']]['url'];
    }

    function fillUrl(array $data)
    {
        $this->url = $data['url'];
    }

    function fillProperties(array $data)
    {
        if (empty($data['properties'])) return;

        $this->properties = [];

        foreach ($data['properties'] as $k => $property) $this->properties[$k] = new Property($property);
    }

    function getId()
    {
        return $this->id;
    }
    function getCreatedTime()
    {
        return $this->created_time;
    }
    function getLastEditedTime()
    {
        return $this->last_edited_time;
    }
    function geTtitle()
    {
        return $this->title;
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
