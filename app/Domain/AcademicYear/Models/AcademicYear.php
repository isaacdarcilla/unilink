<?php

namespace Domain\AcademicYear\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $id
 * @method static create(array $array)
 * @method static pluck(string $string)
 * @method static where(string $string, int|string $value)
 */
class AcademicYear extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'status' => 'integer',
        'module_type' => 'integer',
    ];
}
