<?php declare(strict_types=1);

namespace Beagle\Infrastructure\Http\Controllers;

use Beagle\Application\Query\GetSuperHero\GetSuperHero;
use Beagle\Application\Query\GetSuperHero\GetSuperHeroQuery;
use Beagle\Domain\Errors\InvalidDescription;
use Beagle\Domain\Errors\InvalidName;
use Beagle\Domain\Errors\SuperHeroNotFound;
use Beagle\Infrastructure\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class GetSuperHeroController extends BaseController
{
    public function action(Request $request, GetSuperHero $getSuperHero): Response
    {
        try
        {
            $query = new GetSuperHeroQuery($request->route('id'));

            $response = $getSuperHero->handler($query);

            return $this->successfulResponse(\json_encode($response->toArray()));
        } catch (InvalidDescription | InvalidName | SuperHeroNotFound $invalidArgument)
        {
            return $this->badRequestResponse($invalidArgument->getMessage());
        }
    }
}
