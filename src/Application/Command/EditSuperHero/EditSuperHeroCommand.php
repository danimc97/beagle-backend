<?php declare(strict_types=1);

namespace Beagle\Application\Command\EditSuperHero;

final class EditSuperHeroCommand
{
    public function __construct(
        private string $superHeroId,
        private string $superHeroName,
        private string $superHeroDescription,
        private bool $isAvenger,
    )
    {}

    public function superHeroId(): string
    {
        return $this->superHeroId;
    }

    public function superHeroName(): string
    {
        return $this->superHeroName;
    }

    public function superHeroDescription(): string
    {
        return $this->superHeroDescription;
    }

    public function isAvenger(): bool
    {
        return $this->isAvenger;
    }
}
