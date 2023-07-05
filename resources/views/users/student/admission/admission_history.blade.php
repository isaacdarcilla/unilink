<x-app-layout>
    <div class="-pt-2">
        <div class="max-w-7xl mx-auto p-3 sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg space-y-4">
                <div class="flex justify-between items-center align-middle -mt-4 pt-3">
                    <x-label link class="font-bolder text-[16px]">My Application History
                        @if($active)
                            for <b>A.Y. {{ $active->description }}</b>
                        @endif
                    </x-label>
                    <a href="{{ route('admission.personal_data') }}" class="py-3 pr-1">
                        <x-button info sm icon="plus">
                            New <span class="hidden sm:inline-flex">Application</span>
                        </x-button>
                    </a>
                </div>
            </div>
            @livewire('admission.components.admission-history')
        </div>
    </div>
</x-app-layout>
