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
            <form wire:submit.prevent="submit" class="space-y-4 p-3">
                <div wire:ignore class="font-bold flex justify-between">
                    <p>Question #{{ request('key') }}</p>
                    <p>Points: {{ $currentQuestion->points }}</p>
                </div>
                <p>{{ $currentQuestion->questionnaire }}</p>
                <small>{{ $currentQuestion?->questionnaire_description }}</small>

                @foreach($currentQuestion->choices['choices'] as $key => $choice)
                    <x-radio id="right-label-{{ $key }}" label="{{ $choice }}" value="{{ $key }}" wire:model="answer"/>
                @endforeach

                @if($correct)
                    <p class="font-bold text-green-600">
                        @foreach($currentQuestion->choices['choices'] as $key => $choice)
                            @if($currentQuestion->choices['answer'] === $key)
                                Answer: {{ $choice }}
                            @endif
                        @endforeach
                    </p>
                @endif

                <div class="flex justify-between items-center">
                    <div class="mt-2">
                        <x-button type="submit" :disabled="is_null($answer) || $correct" info>
                            Submit Answer
                        </x-button>
                    </div>
                </div>

                <div class="text-center mx-auto pt-5">
                    <small class="text-gray-400">TIP: You can navigate to the other questions by clicking the <b>Question
                            Stepper</b> above.</small>
                </div>

            </form>
        @endif
    </x-card>
</div>
