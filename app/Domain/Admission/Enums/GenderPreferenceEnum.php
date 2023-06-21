<?php

namespace Domain\Admission\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self male()
 * @method static self female()
 * @method static self transgender()
 * @method static self gender_neutral()
 * @method static self non_binary()
 * @method static self genderqueer()
 * @method static self intersex()
 * @method static self gender_fluid()
 */
class GenderPreferenceEnum extends Enum
{
    protected static function labels(): array
    {
        return [
            'male' => 'Male',
            'female' => 'Female',
            'transgender' => 'Transgender',
            'gender_neutral' => 'Gender Neutral',
            'non_binary' => 'Non-binary',
            'genderqueer' => 'Genderqueer',
            'intersex' => 'Intersex',
            'gender_fluid' => 'Gender Fluid',
        ];
    }
}