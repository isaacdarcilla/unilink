<?php

namespace Domain\Campus\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $id
 * @method static create(array $array)
 * @method static pluck(string $string)
 * @method static whereStatus(int|string $value)
 */
class Campus extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'status' => 'integer',
    ];
}
