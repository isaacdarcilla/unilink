<?php

namespace App\Domain\College\Models;

use App\Domain\Guidance\Model\GuidanceProfile;
use App\Domain\YearLevel\Models\YearLevel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function guidance_profiles(): HasMany
    {
        return $this->hasMany(GuidanceProfile::class);
    }

    public function year_levels(): HasMany
    {
        return $this->hasMany(YearLevel::class);
    }
}