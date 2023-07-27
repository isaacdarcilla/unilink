<?php

namespace App\Domain\Block\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self enabled()
 * @method static self disabled()
 */
class BlockStatus extends Enum
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