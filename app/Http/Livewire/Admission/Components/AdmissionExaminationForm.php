<?php

namespace App\Http\Livewire\Admission\Components;

use App\Domain\Admission\Dto\CreateAdmissionExaminationAnswerDto;
use App\Domain\Admission\Enums\CorrectAnswer;
use App\Domain\Admission\Enums\ExaminationStatus;
use App\Domain\Admission\Enums\QuestionnaireStatus;
use App\Domain\Admission\Models\AdmissionExamination;
use App\Domain\Admission\Models\AdmissionQuestionnaire;
use App\Domain\Admission\Services\ExaminationService;
use Domain\AcademicYear\Models\AcademicYear;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use WireUi\Traits\Actions;

class AdmissionExaminationForm extends Component
{
    use Actions;

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
        $answers = $this->examinationService->getUserExamAnswers(
            auth()->user(),
            $this->active,
            $this->admissionExamination
        );

        return view('livewire.admission.components.admission-examination-form', compact('answers'));
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
            'answer_text' => $this->currentQuestion->choices['choices'][$this->answer],
            'gathered_points' => $this->correct ? $this->currentQuestion->points : 0,
            'correct_answer' => $this->currentQuestion->choices['answer'],
            'correct_answer_text' => $this->currentQuestion->choices['choices'][$this->currentQuestion->choices['answer']],
            'is_correct' => $this->correct,
        ];

        $this->examinationService->storeAnswer(
            CreateAdmissionExaminationAnswerDto::fromArray($data)
        );

        $this->redirect(
            route('admission.examination.index', [
                'admission_examination' => $this->admissionExamination->id,
                'question' => $this->currentQuestion->id + 1,
                'key' => $this->currentQuestion->id + 1,
            ])
        );
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

    public function finishDialog(): void
    {
        $this->dialog()->confirm([
            'title' => 'Are you sure?',
            'description' => 'This action can not be undone. Your examination results can be viewed instantly.',
            'acceptLabel' => 'Yes, submit',
            'method' => 'finishExamination',
        ]);
    }

    public function finishExamination(): void
    {
        $this->examinationService->computeExaminationResult(
            $this->admissionExamination,
            CorrectAnswer::yes(),
            $this->questionnaires->sum('points'),
        );

        $this->redirect(
            route('admission.examination.index', [
                'admission_examination' => $this->admissionExamination->id,
                'question' => 0,
                'key' => 0,
                'exam' => 'finish'
            ])
        );
    }
}
