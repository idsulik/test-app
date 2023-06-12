<?php

namespace App\Handler\Image;

use App\Repository\ImageFindAllCriteria;
use App\Repository\ImageRepositoryInterface;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ImageListHandler implements RequestHandlerInterface
{
    public function __construct(
        private ImageRepositoryInterface $imageRepository,
    ) {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $name = $request->getQueryParams()['name'] ?? null;
        $discountPercentage = $request->getQueryParams()['discount_percentage'] ?? null;

        $images = $this->imageRepository->findAllByCriteria(new ImageFindAllCriteria(
            name: $name,
            discountPercentage: $discountPercentage,
        ));

        return new JsonResponse($images);
    }
}