<?php

namespace App\Domain\Admission\Models;

use App\Admin\Models\User;
use Domain\AcademicYear\Models\AcademicYear;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $user_id
 * @property mixed $id
 * @property mixed $passing_score
 * @method static find(int|string $admissionExamination)
 * @method static pluck(string $string)
 */
class AdmissionExamination extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'total_points' => 'integer',
        'submitted_at' => 'datetime',
    ];

    public function academic_year(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}