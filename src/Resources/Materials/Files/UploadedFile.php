<?php

namespace SoNotion\Resources\Materials\Files;

use SoNotion\Resources\Materials\Files\Items\Uploaded;

class UploadedFile extends File
{
    protected Uploaded $file;

    function getFile()
    {
        return $this->file;
    }

    function getUrl(): string
    {
        return $this->file->getUrl();
    }
}
