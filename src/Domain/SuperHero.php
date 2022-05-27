<?php declare(strict_types = 1);

namespace Beagle\Domain;

use Beagle\Domain\ValueObjects\SuperHeroDescription;
use Beagle\Domain\ValueObjects\SuperHeroId;
use Beagle\Domain\ValueObjects\SuperHeroName;

final class SuperHero
{
    public function __construct(
        private SuperHeroId $id,
        private SuperHeroName $name,
        private SuperHeroDescription $description,
        private bool $isAvenger
    )
    {
    }

    public function id():SuperHeroId
    {
        return $this->id;
    }

    public function name():SuperHeroName
    {
        return $this->name;
    }

    public function description():SuperHeroDescription
    {
        return $this->description;
    }

    public function isAvenger():bool
    {
        return $this->isAvenger;
    }
}
