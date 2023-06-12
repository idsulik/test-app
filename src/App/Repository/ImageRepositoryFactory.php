<?php

declare(strict_types=1);

namespace App\Repository;

use App\Dto\ImageDto;
use File\Reader\FileReaderFactory;
use Psr\Container\ContainerInterface;
use SplFileInfo;

class ImageRepositoryFactory
{
    public function __invoke(ContainerInterface $container): ImageRepository
    {
        $dataFilePath = $container->get('config')['data_file'];
        /** @var FileReaderFactory $readerFactory */
        $readerFactory = $container->get(FileReaderFactory::class);
        $reader = $readerFactory->create(new SplFileInfo($dataFilePath));
        $images = $reader->read();

        $dtoList = [];
        foreach ($images as $image) {
            $dtoList[] = new ImageDto(
                $image['id'],
                $image['name'],
                $image['image'],
                $image['discount_percentage'],
            );
        }

        return new ImageRepository($dtoList);
    }
}
