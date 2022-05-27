<?php declare(strict_types=1);

namespace Beagle\Application\Command\SaveSuperHero;

use Beagle\Domain\Errors\InvalidDescription;
use Beagle\Domain\Errors\InvalidName;
use Beagle\Domain\Interfaces\SuperHeroRepository;
use Beagle\Domain\SuperHero;
use Beagle\Domain\ValueObjects\SuperHeroDescription;
use Beagle\Domain\ValueObjects\SuperHeroId;
use Beagle\Domain\ValueObjects\SuperHeroName;

final class SaveSuperHero
{
    public function __construct(private SuperHeroRepository $heroRepository)
    {}

    /**
     * @throws InvalidName
     * @throws InvalidDescription
     */
    public function handler(SaveSuperHeroCommand $command): void {
        $this->heroRepository->save(
            new SuperHero(
                SuperHeroId::fromString($command->heroId()),
                new SuperHeroName($command->heroName()),
                new SuperHeroDescription($command->heroDescription()),
                $command->isAvenger()
            )
        );
    }
}
