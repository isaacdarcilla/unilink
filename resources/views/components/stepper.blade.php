@props(['active'])

<ol class="flex overflow-x-auto hide-scrollbar items-center p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-t-lg shadow-sm sm:text-base sm:p-4 sm:space-x-4">
    <li class="flex items-center {{ $active === 'personal' ? 'text-blue-600' : '' }}">
        <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border {{ $active === 'personal' ? 'border-blue-600' : 'border-gray-500' }} rounded-full shrink-0">
            1
        </span>
        Personal <span class="hidden sm:inline-flex sm:ml-2">Data</span>
        <svg aria-hidden="true" class="w-4 h-4 ml-2 sm:ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
        </svg>
    </li>
    <li class="flex items-center {{ $active === 'education' ? 'text-blue-600' : '' }}">
        <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border {{ $active === 'education' ? 'border-blue-600' : 'border-gray-500' }} rounded-full shrink-0">
            2
        </span>
        Education <span class="hidden sm:inline-flex sm:ml-2">Data</span>
        <svg aria-hidden="true" class="w-4 h-4 ml-2 sm:ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
        </svg>
    </li>
    <li class="flex items-center {{ $active === 'family' ? 'text-blue-600' : '' }}">
        <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border {{ $active === 'family' ? 'border-blue-600' : 'border-gray-500' }} rounded-full shrink-0">
            3
        </span>
        Family <span class="hidden sm:inline-flex sm:ml-2">Background</span>
        <svg aria-hidden="true" class="w-4 h-4 ml-2 sm:ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
        </svg>
    </li>
    <li class="flex items-center {{ $active === 'health' ? 'text-blue-600' : '' }}">
        <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border {{ $active === 'health' ? 'border-blue-600' : 'border-gray-500' }} rounded-full shrink-0">
            4
        </span>
        Physical <span class="hidden sm:inline-flex sm:ml-2"> & Health</span>
    </li>
</ol>
