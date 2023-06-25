<?php

namespace App\Domain\Level\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self enabled()
 * @method static self disabled()
 */
class LevelStatus extends Enum
{
    protected static function labels(): array
    {
        return [
            'enabled' => 'Enabled',
            'disabled' => 'Disabled',
        ];
    }

    protected static function values(): array
    {
        return [
            'enabled' => 1,
            'disabled' => 0,
        ];
    }
}