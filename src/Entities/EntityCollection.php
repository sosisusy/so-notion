<?php

namespace SoNotion\Entities;

use Illuminate\Support\Collection;
use SoNotion\Enum\EntityTypes;
use SoNotion\Exceptions\HandlingException;
use SoNotion\Factories\EntityFactory;

class EntityCollection extends Entity
{
    protected bool $has_more;
    protected ?string $next_cursor;
    protected Collection $results;

    function fillHasMore(array $data)
    {
        $this->has_more = $data['has_more'];
    }

    function fillNextCursor(array $data)
    {
        $this->next_cursor = $data['next_cursor'] ?? null;
    }

    function fillResults(array $data)
    {
        if (!isset($data['results'])) throw new HandlingException('invalid data');

        $this->results = new Collection();

        foreach ($data['results'] as $result) {
            $this->results->add(
                $this->makeResult($result)
            );
        }
    }

    function makeResult(array $result)
    {
        if (empty($result['object'])) throw new HandlingException('invalid data');

        return EntityFactory::make($result['object'], $result);
    }

    function getResults(string $entityType = null)
    {
        if (!empty($entityType)) {
            $filterClass = EntityTypes::mapp()[$entityType] ?? null;

            return $this->results->filter(function ($v) use ($filterClass) {
                return $filterClass == $v::class;
            });
        }

        return $this->results;
    }

    function getHasMore()
    {
        return $this->has_more;
    }

    function getNextCursor()
    {
        return $this->next_cursor;
    }
}
