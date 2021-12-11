<?php

namespace SoNotion\Resources\Lists;

use SoNotion\Resources\Entities\Database;

class DatabaseList extends EntityList
{

    function fillProperties(array $data)
    {
        parent::fillProperties($data);

        $this->fillResults($data);
    }

    function fillResults(array $data)
    {
        if (empty($data["results"])) return;

        $this->results = [];

        foreach ($data["results"] as $k => $result) $this->results[$k] = new Database($result);
    }
}
