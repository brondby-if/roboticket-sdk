<?php

namespace Brondby\Roboticket\Requests\ApiBIF;

use Brondby\Roboticket\Requests\RoboticketBaseRequest;
use Saloon\Enums\Method;

class GetUser extends RoboticketBaseRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/ApiBIF/GetUser';
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer',
        ];
    }

}