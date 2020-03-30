<?php declare(strict_types=1);

namespace App\FruitStore\Domain\Sales;

use App\FruitStore\Domain\Common\Price;
use App\FruitStore\Domain\Product\Product;

final class OrderItem
{
    private OrderItemId $id;
    private Order $order;
    private int $quantity;
    private Product $product;

    private function __construct(OrderItemId $id, Order $order, Product $product, int $quantity)
    {
        $this->id = $id;
        $this->order = $order;
        $this->quantity = $quantity;
        $this->product = $product;
    }

    public static function fromProductAndQuantity(OrderItemId $id, Order $order, Product $product, int $quantity): self
    {
        return new self($id, $order, $product, $quantity);
    }

    public function id(): OrderItemId
    {
        return $this->id;
    }

    public function order(): Order
    {
        return $this->order;
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
