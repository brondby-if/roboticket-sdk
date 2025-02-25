<?php

namespace Brondby\Roboticket\Requests;

use Brondby\SaloonHelpers\HasAvailableQueryParams;
use Brondby\SaloonHelpers\HasQueryValidation;
use Saloon\Http\Request;

abstract class RoboticketBaseRequest extends Request
{
    use HasAvailableQueryParams, HasQueryValidation;

    public function __construct(array $query = [])
    {
        $this->query()->merge($query);
    }
}
