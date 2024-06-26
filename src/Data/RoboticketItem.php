<?php

namespace Brondby\Roboticket\Data;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapOutputName(SnakeCaseMapper::class)]
class RoboticketItem extends Data
{
    public function __construct(
        public int $Id,
        public int $ProductId,
    ) {}
}
