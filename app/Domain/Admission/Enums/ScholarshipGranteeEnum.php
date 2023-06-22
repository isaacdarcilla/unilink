<?php

namespace Domain\Admission\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self yes()
 * @method static self no()
 */
class ScholarshipGranteeEnum extends Enum
{
    protected static function labels(): array
    {
        return [
            'yes' => 'Yes',
            'no' => 'No',
        ];
    }

    protected static function values(): array
    {
        return [
            'yes' => 1,
            'no' => 0,
        ];
    }
}