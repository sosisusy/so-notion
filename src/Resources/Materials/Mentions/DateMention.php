<?php

namespace SoNotion\Resources\Materials\Mentions;

use SoNotion\Resources\Materials\Properties\DateProperty;

class DateMention extends Mention
{
    protected DateProperty $date;

    function getDate()
    {
        return $this->date;
    }
}
