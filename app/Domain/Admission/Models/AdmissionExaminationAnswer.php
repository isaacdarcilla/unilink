<?php

namespace App\Domain\Admission\Models;

use App\Admin\Models\User;
use Domain\AcademicYear\Models\AcademicYear;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 */
class AdmissionExaminationAnswer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function academic_year(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function admission_questionnaire(): BelongsTo
    {
        return $this->belongsTo(AdmissionQuestionnaire::class);
    }

    public function admission_examination(): BelongsTo
    {
        return $this->belongsTo(AdmissionExamination::class);
    }
}