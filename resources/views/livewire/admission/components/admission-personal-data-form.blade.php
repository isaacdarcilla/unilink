@php
    use Domain\Admission\Enums\CivilStatusEnum;use Domain\Admission\Enums\GadgetEnum;use Domain\Admission\Enums\GenderPreferenceEnum;use Domain\Admission\Enums\InternetStatus;use Domain\Admission\Enums\ScholarshipGranteeEnum;use Domain\Admission\Enums\SexEnum;
@endphp
<div>
    <x-stepper active="personal"/>
    <x-card class="-space-y-2 bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100">
        <x-label class="italic font-bold p-3">
            {{ $applications->count() > 1 && !$view? '' : 'Fields with * are required.'}}
        </x-label>
        @if($applications->count() > 1 && !$view)
            <div class="text-center mx-auto">
                <img class="text-center mx-auto pt-4" src="{{ asset('assets/goal.png') }}" alt=""
                     width="70">
            </div>
            <p class="mx-5 text-center py-8 text-sm">You have an existing application for admission for this Academic
                year {{ $academic_year?->description }}.<br/>
                Once approved, you will be notified through your email
                at <b class="underline">{{ auth()->user()->email }}</b><br/>or an admission personnel will
                reach out through your mobile number.</p>

            <div class="text-center mx-auto mb-5">
                <a href="{{ route('admission.index') }}">
                    <x-button class="pb-5" info sm label="Go to Dashboard"/>
                </a>
            </div>
            <div class="py-4"></div>
        @else
            <form wire:submit.prevent="submit">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                    <x-input label="{{ __('First Name *') }}" wire:model="first_name"
                             placeholder="{{ __('first name') }}"/>
                    <x-input label="{{ __('Middle Name') }}" wire:model="middle_name"
                             placeholder="{{ __('middle name') }}"/>
                    <x-input label="{{ __('Last Name *') }}" wire:model="last_name"
                             placeholder="{{ __('last name') }}"/>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                    <x-select
                            label="{{ __('Sex *') }}"
                            placeholder="select sex..."
                            :options="SexEnum::toLabels()"
                            wire:model="sex_at_birth"
                    />
                    <x-select
                            label="{{ __('Gender Preference *') }}"
                            placeholder="select gender preference..."
                            :options="GenderPreferenceEnum::toLabels()"
                            wire:model="gender_preference"
                    />
                </div>
                <x-label class="mx-3 pt-3">{{ __('Permanent Address *') }}</x-label>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                    <x-select
                            label="{{ __('Region *') }}"
                            placeholder="select region..."
                            :options="get_regions()"
                            option-label="region_description"
                            option-value="region_code"
                            wire:model="region"
                    />
                    <x-select
                            label="{{ __('Province *') }}"
                            placeholder="select province..."
                            :options="get_provinces($region)"
                            option-label="province_description"
                            option-value="province_code"
                            wire:model="province"
                    />
                    <x-select
                            label="{{ __('Municipality/Town *') }}"
                            placeholder="select municipality or town..."
                            :options="get_cities($province)"
                            option-label="city_municipality_description"
                            option-value="city_municipality_code"
                            wire:model="municipality"
                    />
                    <x-select
                            label="{{ __('Barangay *') }}"
                            placeholder="select barangay..."
                            :options="get_barangays($municipality)"
                            option-label="barangay_description"
                            option-value="barangay_code"
                            wire:model="barangay"
                    />
                    <x-input label="{{ __('Street *') }}" wire:model="street" placeholder="{{ __('street') }}"/>
                    <x-input label="{{ __('Zip Code *') }}" wire:model="zip_code" placeholder="{{ __('zip code') }}"/>
                </div>
                <x-label class="mx-3 pb-3 pt-3">{{ __('Temporary Address') }}</x-label>
                @if(address_enabled($region, $province, $municipality, $barangay, $street, $zip_code))
                    <x-checkbox id="right-label" class="pt-3 ml-3" label="Same with Permanent Address"
                                wire:model="same_address"/>
                @endif
                <div @class([
                    'grid grid-cols-1 sm:grid-cols-3 gap-4 p-3',
                    'hidden' => $same_address,
                ])>
                    <x-select
                            label="{{ __('Region *') }}"
                            placeholder="select region..."
                            :options="get_regions()"
                            option-label="region_description"
                            option-value="region_code"
                            wire:model="temporary_region"
                    />
                    <x-select
                            label="{{ __('Province *') }}"
                            placeholder="select province..."
                            :options="get_provinces($temporary_region)"
                            option-label="province_description"
                            option-value="province_code"
                            wire:model="temporary_province"
                    />
                    <x-select
                            label="{{ __('Municipality/Town *') }}"
                            placeholder="select municipality or town..."
                            :options="get_cities($temporary_province)"
                            option-label="city_municipality_description"
                            option-value="city_municipality_code"
                            wire:model="temporary_municipality"
                    />
                    <x-select
                            label="{{ __('Barangay *') }}"
                            placeholder="select barangay..."
                            :options="get_barangays($temporary_municipality)"
                            option-label="barangay_description"
                            option-value="barangay_code"
                            wire:model="temporary_barangay"
                    />
                    <x-input label="{{ __('Street *') }}" wire:model="temporary_street"
                             placeholder="{{ __('temporary street') }}"/>
                    <x-input label="{{ __('Zip Code *') }}" wire:model="temporary_zip_code"
                             placeholder="{{ __('zip code') }}"/>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 p-3">
                    <x-inputs.maskable
                            label="Mobile Number *"
                            mask="#### ### ####"
                            placeholder="phone number"
                            wire:model="mobile_number"
                    />
                    <x-inputs.maskable
                            label="Landline Number"
                            mask="####-###-#####"
                            placeholder="landline number"
                            wire:model="landline_number"
                    />
                    <x-input label="{{ __('Email Address *') }}" wire:model="email_address"
                             placeholder="{{ __('you@email.com') }}"/>
                    <x-input label="{{ __('Facebook Account') }}" wire:model="facebook_account" class="!pl-[7.8rem]"
                             prefix="facebook.com/"/>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 p-3">
                    <x-datetime-picker
                            without-time
                            label="Date of Birth *"
                            placeholder="date of birth"
                            wire:model.defer="date_of_birth"
                    />
                    <x-input label="{{ __('Place of Birth *') }}" wire:model="place_of_birth"
                             placeholder="{{ __('place of birth') }}"/>
                    <x-select
                            label="{{ __('Citizenship *') }}"
                            placeholder="select citizenship..."
                            :options="citizenship()"
                            wire:model="citizenship"
                    />
                    <x-select
                            label="{{ __('Civil Status *') }}"
                            placeholder="select civil status..."
                            :options="CivilStatusEnum::toLabels()"
                            wire:model="civil_status"
                    />
                    <x-select
                            label="{{ __('Religion *') }}"
                            placeholder="select religion..."
                            :options="religions()"
                            wire:model="religion"
                    />
                    <x-input label="{{ __('Rank in the Family *') }}" wire:model="rank_in_family"
                             placeholder="{{ __('rank in the family') }}"/>
                    <x-input label="{{ __('Number of Siblings *') }}" wire:model="number_of_siblings"
                             placeholder="{{ __('number of siblings') }}"/>
                    <x-input label="{{ __('Ages of Siblings in the Family *') }}" wire:model="mean_ages_of_siblings"
                             placeholder="{{ __('ages of siblings') }}"/>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 p-3">
                    <x-select
                            label="{{ __('Special Skills *') }}"
                            placeholder="select special skills..."
                            :options="skills()"
                            multiselect
                            wire:model="special_skills"
                    />
                    <x-select
                            label="{{ __('Favorite Sports *') }}"
                            placeholder="select favorite sports..."
                            :options="sports()"
                            multiselect
                            wire:model="favorite_sports"
                    />
                    <x-select
                            label="{{ __('STUFAP Grantee *') }}"
                            placeholder="are you STUFAP grantee..."
                            :options="ScholarshipGranteeEnum::toLabels()"
                            wire:model="scholarship_grantee"
                    />
                    <x-input label="{{ __('Learner Reference Number') }}" wire:model="lrn"
                             placeholder="{{ __('learner\'s reference number') }}"/>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                    <x-select
                            label="{{ __('Program First Choice *') }}"
                            placeholder="first choice..."
                            wire:model="program_first_choice"
                    >
                        @foreach($programs as $program)
                            <x-select.option :label="$program->name" :value="$program->name"/>
                        @endforeach
                    </x-select>
                    <x-select
                            label="{{ __('Program Second Choice *') }}"
                            placeholder="second choice..."
                            wire:model="program_second_choice"
                    >
                        @foreach($programs as $program)
                            <x-select.option :label="$program->name" :value="$program->name"/>
                        @endforeach
                    </x-select>
                    <x-select
                            label="{{ __('Program Third Choice *') }}"
                            placeholder="third choice..."
                            wire:model="program_third_choice"
                    >
                        @foreach($programs as $program)
                            <x-select.option :label="$program->name" :value="$program->name"/>
                        @endforeach
                    </x-select>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                    <x-select
                            label="{{ __('Gadgets Used in Studying *') }}"
                            placeholder="select gadgets..."
                            :options="GadgetEnum::toLabels()"
                            multiselect
                            wire:model="gadget"
                    />
                    <x-select
                            label="{{ __('Internet Connectivity Status *') }}"
                            placeholder="select internet status..."
                            :options="InternetStatus::toLabels()"
                            wire:model="internet_status"
                    />
                    <x-select
                            label="{{ __('Campus *') }}"
                            placeholder="select campus..."
                            wire:model="campus"
                    >
                        @foreach($campuses as $campus)
                            <x-select.option :label="$campus->name" :value="$campus->id"/>
                        @endforeach
                    </x-select>
                </div>

                <div class="flex justify-between items-center p-3">
                    <a href="{{ route('admission.index') }}">
                        <x-button label="Cancel" flat negative/>
                    </a>
                    <x-button type="submit" info>
                        Save Information <span class="hidden sm:inline-flex">& Go To Next Step</span>
                    </x-button>
                </div>
            </form>
        @endif
    </x-card>
</div>
