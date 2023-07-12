<?php

namespace App\Domain\Admission\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self pending()
 * @method static self on_going()
 * @method static self taken()
 * @method static self passed()
 * @method static self failed()
 */
class ExaminationStatus extends Enum
{

}