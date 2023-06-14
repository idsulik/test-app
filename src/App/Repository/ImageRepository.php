<?php

namespace App\Repository;

use App\Dto\ImageDto;

class ImageRepository implements ImageRepositoryInterface
{
    public function __construct(
        /** @var ImageDto[] */
        private array $images,
    ) {
    }

    /** @inheritDoc */
    public function findAllByCriteria(ImageFindAllCriteria $imageFindAllCriteria): array
    {
        $images = $this->images;

        return $this->filterByCriteria($images, $imageFindAllCriteria);
    }

    private function filterByCriteria(array $images, ImageFindAllCriteria $imageFindAllCriteria): array
    {
        foreach ($images as $id => $image) {
            if (
                $imageFindAllCriteria->findName() !== null
                &&
                $image->getName() !== $imageFindAllCriteria->findName()
            ) {
                unset($images[$id]);
            }

            if (
                $imageFindAllCriteria->findDiscountPercentage() !== null
                &&
                $image->getDiscountPercentage() !== $imageFindAllCriteria->findDiscountPercentage()
            ) {
                unset($images[$id]);
            }
        }

        return $images;
    }
}