<?php

namespace Brondby\Roboticket\Requests\Api;

use Brondby\Roboticket\Requests\RoboticketBaseRequest;
use Saloon\Enums\Method;

class GetBulkEventAuthorized extends RoboticketBaseRequest
{
    protected Method $method = Method::GET;

    public function rules(): array
    {
        return [
            'eventId' => 'required|integer|numeric'
        ];
    }

    public static function availableParameters(): array
    {
        return [
            'eventId' => 'Integer',
        ];
    }

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/Api/BulkEventAuthorized';
    }
}
