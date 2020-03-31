<?php declare(strict_types=1);

namespace App\FruitStore\Infrastructure\Persistence\Doctrine\Repository;

use App\FruitStore\Domain\Sales\Order;
use App\FruitStore\Domain\Sales\OrderRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class DoctrineSalesOrderRepository extends ServiceEntityRepository implements OrderRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    public function getAll(): iterable
    {
        return $this->findAll();
    }
}
