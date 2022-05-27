<?php declare(strict_types=1);

namespace Tests\Unit\Application\Query\GetSuperHero;

use Beagle\Application\Query\GetSuperHero\GetSuperHero;
use Beagle\Application\Query\GetSuperHero\GetSuperHeroQuery;
use Beagle\Infrastructure\Persistence\InMemory\Repository\InMemorySuperHeroRepository;
use PHPUnit\Framework\TestCase;

final class GetSuperHeroTest extends TestCase
{
    public function testItGetsSuperHeroData()
    {
        $query = new GetSuperHeroQuery('EZBHBgxhYbrS6cBCtXzeNW');

        $sut = new GetSuperHero(new InMemorySuperHeroRepository());
        $response = $sut->handler($query);


        $this->assertSame(
            [
                "hero_id" => "EZBHBgxhYbrS6cBCtXzeNW",
                "hero_name" => "Spider-Man",
                "hero_description" => "lorem ipsum is a simply dummy text",
                "is_avenger" => true,
            ],
            $response->toArray()
        );
    }
}
