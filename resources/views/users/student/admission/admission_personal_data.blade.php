<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto p-3 sm:px-6 lg:px-6">
            <div class="overflow-hidden sm:rounded-lg space-y-4">
                <div class="flex justify-between items-center align-middle p-3 gap-3">
                    <x-label link class="font-bolder text-[16px]"><a class="underline text-gray-500"
                                                                     href="{{ route('admission.index') }}">Admission
                            History</a> > Personal Data
                    </x-label>
                    <x-button positive sm icon="save" label="Save"/>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <x-card>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                            <x-input label="Name" placeholder="Your full name"/>
                            <x-input label="Phone" placeholder="USA phone"/>
                            <x-input label="Phone" placeholder="USA phone"/>
                        </div>
                    </x-card>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
