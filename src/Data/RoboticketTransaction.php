<?php

namespace Brondby\Roboticket\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapOutputName(SnakeCaseMapper::class)]
class RoboticketTransaction extends Data
{
    public function __construct(
        //        public int $Id,
        //        public ?int $OwnerAccountId,
        //        public ?int $OwnerUserId,
        //        public ?int $InvoiceId,
        //        public ?string $InvoiceNumber,
        //        public Carbon $CreatedDate,
        //        public Carbon $Date,
        //        public Carbon $FinishDate,
        //        public ?String $PaymentMethod,
        //        public int $BasePrice,
        //        public int $DeliveryPrice,
        //        public int $Price,
        //        public ?string $Currency,
        //        public int $ItemsCount,
        //        public int $PaymentType,
        //        public ?string $PaymentGate,
        //        public ?string $OryginalSubscriptionTransaction,
        //        public ?string $ExternalSubscriptionTransaction,
        //        public ?Carbon $CreatedOn,
        //        public ?Carbon $UpdatedOn

        public int $Id,
        public ?Carbon $CreatedOn,
        public ?Carbon $SaleDate,
        public int $BasePrice,
        public int $AdditionalCharge,
        public int $Price,
        public int $PaymentType,
        public ?string $PaymentTypeName,
        public ?string $PaymentGate,
        public ?string $PaymentGateName,
        public ?string $PaymentMethod,
        public ?string $Owner,
        public ?string $OwnerIdentifier,
        public ?string $OwnerEmail,
        public ?string $OwnerLanguage,
        public ?string $OwnerVatNumber,
        #[DataCollectionOf(RoboticketItem::class)]
        public DataCollection $Items,
    ) {}
}
