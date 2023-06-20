<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self student()
 * @method static self parent()
 * @method static self super_admin()
 * @method static self admin()
 */
class RoleEnum extends Enum
{
    protected static function labels(): array
    {
        return [
            'student' => 'Student',
            'parent' => 'Parent',
            'super_admin' => 'Super Admin',
            'admin' => 'admin',
        ];
    }
}