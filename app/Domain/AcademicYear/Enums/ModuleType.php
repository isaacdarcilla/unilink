<?php

namespace Domain\AcademicYear\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self admission()
 * @method static self enrollment()
 * @method static self grading()
 */
class ModuleType extends Enum
{
    protected static function values(): array
    {
        return [
            'admission' => 1,
            'enrollment' => 2,
            'grading' => 3,
        ];
    }

    protected static function labels(): array
    {
        return [
            'admission' => 'Admission',
            'enrollment' => 'Enrollment',
            'grading' => 'Grading',
        ];
    }
}