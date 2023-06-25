<?php

namespace App\Domain\Level\Models;

use App\Domain\Admission\Models\AdmissionEducation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static pluck(string $string)
 */
class Level extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'status' => 'integer',
    ];

    public function admission_education(): HasOne
    {
        return $this->hasOne(AdmissionEducation::class);
    }
}