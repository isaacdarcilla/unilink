<?php

namespace Domain\AcademicYear\Models;

use Domain\Admission\Models\AdmissionPersonalProfile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $id
 * @method static create(array $array)
 * @method static pluck(string $string)
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

    public function admission_personal_profile(): HasOne
    {
        return $this->hasOne(AdmissionPersonalProfile::class);
    }
}
