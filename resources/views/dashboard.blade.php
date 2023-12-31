<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto p-3 sm:px-6 lg:px-6">
            <div class="overflow-hidden sm:rounded-lg mx-auto">
                <div class="grid grid-cols-1 md:grid-cold-2 lg:grid-cols-3 gap-4">
                    <div class="block max-w-sm p-6 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-slate-100 via-slate-200 to-sky-100 border border-gray-200 rounded-lg shadow hover:opacity-80">
                        <div class="p-2 space-y-2">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Admission for New
                                Students</h5>
                            <x-label>
                                Admission for incoming freshmen students
                                @if($active)
                                    in <b>A.Y. {{ $active->description }}</b>
                                @endif
                                is now open.
                            </x-label>
                            <a href="{{route('admission.index') }}">
                                <x-button info label="{{ $role ? 'Fill Form' : 'View Applications' }}" class="mt-2"
                                          right-icon="arrow-right"/>
                            </a>
                        </div>
                    </div>

                    <div class="block max-w-sm p-6 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-slate-100 via-slate-200 to-sky-100 border border-gray-200 rounded-lg shadow hover:opacity-80">
                        <div class="p-2 space-y-2">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Guidance Counseling</h5>
                            <x-label>
                                Fill up your Individual Student Profile required by the Guidance Counseling Testing
                                Office
                            </x-label>
                            <a href="{{route('guidance.index') }}">
                                <x-button info label="{{ $role ? 'Fill Form' : 'View Profile' }}" class="mt-2"
                                          right-icon="arrow-right"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
