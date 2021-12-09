<?php

namespace SoNotion\Resources;

/**
 * 텍스트 스타일 객체
 */
class TextAnnotation extends Resource
{

    protected bool $bold;

    protected bool $italic;

    protected bool $strikethrough;

    protected bool $underline;

    protected bool $code;

    protected string $color;

    function __construct(array $data)
    {
        $this->bold = $data["bold"];
        $this->italic = $data["italic"];
        $this->strikethrough = $data["strikethrough"];
        $this->underline = $data["underline"];
        $this->code = $data["code"];
        $this->color = $data["color"];
    }

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

    function getCode()
    {
        return $this->code;
    }

    function getColor()
    {
        return $this->color;
    }
}
