<?php

namespace Brondby\Roboticket\Requests\Api;

use Brondby\Roboticket\Data\RoboticketProduct;
use Brondby\Roboticket\Requests\RoboticketBaseRequest;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class GetBulkProducts extends RoboticketBaseRequest implements Paginatable
{
    protected Method $method = Method::GET;

    protected function defaultQuery(): array
    {
        return [
            'batch' => 1000,
            'skip' => 0,
        ];
    }

    public function rules(): array
    {
        return [
            'since' => 'date',
            'to' => 'date',
            'batch' => 'integer|numeric',
            'skip' => 'integer|numeric',
        ];
    }

    public static function availableParameters(): array
    {
        return [
            'since' => 'DateTime',
            'to' => 'DateTime',
            'batch' => 'Integer',
            'skip' => 'Integer',
        ];
    }

    /**
     * Define the endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/Api/BulkProducts';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return array_map(function (array $row) {
            return RoboticketProduct::from($row);
        }, $response->json('Result.Products'));
    }
}
