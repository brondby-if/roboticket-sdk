<?php

namespace Brondby\Roboticket\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapOutputName(SnakeCaseMapper::class)]
class RoboticketProduct extends Data
{
    public function __construct(
        //        #[MapOutputName('id')]
        public string $ProductId,

        //        #[MapOutputName('type')]
        public string $ProductType,

        //        #[MapOutputName('date')]
        public ?Carbon $ProductDate,

        public string $Name,

        //        #[MapOutputName('created_at')]
        public Carbon $CreatedOn,

        //        #[MapOutputName('updated_at')]
        public Carbon $UpdatedOn
    ) {}
}
