<?php

namespace App\Domain\Admission\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self application_pending()
 * @method static self application_approved()
 * @method static self application_declined()
 * @method static self on_exam()
 * @method static self exam_submitted()
 * @method static self exam_checking()
 * @method static self exam_passed()
 * @method static self exam_failed()
 * @method static self approved()
 */
class AdmissionApplicationStatus extends Enum
{
    protected static function values(): array
    {
        return [
            'application_pending' => 1,
            'application_approved' => 2,
            'application_declined' => 3,
            'on_exam' => 4,
            'exam_submitted' => 5,
            'exam_checking' => 6,
            'exam_passed' => 7,
            'exam_failed' => 8,
            'approved' => 9,
        ];
    }
}