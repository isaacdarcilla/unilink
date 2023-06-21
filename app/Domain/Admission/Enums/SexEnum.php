<?php

namespace Domain\Admission\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self male()
 * @method static self female()
 */
class SexEnum extends Enum
{
    protected static function labels(): array
    {
        return [
            'male' => 'Male',
            'female' => 'Female',
        ];
    }
}