<?php

namespace App\Command;

use File\Reader\FileReaderFactory;
use File\Writer\FileWriterFactory;
use Psr\Container\ContainerInterface;
use SplFileInfo;
use Symfony\Component\Console\Command\Command;

class ImportImagesCommandFactory extends Command
{
    public function __invoke(ContainerInterface $container): ImportImagesCommand
    {
        $dataFilePath = $container->get('config')['data_file'];

        return new ImportImagesCommand(
            $container->get(FileReaderFactory::class),
            $container->get(FileWriterFactory::class),
            new SplFileInfo($dataFilePath),
        );
    }
}