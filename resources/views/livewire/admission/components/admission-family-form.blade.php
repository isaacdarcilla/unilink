@php
    use App\Domain\Admission\Enums\FamilyType;use App\Domain\Admission\Enums\HighestEducationEnum;
@endphp
<div>
    <x-stepper active="family"/>
    <x-card class="-space-y-2 bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100">
        <div class="flex justify-between items-center p-3">
            <x-label class="italic font-bold">
                Fields with * are required.
            </x-label>
            <x-button type="submit" sm icon="plus" positive wire:click="addInput">
                Add <span class="sm:inline-flex hidden">Family</span>
            </x-button>
        </div>
        <form wire:submit.prevent="submit">
            @foreach($inputs as $key => $input)
                <div class="grid grid-cols-1 sm:grid-cols-6 gap-4 p-3">
                    <x-select label="{{ __('Type *') }}"
                              id="input_{{$key}}_level"
                              wire:model.defer="inputs.{{$key}}.type"
                              placeholder="select type..."
                    >
                        @foreach(FamilyType::toLabels() as $type)
                            <x-select.option value="{{$type}}">{{$type}}</x-select.option>
                        @endforeach
                    </x-select>
                    <x-input label="{{ __('First Name *') }}"
                             id="input_{{$key}}_first_name"
                             wire:model.defer="inputs.{{$key}}.first_name"
                             placeholder="{{ __('first name') }}"/>
                    <x-input label="{{ __('Middle Name') }}"
                             id="input_{{$key}}_middle_name"
                             wire:model.defer="inputs.{{$key}}.middle_name"
                             placeholder="{{ __('middle name') }}"/>
                    <x-input label="{{ __('Last Name *') }}"
                             id="input_{{$key}}_last_name"
                             wire:model.defer="inputs.{{$key}}.last_name"
                             placeholder="{{ __('last name') }}"/>
                    <x-input label="{{ __('Address *') }}"
                             id="input_{{$key}}_address"
                             wire:model.defer="inputs.{{$key}}.address"
                             placeholder="{{ __('complete address') }}"/>
                    <x-input label="{{ __('Email') }}"
                             id="input_{{$key}}_email_address"
                             wire:model.defer="inputs.{{$key}}._email_address"
                             placeholder="{{ __('email address') }}"/>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-6 gap-4 p-3">
                    <x-input label="{{ __('Mobile Number *') }}"
                             id="input_{{$key}}_mobile_number"
                             wire:model.defer="inputs.{{$key}}.mobile_number"
                             placeholder="{{ __('mobile number') }}"/>
                    <x-select label="{{ __('Educational Attainment *') }}"
                              id="input_{{$key}}_level"
                              wire:model.defer="inputs.{{$key}}.highest_educational_attainment"
                              placeholder="select educational..."
                    >
                        @foreach(HighestEducationEnum::toLabels() as $type)
                            <x-select.option value="{{$type}}">{{$type}}</x-select.option>
                        @endforeach
                    </x-select>
                    <x-input label="{{ __('Occupation *') }}"
                             id="input_{{$key}}_occupation"
                             wire:model.defer="inputs.{{$key}}.occupation"
                             placeholder="{{ __('occupation') }}"/>
                    <x-input label="{{ __('Monthly Income *') }}"
                             id="input_{{$key}}_monthly_income"
                             wire:model.defer="inputs.{{$key}}.monthly_income"
                             placeholder="{{ __('monthly income') }}"/>
                    <x-input label="{{ __('Company') }}"
                             id="input_{{$key}}_company"
                             wire:model.defer="inputs.{{$key}}.company"
                             placeholder="{{ __('company') }}"/>
                    <x-input label="{{ __('Company Address') }}"
                             id="input_{{$key}}_company_address"
                             wire:model.defer="inputs.{{$key}}.company_address"
                             placeholder="{{ __('company address') }}"/>
                </div>
                @if($key > 0)
                    <span role="button" wire:click="removeInput({{$key}})"
                          class="text-red-600 text-sm mx-3">
                            <b>Remove Family Background</b>
                        </span>
                @endif
            @endforeach
            <div class="flex justify-between items-center p-3">
                <a href="{{ route('admission.index') }}">
                    <x-button label="Cancel" flat negative/>
                </a>
                <div>
                    <x-button type="submit" info outline>
                        Save <span class="hidden sm:inline-flex">Family Background</span>
                    </x-button>
                    <x-button type="submit" info>
                        Next <span class="hidden sm:inline-flex">Step: Health</span>
                    </x-button>
                </div>
            </div>
        </form>
    </x-card>
</div>
