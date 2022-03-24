<?php

namespace App\Enums;

use App\Traits\ManagesEnumValues;
use Illuminate\Support\Collection;

enum AddressTypesEnum: string
{
    use ManagesEnumValues;

    case Billing = 'B';
    case Delivery = 'D';
    case Postal = 'P';
}
