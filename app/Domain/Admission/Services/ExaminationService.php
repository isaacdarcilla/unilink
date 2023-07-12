<?php

namespace App\Domain\Admission\Services;

use App\Admin\Models\User;
use App\Domain\Admission\Enums\ExaminationStatus;
use App\Domain\Admission\Enums\QuestionnaireStatus;
use App\Domain\Admission\Models\AdmissionExamination;
use App\Domain\Admission\Models\AdmissionQuestionnaire;
use Domain\AcademicYear\Models\AcademicYear;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;

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
        ])->orWhere('status', ExaminationStatus::on_going()->value)->first();
    }

    public function getQuestionnaires(QuestionnaireStatus $status): Collection
    {
        return AdmissionQuestionnaire::where([
            'status' => $status->value
        ])->get();
    }

    public function setExaminationStatus(
        ExaminationStatus $status,
        int|string $admissionExamination
    ): AdmissionExamination {
        $exam = AdmissionExamination::find($admissionExamination);
        $exam->status = $status->value;
        $exam->save();

        return $exam;
    }

    public function currentQuestion(int|string $questionId): AdmissionQuestionnaire
    {
        return AdmissionQuestionnaire::where([
            'id' => $questionId
        ])->first();
    }
}