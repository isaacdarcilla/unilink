<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto p-3 sm:px-6 lg:px-8">
            <div class="sm:rounded-lg space-y-4">
                <div class="flex justify-between items-center align-middle -mt-4 gap-3">
                    <x-label link class="font-bolder text-[16px]"><a class="text-gray-500"
                                                                     href="{{ route('admission.index') }}">Admission
                            History</a> > Form Completed
                    </x-label>
                </div>
                <div class="relative shadow-md sm:rounded-lg rounded-none">
                    <x-stepper active="completed"/>
                    <x-card class="-space-y-2 bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100">
                        <div class="text-center mx-auto">
                            <img class="text-center mx-auto pt-4" src="{{ asset('assets/goal.png') }}" alt=""
                                 width="70">
                        </div>
                        <p class="mx-5 text-center py-8 text-sm">Admission application form completed successfully! Your
                            application is <b>FOR REVIEW</b>.<br/>Once approved, you will be notified through your email
                            at <b class="underline">{{ auth()->user()->email }}</b><br/>or an admission personnel will
                            reach out
                            through your mobile number. Good luck!</p>

                        <div class="text-center mx-auto mb-5">
                            <a href="{{ route('admission.index') }}">
                                <x-button class="pb-5" info sm label="Go to dashboard"/>
                            </a>
                        </div>
                        <div class="py-4"></div>
                    </x-card>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
