<?php declare(strict_types = 1);

namespace Beagle\Application\Query\GetSuperHero;

final class GetSuperHeroQuery
{
    public function __construct (private string $heroId)
    {
    }

    public function heroId ():string
    {
        return $this->heroId;
    }
}
