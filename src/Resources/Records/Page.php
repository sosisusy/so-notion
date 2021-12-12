<?php

namespace SoNotion\Resources\Records;

use Illuminate\Support\Arr;
use SoNotion\Exceptions\HandlingException;
use SoNotion\Resources\Records\Record;
use SoNotion\Resources\Materials\Emoji\Emoji;
use SoNotion\Resources\Materials\Files\File;
use SoNotion\Resources\Materials\Parents\ParentObject;
use SoNotion\Resources\Materials\Properties\Property;

class Page extends Record
{
    protected bool $archived;
    protected ?object $icon;
    protected ?File $cover;
    protected array $properties;
    protected ParentObject $parent;
    protected string $url;

    function fillProperties(array $data)
    {
        parent::fillProperties($data);

        $this->fillIcon($data);
        $this->fillChildren($data);
    }

    function fillIcon(array $data)
    {
        if (!Arr::exists($data, 'icon')) return;
        if (empty($data['icon'])) return;
        if (!Arr::exists($data['icon'], 'type')) throw new HandlingException('invalid type: the given object is not a icon');

        switch ($data['icon']['type']) {
            case 'file':
                $this->icon = File::new($data['icon']);
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

    /**
     * @return null|File|Emoji
     */
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
