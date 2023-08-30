<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-inputs.password id="current_password" type="password" class="mt-1 block w-full"
                               placeholder="current password"
                               wire:model="state.current_password" autocomplete="current-password"/>
            <x-input-error for="current_password" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-inputs.password id="password" type="password" class="mt-1 block w-full" wire:model="state.password"
                               placeholder="new password"
                               autocomplete="new-password"/>
            <x-input-error for="password" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-inputs.password id="password_confirmation" type="password" class="mt-1 block w-full"
                               placeholder="confirm new password"
                               wire:model="state.password_confirmation" autocomplete="new-password"/>
            <x-input-error for="password_confirmation" class="mt-2"/>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button type="submit" class="-ml-[1.5px]" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-button>
        <x-action-message class="ml-3 text-green-600" on="saved">
            {{ __('Saved.') }}
        </x-action-message>
    </x-slot>
</x-form-section>
