<?php declare(strict_types=1);

namespace Beagle\Infrastructure\Http\Controllers;

use Beagle\Application\Command\DeleteSuperHero\DeleteSuperHero;
use Beagle\Application\Command\DeleteSuperHero\DeleteSuperHeroCommand;
use Beagle\Domain\Errors\SuperHeroNotFound;
use Beagle\Infrastructure\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class DeleteSuperHeroController extends BaseController
{
    public function action(Request $request, DeleteSuperHero $deleteSuperHero): Response
    {
        try
        {
            $command = new DeleteSuperHeroCommand($request->route('id'));

            $deleteSuperHero->handler($command);

            return $this->successfulResponse('');
        }catch (SuperHeroNotFound $exception)
        {
            return $this->badRequestResponse($exception->getMessage());
        }
    }
}
