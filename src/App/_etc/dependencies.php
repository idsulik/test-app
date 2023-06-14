<?php

declare(strict_types=1);

use App\Command\ImportImagesCommand;
use App\Command\ImportImagesCommandFactory;
use App\Handler\HomePageHandler;
use App\Handler\Image\ImageListHandler;
use App\Repository\ImageRepository;
use App\Repository\ImageRepositoryFactory;
use App\Repository\ImageRepositoryInterface;
use Laminas\ServiceManager\AbstractFactory\ReflectionBasedAbstractFactory;

return [
    'aliases' => [
        ImageRepositoryInterface::class => ImageRepository::class,
    ],
    'factories' => [
        //commands
        ImportImagesCommand::class => ImportImagesCommandFactory::class,

        //repositories
        ImageRepository::class => ImageRepositoryFactory::class,

        //handlers
        HomePageHandler::class => ReflectionBasedAbstractFactory::class,
        ImageListHandler::class => ReflectionBasedAbstractFactory::class,
    ],
];
