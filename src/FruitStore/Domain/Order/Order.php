<?php declare(strict_types=1);

namespace App\FruitStore\Domain\Order;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

final class Order
{
    private OrderId $id;
    private DateTime $date;
    private string $status;

    /**
     * @var OrderItem[]
     */
    private Collection $items;

    public function __construct(OrderId $id, DateTime $date)
    {
        $this->items = new ArrayCollection();
    }

    public function id(): OrderId
    {
        return $this->id;
    }

    public function date(): DateTime
    {
        return $this->date;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function items(): Collection
    {
        return $this->items;
    }

    public function addItem(OrderItem $orderItem): void
    {
        if ($this->items->contains($orderItem)) {
            return;
        }

        $this->items->add($orderItem);
    }

    public function removeItem(OrderItem $orderItem): void
    {
        if (!$this->items->contains($orderItem)) {
            return;
        }

        $this->items->removeElement($orderItem);
    }
}
