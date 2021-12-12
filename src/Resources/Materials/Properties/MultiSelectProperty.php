<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\SelectOption;
use SoNotion\Resources\Resource;

class MultiSelectProperty extends Property
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

    function getContents()
    {
        $results = [];

        if (empty($this->options)) return null;

        foreach ($this->options as $k => $option) {
            if ($option instanceof Resource) $results[$k] = $option->toArray();
        }

        return $results;
    }
}
