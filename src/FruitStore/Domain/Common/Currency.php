<?php declare(strict_types=1);

namespace App\FruitStore\Domain\Common;

use InvalidArgumentException;

final class Currency
{
    private string $code;

    private function __construct(string $code)
    {
        if (!preg_match('/^[A-Z]{3}$/', $code)) {
            throw new InvalidArgumentException('Invalid currency code!');
        }

        $this->code = $code;
    }

    public static function fromString(string $code): self
    {
        return new self($code);
    }

    public static function EUR(): self
    {
        return new self('EUR');
    }

    public function equals(Currency $currency): bool
    {
        return $currency->code === $this->code;
    }

    public function __toString(): string
    {
        return $this->code;
    }
}
