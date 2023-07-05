@php
    use App\Domain\Admission\Enums\AdmissionApplicationStatus;
@endphp
<div>
    <table class="w-full text-sm text-left text-gray-500 hide-scrollbar">
        @if(count($applications) > 0)
            <thead class="text-xs text-gray-700 uppercase bg-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Application Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Academic Year
                </th>
                <th scope="col" class="px-6 py-3">
                    Applicant Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email Address
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Birth Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Application Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
        @endif
        <tbody>
        @forelse($applications as $key => $applicant)
            @php
                $url = route("admission.$applicant->application_progress", $applicant->id)
            @endphp
            <tr class="bg-white border-b hover:bg-white bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100">
                <td class="px-6 py-4 underline">
                    #{{ $applicant->id }}
                </td>
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <x-badge flat emerald
                             :label="AdmissionApplicationStatus::from($applicant->application_status)->label"/>
                </th>
                <td class="px-6 py-4">
                    {{ $applicant->academic_year?->description }}
                </td>
                <td class="px-6 py-4">
                    {{ $applicant->fullName }}
                </td>
                <td class="px-6 py-4">
                    {{ $applicant->email_address }}
                </td>
                <td class="px-6 py-4">
                    {{ $applicant->mobile_number }}
                </td>
                <th scope="col" class="px-6 py-3">
                    {{ $applicant->birthDate }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ $applicant->applicationDate }}
                </th>
                <td class="px-6 py-4">
                    <x-dropdown>
                        <x-slot name="trigger">
                            <x-button icon="menu" outline blue/>
                        </x-slot>
                        <x-dropdown.item :href="$url">
                            Continue
                        </x-dropdown.item>
                    </x-dropdown>
                </td>
            </tr>
        @empty
            <tr class="bg-white border-b hover:bg-gray-50 dark:bg-gray-900 dark:border-gray-700">
                <td colspan="8" class="mx-auto text-center p-4">
                    No application yet. Click on the <b>"New Application"</b> <br/>button to fill up form.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="p-2 mx-4">
        {{ $applications->links() }}
    </div>
</div>
