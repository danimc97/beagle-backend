<?php

namespace Beagle\Domain\Interfaces;

use Beagle\Domain\Errors\InvalidDescription;
use Beagle\Domain\Errors\InvalidName;
use Beagle\Domain\Errors\SuperHeroNotFound;
use Beagle\Domain\SuperHero;
use Beagle\Domain\SuperHeroCollection;
use Beagle\Domain\ValueObjects\SuperHeroId;

interface SuperHeroRepository
{
    public function save(SuperHero $superHero):void;

    /**
     * @throws InvalidDescription
     * @throws InvalidName
     */
    public function all():SuperHeroCollection;

    /**
     * @throws InvalidName
     * @throws InvalidDescription
     * @throws SuperHeroNotFound
     */
    public function find(SuperHeroId $superHeroId):SuperHero;

    public function delete(SuperHeroId $superHeroId):void;
}
