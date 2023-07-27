<?php

namespace App\Domain\Block\Models;

use App\Domain\YearLevel\Models\YearLevel;
use Domain\Program\Models\Program;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Block extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function year_level(): BelongsTo
    {
        return $this->belongsTo(YearLevel::class);
    }
}