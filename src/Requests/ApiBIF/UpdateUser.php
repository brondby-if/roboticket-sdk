<?php

namespace Brondby\Roboticket\Requests\ApiBIF;

use Brondby\Roboticket\Requests\RoboticketBaseRequest;
use Saloon\Enums\Method;

class UpdateUser extends RoboticketBaseRequest
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/ApiBIF/UpdateUser';
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'SSOId' => 'numeric',
            'Email' => 'email:rfc',
            'FirstName' => 'string',
            'LastName' => 'string',
            'PhonePrefix' => 'string|nullable',
            'PhoneNumber' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
        ];
    }
}
