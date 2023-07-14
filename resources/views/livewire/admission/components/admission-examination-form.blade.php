<div>
    @if($admissionExamination->status !== \App\Domain\Admission\Enums\ExaminationStatus::pending()->value)
        <x-exam-stepper :exam_id="$admissionExamination->id" :items="$questionnaires"/>
    @endif
    <x-card class="-space-y-2 bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100">
        @if($admissionExamination->status === \App\Domain\Admission\Enums\ExaminationStatus::pending()->value)
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

                <form wire:submit.prevent="submit" class="space-y-4 p-3">
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
                                     wire:model="answer"/>
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
                    <p class="font-bold">Finish Examination</p>
                    <small class="text-justify font-semibold">
                        Tap on the 'Finish Examination' button below to submit your entrance examination. Results will
                        be generated
                        automatically after finishing the examination.
                    </small>
                </div>
                <div class="pt-3 p-3">
                    <ol class="space-y-4">
                        @foreach($questionnaires as $key => $questionnaire)
                            <li>
                                <small>Question #{{ $loop->iteration }}
                                    : {{ $questionnaire->questionnaire }}</small>
                                @foreach($questionnaire->choices['choices'] as $keyQuestion => $c)
                                    @if($questionnaire->admission_examination_answer)
                                        @if($questionnaire->admission_examination_answer->answer === $keyQuestion)
                                            <p class="font-bold">{{ $c }}</p>
                                        @endif
                                    @else
                                        @if($loop->first)
                                            <p class="font-bold text-sm text-red-600">No answer.
                                                <a href="{{ route('admission.examination.index', ['admission_examination' => $admissionExamination->id]) }}?question={{ $questionnaire->id }}&key={{ $loop->parent->iteration }}"
                                                   class="font-medium cursor-pointer text-gray-500 hover:text-blue-500 hover:underline">Add
                                                    answer?</a>
                                            </p>
                                        @endif
                                    @endif
                                @endforeach
                            </li>
                        @endforeach
                    </ol>
                </div>
                @if($admissionExamination->status === \App\Domain\Admission\Enums\ExaminationStatus::pending()->value || $admissionExamination->status === \App\Domain\Admission\Enums\ExaminationStatus::on_going()->value)
                    <div class="flex justify-between items-center p-3">
                        <div class="mt-2">
                            <x-button type="button" wire:click="finishDialog" green>
                                Finish Examination
                            </x-button>
                        </div>
                    </div>
                @endif
            @endif
        @endif
    </x-card>
</div>
