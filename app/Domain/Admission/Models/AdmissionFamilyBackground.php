<?php

namespace App\Domain\Admission\Models;

use Domain\Admission\Models\AdmissionPersonalProfile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static updateOrCreate(array $array, array $array1)
 * @method static find(int $familyId)
 */
class AdmissionFamilyBackground extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function admission_personal_profile(): BelongsTo
    {
        return $this->belongsTo(AdmissionPersonalProfile::class);
    }
}