<?php

namespace SoNotion\Entities;

use SoNotion\Entities\Entity;

class Property extends Entity
{
    protected string $id;
    protected ?string $name;
    protected string $type;
    protected $contents;

    function fillName(array $data)
    {
        $this->name = $data['name'] ?? null;
    }

    function fillId(array $data)
    {
        $this->id = $data['id'];
    }

    function fillType(array $data)
    {
        $this->type = $data['type'];
    }

    function fillContents(array $data)
    {
        if (empty($data[$data['type']])) return;

        $this->contents = $data[$data['type']];
    }

    function getName()
    {
        return $this->name;
    }

    function getContents()
    {
        return $this->contents;
    }
}
