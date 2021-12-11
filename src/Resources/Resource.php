<?php

namespace SoNotion\Resources;

use ReflectionClass;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;

class Resource implements Jsonable, Arrayable
{

    function __construct(array $data)
    {
        $this->fillProperties($data);
    }

    static function new(?array $data)
    {
        if (is_null($data)) return null;

        return new static($data);
    }

    function fillProperties(array $data)
    {
        foreach ($this->getResourceProperties() as $property) {
            $name = $property->getName();
            $type = $property->getType()->getName();
            $value = $data[$name] ?? null;

            switch (true) {
                case is_subclass_of($type, Resource::class):
                    $this->{$name} = $type::new($value);
                    break;
                case $type == "object":
                    $this->{$name} = !empty($value) ? (object) $value : null;
                    break;
                default:
                    $this->{$name} = $value ?? null;
            }
        }
    }

    final function toJson($options = 0)
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE | $options);
    }

    final function toArray()
    {
        $contents = [];

        foreach ($this->getResourceProperties() as $property) {
            $property->setAccessible(true);
            $name = $property->getName();
            $value = $property->getValue($this);

            $contents[$name] = $this->getRawContents($value);
        }

        return $contents;
    }

    final function getResourceProperties()
    {
        $ref = new ReflectionClass($this);

        return $ref->getProperties();
    }

    final function getRawContents($value)
    {
        if (is_object($value) && method_exists($value, "toArray")) return $value->toArray();
        if (is_array($value)) {
            $results = [];

            foreach ($value as $k => $v) $results[$k] = $this->getRawContents($v);

            return $results;
        }
        if (is_object($value)) {
            $results = [];

            foreach ((array) $value as $k => $v) $results[$k] = $this->getRawContents($v);

            return $results;
        }

        return $value;
    }
}
