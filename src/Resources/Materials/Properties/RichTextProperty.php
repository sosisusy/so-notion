<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\RichText;

class RichTextProperty extends Property
{
    protected ?RichText $rich_text;

    function getRichText()
    {
        return $this->rich_text;
    }
}
