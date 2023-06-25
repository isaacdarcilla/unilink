<?php

namespace App\Domain\Admission\Models;

use App\Domain\Level\Models\Level;
use Domain\Admission\Models\AdmissionPersonalProfile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmissionEducation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'admission_educations';

    protected $guarded = [];

    protected $casts = [
        'inclusive_dates_from' => 'datetime',
        'inclusive_dates_to' => 'datetime',
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