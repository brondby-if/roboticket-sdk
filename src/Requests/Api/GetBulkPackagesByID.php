<?php

namespace Brondby\Roboticket\Requests\Api;

use Brondby\Roboticket\Requests\RoboticketBaseRequest;
use Saloon\Enums\Method;

class GetBulkPackagesByID extends RoboticketBaseRequest
{
    protected Method $method = Method::GET;

    public function rules(): array
    {
        return [
          'seasonTicketId' => 'required|integer|numeric',
        ];
    }

    public static function availableParameters(): array
    {
        return [
            'seasonTicketId' => 'Integer',
        ];
    }

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/Api/BulkPackagesByID';
    }
}
