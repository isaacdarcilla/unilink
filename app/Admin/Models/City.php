<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $region_code)
 * @property mixed $city_municipality_description
 */
class City extends Model
{
    use HasFactory;
}
