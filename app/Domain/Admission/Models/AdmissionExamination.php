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
 * @method static find(int|string $admissionExamination)
 */
class AdmissionExamination extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'total_points' => 'integer'
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