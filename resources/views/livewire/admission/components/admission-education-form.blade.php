<div>
    <x-stepper active="education"/>
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
                Add <span class="sm:inline-flex hidden">Education</span>
            </x-button>
        </div>
        <form wire:submit.prevent="submit">
            @foreach($inputs as $key => $input)
                <div class="grid grid-cols-1 sm:grid-cols-6 gap-4 p-3">
                    <x-native-select label="{{ __('Level *') }}"
                                     :disabled="$disableInputs"
                                     id="input_{{$key}}_level"
                                     wire:model.defer="inputs.{{$key}}.level"
                                     placeholder="select level...">
                        <option value="" disabled selected>select level...</option>
                        @foreach($levels as $level)
                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                        @endforeach
                    </x-native-select>
                    <x-input label="{{ __('School Attended *') }}"
                             :disabled="$disableInputs"
                             id="input_{{$key}}_school"
                             wire:model.defer="inputs.{{$key}}.school"
                             placeholder="{{ __('school attended') }}"/>
                    <x-input label="{{ __('Degree Received *') }}"
                             :disabled="$disableInputs"
                             id="input_{{$key}}_degree"
                             wire:model.defer="inputs.{{$key}}.degree"
                             placeholder="{{ __('degree received') }}"/>
                    <x-input label="{{ __('Inclusive Date From *') }}"
                             :disabled="$disableInputs"
                             id="input_{{$key}}_inclusive_dates_from"
                             wire:model.defer="inputs.{{$key}}.inclusive_dates_from"
                             placeholder="{{ __('e.g. 09/20/1997') }}"/>
                    <x-input label="{{ __('Inclusive Date To *') }}"
                             :disabled="$disableInputs"
                             id="input_{{$key}}_inclusive_dates_to"
                             wire:model.defer="inputs.{{$key}}.inclusive_dates_to"
                             placeholder="{{ __('e.g. 09/21/1997') }}"/>
                    <x-input label="{{ __('Honors Received') }}"
                             :disabled="$disableInputs"
                             id="input_{{$key}}_honors"
                             wire:model.defer="inputs.{{$key}}.honors"
                             placeholder="{{ __('honors received') }}"/>
                    @if(!$disableInputs)
                        @if($key > 0 || $educationFilled)
                            <span role="button" wire:click="removeInput({{$key}}, {{ $input['id'] ?? null }})"
                                  class="text-red-600 text-sm mx-2">
                            <b>Remove Level</b>
                        </span>
                        @endif
                    @endif
                </div>
            @endforeach
            <div class="flex justify-between items-center p-3">
                <a href="{{ route('admission.index') }}">
                    <x-button label="Cancel" flat negative/>
                </a>
                <div>
                    <x-button type="submit" info>
                        Save Education <span class="hidden sm:inline-flex">& Go To Next Step</span>
                    </x-button>
                </div>
            </div>
        </form>
    </x-card>
</div>
