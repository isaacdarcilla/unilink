@php
    use Domain\Admission\Enums\CivilStatusEnum;use Domain\Admission\Enums\GadgetEnum;use Domain\Admission\Enums\GenderPreferenceEnum;use Domain\Admission\Enums\InternetStatus;use Domain\Admission\Enums\ScholarshipGranteeEnum;use Domain\Admission\Enums\SexEnum;

    $id = is_url_numeric();
@endphp
<div>
    <x-stepper active="personal"/>
    <x-card class="-space-y-2 bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100">
        @if($disableInputs)
            <x-alert title="Application Status"
                     message="Input forms are temporarily disabled and editing is not allowed."
                     class="text-red-500 border bg-red-100 border-red-300 font-semibold mx-3"/>
        @endif
        <x-label class="italic font-bold p-3">
            {{ $applications->count() >= 1 && !$view || !$id ? '' : 'Fields with * are required.'}}
        </x-label>
        @if($applications->count() >= 1 && !$view || !$id)
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
                    <x-button info sm label="Go to Dashboard"/>
                </a>
            </div>
            <div class="py-4"></div>
        @else
            <form wire:submit.prevent="submit">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                    <x-input label="{{ __('First Name *') }}" wire:model="first_name" :disabled="$disableInputs"
                             placeholder="{{ __('first name') }}"/>
                    <x-input label="{{ __('Middle Name') }}" wire:model="middle_name" :disabled="$disableInputs"
                             placeholder="{{ __('middle name') }}"/>
                    <x-input label="{{ __('Last Name *') }}" wire:model="last_name" :disabled="$disableInputs"
                             placeholder="{{ __('last name') }}"/>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                    <x-select
                            :disabled="$disableInputs"
                            label="{{ __('Sex *') }}"
                            placeholder="select sex..."
                            :options="SexEnum::toLabels()"
                            wire:model="sex_at_birth"
                    />
                    <x-select
                            :disabled="$disableInputs"
                            label="{{ __('Gender Preference *') }}"
                            placeholder="select gender preference..."
                            :options="GenderPreferenceEnum::toLabels()"
                            wire:model="gender_preference"
                    />
                </div>
                <x-label class="mx-3 pt-3">{{ __('Permanent Address *') }}</x-label>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                    <x-select
                            :disabled="$disableInputs"
                            label="{{ __('Region *') }}"
                            placeholder="select region..."
                            :options="get_regions()"
                            option-label="region_description"
                            option-value="region_code"
                            wire:model="region"
                    />
                    <x-select
                            :disabled="$disableInputs"
                            label="{{ __('Province *') }}"
                            placeholder="select province..."
                            :options="get_provinces($region)"
                            option-label="province_description"
                            option-value="province_code"
                            wire:model="province"
                    />
                    <x-select
                            :disabled="$disableInputs"
                            label="{{ __('Municipality/Town *') }}"
                            placeholder="select municipality or town..."
                            :options="get_cities($province)"
                            option-label="city_municipality_description"
                            option-value="city_municipality_code"
                            wire:model="municipality"
                    />
                    <x-select
                            :disabled="$disableInputs"
                            label="{{ __('Barangay *') }}"
                            placeholder="select barangay..."
                            :options="get_barangays($municipality)"
                            option-label="barangay_description"
                            option-value="barangay_code"
                            wire:model="barangay"
                    />
                    <x-input label="{{ __('Street *') }}" wire:model="street" placeholder="{{ __('street') }}"
                             :disabled="$disableInputs"/>
                    <x-input label="{{ __('Zip Code *') }}" wire:model="zip_code" placeholder="{{ __('zip code') }}"
                             :disabled="$disableInputs"/>
                </div>
                <x-label class="mx-3 pb-3 pt-3">{{ __('Temporary Address') }}</x-label>
                @if(address_enabled($region, $province, $municipality, $barangay, $street, $zip_code))
                    <x-checkbox :disabled="$disableInputs" id="right-label" class="pt-3 ml-3"
                                label="Same with Permanent Address"
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
                            :disabled="$disableInputs"
                    />
                    <x-select
                            label="{{ __('Province *') }}"
                            placeholder="select province..."
                            :options="get_provinces($temporary_region)"
                            option-label="province_description"
                            option-value="province_code"
                            wire:model="temporary_province"
                            :disabled="$disableInputs"
                    />
                    <x-select
                            label="{{ __('Municipality/Town *') }}"
                            placeholder="select municipality or town..."
                            :options="get_cities($temporary_province)"
                            option-label="city_municipality_description"
                            option-value="city_municipality_code"
                            wire:model="temporary_municipality"
                            :disabled="$disableInputs"
                    />
                    <x-select
                            label="{{ __('Barangay *') }}"
                            placeholder="select barangay..."
                            :options="get_barangays($temporary_municipality)"
                            option-label="barangay_description"
                            option-value="barangay_code"
                            wire:model="temporary_barangay"
                            :disabled="$disableInputs"
                    />
                    <x-input label="{{ __('Street *') }}" wire:model="temporary_street" :disabled="$disableInputs"
                             placeholder="{{ __('temporary street') }}"/>
                    <x-input label="{{ __('Zip Code *') }}" wire:model="temporary_zip_code" :disabled="$disableInputs"
                             placeholder="{{ __('zip code') }}"/>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 p-3">
                    <x-inputs.maskable
                            label="Mobile Number *"
                            mask="#### ### ####"
                            placeholder="phone number"
                            wire:model="mobile_number"
                            :disabled="$disableInputs"
                    />
                    <x-inputs.maskable
                            label="Landline Number"
                            mask="####-###-#####"
                            placeholder="landline number"
                            wire:model="landline_number"
                            :disabled="$disableInputs"
                    />
                    <x-input label="{{ __('Email Address *') }}" wire:model="email_address" :disabled="$disableInputs"
                             placeholder="{{ __('you@email.com') }}"/>
                    <x-input label="{{ __('Facebook Account') }}" wire:model="facebook_account" class="!pl-[7.8rem]"
                             :disabled="$disableInputs"
                             prefix="facebook.com/"/>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 p-3">
                    <x-datetime-picker
                            :disabled="$disableInputs"
                            without-time
                            label="Date of Birth *"
                            placeholder="date of birth"
                            wire:model.defer="date_of_birth"
                    />
                    <x-input label="{{ __('Place of Birth *') }}" wire:model="place_of_birth" :disabled="$disableInputs"
                             placeholder="{{ __('place of birth') }}"/>
                    <x-select
                            :disabled="$disableInputs"
                            label="{{ __('Citizenship *') }}"
                            placeholder="select citizenship..."
                            :options="citizenship()"
                            wire:model="citizenship"
                    />
                    <x-select
                            :disabled="$disableInputs"
                            label="{{ __('Civil Status *') }}"
                            placeholder="select civil status..."
                            :options="CivilStatusEnum::toLabels()"
                            wire:model="civil_status"
                    />
                    <x-select
                            :disabled="$disableInputs"
                            label="{{ __('Religion *') }}"
                            placeholder="select religion..."
                            :options="religions()"
                            wire:model="religion"
                    />
                    <x-input label="{{ __('Rank in the Family *') }}" wire:model="rank_in_family"
                             :disabled="$disableInputs"
                             placeholder="{{ __('rank in the family') }}"/>
                    <x-input label="{{ __('Number of Siblings *') }}" wire:model="number_of_siblings"
                             :disabled="$disableInputs"
                             placeholder="{{ __('number of siblings') }}"/>
                    <x-input label="{{ __('Ages of Siblings in the Family *') }}" wire:model="mean_ages_of_siblings"
                             :disabled="$disableInputs"
                             placeholder="{{ __('ages of siblings') }}"/>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 p-3">
                    <x-select
                            :disabled="$disableInputs"
                            label="{{ __('Special Skills *') }}"
                            placeholder="select special skills..."
                            :options="skills()"
                            multiselect
                            wire:model="special_skills"
                    />
                    <x-select
                            :disabled="$disableInputs"
                            label="{{ __('Favorite Sports *') }}"
                            placeholder="select favorite sports..."
                            :options="sports()"
                            multiselect
                            wire:model="favorite_sports"
                    />
                    <x-select
                            :disabled="$disableInputs"
                            label="{{ __('STUFAP Grantee *') }}"
                            placeholder="are you STUFAP grantee..."
                            :options="ScholarshipGranteeEnum::toLabels()"
                            wire:model="scholarship_grantee"
                    />
                    <x-input label="{{ __('Learner Reference Number') }}" wire:model="lrn" :disabled="$disableInputs"
                             placeholder="{{ __('learner\'s reference number') }}"/>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                    <x-select
                            label="{{ __('Program First Choice *') }}" :disabled="$disableInputs"
                            placeholder="first choice..."
                            wire:model="program_first_choice"
                    >
                        @foreach($programs as $program)
                            <x-select.option :label="$program->name" :value="$program->name"/>
                        @endforeach
                    </x-select>
                    <x-select
                            :disabled="$disableInputs"
                            label="{{ __('Program Second Choice *') }}"
                            placeholder="second choice..."
                            wire:model="program_second_choice"
                    >
                        @foreach($programs as $program)
                            <x-select.option :label="$program->name" :value="$program->name"/>
                        @endforeach
                    </x-select>
                    <x-select
                            :disabled="$disableInputs"
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
                            :disabled="$disableInputs"
                            label="{{ __('Gadgets Used in Studying *') }}"
                            placeholder="select gadgets..."
                            :options="GadgetEnum::toLabels()"
                            multiselect
                            wire:model="gadget"
                    />
                    <x-select
                            :disabled="$disableInputs"
                            label="{{ __('Internet Connectivity Status *') }}"
                            placeholder="select internet status..."
                            :options="InternetStatus::toLabels()"
                            wire:model="internet_status"
                    />
                    <x-select
                            :disabled="$disableInputs"
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
                    <x-button type="submit" info :disabled="$applications->count() >= 1 && !$view">
                        Save Information <span class="hidden sm:inline-flex">& Go To Next Step</span>
                    </x-button>
                </div>
            </form>
        @endif
    </x-card>
</div>
