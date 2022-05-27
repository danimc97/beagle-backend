<?php declare(strict_types = 1);

namespace Beagle\Infrastructure\Persistence\InMemory\Repository;

use Beagle\Domain\Errors\SuperHeroNotFound;
use Beagle\Domain\Interfaces\SuperHeroRepository;
use Beagle\Domain\SuperHero;
use Beagle\Domain\SuperHeroCollection;
use Beagle\Domain\ValueObjects\SuperHeroDescription;
use Beagle\Domain\ValueObjects\SuperHeroId;
use Beagle\Domain\ValueObjects\SuperHeroName;

final class InMemorySuperHeroRepository implements SuperHeroRepository
{
    /** @var SuperHero[] */
    private array $superHeroes;

    public function __construct()
    {
        $this->superHeroes = [
            new SuperHero(
                SuperHeroId::fromString("EZBHBgxhYbrS6cBCtXzeNW"),
                new SuperHeroName('Spider-Man'),
                new SuperHeroDescription('lorem ipsum is a simply dummy text'),
                true
            ),
        ];
    }

    public function save(SuperHero $superHero):void
    {
        // TODO: Implement save() method.
    }

    public function all():SuperHeroCollection
    {
        return new SuperHeroCollection();
    }

    public function find(SuperHeroId $superHeroId):SuperHero
    {
        foreach ($this->superHeroes as $superHero)
        {
            if ($superHeroId->value() == $superHero->id()->value())
            {
                return $superHero;
            }
        }

        throw SuperHeroNotFound::byId($superHeroId->value());
    }

    public function delete(SuperHeroId $superHeroId):void
    {
        // TODO: Implement delete() method.
    }
}
