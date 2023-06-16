<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
            <x-label class="text-center mx-auto font-bold text-xl mt-3">Seamless solution with <span
                        class="text-border-black text-shadow-black text-gray-600">UNILink&trade;</span>
                <div class="max-w-md mx-auto text-center mt-3">
                    <h1 class="text-center text-lg">Reset your password <span
                                class="underline">{{ request('email') }}</span></h1>
                </div>
            </x-label>
        </x-slot>

        <x-errors class="mb-4"/>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-input placeholder="you@email.com" id="email" class="block mt-1 w-full" type="email" name="email"
                         :value="old('email', $request->email)" required autofocus autocomplete="username"/>
            </div>

            <div class="mt-4">
                <x-inputs.password placeholder="{{ __('password')}}" id="password" class="block mt-1 w-full"
                                   type="password" name="password"
                                   autocomplete="new-password"/>
            </div>

            <div class="mt-4">
                <x-inputs.password placeholder="{{ __('confirm password')}}" id="password_confirmation"
                                   class="block mt-1 w-full" type="password"
                                   name="password_confirmation" autocomplete="new-password"/>
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none"
                   href="{{ route('login') }}">
                    {{ __('Login instead') }}
                </a>

                <x-button type="submit">
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
