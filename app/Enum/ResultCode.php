<?php

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static ResultCode NOT_VERIFIED()
 * @method static ResultCode VERIFIED()
 */
class ResultCode extends Enum
{
    private const SUCCESS = '0000';
    private const FAIL = '9999';
}
