<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\SelectOption;

class SelectProperty extends Property
{
    protected ?array $options;

    function fillProperties(array $data)
    {
        parent::fillProperties($data);

        $this->fillOptions($data);
    }

    function fillOptions(array $data)
    {
        if (empty($data["options"])) return;

        $this->options = [];

        foreach ($data["options"] as $k => $item) $this->options[$k] = SelectOption::new($item);
    }

    function getNumber()
    {
        return $this->number;
    }
}
