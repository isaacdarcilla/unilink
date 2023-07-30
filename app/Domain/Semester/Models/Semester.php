<?php

namespace App\Domain\Semester\Models;

use Domain\AcademicYear\Models\AcademicYear;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function academic_year(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }
}