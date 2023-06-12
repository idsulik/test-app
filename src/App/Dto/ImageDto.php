<?php

namespace App\Dto;

use JsonSerializable;

class ImageDto implements JsonSerializable
{
    public function __construct(
        private int $id,
        private string $name,
        private string $imageUrl,
        private int $discountPercentage,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function getDiscountPercentage(): int
    {
        return $this->discountPercentage;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'image' => $this->getImageUrl(),
            'discount_percentage' => $this->getDiscountPercentage(),
        ];
    }
}