<?php

namespace Brondby\Roboticket\Requests\Api;

use Brondby\Roboticket\Requests\RoboticketBaseRequest;
use Saloon\Enums\Method;

class GetAllProducts extends RoboticketBaseRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/Api/GetAllProducts';
    }
}
