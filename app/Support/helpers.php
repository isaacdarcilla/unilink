<?php

use App\Admin\Enums\RoleEnum;
use App\Admin\Models\Province;
use App\Admin\Models\Region;
use Illuminate\Database\Eloquent\Collection;

if (!function_exists('role_is')) {
    /**
     * Check if authenticated user has given role
     * @param  array|string|RoleEnum  $roles
     * @return bool
     */
    function role_is(array|string|RoleEnum $roles): bool
    {
        return auth()->user()->hasRole($roles);
    }
}

if (!function_exists('get_regions')) {
    /**
     * Get the regions or a region
     * @param  string|null  $region_code
     * @return Region|Collection
     */
    function get_regions(string|null $region_code = null): Region|Collection
    {
        if (!is_null($region_code)) {
            return Region::where('region_code', $region_code)->first();
        }

        return Region::all();
    }
}

if (!function_exists('get_provinces')) {
    /**
     * Get the provinces or a province by region code
     * @param  string|null  $region_code
     * @return Region|Collection
     */
    function get_provinces(string|null $region_code = null): Region|Collection
    {
        if (!is_null($region_code)) {
            return Province::where('region_code', $region_code)->get();
        }

        return Province::all();
    }
}