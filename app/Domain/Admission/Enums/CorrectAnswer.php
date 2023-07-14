<?php

namespace App\Domain\Admission\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self yes()
 * @method static self no()
 */
class CorrectAnswer extends Enum
{
    protected static function values(): array
    {
        return [
            'yes' => 1,
            'no' => 0
        ];
    }
}