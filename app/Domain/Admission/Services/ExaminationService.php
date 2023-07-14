<?php

namespace App\Domain\Admission\Services;

use App\Admin\Models\User;
use App\Domain\Admission\Dto\CreateAdmissionExaminationAnswerDto;
use App\Domain\Admission\Enums\CorrectAnswer;
use App\Domain\Admission\Enums\ExaminationStatus;
use App\Domain\Admission\Enums\QuestionnaireStatus;
use App\Domain\Admission\Models\AdmissionExamination;
use App\Domain\Admission\Models\AdmissionExaminationAnswer;
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

    public function currentQuestion(int|string $questionId): ?AdmissionQuestionnaire
    {
        return AdmissionQuestionnaire::where([
            'id' => $questionId
        ])->with([
            'admission_examination_answer'
        ])?->first();
    }

    public function storeAnswer(CreateAdmissionExaminationAnswerDto $dto): AdmissionExaminationAnswer
    {
        return AdmissionExaminationAnswer::updateOrCreate([
            'user_id' => $dto->user_id,
            'academic_year_id' => $dto->academic_year_id,
            'admission_questionnaire_id' => $dto->admission_questionnaire_id,
            'admission_examination_id' => $dto->admission_examination_id,
        ], [
            'answer' => $dto->answer,
            'answer_text' => $dto->answer_text,
            'gathered_points' => $dto->gathered_points,
            'correct_answer' => $dto->correct_answer,
            'correct_answer_text' => $dto->correct_answer_text,
            'is_correct' => $dto->is_correct
        ]);
    }

    public function getUserExamAnswers(
        ?User $user,
        AcademicYear $academicYear,
        AdmissionExamination $admissionExamination
    ) {
        return AdmissionExaminationAnswer::where([
            'user_id' => $user->id,
            'academic_year_id' => $academicYear->id,
            'admission_examination_id' => $admissionExamination->id
        ])->with([
            'admission_questionnaire'
        ])->orderBy('admission_questionnaire_id')->get();
    }

    public function computeExaminationResult(
        AdmissionExamination $admissionExamination,
        CorrectAnswer $isCorrect,
        int $totalItemPoints
    ): int {
        $answers = AdmissionExaminationAnswer::where([
            'admission_examination_id' => $admissionExamination->id,
            'is_correct' => $isCorrect->value,
        ])->get();

        $score = ($answers->count() / $totalItemPoints) * 100;

        $this->setExaminationStatus(
            $score >= $admissionExamination->passing_score ? ExaminationStatus::passed() : ExaminationStatus::failed(),
            $admissionExamination->id
        );

        $admissionExamination->update([
            'total_points' => $score,
        ]);

        return $score;
    }
}