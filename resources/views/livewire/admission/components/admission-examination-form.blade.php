<div>
    <x-exam-stepper :exam_id="$admissionExamination->id" :items="$questionnaires"/>
    <x-card class="-space-y-2 bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100">
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
        </form>
    </x-card>
</div>
