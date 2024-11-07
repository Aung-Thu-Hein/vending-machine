<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum TransactionStatus: int
{
    use EnumToArray;

    case SUCCESS = 1;
    case FAIL = 2;
}
