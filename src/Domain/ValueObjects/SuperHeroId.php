<?php declare(strict_types=1);

namespace Beagle\Domain\ValueObjects;

use Symfony\Component\Uid\Uuid;

final class SuperHeroId extends Uuid
{
    public function value(): string
    {
        return $this->toBase58();
    }
}
