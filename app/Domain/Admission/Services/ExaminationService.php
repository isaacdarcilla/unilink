<?php

namespace App\Domain\Admission\Services;

use App\Admin\Models\User;
use App\Domain\Admission\Enums\ExaminationStatus;
use App\Domain\Admission\Models\AdmissionExamination;
use Domain\AcademicYear\Models\AcademicYear;
use Illuminate\Contracts\Auth\Authenticatable;

class ExaminationService
{
    public function getUserExamination(
        AcademicYear $academicYear,
        User|Authenticatable|null $user
    ): ?AdmissionExamination {
        return AdmissionExamination::where([
            'user_id' => $user->id,
            'academic_year_id' => $academicYear->id,
            'status' => ExaminationStatus::pending()->value
        ])->first();
    }
}