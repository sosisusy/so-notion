<?php

namespace SoNotion\Resources\Materials\Files;

class UploadedFile extends File
{
    protected Uploaded $file;

    function getFile()
    {
        return $this->file;
    }
}
