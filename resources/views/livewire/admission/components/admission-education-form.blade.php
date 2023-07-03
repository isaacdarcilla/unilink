<div>
    <x-stepper active="education"/>
    <x-card class="-space-y-2 bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100">
        <div class="flex justify-between items-center p-3">
            <x-label class="italic font-bold">
                Fields with * are required.
            </x-label>
            <x-button type="submit" sm icon="plus" positive wire:click="addInput">
                Add <span class="sm:inline-flex hidden">Education</span>
            </x-button>
        </div>
        <form wire:submit.prevent="submit">
            @foreach($inputs as $key => $input)
                <div class="grid grid-cols-1 sm:grid-cols-6 gap-4 p-3">
                    <x-select label="{{ __('Level *') }}"
                              id="input_{{$key}}_level"
                              wire:model.defer="inputs.{{$key}}.level"
                              placeholder="select level..."
                              :options="$levels"
                              option-label="name"
                              option-value="id"/>
                    <x-input label="{{ __('School Attended *') }}"
                             id="input_{{$key}}_school_attended"
                             wire:model.defer="inputs.{{$key}}.school_attended"
                             placeholder="{{ __('school attended') }}"/>
                    <x-input label="{{ __('Degree Received *') }}"
                             id="input_{{$key}}_degree_received"
                             wire:model.defer="inputs.{{$key}}.degree_received"
                             placeholder="{{ __('degree received') }}"/>
                    <x-input label="{{ __('Inclusive Date From *') }}"
                             id="input_{{$key}}_inclusive_date_from"
                             wire:model.defer="inputs.{{$key}}.inclusive_date_from"
                             placeholder="{{ __('e.g. 09/20/1997') }}"/>
                    <x-input label="{{ __('Inclusive Date To *') }}"
                             id="input_{{$key}}_inclusive_date_to"
                             wire:model.defer="inputs.{{$key}}.inclusive_date_to"
                             placeholder="{{ __('e.g. 09/21/1997') }}"/>
                    <x-input label="{{ __('Honors Received') }}"
                             id="input_{{$key}}_honors_received"
                             wire:model.defer="inputs.{{$key}}.honors_received"
                             placeholder="{{ __('honors received') }}"/>
                    @if($key > 0)
                        <span role="button" wire:click="removeInput({{$key}})"
                              class="text-red-600 text-sm mx-2">
                            <b>Remove Level</b>
                        </span>
                    @endif
                </div>
            @endforeach
            <div class="flex justify-between items-center p-3">
                <a href="{{ route('admission.index') }}">
                    <x-button label="Cancel" flat negative/>
                </a>
                <div>
                    <x-button type="submit" info>
                        Save <span class="hidden sm:inline-flex">Education</span>
                    </x-button>
                    <x-button type="submit" info>
                        Next <span class="hidden sm:inline-flex">Step: Family</span>
                    </x-button>
                </div>
            </div>
        </form>
    </x-card>
</div>
