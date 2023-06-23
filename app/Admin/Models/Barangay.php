<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $city_code)
 * @property mixed $barangay_description
 */
class Barangay extends Model
{
    use HasFactory;
}
