<?php

declare(strict_types=1);

use File\Reader\FileReaderFactory;
use File\Writer\FileWriterFactory;
use Laminas\ServiceManager\AbstractFactory\ReflectionBasedAbstractFactory;

return [
    'factories' => [
        FileReaderFactory::class => ReflectionBasedAbstractFactory::class,
        FileWriterFactory::class => ReflectionBasedAbstractFactory::class,
    ],
];
