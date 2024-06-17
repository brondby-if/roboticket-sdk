<?php

namespace Brondby\Roboticket\Requests\ApiBIF;

use Brondby\Roboticket\Requests\RoboticketBaseRequest;
use Saloon\Enums\Method;

class CreateUser extends RoboticketBaseRequest
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/ApiBIF/CreateUser';
    }

    public function rules(): array
    {
        return [
            'SSOId' => 'required|numeric',
            'Email' => 'required|email:rfc',
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'PhonePrefix' => 'string|nullable',
            'PhoneNumber' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
        ];
    }
}