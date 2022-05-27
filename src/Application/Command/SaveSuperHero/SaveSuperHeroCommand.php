<?php declare(strict_types=1);

namespace Beagle\Application\Command\SaveSuperHero;

final class SaveSuperHeroCommand
{
    public function __construct(
        private string $heroId,
        private string $heroName,
        private string $heroDescription,
        private bool $isAvenger,
    )
    {}

    public function heroId(): string
    {
        return $this->heroId;
    }

    public function heroName(): string
    {
        return $this->heroName;
    }

    public function heroDescription(): string
    {
        return $this->heroDescription;
    }

    public function isAvenger(): bool
    {
        return $this->isAvenger;
    }
}
