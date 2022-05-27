<?php declare(strict_types = 1);

namespace Beagle\Application\Query\GetSuperHero;

use Beagle\Domain\SuperHero;

final class GetSuperHeroResponse
{
    public function __construct(private SuperHero $superHero)
    {
    }

    public function toArray():array
    {
        return [
            "hero_id" => $this->superHero->id()->value(),
            "hero_name" => $this->superHero->name()->value(),
            "hero_description" => $this->superHero->description()->value(),
            "is_avenger" => $this->superHero->isAvenger(),
        ];
    }
}
