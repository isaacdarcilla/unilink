<?php

namespace App\Http\Livewire\Admission\Components;

use App\Domain\Admission\Dto\CreateAdmissionExaminationAnswerDto;
use App\Domain\Admission\Enums\ExaminationStatus;
use App\Domain\Admission\Enums\QuestionnaireStatus;
use App\Domain\Admission\Models\AdmissionExamination;
use App\Domain\Admission\Models\AdmissionQuestionnaire;
use App\Domain\Admission\Services\ExaminationService;
use Domain\AcademicYear\Models\AcademicYear;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class AdmissionExaminationForm extends Component
{
    public AdmissionExamination $admissionExamination;

    public ?AcademicYear $active;

    public ?AdmissionQuestionnaire $currentQuestion;

    private ExaminationService $examinationService;

    public Collection $questionnaires;

    public ?string $answer = null;

    public bool $correct;

    public function boot(): void
    {
        $this->examinationService = new ExaminationService();
    }

    public function mount(): void
    {
        $this->currentQuestion = $this->examinationService->currentQuestion(
            request('question')
        );

        $this->questionnaires = $this->examinationService->getQuestionnaires(
            QuestionnaireStatus::active()
        );
    }

    public function render(): View
    {
        return view('livewire.admission.components.admission-examination-form');
    }

    public function submit(): void
    {
        $this->validate([
            'answer' => 'required',
        ]);

        $this->correct = $this->answer == $this->currentQuestion->choices['answer'];

        $data = [
            'user_id' => auth()->id(),
            'academic_year_id' => $this->active->id,
            'admission_questionnaire_id' => $this->currentQuestion->id,
            'admission_examination_id' => $this->admissionExamination->id,
            'answer' => $this->answer,
            'gathered_points' => $this->correct ? $this->currentQuestion->points : 0,
            'is_correct' => $this->correct,
        ];

        $this->examinationService->storeAnswer(
            CreateAdmissionExaminationAnswerDto::fromArray($data)
        );
        // TODO: Implement redirect here
    }

    public function startExam(): void
    {
        $this->examinationService->setExaminationStatus(
            ExaminationStatus::on_going(),
            $this->admissionExamination->id
        );

        $this->redirect(
            route('admission.examination.index', [
                'admission_examination' => $this->admissionExamination->id,
                'question' => 1,
                'key' => 1
            ])
        );
    }
}
