<?php

namespace Brondby\Roboticket\Requests\Api;

use Brondby\Roboticket\Data\RoboticketStadium;
use Brondby\Roboticket\Requests\RoboticketBaseRequest;
use Saloon\Enums\Method;
use Saloon\Http\Response;

class GetStadiums extends RoboticketBaseRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/Api/GetStadiums';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return array_map(function (array $row) {
            return RoboticketStadium::from($row);
        }, $response->json('Result'));
    }
}
