<?php

namespace Brondby\Roboticket\Requests\Api;

use Brondby\Roboticket\Requests\RoboticketBaseRequest;
use Saloon\Enums\Method;

class GetBulkMembershipsByID extends RoboticketBaseRequest
{
    protected Method $method = Method::GET;

    protected function defaultQuery(): array
    {
        return [
            'membershipId' => $this->membershipId
        ];
    }

    public function rules(): array
    {
        return [
            'membershipId' => 'required|integer|numberic',
        ];
    }

    public static function availableParameters(): array
    {
        return [
            'membershipId' => 'Integer',
        ];
    }

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/Api/BulkMembershipsByID';
    }
}
