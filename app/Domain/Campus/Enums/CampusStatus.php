<?php

namespace Domain\Campus\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self enabled()
 * @method static self disabled()
 */
class CampusStatus extends Enum
{
    protected static function values(): array
    {
        return [
            'enabled' => 1,
            'disabled' => 0,
        ];
    }

    protected static function labels(): array
    {
        return [
            'enabled' => 'Enabled',
            'disabled' => 'Disabled',
        ];
    }
}