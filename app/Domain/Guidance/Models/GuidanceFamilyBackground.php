<?php

namespace App\Domain\Guidance\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuidanceFamilyBackground extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function guidance_family_background(): BelongsTo
    {
        return $this->belongsTo(GuidanceFamilyBackground::class);
    }
}