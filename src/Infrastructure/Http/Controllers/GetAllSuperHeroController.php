<?php declare(strict_types=1);

namespace Beagle\Infrastructure\Http\Controllers;

use Beagle\Application\Query\GetAllSuperHeroes\GetAllSuperHeroes;
use Beagle\Domain\Errors\InvalidDescription;
use Beagle\Domain\Errors\InvalidName;
use Beagle\Infrastructure\BaseController;
use Illuminate\Http\Response;

final class GetAllSuperHeroController extends BaseController
{
    public function action(GetAllSuperHeroes $getAllSuperHeroes): Response
    {
        try {
            $response = $getAllSuperHeroes->handler();
            return $this->successfulResponse(\json_encode($response->toArray()));
        } catch (InvalidDescription | InvalidName $invalidArgument)
        {
            return $this->badRequestResponse($invalidArgument->getMessage());
        }
    }
}
