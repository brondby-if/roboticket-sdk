<?php

namespace Brondby\Roboticket;

use Exception;

class RoboticketConfig
{
    public function __construct(
        public readonly string $key,
        public readonly string $client_id,
        public readonly string $base_url
    ) {}

    public static function fromArray(array $config): RoboticketConfig
    {
        if (
            ! array_key_exists('key', $config) ||
            ! array_key_exists('client_id', $config) ||
            ! array_key_exists('base_url', $config)
        ) {
            throw new Exception('Roboticket requires key, client_id and base_url');
        }

        return new static($config['key'], $config['client_id'], $config['base_url']);
    }
}
