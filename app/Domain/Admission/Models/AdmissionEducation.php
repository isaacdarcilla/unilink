<?php

namespace App\Domain\Admission\Models;

use App\Domain\Level\Models\Level;
use Domain\Admission\Models\AdmissionPersonalProfile;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 * @method static updateOrCreate(array $array, array $array1)
 * @method static find(AdmissionEducation|int $education)
 * @property mixed $inclusive_dates_from
 */
class AdmissionEducation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'admission_educations';

    protected $guarded = [];

    protected $casts = [
        'inclusive_dates_from' => 'date:m/d/Y',
        'inclusive_dates_to' => 'date:m/d/Y',
    ];

    public function admission_personal_profile(): BelongsTo
    {
        return $this->belongsTo(AdmissionPersonalProfile::class);
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }
}