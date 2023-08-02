<?php

namespace App\Domain\Guidance\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static pluck(string $string)
 */
class GuidanceFamilyBackground extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function guidance_profile(): BelongsTo
    {
        return $this->belongsTo(GuidanceProfile::class);
    }

    public function guidance_family_siblings(): HasMany
    {
        return $this->hasMany(GuidanceFamilyBackground::class);
    }
}