<?php

namespace Domain\Admission\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self single()
 * @method static self married()
 * @method static self divorced()
 * @method static self separated()
 * @method static self widowed()
 * @method static self solo_parent()
 */
class CivilStatusEnum extends Enum
{
    protected static function labels(): array
    {
        return [
            'single' => 'Single',
            'married' => 'Married',
            'divorced' => 'Divorced',
            'separated' => 'Separated',
            'widowed' => 'Widowed',
            'solo_parent' => 'Solo Parent',
        ];
    }
}