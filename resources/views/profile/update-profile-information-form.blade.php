<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-input id="prefix_name" type="text" class="mt-1 block w-full" placeholder="prefix name"
                     wire:model.defer="state.prefix_name"/>
            <x-input-error for="prefix_name" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-input id="first_name" type="text" class="mt-1 block w-full" placeholder="first name"
                     wire:model.defer="state.first_name" autocomplete="first_name"/>
            <x-input-error for="first_name" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-input id="middle_name" type="text" class="mt-1 block w-full" placeholder="middle name"
                     wire:model.defer="state.middle_name"/>
            <x-input-error for="middle_name" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-input id="last_name" type="text" class="mt-1 block w-full" placeholder="last name"
                     wire:model.defer="state.last_name"/>
            <x-input-error for="last_name" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-input id="suffix_name" type="text" class="mt-1 block w-full" placeholder="suffix name"
                     wire:model.defer="state.suffix_name"/>
            <x-input-error for="suffix_name" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-input id="phone_number" type="text" class="mt-1 block w-full" placeholder="phone number"
                     wire:model.defer="state.phone_number"/>
            <x-input-error for="phone_number" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-input id="email" type="email" class="mt-1 block w-full" placeholder="you@email.com"
                     wire:model.defer="state.email"
                     autocomplete="email"/>
            <x-input-error for="email" class="mt-2"/>

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-3">
                    {{ __('Your email address is unverified.') }}

                    <button type="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button type="submit" class="-ml-[1.5px]" wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
        <x-action-message class="ml-3 text-green-600" on="saved">
            {{ __('Saved.') }}
        </x-action-message>
    </x-slot>
</x-form-section>
