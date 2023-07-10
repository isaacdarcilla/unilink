@php
    use App\Domain\Admission\Enums\FamilyType;use App\Domain\Admission\Enums\HighestEducationEnum;
@endphp
<div>
    <x-stepper active="family"/>
    <x-card class="-space-y-2 bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100">
        @if($disableInputs)
            <x-label class="mb-3 p-3 text-red-500 font-semibold">
                Input forms are temporarily disabled and editing is not allowed because your application is FOR REVIEW.
            </x-label>
        @endif
        <div class="flex justify-between items-center p-3">
            <x-label class="italic font-bold">
                Fields with * are required.
            </x-label>
            <x-button type="submit" sm icon="plus" positive wire:click="addInput" :disabled="$disableInputs">
                Add <span class="sm:inline-flex hidden">Family</span>
            </x-button>
        </div>
        <form wire:submit.prevent="submit">
            @foreach($inputs as $key => $input)
                <div class="grid grid-cols-1 sm:grid-cols-6 gap-4 p-3">
                    <x-native-select label="{{ __('Type *') }}" :disabled="$disableInputs"
                                     id="input_{{$key}}_type"
                                     wire:model.defer="inputs.{{$key}}.type"
                    >
                        <option value="" disabled selected>select type...</option>
                        @foreach(FamilyType::toLabels() as $family)
                            <option value="{{ $family }}">{{ $family }}</option>
                        @endforeach
                    </x-native-select>
                    <x-input label="{{ __('First Name *') }}" :disabled="$disableInputs"
                             id="input_{{$key}}_first_name"
                             wire:model.defer="inputs.{{$key}}.first_name"
                             placeholder="{{ __('first name') }}"/>
                    <x-input label="{{ __('Middle Name') }}" :disabled="$disableInputs"
                             id="input_{{$key}}_middle_name"
                             wire:model.defer="inputs.{{$key}}.middle_name"
                             placeholder="{{ __('middle name') }}"/>
                    <x-input label="{{ __('Last Name *') }}" :disabled="$disableInputs"
                             id="input_{{$key}}_last_name"
                             wire:model.defer="inputs.{{$key}}.last_name"
                             placeholder="{{ __('last name') }}"/>
                    <x-input label="{{ __('Address *') }}" :disabled="$disableInputs"
                             id="input_{{$key}}_address"
                             wire:model.defer="inputs.{{$key}}.address"
                             placeholder="{{ __('complete address') }}"/>
                    <x-input label="{{ __('Email') }}" :disabled="$disableInputs"
                             id="input_{{$key}}_email_address"
                             wire:model.defer="inputs.{{$key}}.email_address"
                             placeholder="{{ __('email address') }}"/>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-6 gap-4 p-3">
                    <x-input label="{{ __('Mobile Number *') }}" :disabled="$disableInputs"
                             id="input_{{$key}}_mobile_number"
                             wire:model.defer="inputs.{{$key}}.mobile_number"
                             placeholder="{{ __('mobile number') }}"/>
                    <x-native-select label="{{ __('Educational Attainment *') }}" :disabled="$disableInputs"
                                     id="input_{{$key}}_highest_educational_attainment"
                                     wire:model.defer="inputs.{{$key}}.highest_educational_attainment"
                    >
                        <option value="" disabled selected>select educational...</option>
                        @foreach(HighestEducationEnum::toLabels() as $education)
                            <option value="{{ $education }}">{{ $education }}</option>
                        @endforeach
                    </x-native-select>
                    <x-input label="{{ __('Occupation *') }}" :disabled="$disableInputs"
                             id="input_{{$key}}_occupation"
                             wire:model.defer="inputs.{{$key}}.occupation"
                             placeholder="{{ __('occupation') }}"/>
                    <x-input label="{{ __('Monthly Income *') }}" :disabled="$disableInputs"
                             id="input_{{$key}}_monthly_income"
                             wire:model.defer="inputs.{{$key}}.monthly_income"
                             placeholder="{{ __('monthly income') }}"/>
                    <x-input label="{{ __('Company') }}" :disabled="$disableInputs"
                             id="input_{{$key}}_company"
                             wire:model.defer="inputs.{{$key}}.company"
                             placeholder="{{ __('company') }}"/>
                    <x-input label="{{ __('Company Address') }}" :disabled="$disableInputs"
                             id="input_{{$key}}_company_address"
                             wire:model.defer="inputs.{{$key}}.company_address"
                             placeholder="{{ __('company address') }}"/>
                </div>
                @if(!$disableInputs)
                    @if($key > 0 || $familyFilled)
                        <span role="button" wire:click="removeInput({{$key}}, {{ $input['id'] ?? null }})"
                              class="text-red-600 text-sm mx-3">
                            <b>Remove Family Background</b>
                        </span>
                    @endif
                @endif
            @endforeach
            <div class="flex justify-between items-center p-3">
                <a href="{{ route('admission.index') }}">
                    <x-button label="Cancel" flat negative/>
                </a>
                <div>
                    <x-button type="submit" info>
                        Save Family Background<span class="hidden sm:inline-flex">& Go To Next Step</span>
                    </x-button>
                </div>
            </div>
        </form>
    </x-card>
</div>
