<?php declare(strict_types=1);

namespace Beagle\Application\Command\DeleteSuperHero;

use Beagle\Domain\Errors\InvalidDescription;
use Beagle\Domain\Errors\InvalidName;
use Beagle\Domain\Errors\SuperHeroNotFound;
use Beagle\Domain\Interfaces\SuperHeroRepository;
use Beagle\Domain\ValueObjects\SuperHeroId;

final class DeleteSuperHero
{
    public function __construct(private SuperHeroRepository $superHeroRepository)
    {}

    /**
     * @throws InvalidDescription
     * @throws InvalidName
     * @throws SuperHeroNotFound
     */
    public function handler(DeleteSuperHeroCommand $command): void
    {
        $superHeroId = SuperHeroId::fromString($command->superHeroId());

        $this->superHeroRepository->find($superHeroId);

        $this->superHeroRepository->delete($superHeroId);
    }
}
