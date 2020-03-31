<?php declare(strict_types=1);

namespace App\FruitStore\Domain\Sales;

interface OrderRepositoryInterface
{
    /**
     * @return Order[]
     */
    public function getAll(): iterable;
}
