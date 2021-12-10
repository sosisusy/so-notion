<?php

namespace SoNotion\Resources\Materials\Emoji;

use SoNotion\Resources\Resource;

class Emoji extends Resource
{
    protected string $type;
    protected string $emoji;

    function getType()
    {
        return $this->type;
    }

    function getEmoji()
    {
        return $this->emoji;
    }
}
