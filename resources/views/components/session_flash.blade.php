@if (session()->has('message'))
    <div class="absolute z-20 mx-10 flex w-fit items-center space-x-2 rounded-md bg-green-400 bg-opacity-80 p-2 text-white drop-shadow-md backdrop-blur-sm"
        x-data="{ open: true }" x-init="setTimeout(() => { open = false }, 5000)" x-show="open"
        x-transition:enter="transition duration-500 transform ease-out" x-transition:enter-start="opacity-1"
        x-transition:leave="transition duration-500 transform ease-in" x-transition:leave-end="opacity-0">
        <svg class="mr-3 w-5 pt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>
            <span class="ml-2">{{ session('message') }}</span>
        </span>
    </div>
    {{-- <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90 duration-200 ease-in"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
        class="container fixed inset-x-0 top-12 z-20 flex w-full items-center rounded-md bg-green-400 px-4 py-2 text-sm text-white drop-shadow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="ml-2">{{ session('message') }}</span>
    </div> --}}
@endif
