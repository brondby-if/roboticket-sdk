<?php

namespace Brondby\Roboticket\Requests\ApiBIF;

use Brondby\Roboticket\Requests\RoboticketBaseRequest;
use Saloon\Enums\Method;

class DeleteUser extends RoboticketBaseRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/ApiBIF/DeleteUser';
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer',
        ];
    }
}
