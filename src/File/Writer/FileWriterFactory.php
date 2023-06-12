<?php

namespace File\Writer;

use File\Exception\NotSupportedFileExtensionException;
use SplFileInfo;

class FileWriterFactory
{
    public function create(SplFileInfo $splFileInfo): WriterInterface
    {
        $fileExtension = $splFileInfo->getExtension();

        return match ($fileExtension) {
            'json' => new JsonWriter($splFileInfo),
            default => throw new NotSupportedFileExtensionException($fileExtension),
        };
    }
}