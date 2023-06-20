<?php

use App\Admin\Enums\RoleEnum;

if (!function_exists('role_is')) {
    /**
     * Check if authenticated user has given role
     */
    function role_is(array|string|RoleEnum $roles): bool
    {
        return auth()->user()->hasRole($roles);
    }
}