<?php

namespace File\Reader;

use SplFileInfo;

class JsonReader implements ReaderInterface
{
    public function __construct(
        private SplFileInfo $splFileInfo,
    ) {
    }

    public function read(): array
    {
        $fileObject = $this->splFileInfo->openFile('r');
        $json = $fileObject->fread($fileObject->getSize());

        return json_decode($json, true, JSON_THROW_ON_ERROR);
    }
}