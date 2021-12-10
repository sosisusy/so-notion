<?php

namespace SoNotion\Resources\Materials\Mentions;

use SoNotion\Resources\Entities\Page;

class PageMention extends Mention
{
    protected Page $page;

    function getPage()
    {
        return $this->page;
    }
}
