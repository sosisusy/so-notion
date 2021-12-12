<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\Checkbox;

class CheckboxProperty extends Property
{
    protected $checkbox;

    function fillProperties(array $data)
    {
        $this->fillCheckbox($data);
    }

    function fillCheckbox(array $data)
    {
        if (!isset($data['checkbox'])) return;

        if (is_array($data['checkbox'])) $this->checkbox = Checkbox::new($data['checkbox']);

        $this->checkbox = $data['checkbox'];
    }

    function getCheckbox()
    {
        return $this->checkbox;
    }

    function getContents()
    {
        if ($this->checkbox instanceof Checkbox) return $this->checkbox->toArray();

        return $this->checkbox;
    }
}
