<?php

use App\Admin\Enums\RoleEnum;
use App\Admin\Models\Barangay;
use App\Admin\Models\City;
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
     * @return Province|Collection|null
     */
    function get_provinces(string|null $region_code = null): Province|Collection|null
    {
        if (!is_null($region_code)) {
            return Province::where('region_code', $region_code)->get();
        }

        return null;
    }
}

if (!function_exists('get_cities')) {
    /**
     * Get the cities or a city by province code
     * @param  string|null  $province_code
     * @return City|Collection|null
     */
    function get_cities(string|null $province_code = null): City|Collection|null
    {
        if (!is_null($province_code)) {
            return City::where('province_code', $province_code)->get();
        }

        return null;
    }
}

if (!function_exists('get_barangays')) {
    /**
     * Get the barangays or a barangay by city code
     * @param  string|null  $city_code
     * @return Barangay|Collection|null
     */
    function get_barangays(string|null $city_code = null): Barangay|Collection|null
    {
        if (!is_null($city_code)) {
            return Barangay::where('city_municipality_code', $city_code)->get();
        }

        return null;
    }
}

if (!function_exists('address_enabled')) {
    /**
     * Check if address can be enabled
     * @param  mixed  ...$props
     * @return bool
     */
    function address_enabled(...$props): bool
    {
        if (in_array(null, $props, true)) {
            return false;
        }

        return true;
    }
}

if (!function_exists('region')) {
    /**
     * Get the address
     * @param  string  $region_code
     * @return Region|null
     */
    function region(string $region_code): Region|null
    {
        return Region::where('region_code', $region_code)?->first();
    }
}

if (!function_exists('province')) {
    /**
     * Get the address
     * @param  string  $province_code
     * @return Province|null
     */
    function province(string $province_code): Province|null
    {
        return Province::where('province_code', $province_code)?->first();
    }
}

if (!function_exists('city')) {
    /**
     * Get the address
     * @param  string  $city_code
     * @return City|null
     */
    function city(string $city_code): City|null
    {
        return City::where('city_municipality_code', $city_code)?->first();
    }
}

if (!function_exists('barangay')) {
    /**
     * Get the address
     * @param  string  $barangay_code
     * @return Barangay|null
     */
    function barangay(string $barangay_code): Barangay|null
    {
        return Barangay::where('barangay_code', $barangay_code)?->first();
    }
}
