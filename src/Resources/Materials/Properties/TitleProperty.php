<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\Title;

class TitleProperty extends Property
{
    protected ?Title $title;

    function getTitle()
    {
        return $this->title;
    }
}
