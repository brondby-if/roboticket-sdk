<?php

namespace Brondby\Roboticket\Requests\Api;

use Brondby\Roboticket\Requests\RoboticketBaseRequest;
use Carbon\Carbon;
use Saloon\Enums\Method;

class GetAllEventsIdName extends RoboticketBaseRequest
{
    protected Method $method = Method::GET;

    protected function defaultQuery(): array
    {
        return [
            'from' => Carbon::now()->subDays(30)->toAtomString(),
            'to' => Carbon::now()->toAtomString(),
        ];
    }

    public function rules(): array
    {
        return [
            'from' => 'date',
            'to' => 'date',
        ];
    }

    public static function availableParameters(): array
    {
        return [
            'From' => 'DateTime',
            'to' => 'DateTime',
        ];
    }

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/Api/GetAllEventsIdName';
    }
}
