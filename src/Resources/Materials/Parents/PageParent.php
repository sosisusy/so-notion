<?php

namespace SoNotion\Resources\Materials\Parents;

class PageParent extends ParentObject
{
    protected string $page_id;

    function getPageId()
    {
        return $this->page_id;
    }
}
