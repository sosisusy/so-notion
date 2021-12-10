<?php

namespace SoNotion\Resources\Entities;

use Illuminate\Support\Arr;
use SoNotion\Exceptions\HandlingException;
use SoNotion\Resources\Entities\Entity;
use SoNotion\Resources\Materials\Emoji\Emoji;
use SoNotion\Resources\Materials\Files\File;
use SoNotion\Resources\Materials\Properties\Property;
use SoNotion\Resources\Materials\RichText;

class Database extends Entity
{
    protected array $title;
    protected ?object $icon;
    protected ?File $cover;
    protected array $properties;
    protected object $parent;
    protected string $url;

    function fillProperties(array $data)
    {
        parent::fillProperties($data);

        $this->fillTitle($data);
        $this->fillIcon($data);
        $this->fillChildren($data);
    }

    function fillTitle(array $data)
    {
        if (!Arr::exists($data, 'title')) return;

        $this->title = [];

        foreach ($data['title'] as $k => $title) $this->title[$k] = RichText::new($title);
    }

    function fillIcon(array $data)
    {
        if (!Arr::exists($data, 'icon')) return;
        if (empty($data['icon'])) return;
        if (!Arr::exists($data['icon'], 'type')) throw new HandlingException('invalid type: the given object is not a icon');

        switch ($data['icon']['type']) {
            case 'file':
                $this->icon = File::new(array_merge($data['icon']));
                break;
            case 'emoji':
                $this->icon = Emoji::new($data['icon']);
                break;
        }
    }

    function fillChildren(array $data)
    {
        if (empty($data["properties"])) return;

        $this->properties = [];

        foreach ($data['properties'] as $k => $property) $this->properties[$k] = Property::new($property);
    }

    function getTitle()
    {
        return $this->title;
    }

    function getTitleText()
    {
        $text = '';

        foreach ($this->title as $item) {
            if ($item instanceof RichText) {
                $text .= $item->getPlainText();
            }
        }

        return $text;
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

    function getParent()
    {
        return $this->parent;
    }

    function getUrl()
    {
        return $this->url;
    }
}
