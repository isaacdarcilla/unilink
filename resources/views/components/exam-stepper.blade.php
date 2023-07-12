@props(['items' => null, 'exam_id' => null])

@php
    $question = request()->get('question') ?: "1";
    $keyId = request()->get('key') ?: "1";
@endphp

<ol wire:ignore
    class="flex overflow-x-auto soft-scrollbar items-center p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-t-lg shadow-sm sm:text-base sm:p-4 sm:space-x-4">
    @foreach($items as $key => $item)
        <li class="{{ $keyId === (string)$loop->iteration ? 'text-blue-500' : '' }}">
            <a class="flex items-center hover:underline"
               href="{{ route('admission.examination.index', ['admission_examination' => $exam_id]) }}?question={{ $item->id }}&key={{ $loop->iteration }}">
            <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border {{ $keyId === (string)$loop->iteration ? 'border-blue-600' : 'border-gray-500' }} rounded-full shrink-0">
                {{ $loop->iteration }}
            </span>
                Question
                @if(!$loop->last)
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 sm:ml-4" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                    </svg>
                @endif
            </a>
        </li>
    @endforeach
</ol>
