<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\Formula;

class FormulaProperty extends Property
{
    protected ?Formula $formula;

    function getFormula()
    {
        return $this->formula;
    }

    function getContents()
    {
        if (empty($this->formula)) return null;

        return $this->formula->toArray();
    }
}
