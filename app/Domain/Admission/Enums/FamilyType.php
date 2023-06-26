<?php

namespace App\Domain\Admission\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self father()
 * @method static self mother()
 */
class FamilyType extends Enum
{
    protected static function values(): array
    {
        return [
            'father' => 1,
            'mother' => 2,
        ];
    }

    protected static function labels(): array
    {
        return [
            'father' => 'father',
            'mother' => 'mother',
        ];
    }
}