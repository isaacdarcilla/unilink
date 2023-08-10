@php
    use  \App\Domain\Guidance\Enums\StudentType;
@endphp
<div>
    <x-card class="-space-y-2 bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100">
        <form wire:submit.prevent="submit">
            <div class="grid grid-cols-1 gap-4 p-3">
                <x-select
                        label="{{ __('Student Type *') }}"
                        placeholder="select student type..."
                        :options="StudentType::toLabels()"
                        wire:model="student_type"
                />
            </div>
            @if($student_type === StudentType::old()->label)
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 p-3">
                    <x-select
                            label="{{ __('College/Department *') }}"
                            placeholder="select college or department..."
                            :options="$colleges"
                            wire:model="college_id"
                            option-label="name"
                            option-value="id"
                    />
                    <x-select
                            label="{{ __('Year Level *') }}"
                            placeholder="select year level..."
                            :options="$yearLevels"
                            wire:model="college_id"
                            option-label="name"
                            option-value="id"
                    />
                </div>
            @endif
        </form>
    </x-card>
</div>
