<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
            <x-label class="text-center mx-auto font-bold text-xl mt-3">School management with <span
                        class="text-border-black text-shadow-black text-gray-600">UNILink&trade;</span>
            </x-label>
            <div class="max-w-md mx-auto text-center mt-3">
                <h1 class="text-center text-lg">Verify your email <span
                            class="underline">{{ auth()->user()->email ?? '' }}</span></h1>
            </div>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-justify text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <div>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md ml-2">
                        {{ __('Log out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
