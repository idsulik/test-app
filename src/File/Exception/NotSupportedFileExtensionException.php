<?php

namespace File\Exception;

use RuntimeException;

class NotSupportedFileExtensionException extends RuntimeException
{
    public function __construct(string $fileExtension)
    {
        parent::__construct('Not supported file extension: ' . $fileExtension);
    }
}