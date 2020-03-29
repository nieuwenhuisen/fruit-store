<?php declare(strict_types=1);

namespace App\FruitStore\Domain\Common;

final class Price
{
    private int $cents;
    private Currency $currency;

    private function __construct(int $cents, Currency $currency)
    {
        if ($cents < 0) {
            throw new \InvalidArgumentException(sprintf('Given amount %d must be bigger then 0!', $cents));
        }

        $this->cents = $cents;
        $this->currency = $currency;
    }

    public static function fromCents(int $cents, Currency $currency): self
    {
        return new self($cents, $currency);
    }

    public function cents(): int
    {
        return $this->cents;
    }

    public function currency(): Currency
    {
        return $this->currency;
    }

    public function equals(Price $price): bool
    {
        return (
            $price->cents === $this->cents &&
            $price->currency()->equals($this->currency)
        );
    }
}
