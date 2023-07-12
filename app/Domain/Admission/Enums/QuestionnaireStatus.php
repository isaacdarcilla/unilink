<?php

namespace App\Domain\Admission\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self active()
 * @method static self inactive()
 */
class QuestionnaireStatus extends Enum
{
    protected static function values(): array
    {
        return [
            'active' => 1,
            'inactive' => 0,
        ];
    }
}