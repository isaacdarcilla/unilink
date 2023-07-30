<?php

namespace App\Domain\Guidance\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self personal_profile()
 * @method static self family()
 * @method static self social()
 * @method static self health()
 * @method static self completed()
 */
class GuidanceApplicationProgress extends Enum
{
    protected static function labels(): array
    {
        return [
            'personal_profile' => 'Personal Data',
            'family' => 'Family Background',
            'social' => 'Social, Emotional and Personal Make Up',
            'health' => 'Health Background',
            'completed' => 'Completed',
        ];
    }

    protected static function values(): array
    {
        return [
            'personal_profile' => 'personal_data',
            'family' => 'family',
            'health' => 'health',
            'social' => 'social',
            'completed' => 'completed',
        ];
    }
}