<?php

namespace SoNotion\Endpoints\Builders;

use SoNotion\Endpoints\Endpoint;
use SoNotion\Query\Filters\Filter;
use SoNotion\Query\Filters\FilterFactory;
use SoNotion\Query\Sort;
use SoNotion\Resources\Lists\PageList;
use SoNotion\SoNotion;

class DatabaseQueryBuilder extends Endpoint implements Builder
{
    protected string $dbId;
    protected array $filter;
    protected array $sorts;
    protected ?string $cursor = null;
    protected ?int $pageSize = null;

    function __construct(SoNotion $notion, string $dbId)
    {
        parent::__construct($notion);

        $this->dbId = $dbId;
        $this->filter = [];
        $this->sorts = [];
    }

    function addFilter(string $filterType, string $property, array $params)
    {
        $this->filter[] = FilterFactory::make($filterType, $property, $params);

        return $this;
    }

    function addSort(string $property, ?string $timestamp = null, ?string $direction = null)
    {
        $this->sorts[] = new Sort($property, $timestamp, $direction);

        return $this;
    }

    private function filterQuery()
    {
        $results = [];

        foreach ($this->filter as $filter) {
            if ($filter instanceof Filter) $results[] = $filter->toArray();
        }

        return $results;
    }

    private function sortsQuery()
    {
        $results = [];

        foreach ($this->sorts as $sort) {
            if ($sort instanceof Sort) $results[] = $sort->toArray();
        }

        return $results;
    }

    protected function makeParams(): array
    {
        $params = parent::makeParams();

        if (!empty($this->filter)) $params['filter']['or'] = $this->filterQuery();
        if (!empty($this->sorts)) $params['sorts'] = $this->sortsQuery();

        return $params;
    }

    function get(): PageList
    {
        $path = "/databases/{$this->dbId}/query";

        $res = $this->notion->post($path, $this->makeParams());
        $body = json_decode($res->body(), 1);

        return new PageList($body);
    }
}
