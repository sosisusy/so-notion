<?php

namespace SoNotion\Resources;

use SoNotion\Resources\Database;
use SoNotion\SoNotion;

/**
 * 리스트 객체
 */
class Collection extends Resource
{
    /**
     * 항목: ["list"]
     */
    protected string $object;

    protected array $results;

    protected ?string $next_cursor = null;

    protected bool $has_more;

    function __construct(array $data)
    {
        $this->object = $data["object"];
        $this->results = $this->makeResults($data["results"]);
        $this->next_cursor = $data["next_cursor"] ?? null;
        $this->has_more = $data["has_more"];
    }

    function makeResults(array $children)
    {
        $items = [];

        foreach ($children as $child) {

            switch ($child["object"]) {
                case SoNotion::DATABASE:
                    $items[] = Database::new($child);
                    break;
                case SoNotion::USER:
                    $items[] = User::new($child);
                    break;
                case SoNotion::PAGE:
                    break;
                case SoNotion::BLOCK:
                    break;
            }
        }

        return $items;
    }

    function getObject()
    {
        return $this->object;
    }

    function getResults()
    {
        return $this->results;
    }

    function getNextCursor()
    {
        return $this->next_cursor;
    }

    function getHasMore()
    {
        return $this->has_more;
    }
}
