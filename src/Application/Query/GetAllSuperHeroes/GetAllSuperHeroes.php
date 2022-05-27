<?php declare(strict_types=1);

namespace Beagle\Application\Query\GetAllSuperHeroes;

use Beagle\Domain\Errors\InvalidDescription;
use Beagle\Domain\Errors\InvalidName;
use Beagle\Domain\Interfaces\SuperHeroRepository;

final class GetAllSuperHeroes
{
    public function __construct(private SuperHeroRepository $superHeroRepository)
    {}

    /**
     * @throws InvalidDescription
     * @throws InvalidName
     */
    public function handler(): GetAllSuperHeroesResponse
    {
        $superHeroes = $this->superHeroRepository->all();
        return new GetAllSuperHeroesResponse($superHeroes);
    }
}
