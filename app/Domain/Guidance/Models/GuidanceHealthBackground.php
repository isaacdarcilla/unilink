<?php

namespace App\Domain\Guidance\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuidanceHealthBackground extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'question_key' => 'integer',
    ];

    public function guidance_profile(): BelongsTo
    {
        return $this->belongsTo(GuidanceProfile::class);
    }
}