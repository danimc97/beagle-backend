<?php declare(strict_types = 1);

namespace Beagle\Infrastructure;

use Illuminate\Http\Response;

class BaseController
{
    public function successfulResponse(string $response):Response
    {
        return \response($response);
    }

    public function badRequestResponse(string $response):Response
    {
        return \response($response, 400);
    }
}
