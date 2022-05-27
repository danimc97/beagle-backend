<?php declare(strict_types=1);

namespace Beagle\Domain\Errors;

final class InvalidName extends \Exception
{

    private const INVALID_NAME = "The name must have %s characters";

    public static function byLength(int $minLength): self
    {
        return new self(\sprintf(self::INVALID_NAME, $minLength));
    }
}
