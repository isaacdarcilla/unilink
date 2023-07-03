<div>
    <x-stepper active="health"/>
    <x-card class="-space-y-2 bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100">
        <div class="flex justify-between items-center p-3">
            <x-label class="italic font-bold">
                Fields with * are required.
            </x-label>
        </div>
        <form wire:submit.prevent="submit">

        </form>
    </x-card>
</div>
