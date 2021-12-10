<?php

namespace SoNotion\Resources\Materials\Files;

use SoNotion\Resources\Materials\Files\Items\External;

class ExternalFile extends File
{
    protected External $external;

    function getExternal()
    {
        return $this->external;
    }
}
