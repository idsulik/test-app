<?php

namespace App\Repository;

use App\Dto\ImageDto;

interface ImageRepositoryInterface
{
    /** @return ImageDto[] */
    public function findAllByCriteria(ImageFindAllCriteria $imageFindAllCriteria): array;
}