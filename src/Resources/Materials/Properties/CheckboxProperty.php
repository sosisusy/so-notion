<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\Checkbox;

class CheckboxProperty extends Property
{
    protected Checkbox $checkbox;

    function getCheckbox()
    {
        return $this->checkbox;
    }
}
