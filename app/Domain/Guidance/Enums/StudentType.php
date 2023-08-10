<?php

namespace App\Domain\Guidance\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self new()
 * @method static self old()
 * @method static self transferee()
 */
class StudentType extends Enum
{
    protected static function labels(): array
    {
        return [
            'new' => 'New Student',
            'old' => 'Old Student',
            'transferee' => 'Transferee',
        ];
    }
}