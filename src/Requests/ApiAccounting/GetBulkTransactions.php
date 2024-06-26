<?php

namespace Brondby\Roboticket\Requests\ApiAccounting;

use Brondby\Roboticket\Data\RoboticketTransaction;
use Brondby\Roboticket\Requests\RoboticketBaseRequest;
use Carbon\Carbon;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class GetBulkTransactions extends RoboticketBaseRequest implements Paginatable
{
    protected Method $method = Method::GET;

    protected function defaultQuery(): array
    {
        return [
            'from' => Carbon::now()->subDays(1)->toAtomString(),
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
            'from' => 'DateTime',
            'to' => 'DateTime',
        ];
    }

    /**
     * Define the endpoint for the request
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
