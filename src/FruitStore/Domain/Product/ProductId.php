<?php declare(strict_types=1);

namespace App\FruitStore\Domain\Product;

use Ramsey\Uuid\Uuid;

class ProductId
{
    private string $id;

    private function __construct(string $id = null)
    {
        $this->id = $id ?: Uuid::uuid4()->toString();
    }

    public static function create(string $id = null): self
    {
        return new self($id);
    }

    public function __toString()
    {
        return $this->id;
    }
}
