<?php

namespace SoNotion\Resources\Materials;

use SoNotion\Resources\Resource;

class RichText extends Resource
{
    protected string $plain_text = '';
    protected ?string $href = null;
    protected ?TextAnnotation $annotations = null;
    protected string $type;

    function getPlainText()
    {
        return $this->plain_text;
    }

    function getHref()
    {
        return $this->href;
    }

    function getAnnotations()
    {
        return $this->annotations;
    }

    function getType()
    {
        return $this->type;
    }
}
