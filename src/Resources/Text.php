<?php

namespace SoNotion\Resources;

class Text extends Resource
{
    protected string $content;

    protected ?Link $link;

    function __construct(array $data)
    {
        $this->content = $data["content"];
        $this->link = !empty($data["link"]) ? Link::new($data["link"]) : null;
    }

    function getContent()
    {
        return $this->content;
    }

    function getLink()
    {
        return $this->link;
    }
}
