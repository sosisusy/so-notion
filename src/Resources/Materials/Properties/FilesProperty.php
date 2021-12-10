<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\Files;

class FilesProperty extends Property
{
    protected Files $files;

    function getFiles()
    {
        return $this->files;
    }
}
