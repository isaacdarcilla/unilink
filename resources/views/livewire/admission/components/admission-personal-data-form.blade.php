@php
    use Domain\Admission\Enums\CivilStatusEnum;use Domain\Admission\Enums\GenderPreferenceEnum;use Domain\Admission\Enums\SexEnum;
@endphp
<div>
    <x-stepper/>
    <x-card class="-space-y-2 bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100">
        <form>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                <x-input label="{{ __('First Name') }}" wire:model="first_name" placeholder="{{ __('first name') }}"/>
                <x-input label="{{ __('Middle Name') }}" wire:model="middle_name"
                         placeholder="{{ __('middle name') }}"/>
                <x-input label="{{ __('Last Name') }}" wire:model="last_name" placeholder="{{ __('last name') }}"/>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                <x-select
                        label="{{ __('Sex') }}"
                        placeholder="select sex..."
                        wire:model="sex"
                >
                    @foreach(SexEnum::toArray() as $sex)
                        <x-select.option label="{{ $sex }}" value="{{ str($sex)->lower() }}"/>
                    @endforeach
                </x-select>
                <x-select
                        label="{{ __('Gender Preference') }}"
                        placeholder="select gender preference..."
                        wire:model="gender_preference"
                >
                    @foreach(GenderPreferenceEnum::toArray() as $gender)
                        <x-select.option label="{{ $gender }}" value="{{ str($gender)->lower() }}"/>
                    @endforeach
                </x-select>
            </div>
            <x-label class="mx-3 pt-3">{{ __('Permanent Address') }}</x-label>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                <x-select
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
                <x-select
                        label="{{ __('City/Town') }}"
                        placeholder="select city or town..."
                        :options="get_cities($province_code)"
                        option-label="city_municipality_description"
                        option-value="city_municipality_code"
                        wire:model="city_code"
                />
                <x-select
                        label="{{ __('Barangay') }}"
                        placeholder="select barangay..."
                        :options="get_barangays($city_code)"
                        option-label="barangay_description"
                        option-value="barangay_code"
                        wire:model="barangay_code"
                />
                <x-input label="{{ __('Street') }}" wire:model="street" placeholder="{{ __('street') }}"/>
                <x-input label="{{ __('Zip Code') }}" wire:model="zip_code" placeholder="{{ __('zip code') }}"/>
            </div>
            <x-label class="mx-3 pb-3 pt-3">{{ __('Temporary Address') }}</x-label>
            <x-checkbox id="right-label" class="pt-3 ml-3" label="Same with Permanent Address"
                        wire:model="same_address"/>
            <div @class([
                    'grid grid-cols-1 sm:grid-cols-3 gap-4 p-3',
                    'hidden' => $same_address,
                ])>
                <x-select
                        label="{{ __('Region') }}"
                        placeholder="select region..."
                        :options="get_regions()"
                        option-label="region_description"
                        option-value="region_code"
                        wire:model="temporary_region_code"
                />
                <x-select
                        label="{{ __('Province') }}"
                        placeholder="select province..."
                        :options="get_provinces($temporary_region_code)"
                        option-label="province_description"
                        option-value="province_code"
                        wire:model="temporary_province_code"
                />
                <x-select
                        label="{{ __('City/Town') }}"
                        placeholder="select city or town..."
                        :options="get_cities($temporary_province_code)"
                        option-label="city_municipality_description"
                        option-value="city_municipality_code"
                        wire:model="temporary_city_code"
                />
                <x-select
                        label="{{ __('Barangay') }}"
                        placeholder="select barangay..."
                        :options="get_barangays($temporary_city_code)"
                        option-label="barangay_description"
                        option-value="barangay_code"
                        wire:model="temporary_barangay_code"
                />
                <x-input label="{{ __('Street') }}" wire:model="temporary_street"
                         placeholder="{{ __('temporary street') }}"/>
                <x-input label="{{ __('Zip Code') }}" wire:model="temporary_zip_code"
                         placeholder="{{ __('zip code') }}"/>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 p-3">
                <x-inputs.maskable
                        label="Phone Number"
                        mask="+63 ### ### ####"
                        placeholder="phone number"
                        wire:model="phone_number"
                />
                <x-inputs.maskable
                        label="Landline Number"
                        mask="####-###-#####"
                        placeholder="landline number"
                        wire:model="landline_number"
                />
                <x-input label="{{ __('Email Address') }}" wire:model="email_address"
                         placeholder="{{ __('you@email.com') }}"/>
                <x-input label="{{ __('Facebook Account') }}" wire:model="facebook_account" class="!pl-[7.8rem]"
                         prefix="facebook.com/"/>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 p-3">
                <x-datetime-picker
                        without-time
                        label="Date of Birth"
                        placeholder="date of birth"
                        wire:model.defer="date_of_birth"
                />
                <x-input label="{{ __('Place of Birth') }}" wire:model="place_of_birth"
                         placeholder="{{ __('place of birth') }}"/>
                <x-select
                        label="{{ __('Citizenship') }}"
                        placeholder="select citizenship..."
                        :options="citizenship()"
                        wire:model="citizenship"
                />
                <x-select
                        label="{{ __('Civil Status') }}"
                        placeholder="select civil status..."
                        :options="CivilStatusEnum::toLabels()"
                        wire:model="civil_status"
                />
            </div>
        </form>
    </x-card>
</div>
