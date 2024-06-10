<?php

namespace Brondby\Roboticket;

use Saloon\Http\PendingRequest;
use Saloon\Contracts\Authenticator;

class RoboticketAuthenticator implements Authenticator
{
    public function __construct(
        public string $apiKey,
        public string $clientId,
    ) {}

    protected function prepareQueryParams($params = [])
    {
        $authDateTime = now()->toISOString();

        $params['authClientId'] = $this->clientId;
        $params['authDateTime'] = $authDateTime;

        $param_string = urldecode(http_build_query($params)).$this->apiKey;

        $hash = hash('sha256', $param_string, true);
        $authHash = base64_encode($hash);

        $params['authHash'] = $authHash;

        return $params;
    }

    public function set(PendingRequest $pendingRequest): void
    {
        $pendingRequest->query()->set(
            $this->prepareQueryParams(
                $pendingRequest->query()->all()
            )
        );
    }
}
