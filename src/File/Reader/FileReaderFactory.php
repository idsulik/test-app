<?php

namespace File\Reader;

use File\Exception\NotSupportedFileExtensionException;
use SplFileInfo;

class FileReaderFactory
{
    public function create(SplFileInfo $splFileInfo): ReaderInterface
    {
        $fileExtension = $splFileInfo->getExtension();

        return match ($fileExtension) {
            'csv' => new CsvReader($splFileInfo),
            'json' => new JsonReader($splFileInfo),
            default => throw new NotSupportedFileExtensionException($fileExtension),
        };
    }
}