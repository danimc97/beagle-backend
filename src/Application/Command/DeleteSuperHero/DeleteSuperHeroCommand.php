<?php declare(strict_types=1);

namespace Beagle\Application\Command\DeleteSuperHero;

final class DeleteSuperHeroCommand
{
    public function __construct(private string $superHeroId)
    {}

    public function superHeroId(): string
    {
        return $this->superHeroId;
    }
}
