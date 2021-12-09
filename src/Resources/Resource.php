<?php

namespace SoNotion\Resources;

use ReflectionClass;
use Illuminate\Support\Str;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;
use Nette\NotImplementedException;

abstract class Resource implements Jsonable, Arrayable
{
    abstract function __construct(array $data);

    public static function new(array $data): Resource
    {
        return new static($data);
    }

    public static function fromJson(string $data): Resource
    {
        $data = json_decode($data, false);

        return new static($data);
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options | JSON_UNESCAPED_UNICODE);
    }

    public function toArray()
    {
        $results = [];
        $hidden = [];
        $ref = new ReflectionClass($this);

        try {
            $hidden = $this->getHiddenProperties();
        } catch (NotImplementedException $e) {
        }

        foreach ($ref->getProperties() as $property) {
            $property->setAccessible(true);
            $name = Str::snake($property->getName());
            $value = $property->getValue($this);

            if (in_array($name, $hidden)) continue;

            $results[$name] = $this->toArrayValue($value);
        }

        return $results;
    }

    public function toArrayValue($value)
    {
        if (is_object($value) && method_exists($value, "toArray")) return $value->toArray();
        if (is_array($value)) {
            $results = [];
            foreach ($value as $k => $item) $results[$k] = $this->toArrayValue($item);

            return $results;
        }

        return $value;
    }

    /**
     * toArray 메서드를 호출 할 때 감출 속성 목록
     */
    public function getHiddenProperties(): array
    {
        throw new NotImplementedException();
    }
}
