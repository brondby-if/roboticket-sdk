<?php

namespace Brondby\Roboticket;

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
    public function __construct(
        public RoboticketConfig|array $settings
    ) {
        if (is_array($this->settings)) {
            $this->settings = RoboticketConfig::fromArray($this->settings);
        }
    }

    use AcceptsJson, AlwaysThrowOnErrors;

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return $this->settings->base_url;
    }

    protected function defaultAuth(): ?Authenticator
    {
        return new RoboticketAuthenticator($this->settings->key, $this->settings->client_id);
    }

    public function paginate(Request $request): Paginator
    {
        return new class(connector: $this, request: $request) extends OffsetPaginator
        {
            protected ?int $perPageLimit = 100;

            protected function isLastPage(Response $response): bool
            {
                return (int) $response->json('Result.Count') < $this->perPageLimit;
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
