<?php declare(strict_types = 1);

namespace Beagle\Application\Query\GetSuperHero;

use Beagle\Domain\Errors\InvalidDescription;
use Beagle\Domain\Errors\InvalidName;
use Beagle\Domain\Errors\SuperHeroNotFound;
use Beagle\Domain\Interfaces\SuperHeroRepository;
use Beagle\Domain\ValueObjects\SuperHeroId;

final class GetSuperHero
{
    public function __construct(private SuperHeroRepository $superHeroRepository)
    {
    }

    /**
     * @throws InvalidName
     * @throws InvalidDescription
     * @throws SuperHeroNotFound
     */
    public function handler(GetSuperHeroQuery $query):GetSuperHeroResponse
    {
        $superHero = $this->superHeroRepository->find(SuperHeroId::fromString($query->heroId()));
        return new GetSuperHeroResponse($superHero);
    }
}
