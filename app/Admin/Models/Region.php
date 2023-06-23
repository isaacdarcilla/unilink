<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $region_code)
 * @property mixed $region_description
 */
class Region extends Model
{
    use HasFactory;
}
