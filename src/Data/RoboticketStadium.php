<?php

namespace Brondby\Roboticket\Data;

use Carbon\Carbon;
use Saloon\Contracts\Paginator;
use Saloon\Http\Response;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapOutputName(SnakeCaseMapper::class)]
class RoboticketStadium extends Data
{
    public function __construct(
        public string $Id,
        public string $Name,
        public string $StadiumCode,
    )
    {}

//    public static function fromResponse(Response|Paginator $response): DataCollection
//    {
//        return self::collection($response->collect('Result'));
//    }
}
