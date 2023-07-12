<?php

namespace App\Http\Livewire\Admission\Components;

use App\Domain\Admission\Enums\QuestionnaireStatus;
use App\Domain\Admission\Models\AdmissionExamination;
use App\Domain\Admission\Models\AdmissionQuestionnaire;
use App\Domain\Admission\Services\ExaminationService;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class AdmissionExaminationForm extends Component
{
    public AdmissionExamination $admissionExamination;

    public ?AdmissionQuestionnaire $currentQuestion;

    public Collection $questionnaires;

    public ?string $answer = null;

    public bool $correct;

    public function mount(): void
    {
        $examinationService = new ExaminationService();

        $this->currentQuestion = $examinationService->currentQuestion(
            request('question')
        );

        $this->questionnaires = $examinationService->getQuestionnaires(
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
    }
}
