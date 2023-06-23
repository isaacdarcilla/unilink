<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $region_code)
 * @property mixed $province_description
 */
class Province extends Model
{
    use HasFactory;
}
