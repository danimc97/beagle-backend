<?php declare(strict_types = 1);

namespace Beagle\Domain;

final class SuperHeroCollection
{
    /** @var SuperHero[] */
    private array $superHeroes;

    public function __construct()
    {
    }

    public function add(SuperHero $superHero):void
    {
        $this->superHeroes[] = $superHero;
    }

    /** @return SuperHero[] */
    public function superHeroes():array
    {
        return $this->superHeroes;
    }
}
