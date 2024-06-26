<?php

namespace Brondby\Roboticket\Requests\Api;

use Brondby\Roboticket\Requests\RoboticketBaseRequest;
use Saloon\Enums\Method;

class GetUserTicketsAll extends RoboticketBaseRequest
{
    protected Method $method = Method::GET;

    public function rules(): array
    {
        return [
            'fromEventDate' => 'date',
            'userId' => 'integer|required',
        ];
    }

    public static function availableParameters(): array
    {
        return [
            'userId' => 'Integer',
            'fromEventDate' => 'DateTime',
        ];
    }

    /**
     * Define the endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/Api/GetUserTicketsAll';
    }
}
