<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto p-3 sm:px-6 lg:px-6">
            <div class="sm:rounded-lg space-y-4">
                <div class="flex justify-between items-center align-middle p-3 gap-3">
                    <x-label link class="font-bolder text-[16px]"><a class="text-gray-500"
                                                                     href="{{ route('admission.index') }}">Admission
                            History</a> > Personal Data
                    </x-label>
                    <x-button positive sm icon="save" label="Save"/>
                </div>
                <div class="relative shadow-md sm:rounded-lg">
                    @livewire('admission.components.admission-personal-data-form', ['user' => $user])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
