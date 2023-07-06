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
            'stable' => 'Stable',
            'unstable' => 'Unstable',
            'none' => 'None',
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