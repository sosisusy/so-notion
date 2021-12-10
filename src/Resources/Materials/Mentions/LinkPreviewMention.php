<?php

namespace SoNotion\Resources\Materials\Mentions;

use SoNotion\Resources\Materials\Url;

class LinkPreviewMention extends Mention
{
    protected Url $link_preview;

    function getLinkPreview()
    {
        return $this->link_preview;
    }
}
