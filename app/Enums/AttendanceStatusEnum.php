<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AttendanceStatusEnum extends Enum
{
    public const DA_DIEM_DANH = 1;
    public const CHUA_DIEM_DANH = 2;
}
