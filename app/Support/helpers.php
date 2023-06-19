<?php

use App\Enums\RoleEnum;

if (!function_exists('role_is')) {
    /**
     * Check if authenticated user has given role
     */
    function role_is(RoleEnum $role): bool
    {
        return auth()->user()->hasRole($role->value);
    }
}