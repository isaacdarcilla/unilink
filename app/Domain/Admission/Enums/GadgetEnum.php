<?php

namespace Domain\Admission\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self cellphone()
 * @method static self laptop()
 * @method static self tablet()
 * @method static self desktop()
 * @method static self none()
 */
class GadgetEnum extends Enum
{
    protected static function labels(): array
    {
        return [
            'cellphone' => 'Cellphone',
            'laptop' => 'Laptop',
            'tablet' => 'Tablet',
            'desktop' => 'Desktop',
            'none' => 'None',
        ];
    }
}