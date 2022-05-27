<?php declare(strict_types=1);

namespace Beagle\Infrastructure\Persistence\Eloquent\DataTransformer;

use Beagle\Domain\Errors\InvalidDescription;
use Beagle\Domain\Errors\InvalidName;
use Beagle\Domain\SuperHero;
use Beagle\Domain\SuperHeroCollection;
use Beagle\Domain\ValueObjects\SuperHeroDescription;
use Beagle\Domain\ValueObjects\SuperHeroId;
use Beagle\Domain\ValueObjects\SuperHeroName;
use Beagle\Infrastructure\Persistence\Eloquent\Models\SuperHeroDao;
use Illuminate\Database\Eloquent\Collection;

final class SuperHeroDataTransformer
{
    public function fromSuperHeroModel(SuperHero $superHero): SuperHeroDao
    {
        $superHeroDao = new SuperHeroDao();

        $superHeroDao->id = $superHero->id()->value();
        $superHeroDao->name = $superHero->name()->value();
        $superHeroDao->description = $superHero->description()->value();
        $superHeroDao->is_avenger = $superHero->isAvenger();

        return $superHeroDao;
    }

    /**
     * @throws InvalidDescription
     * @throws InvalidName
     */
    public function fromSuperHeroCollection(Collection $superHeroes): SuperHeroCollection
    {
        $superHeroCollection = new SuperHeroCollection();

        foreach ($superHeroes as $superHero)
        {
            $superHeroCollection->add(
                new SuperHero(
                    SuperHeroId::fromString($superHero->id),
                    new SuperHeroName($superHero->name),
                    new SuperHeroDescription($superHero->description),
                    (bool) $superHero->is_avenger
                )
            );
        }

        return $superHeroCollection;
    }

    /**
     * @throws InvalidName
     * @throws InvalidDescription
     */
    public function fromSuperHeroDao(SuperHeroDao $superHeroDao): SuperHero
    {
        return new SuperHero(
            SuperHeroId::fromString($superHeroDao->id),
            new SuperHeroName($superHeroDao->name),
            new SuperHeroDescription($superHeroDao->description),
            (bool) $superHeroDao->is_avenger,
        );
    }
}
