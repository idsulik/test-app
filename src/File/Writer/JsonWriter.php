<?php

namespace File\Writer;

use SplFileInfo;

class JsonWriter implements WriterInterface
{
    public function __construct(
        private SplFileInfo $splFileInfo
    ) {
    }

    public function write(array $data): void
    {
        $json = json_encode($data, JSON_THROW_ON_ERROR | JSON_NUMERIC_CHECK);
        $this->splFileInfo->openFile('w')->fwrite($json);
    }
}