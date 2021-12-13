<?php

namespace SoNotion\Entities;

use SoNotion\Entities\Property;
use SoNotion\Exceptions\HandlingException;

class Page extends Entity
{
    protected string $id;
    protected string $created_time;
    protected string $last_edited_time;
    protected bool $archived;
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

    function fillArchived(array $data)
    {
        $this->archived = $data['archived'];
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
    function geArchived()
    {
        return $this->archived;
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
