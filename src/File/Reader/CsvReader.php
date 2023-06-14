<?php

namespace File\Reader;

use SplFileInfo;

class CsvReader implements ReaderInterface
{
    public function __construct(
        private SplFileInfo $splFileInfo,
    ) {
    }

    //we can use generator here, but need to figure out how to be with json, because we can't read it line by line
    public function read(): array
    {
        $fileObject = $this->splFileInfo->openFile('r');

        //what if there is no headers?
        $titles = $fileObject->fgetcsv();

        $items = [];
        while ($row = $fileObject->fgetcsv()) {
            $items[] = array_combine($titles, $row);
        }

        return $items;
    }
}