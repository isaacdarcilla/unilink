<div>
    @php
        use App\Domain\Admission\Enums\ExaminationStatus;
    @endphp

    @if($admissionExamination->status !== ExaminationStatus::pending()->value)
        <x-exam-stepper :exam_id="$admissionExamination->id" :items="$questionnaires"/>
    @endif
    <x-card class="-space-y-2 bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100">
        @if($admissionExamination->status === ExaminationStatus::pending()->value)
            <div class="p-3 space-y-4 text-center mx-auto">
                <img class="mx-auto" src="{{ asset('assets/pencil.png') }}" alt="UNILink" width="70"/>

                <p class="text-lg">Start your Entrance Examination</p>
                <p class="text-sm">Carefully read the questions and select the correct answer in the given selection of
                    choices.<br/>Click on the <b>'Start Examination'</b> button to proceed. Good luck!</p>
                <x-button type="button" wire:click="startExam" info>
                    Start Examination
                </x-button>
            </div>
        @else
            @if($currentQuestion)
                @if($currentQuestion->admission_examination_answer)
                    <div class="p-3">
                        <x-alert title="Item already answered"
                                 message="Please continue and navigate to the next question."
                                 class="text-green-500 border bg-green-100 border-green-300 font-semibold"
                        />
                    </div>
                @endif

                    <form wire:submit="submit" class="space-y-4 p-3">
                    <div wire:ignore class="font-bold flex justify-between">
                        <p>Question #{{ request('key') }}</p>
                        @if(!$currentQuestion->admission_examination_answer)
                            <p>Points: {{ $currentQuestion->points }}</p>
                        @endif
                    </div>
                    <p>{{ $currentQuestion->questionnaire }}</p>
                    <small>{{ $currentQuestion?->questionnaire_description }}</small>

                    @if(!$currentQuestion->admission_examination_answer)
                        @foreach($currentQuestion->choices['choices'] as $key => $choice)
                            <x-radio id="right-label-{{ $key }}" label="{{ $choice }}" value="{{ $key }}"
                                     wire:model.live="answer"/>
                        @endforeach
                    @endif

                    @if($currentQuestion->admission_examination_answer)
                        @foreach($currentQuestion->choices['choices'] as $key => $choice)
                            @if($key === $currentQuestion->admission_examination_answer->answer)
                                <p class="font-semibold">Your answer: {{ $choice }}</p>
                            @endif
                        @endforeach
                    @endif

                    @if($correct)
                        <p class="font-bold text-green-600">
                            @foreach($currentQuestion->choices['choices'] as $key => $choice)
                                @if($currentQuestion->choices['answer'] === $key)
                                    Answer: {{ $choice }}
                                @endif
                            @endforeach
                        </p>
                    @endif

                    @if(!$currentQuestion->admission_examination_answer)
                        <div class="flex justify-between items-center">
                            <div class="mt-2">
                                <x-button type="submit" :disabled="is_null($answer) || $correct" info>
                                    Submit Answer
                                </x-button>
                            </div>
                        </div>
                    @endif

                    <div class="text-center mx-auto pt-5">
                        <small class="text-gray-400">TIP: You can navigate to the other questions by clicking the
                            <b>Question
                                Stepper</b> above.</small>
                    </div>
                </form>
            @else
                <div class="space-y-2 p-3">
                    <x-icon name="check-circle" class="w-6 h-6 text-green-500"/>
                    @if($admissionExamination->status === ExaminationStatus::pending()->value || $admissionExamination->status === ExaminationStatus::on_going()->value)
                        <p class="font-bold">Finish Examination</p>
                        <small class="text-justify font-semibold">
                            Tap on the 'Submit Examination' button below to submit your entrance examination. Results
                            will
                            be generated
                            automatically after submitting the examination.
                        </small>
                    @else
                        <p class="font-bold">My Entrance Examination Results for
                            A.Y. {{ $admissionExamination->academic_year->description }}</p>
                        <small class="text-justify font-semibold">
                            Examination submitted
                            on {{ \Carbon\Carbon::parse($admissionExamination->submitted_at)->format('M d, Y h:i:s A') }}
                        </small>
                    @endif
                </div>
                <div class="pt-3 p-3">
                    <ol class="space-y-4">
                        @foreach($questionnaires as $key => $questionnaire)
                            <li>
                                <small>Question #{{ $loop->iteration }}
                                    : {{ $questionnaire->questionnaire }}</small>
                                @if($questionnaire->admission_examination_answer)
                                    <div class="flex gap-1">
                                        <p class="font-bold">{{ $questionnaire->admission_examination_answer->answer_text }}</p>
                                        @if($admissionExamination->status === ExaminationStatus::passed()->value || $admissionExamination->status === ExaminationStatus::failed()->value)
                                            <p class="font-bold">
                                                @if($questionnaire->admission_examination_answer->is_correct)
                                                    &longrightarrow; <span class="text-green-600">Correct</span>
                                                @else
                                                    &longrightarrow; <span class="text-red-600">Incorrect</span>
                                                @endif
                                            </p>
                                        @endif
                                    </div>
                                @else
                                    <p class="font-bold text-sm text-red-600">No answer.
                                        <a href="{{ route('admission.examination.index', ['admission_examination' => $admissionExamination->id]) }}?question={{ $questionnaire->id }}&key={{ $loop->iteration }}"
                                           class="font-medium cursor-pointer text-gray-500 hover:text-blue-500 hover:underline">Add
                                            answer?</a>
                                    </p>
                                @endif
                            </li>
                        @endforeach
                    </ol>
                </div>
                @if($admissionExamination->status === ExaminationStatus::pending()->value || $admissionExamination->status === ExaminationStatus::on_going()->value)
                    <div class="flex justify-between items-center p-3">
                        <div class="mt-2">
                            <x-button type="button" wire:click="finishDialog" green>
                                Submit Examination
                            </x-button>
                        </div>
                    </div>
                @else
                    <div class="text-xl font-semibold justify-between items-center p-3">
                        <p>Score: {{ $admissionExamination->total_points }}%</p>
                        <p>Passing: {{ $admissionExamination->passing_score }}%</p>
                        <p>Result: {{ str($admissionExamination->status)->title() }}</p>
                    </div>
                    <div class="text-center mx-auto pt-5">
                        <small class="text-gray-400">Please print this results if required by the college, registrar or
                            guidance office. Exam ID: #{{ $admissionExamination->id }}</small>
                    </div>
                @endif
            @endif
        @endif
    </x-card>
</div>
