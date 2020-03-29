<?php

namespace App\FruitStore\Domain\Product;

use App\FruitStore\Domain\Common\Price;

class Product
{
    private ProductId $id;
    private string $name;
    private Price $price;

    private function __construct(ProductId $productId, string $name, Price $price)
    {
        $this->id = $productId;
        $this->name = $name;
        $this->price = $price;
    }

    public static function fromNameAndPrice(ProductId $productId, string $name, Price $price): self
    {
        return new self($productId, $name, $price);
    }

    public function id(): ProductId
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function price(): Price
    {
        return $this->price;
    }
}
