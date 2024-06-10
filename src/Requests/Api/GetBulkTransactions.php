<?php

namespace Brondby\Roboticket\Requests\Api;

use Brondby\Roboticket\Data\RoboticketTransaction;
use Brondby\Roboticket\Requests\RoboticketBaseRequest;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class GetBulkTransactions extends RoboticketBaseRequest implements Paginatable
{
    protected Method $method = Method::GET;

    protected function defaultQuery(): array
    {
        return [
            'from' => now()->subDays(1)->toAtomString(),
            'to' => now()->toAtomString(),
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
            'from' => 'DateTime',
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
        return '/ApiAccounting/BulkTransactions';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return array_map(function (array $row) {
            return RoboticketTransaction::from($row);
        }, $response->json('Result'));
    }
}
