<?php

namespace App\Domain\YearLevel\Models;

use App\Domain\College\Models\College;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static pluck(string $string)
 */
class YearLevel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class);
    }
}