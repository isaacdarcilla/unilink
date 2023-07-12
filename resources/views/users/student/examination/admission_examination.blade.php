<x-app-layout>
    <div class="-pt-2">
        <div class="max-w-7xl mx-auto p-3 sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg space-y-4">
                <div class="flex justify-between items-center align-middle -mt-4 pt-3">
                    <x-label link class="font-bolder text-[16px]">Entrance Examination
                        <b>A.Y. {{ $active->description }}</b>
                    </x-label>
                    <a href="{{ route('admission.index') }}" class="py-3 pr-1">
                        <x-button negative sm icon="x">
                            Exit <span class="hidden sm:inline-flex">Examination</span>
                        </x-button>
                    </a>
                </div>
            </div>
            @livewire('admission.components.admission-examination-form', ['admissionExamination' => $admissionExamination])
        </div>
    </div>
</x-app-layout>
