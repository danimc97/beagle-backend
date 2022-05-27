<?php declare(strict_types=1);

namespace Beagle\Domain\Errors;

final class InvalidDescription extends \Exception
{
    private const INVALID_DESCRIPTION = "The description must have %s characters";

    public static function byLength(int $minLength): self
    {
        return new self(\sprintf(self::INVALID_DESCRIPTION, $minLength));
    }
}
