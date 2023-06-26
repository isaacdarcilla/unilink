<?php

namespace App\Domain\Admission\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self father()
 * @method static self mother()
 * @method static self guardian()
 */
class FamilyType extends Enum
{
    protected static function values(): array
    {
        return [
            'father' => 1,
            'mother' => 2,
            'guardian' => 3,
        ];
    }

    protected static function labels(): array
    {
        return [
            'father' => 'Father',
            'mother' => 'Mother',
            'guardian' => 'Guardian',
        ];
    }
}