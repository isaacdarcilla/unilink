@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6 p-2']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="px-4 py-5 bg-white sm:p-6 shadow {{ isset($actions) ? 'rounded-tl-lg rounded-tr-lg' : 'rounded-lg' }}">
                <div class="grid gap-4">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-start px-4 py-3 bg-gray-50 text-right sm:px-6 shadow rounded-bl-lg rounded-br-lg">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
