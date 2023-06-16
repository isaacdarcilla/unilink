<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
            <x-label class="text-center mx-auto font-bold text-xl mt-3">Seamless solution with <span
                        class="text-border-black text-shadow-black text-gray-600">UNILink&trade;</span>
            </x-label>
            <div class="max-w-md mx-auto text-center mt-3">
                <h1 class="text-center text-lg">Forgot password</h1>

                <p class="mt-4 text-base text-denim-600">
                    Forgot your password? No problem. Just let us know your email address, and we will email you a
                    password reset link that will allow you to choose a new one.
                </p>
            </div>
        </x-slot>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-errors class="mb-4"/>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block mt-2">
                <x-label for="email" value="{{ __('Email') }}"/>
                <x-input id="email" placeholder="you@email.com" class="block mt-1 w-full" type="text" name="email"
                         :value="old('email')"
                         autofocus autocomplete="username"/>
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none"
                   href="{{ route('login') }}">
                    {{ __('Remember your password?') }}
                </a>

                <x-button type="submit">
                    {{ __('Email Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
