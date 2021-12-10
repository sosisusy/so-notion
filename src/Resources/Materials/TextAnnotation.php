<?php

namespace SoNotion\Resources\Materials;

use SoNotion\Resources\Resource;

class TextAnnotation extends Resource
{
    protected bool $bold;
    protected bool $italic;
    protected bool $strikethrough;
    protected bool $underline;
    protected bool $code;
    protected string $color;

    function getBold()
    {
        return $this->bold;
    }

    function getItalic()
    {
        return $this->italic;
    }

    function getStrikethrough()
    {
        return $this->strikethrough;
    }

    function getUnderline()
    {
        return $this->underline;
    }

    function getColor()
    {
        return $this->color;
    }
}
