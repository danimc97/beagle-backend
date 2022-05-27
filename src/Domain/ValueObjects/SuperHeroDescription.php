<?php declare(strict_types=1);

namespace Beagle\Domain\ValueObjects;

use Beagle\Domain\Errors\InvalidDescription;

final class SuperHeroDescription
{
    private const MIN_LENGTH = 10;

    /** @throws InvalidDescription */
    public function __construct(private string $value)
    {
        if(\strlen($this->value) < self::MIN_LENGTH)
        {
            throw InvalidDescription::byLength(self::MIN_LENGTH);
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
