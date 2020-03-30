<?php declare(strict_types=1);

namespace App\FruitStore\Domain\Order;

use App\FruitStore\Domain\Common\Price;
use App\FruitStore\Domain\Product\Product;

final class OrderItem
{
    private OrderItemId $id;
    private int $quantity;
    private Product $product;

    private function __construct(OrderItemId $id, int $quantity, Product $product)
    {
        $this->id = $id;
        $this->quantity = $quantity;
        $this->product = $product;
    }

    public static function fromQuantityAndProduct(OrderItemId $id, int $quantity, Product $product): self
    {
        return new self($id,  $quantity, $product);
    }

    public function id(): OrderItemId
    {
        return $this->id;
    }

    public function quantity(): int
    {
        return $this->quantity;
    }

    public function product(): Product
    {
        return $this->product;
    }

    public function total(): Price
    {
        return Price::fromCents(
            $this->product->price()->cents() * $this->quantity,
            $this->product->price()->currency()
        );
    }
}
