<?php

namespace App\Repository;

class ImageFindAllCriteria
{
    public function __construct(
        private ?string $name,
        private ?int $discountPercentage,
    ) {
    }

    public function findName(): ?string
    {
        return $this->name;
    }

    public function findDiscountPercentage(): ?int
    {
        return $this->discountPercentage;
    }
}