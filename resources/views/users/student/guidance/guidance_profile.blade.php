<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto p-3 sm:px-6 lg:px-8">
            <div class="sm:rounded-lg space-y-4">
                <div class="flex justify-between items-center align-middle -mt-4 gap-3">
                    <x-label link class="font-bolder text-[16px]"><a class="text-gray-500"
                                                                     href="{{ route('guidance.index') }}">Guidance
                            History</a> > Personal Profile
                    </x-label>
                </div>
                <div class="relative shadow-md sm:rounded-lg rounded-none">
                    @livewire('guidance.components.guidance-profile-form', ['user' => $user, 'guidanceProfile' => $guidanceProfile])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
