<?php declare(strict_types=1);

namespace Beagle\Domain\ValueObjects;

use Beagle\Domain\Errors\InvalidName;

final class SuperHeroName
{
    private const MIN_LENGTH = 3;

    /** @throws InvalidName */
    public function __construct(private string $value)
    {
        if(\strlen($this->value) < self::MIN_LENGTH)
        {
            throw InvalidName::byLength(self::MIN_LENGTH);
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
