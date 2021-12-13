<?php

namespace SoNotion\Endpoints;

use Illuminate\Support\Collection;
use InvalidArgumentException;
use SoNotion\Entities\EntityCollection;
use SoNotion\Enum\TimestampTypes;
use SoNotion\Query\Sortting;
use SoNotion\SoNotion;

class Search extends Endpoint
{
    protected ?string $only = null;
    protected ?string $query = null;
    protected ?Sortting $sort = null;

    protected $allowedFilter = ['page', 'database'];

    function __construct(SoNotion $notion)
    {
        parent::__construct($notion);

        $this->filters = new Collection();
    }

    /**
     * 정렬
     */
    function sortBy(string $direction)
    {
        $this->sort = new Sortting(null, TimestampTypes::LAST_EDITED_TIME, $direction);

        return $this;
    }

    /**
     * 페이지 타이틀 조회
     */
    function where(string $query)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * 조회 대상 설정
     * 
     * @param   string  $only   page or database
     */
    function only(string $only)
    {
        if (!in_array($only, $this->allowedFilter))
            throw new InvalidArgumentException("invalid filter type: a given {$only} is not allowed filter type");
        $this->only = $only;

        return $this;
    }

    /**
     * 조회
     */
    function get()
    {
        $path = "/search";
        $params = [];

        if (!is_null($this->query)) $params['query'] = $this->query;
        if (!empty($this->startCursor)) $params['start_cursor'] = $this->startCursor;
        if (!empty($this->pageSize)) $params['page_size'] = $this->pageSize;
        if (!is_null($this->sort)) $params['sort'] = $this->sort->toArray();
        if (!is_null($this->only) && in_array($this->only, $this->allowedFilter)) {
            $params['filter'] = ['value' => $this->only, 'property' => 'object'];
        }

        $res = $this->notion->getConnection()->post($path, $params);

        return EntityCollection::fromJson($res->body());
    }
}
