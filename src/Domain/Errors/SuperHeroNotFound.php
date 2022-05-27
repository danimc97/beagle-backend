<?php declare(strict_types=1);

namespace Beagle\Domain\Errors;

final class SuperHeroNotFound extends \Exception
{
    private const HERO_NOT_FOUND = "The hero %s not exists";

    public static function byId(string $superHeroId): self
    {
        return new self(\sprintf(self::HERO_NOT_FOUND, $superHeroId));
    }
}
