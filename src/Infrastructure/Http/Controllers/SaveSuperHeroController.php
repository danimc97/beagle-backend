<?php declare(strict_types=1);

namespace Beagle\Infrastructure\Http\Controllers;

use Beagle\Application\Command\SaveSuperHero\SaveSuperHero;
use Beagle\Application\Command\SaveSuperHero\SaveSuperHeroCommand;
use Beagle\Domain\Errors\InvalidDescription;
use Beagle\Domain\Errors\InvalidName;
use Beagle\Infrastructure\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\Uid\Uuid;

final class SaveSuperHeroController extends BaseController
{
    public function action(Request $request, SaveSuperHero $saveSuperHero): Response {
        try {
            $command = new SaveSuperHeroCommand(
                (Uuid::v4())->toBase58(),
                $request->input('heroName'),
                $request->input('heroDescription'),
                $request->input('isAvenger'),
            );

            $saveSuperHero->handler($command);

            return $this->successfulResponse('');
        } catch (InvalidName | InvalidDescription $exception)
        {
            return $this->badRequestResponse($exception->getMessage());
        }
    }
}
