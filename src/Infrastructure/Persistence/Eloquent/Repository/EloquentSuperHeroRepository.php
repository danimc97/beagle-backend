<?php declare(strict_types=1);

namespace Beagle\Infrastructure\Persistence\Eloquent\Repository;

use Beagle\Domain\Errors\InvalidDescription;
use Beagle\Domain\Errors\InvalidName;
use Beagle\Domain\Errors\SuperHeroNotFound;
use Beagle\Domain\Interfaces\SuperHeroRepository;
use Beagle\Domain\SuperHero;
use Beagle\Domain\SuperHeroCollection;
use Beagle\Domain\ValueObjects\SuperHeroId;
use Beagle\Infrastructure\Persistence\Eloquent\DataTransformer\SuperHeroDataTransformer;
use Beagle\Infrastructure\Persistence\Eloquent\Models\SuperHeroDao;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class EloquentSuperHeroRepository implements SuperHeroRepository
{
    public function __construct(private SuperHeroDataTransformer $superHeroDataTransformer)
    {}

    public function save(SuperHero $superHero): void
    {
        SuperHeroDao::updateOrCreate(
            ['id' => $superHero->id()->value()],
            [
                'name' => $superHero->name()->value(),
                'description' => $superHero->description()->value(),
                'is_avenger' => $superHero->isAvenger()
            ]
        );
    }

    /**
     * @throws InvalidDescription
     * @throws InvalidName
     */
    public function all(): SuperHeroCollection
    {
        $superHeroes = SuperHeroDao::all();
        return $this->superHeroDataTransformer->fromSuperHeroCollection($superHeroes);
    }

    /**
     * @throws InvalidName
     * @throws InvalidDescription
     * @throws SuperHeroNotFound
     */
    public function find(SuperHeroId $superHeroId): SuperHero
    {
        try {
            $superHeroDao = SuperHeroDao::where('id', $superHeroId->value())->firstOrFail();
            return $this->superHeroDataTransformer->fromSuperHeroDao($superHeroDao);
        }catch (ModelNotFoundException) {
            throw SuperHeroNotFound::byId($superHeroId->value());
        }
    }

    public function delete(SuperHeroId $superHeroId): void
    {
        SuperHeroDao::where('id', $superHeroId->value())->delete();
    }
}
