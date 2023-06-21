<?php

namespace Domain\Admission\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self stable()
 * @method static self unstable()
 * @method static self none()
 */
class InternetStatus extends Enum
{
    protected static function values(): array
    {
        return [
            'stable' => 1,
            'unstable' => 2,
            'none' => 3,
        ];
    }

    protected static function labels(): array
    {
        return [
            'stable' => 'Stable',
            'unstable' => 'Unstable',
            'none' => 'None',
        ];
    }
}