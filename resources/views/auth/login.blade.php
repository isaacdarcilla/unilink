<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
            <x-tenant-label class="text-center mx-auto font-bold text-xl mt-3"/>
            <x-label class="text-center mx-auto font-bold text-xl">School Management with <span
                        class="text-border-black text-shadow-black text-gray-600">UNILink&trade;</span>
            </x-label>
        </x-slot>

        <x-errors class="mb-4"/>

        @if (session('status'))
            <div class="mb-3 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-label class="font-bold py-3 text-lg">Login to you account</x-label>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input placeholder="you@email.com" id="email" class="block mt-1 w-full" type="text" name="email"
                         :value="old('email')" autofocus
                         autocomplete="username"/>
            </div>

            <div class="mt-4">
                <x-inputs.password placeholder="password" id="password" class="block mt-1 w-full" type="password"
                                   name="password"
                                   autocomplete="current-password"/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" checked name="remember"/>
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button outline type="submit" class="ml-4" label="{{ __('Log in') }}"/>
            </div>
        </form>

        <hr class="mt-5"/>

        <x-label class="font-bold mt-3 mx-auto text-center text-lg text-muted">Don't have an account yet?</x-label>

        <x-label class="font-bold mx-auto text-center text-lg"><a class="underline" href="{{ route('register') }}">
                Create an account
            </a> and get started.
        </x-label>
    </x-authentication-card>

</x-guest-layout>
