<?php

namespace App\Domain\Admission\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self some_elementary()
 * @method static self elementary()
 * @method static self some_high_school()
 * @method static self high_school()
 * @method static self vocational_course()
 * @method static self some_college()
 * @method static self bachelor_degree()
 * @method static self master_degree()
 * @method static self professional_degree()
 * @method static self doctoral_degree()
 * @method static self other()
 */
class HighestEducationEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'some_elementary' => 1,
            'elementary' => 2,
            'some_high_school' => 3,
            'high_school' => 4,
            'vocational_course' => 5,
            'some_college' => 6,
            'bachelor_degree' => 7,
            'master_degree' => 8,
            'professional_degree' => 9,
            'doctoral_degree' => 10,
            'other' => 11,
        ];
    }

    protected static function labels(): array
    {
        return [
            'some_elementary' => 'Some Elementary',
            'elementary' => 'Elementary',
            'some_high_school' => 'Some High School',
            'high_school' => 'High School',
            'vocational_course' => 'Vocational Course',
            'some_college' => 'Some College',
            'bachelor_degree' => 'Bachelor Degree',
            'master_degree' => 'Master Degree',
            'professional_degree' => 'Professional Degree',
            'doctor_degree' => 'Doctoral Degree',
            'other' => 'Other',
        ];
    }
}