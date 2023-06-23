<?php

namespace App\Domain\Admission\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self personal_profile()
 * @method static self education()
 * @method static self family()
 * @method static self health()
 * @method static self completed()
 */
class AdmissionApplicationProgress extends Enum
{
    protected static function labels(): array
    {
        return [
            'personal_profile' => 'Personal Data',
            'education' => 'Educational Background',
            'family' => 'Family Background',
            'health' => 'Physical & Health',
            'completed' => 'Completed',
        ];
    }

    protected static function values(): array
    {
        return [
            'personal_profile' => 'personal_data',
            'education' => 'education',
            'family' => 'family',
            'health' => 'health',
            'completed' => 'completed',
        ];
    }
}