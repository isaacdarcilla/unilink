@php
    use Domain\Admission\Enums\SexEnum;
    use Domain\Admission\Enums\GenderPreferenceEnum;
@endphp
<div>
    <x-card class="-space-y-2">
        <form>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                <x-input label="{{ __('First Name') }}" wire:model="first_name" placeholder="{{ __('first name') }}"/>
                <x-input label="{{ __('Middle Name') }}" placeholder="{{ __('middle name') }}"/>
                <x-input label="{{ __('Last Name') }}" placeholder="{{ __('last name') }}"/>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                <x-select
                        label="{{ __('Sex') }}"
                        placeholder="select sex..."
                >
                    @foreach(SexEnum::toArray() as $sex)
                        <x-select.option label="{{ $sex }}" value="{{ str($sex)->lower() }}"/>
                    @endforeach

                </x-select>
                <x-select
                        label="{{ __('Gender Preference') }}"
                        placeholder="select gender preference..."
                >
                    @foreach(GenderPreferenceEnum::toArray() as $gender)
                        <x-select.option label="{{ $gender }}" value="{{ str($gender)->lower() }}"/>
                    @endforeach
                </x-select>
            </div>
            <x-label class="mx-3 pt-3">{{ __('Permanent Address') }}</x-label>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                <x-select
                        type="text"
                        label="{{ __('Region') }}"
                        placeholder="select region..."
                        :options="get_regions()"
                        option-label="region_description"
                        option-value="region_code"
                        wire:model="region_code"
                />
                <x-select
                        label="{{ __('Province') }}"
                        placeholder="select province..."
                        :options="get_provinces($region_code)"
                        option-label="province_description"
                        option-value="province_code"
                        wire:model="province_code"
                />
            </div>
        </form>
    </x-card>
</div>
