@php
    use App\Domain\Admission\Enums\AdmissionApplicationProgress;use App\Domain\Admission\Enums\AdmissionApplicationStatus;
@endphp
<div>
    <div class="max-w-md mt-2">
        <x-native-select class="w-[500px]" label="Filter by Academic Year"
                         wire:model.live="filter">
            @foreach($academicYears as $ay)
                <option selected label="{{ $ay->description }}" value="{{ $ay->id }}"></option>
            @endforeach
        </x-native-select>
    </div>
    @if($userExamination)
        <x-alert title="Examination Available"
                 message="Entrance examination link for A.Y. {{ $active->description }} is available. Please take your examination below."
                 class="text-green-500 border bg-green-100 border-green-300 font-semibold mt-3">
            <div class="flex mt-3">
                <x-button
                        href="{{ route('admission.examination.index', ['admission_examination' => $userExamination->id]) }}?question=1&key=1"
                        sm
                        icon="arrow-narrow-right" outline positive>
                    Go to Examination
                </x-button>
            </div>
        </x-alert>
    @endif
    <div class="overflow-x-auto shadow-md rounded-lg mt-2 bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100 border-0">
        <table class="w-full text-sm text-left text-gray-500 hide-scrollbar">
            @if(count($applications) > 0)
                <thead class="text-xs text-gray-700 uppercase bg-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                    </th>
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
                </tr>
                </thead>
            @endif
            <tbody>
            @forelse($applications as $key => $applicant)
                @php
                    $url = route("admission.$applicant->application_progress", $applicant->id)
                @endphp
                <tr class="bg-white border-b hover:bg-white bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100">
                    <td class="px-6 py-4">
                        <x-button :href="$url" sm icon="arrow-narrow-right" outline info>
                            {{ $applicant->application_progress === AdmissionApplicationProgress::completed()->value ? 'View' : 'Continue' }}
                        </x-button>
                    </td>
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
                </tr>
            @empty
                <tr class="bg-white border-b hover:bg-gray-50 dark:bg-gray-900 dark:border-gray-700 my-10">
                    <td colspan="8" class="mx-auto text-center p-4 py-8">
                        No application yet. Click on the <b>"New Application"</b> <br/>button to fill up form.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-10">
        <x-label link class="font-bolder text-[16px]">My Entrance Examinations
            @if($active)
                for <b>A.Y. {{ $active->description }}</b>
            @endif
        </x-label>
        <div class="mt-4 overflow-x-auto shadow-md rounded-lg bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100 border-0">
            <table class="w-full text-sm text-left text-gray-500 hide-scrollbar">
                @if(count($userExaminations) > 0)
                    <thead class="text-xs text-gray-700 uppercase bg-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Examination Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Academic Year
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Score
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Passing Rate
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Submission Date
                        </th>
                    </tr>
                    </thead>
                @endif
                <tbody>
                @forelse($userExaminations as $key => $exam)
                    <tr class="bg-white border-b hover:bg-white bg-gradient-to-bl from-slate-100 via-slate-100 to-gray-100">
                        <td class="px-6 py-4">
                            <x-button :href="route('admission.examination.index', [
                                        'admission_examination' => $exam->id,
                                        'question' => 1,
                                        'key' => 1,
                                    ])" sm icon="arrow-narrow-right" outline info>
                                View
                            </x-button>
                        </td>
                        <td class="px-6 py-4 underline">
                            #{{ $exam->id }}
                        </td>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <x-badge flat emerald
                                     :label="str($exam->status)->replace('_', ' ')->title()"/>
                        </th>
                        <td class="px-6 py-4">
                            {{ $exam->academic_year?->description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $exam->total_points }}
                        </td>
                        <th scope="col" class="px-6 py-3">
                            {{ $exam->passing_score }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ $exam->submissionDate }}
                        </th>
                    </tr>
                @empty
                    <tr class="bg-white border-b hover:bg-gray-50 dark:bg-gray-900 dark:border-gray-700 my-10">
                        <td colspan="8" class="mx-auto text-center p-4 py-8">
                            No examination yet. You will receive an examination<br/>link to your email.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>