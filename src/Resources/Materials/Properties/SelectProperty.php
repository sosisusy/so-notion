<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\SelectOption;
use SoNotion\Resources\Resource;

class SelectProperty extends Property
{
    protected ?array $options = null;
    protected ?SelectOption $select = null;

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

    function getOptions()
    {
        return $this->options;
    }

    function getSelect()
    {
        return $this->select;
    }

    function getContents()
    {

        if (!empty($this->options)) {
            $results = [];

            foreach ($this->options as $k => $option) {
                if ($option instanceof Resource) $results[$k] = $option->toArray();
            }

            return $results;
        }

        if (!empty($this->select)) {
            return $this->select->toArray();
        }

        return null;
    }
}
