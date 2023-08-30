<div>
    <div class="max-w-md mt-2">
        <x-native-select class="w-[500px]" label="Filter by Academic Year"
                         wire:model.live="filter">
            @foreach($academicYears as $ay)
                <option selected label="{{ $ay->description }}" value="{{ $ay->id }}"></option>
            @endforeach
        </x-native-select>
    </div>
</div>
