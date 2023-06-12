<?php

namespace File\Writer;

interface WriterInterface
{
    public function write(array $data): void;
}