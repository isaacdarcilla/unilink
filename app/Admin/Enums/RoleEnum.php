<?php

namespace App\Admin\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self student()
 * @method static self parents()
 * @method static self super_admin()
 * @method static self admin()
 */
class RoleEnum extends Enum
{
    protected static function labels(): array
    {
        return [
            'student' => 'Student',
            'parents' => 'Parent',
            'super_admin' => 'Super Admin',
            'admin' => 'admin',
        ];
    }
}