<?php declare(strict_types=1);

namespace Beagle\Infrastructure\Http\Controllers;

use Beagle\Application\Command\EditSuperHero\EditSuperHero;
use Beagle\Application\Command\EditSuperHero\EditSuperHeroCommand;
use Beagle\Domain\Errors\InvalidDescription;
use Beagle\Domain\Errors\InvalidName;
use Beagle\Domain\Errors\SuperHeroNotFound;
use Beagle\Infrastructure\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class EditSuperHeroController extends BaseController
{
    public function action(Request $request, EditSuperHero $editSuperHero): Response
    {
        try {
            $command = new EditSuperHeroCommand(
                $request->route('id'),
                $request->input('heroName'),
                $request->input('heroDescription'),
                $request->input('isAvenger'),
            );

            $editSuperHero->handler($command);

            return $this->successfulResponse('');
        }catch (InvalidName | InvalidDescription | SuperHeroNotFound $invalidArgument)
        {
            return $this->badRequestResponse($invalidArgument->getMessage());
        }
    }
}
