<?php declare(strict_types=1);

namespace App\FruitStore\Domain\Sales;

use App\FruitStore\Domain\Product\Product;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

final class Order
{
    public const STATUS_CREATED = 'created';
    public const STATUS_PAID = 'paid';
    public const STATUS_PICKED = 'picked';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_SHIPPED = 'shipped';
    public const STATUS_COMPLETED = 'completed';

    private string $id;
    private DateTime $createdAt;
    private string $status;

    /**
     * @var OrderItem[]
     */
    private Collection $items;

    private function __construct(OrderId $id, DateTime $createdAt)
    {
        $this->id = (string) $id;
        $this->createdAt = $createdAt;
        $this->status = self::STATUS_CREATED;
        $this->items = new ArrayCollection();
    }

    public static function create(): self
    {
        return new self(
            OrderId::create(),
            new DateTime()
        );
    }

    public function id(): string
    {
        return $this->id;
    }

    public function createdAt(): DateTime
    {
        return $this->createdAt;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function items(): Collection
    {
        return $this->items;
    }

    public function addItem(Product $product, int $quantity): OrderItem
    {
        $orderItem = OrderItem::fromProductAndQuantity(
            OrderItemId::create(),
            $this,
            $product,
            $quantity
        );

        $this->items->add($orderItem);

        return $orderItem;
    }

    public function removeItem(OrderItem $orderItem): void
    {
        if (!$this->items->contains($orderItem)) {
            return;
        }

        $this->items->removeElement($orderItem);
    }
}
