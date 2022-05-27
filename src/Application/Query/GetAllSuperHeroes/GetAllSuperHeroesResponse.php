<?php declare(strict_types=1);

namespace Beagle\Application\Query\GetAllSuperHeroes;

use Beagle\Domain\SuperHero;
use Beagle\Domain\SuperHeroCollection;

final class GetAllSuperHeroesResponse
{
    public function __construct(private SuperHeroCollection $superHeroCollection)
    {}

    /** @return SuperHero[] */
    public function toArray(): array
    {
        $superHeroes = [];

        foreach ($this->superHeroCollection->superHeroes() as $superHero) {
            $superHeroes[] = [
                "id" => $superHero->id()->value(),
                "name" => $superHero->name()->value(),
                "description" => $superHero->description()->value(),
                "is_avenger" => $superHero->isAvenger(),
            ];
        }

        return $superHeroes;
    }
}
