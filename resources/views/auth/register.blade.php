@php use App\Admin\Enums\RoleEnum; @endphp
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

        <x-label class="font-bold pt-3 text-lg">Register new account</x-label>

        <form method="POST" class="space-y-4" action="{{ route('register') }}">
            @csrf

            <x-input id="first_name" placeholder="{{ __('first name')}}" class="block mt-1 w-full" type="text"
                     name="first_name" :value="old('first_name')" autofocus
                     autocomplete="first_name"/>

            <x-input id="middle_name" placeholder="{{ __('middle name')}}" class="block mt-1 w-full" type="text"
                     name="middle_name" :value="old('middle_name')" autofocus
                     autocomplete="middle_name"/>

            <x-input id="last_name" placeholder="{{ __('last name')}}" class="block mt-1 w-full" type="text"
                     name="last_name" :value="old('last_name')" autofocus
                     autocomplete="last_name"/>

            <x-input id="phone_number" placeholder="{{ __('phone number')}}" class="block mt-1 w-full"
                     type="text"
                     name="phone_number" :value="old('phone_number', '+63')"/>

            <x-input id="email" placeholder="{{ __('you@email.com')}}" class="block mt-1 w-full" type="text"
                     name="email" :value="old('email')"/>

            <x-inputs.password id="password" placeholder="{{ __('password')}}" class="block mt-1 w-full"
                               type="password" name="password"
                               autocomplete="new-password"/>

            <x-inputs.password id="password_confirmation" placeholder="{{ __('confirm password')}}"
                               class="block mt-1 w-full" type="password"
                               name="password_confirmation" autocomplete="new-password"/>

            <x-native-select label="{{ __('I am a...') }}" name="role">
                <option selected disabled>{{ __('Select a role..') }}.</option>
                <option @selected(old('role') == RoleEnum::student()->value) value="{{ RoleEnum::student()->value }}">{{ RoleEnum::student()->label }}</option>
                <option @selected(old('role') == RoleEnum::parents()->value) value="{{ RoleEnum::parents()->value }}">{{ RoleEnum::parents()->label }}</option>
            </x-native-select>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" checked id="terms" required/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-between mt-5">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md"
                   href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4" type="submit">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
