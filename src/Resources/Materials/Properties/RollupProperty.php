<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\Rollup;

class RollupProperty extends Property
{
    protected ?Rollup $rollup;

    function getRollup()
    {
        return $this->rollup;
    }

    function getContents()
    {
        if (empty($this->rollup)) return null;

        return $this->rollup->toArray();
    }
}
