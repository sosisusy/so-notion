<?php

namespace SoNotion\Endpoints;

use Illuminate\Support\Collection;
use SoNotion\Entities\EntityCollection;
use SoNotion\Query\Filter;
use SoNotion\Query\Sortting;
use SoNotion\SoNotion;

class Database extends Endpoint
{
    protected string $dbId;
    protected Collection $filters;
    protected Collection $sorts;

    function __construct(SoNotion $notion, string $dbId)
    {
        parent::__construct($notion);

        $this->dbId = $dbId;
        $this->filters = new Collection();
        $this->sorts = new Collection();
    }

    /**
     * 필터 추가
     */
    function addFilter(string $filterType, string $property, array $where)
    {
        $this->filters->add(new Filter($filterType, $property, $where));

        return $this;
    }

    /**
     * 정렬 추가
     */
    function addSort(string $property, ?string $timestamp = null, ?string $direction = null)
    {
        $this->sorts->add(new Sortting($property, $timestamp, $direction));

        return $this;
    }

    function filterQuery()
    {
        $results = [];

        foreach ($this->filters->toArray() as $filter) {
            if ($filter instanceof Filter) $results[] = $filter->toArray();
        }

        return $results;
    }

    function sortQuery()
    {
        $results = [];

        foreach ($this->sorts->toArray() as $sortting) {
            if ($sortting instanceof Sortting) $results[] = $sortting->toArray();
        }

        return $results;
    }

    /**
     * 조회
     */
    function get()
    {
        $path = "/databases/{$this->dbId}/query";
        $params = [];

        if (!empty($this->startCursor)) $params['start_cursor'] = $this->startCursor;
        if (!empty($this->pageSize)) $params['page_size'] = $this->pageSize;
        if ($this->filters->isNotEmpty()) $params['filter']['or'] = $this->filterQuery();
        if ($this->sorts->isNotEmpty()) $params['sorts'] = $this->sortQuery();

        $res = $this->notion->getConnection()->post($path, $params);

        return EntityCollection::fromJson($res->body());
    }
}
