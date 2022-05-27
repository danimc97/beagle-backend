<?php declare(strict_types=1);

namespace Beagle\Application\Command\EditSuperHero;

use Beagle\Domain\Errors\InvalidDescription;
use Beagle\Domain\Errors\InvalidName;
use Beagle\Domain\Errors\SuperHeroNotFound;
use Beagle\Domain\Interfaces\SuperHeroRepository;
use Beagle\Domain\SuperHero;
use Beagle\Domain\ValueObjects\SuperHeroDescription;
use Beagle\Domain\ValueObjects\SuperHeroId;
use Beagle\Domain\ValueObjects\SuperHeroName;

final class EditSuperHero
{
    public function __construct(private SuperHeroRepository $superHeroRepository)
    {}

    /**
     * @throws InvalidDescription
     * @throws InvalidName
     * @throws SuperHeroNotFound
     */
    public function handler(EditSuperHeroCommand $command): void
    {
        $superHeroId = SuperHeroId::fromString($command->superHeroId());

        $this->superHeroRepository->find($superHeroId);

        $this->superHeroRepository->save(
            new SuperHero(
                $superHeroId,
                new SuperHeroName($command->superHeroName()),
                new SuperHeroDescription($command->superHeroDescription()),
                $command->isAvenger()
            )
        );
    }
}
