<div>
    <x-stepper active="health"/>
    <x-card class="-space-y-2 bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100">
        @if($disableInputs)
            <x-alert title="Application Status"
                     message="Input forms are temporarily disabled and editing is not allowed."
                     class="text-red-500 border bg-red-100 border-red-300 font-semibold mx-3"/>
        @endif
        <div class="flex justify-between items-center p-3">
            <x-label class="italic font-bold">
                Fields with * are required.
            </x-label>
        </div>
        <form wire:submit.prevent="submit">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                <x-input label="{{ __('Height *') }}" :disabled="$disableInputs"
                         wire:model.defer="height"
                         placeholder="{{ __('height in cm') }}"/>
                <x-input label="{{ __('Weight *') }}" :disabled="$disableInputs"
                         wire:model.defer="weight"
                         placeholder="{{ __('weight in kg') }}"/>
                <x-select label="{{ __('Do you have any physical disability or condition? *') }}"
                          :disabled="$disableInputs"
                          wire:model.defer="physical_condition"
                          placeholder="{{ __('do you have any physical condition...')}}">
                    <x-select.option label="Yes" value="yes"/>
                    <x-select.option label="No" value="no"/>
                </x-select>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-1 gap-4 p-3">
                <x-textarea label="{{ __('Any Facial Distinctive Marks: *') }}" :disabled="$disableInputs"
                            wire:model.defer="facial_marks"
                            placeholder="{{ __('write description here...') }}"/>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-3">
                <x-input label="{{ __('Person to be notified in case of emergency *') }}" :disabled="$disableInputs"
                         wire:model.defer="emergency_contact"
                         placeholder="{{ __('emergency contact\'s name') }}"/>
                <x-input label="{{ __('Mobile Number *') }}" :disabled="$disableInputs"
                         wire:model.defer="emergency_contact_number"
                         placeholder="{{ __('emergency contact\'s mobile number') }}"/>
                <x-select label="{{ __('Relationship *') }}" :disabled="$disableInputs"
                          wire:model.defer="relationship" placeholder="{{ __('relationship')}}">
                    <x-select.option label="Mother" value="Mother"/>
                    <x-select.option label="Father" value="Father"/>
                    <x-select.option label="Guardian" value="Guardian"/>
                    <x-select.option label="Sibling" value="Sibling"/>
                    <x-select.option label="Other" value="Other"/>
                </x-select>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-1 gap-4 p-3">
                <x-textarea label="{{ __('Address *') }}" :disabled="$disableInputs"
                            wire:model.defer="emergency_contact_address"
                            placeholder="{{ __('emergency contact\'s full address') }}"/>
            </div>

            <div class="flex justify-between items-center p-3">
                <a href="{{ route('admission.index') }}">
                    <x-button label="Cancel" flat negative/>
                </a>
                <div>
                    <x-button type="submit" info>
                        Save Physical Health<span class="hidden sm:inline-flex">& Go To Next Step</span>
                    </x-button>
                </div>
            </div>
        </form>
    </x-card>
</div>
