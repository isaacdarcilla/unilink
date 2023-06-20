<?php

namespace Domain\Admission\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $id
 * @method static create(array $array)
 */
class AdmissionPersonalProfile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'date_of_birth' => 'datetime',
        'scholarship_grantee' => 'integer',
        'integer' => 'integer',
    ];
}