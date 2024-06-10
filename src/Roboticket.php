<?php

namespace Brondby\Roboticket;


use Illuminate\Support\Facades\Config;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\OffsetPaginator;
use Saloon\PaginationPlugin\Paginator;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class Roboticket extends Connector implements HasPagination
{
    use AcceptsJson, AlwaysThrowOnErrors;

    /**
     * The Base URL of the API
     *
     * @return string
     */
    public function resolveBaseUrl(): string
    {
        return Config::get('services.roboticket.base_uri');
        // return config('services.roboticket.key');
    }

    protected function defaultAuth(): ?Authenticator
    {
        return new RoboticketAuthenticator(Config::get('services.roboticket.key'), Config::get('services.roboticket.client_id'));
    }

    public function paginate(Request $request): Paginator
    {
        return new class(connector: $this, request: $request) extends OffsetPaginator
        {
            protected ?int $perPageLimit = 100;

            protected function isLastPage(Response $response): bool
            {
                return (int)$response->json('Result.Count') < $this->perPageLimit;
            }

            protected function getPageItems(Response $response, Request $request): array
            {
                return $response->dto();
//                return $response->json('Result.Products');
            }

            protected function applyPagination(Request $request): Request
            {
                $request->query()->merge([
                    'batch' => $this->perPageLimit,
                    'skip' => $this->getOffset(),
                ]);

                return $request;
            }
        };
    }
}
