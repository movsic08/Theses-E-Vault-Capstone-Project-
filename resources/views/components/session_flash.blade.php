@if (session()->has('message'))
    <div id="sessionMsg"
        class="container fixed left-0 right-0 top-14 z-50 flex w-fit items-center justify-between gap-2 rounded-md bg-green-500 bg-opacity-80 p-2 text-white shadow-md drop-shadow-sm backdrop-blur-sm"
        x-data="{ open: true }" x-init="setTimeout(() => { open = false }, 5000)" x-show="open"
        x-transition:enter="transition duration-500 transform ease-out" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition duration-500 transform ease-in"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
        <span class="ml-2">{{ session('message') }}</span>
        <button @click="open = false">
            <svg width="23" height="23" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M5.152 5.152a1.2 1.2 0 0 1 1.696 0L12 10.303l5.152-5.151a1.2 1.2 0 1 1 1.696 1.696L13.697 12l5.151 5.152a1.2 1.2 0 0 1-1.696 1.696L12 13.697l-5.152 5.151a1.2 1.2 0 0 1-1.696-1.696L10.303 12 5.152 6.848a1.2 1.2 0 0 1 0-1.696Z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
@endif

@if (session()->has('success'))
    <div id="sessionMsg"
        class="container fixed left-0 right-0 top-14 z-50 flex w-fit items-center justify-between gap-2 rounded-md bg-green-500 bg-opacity-80 p-2 text-white shadow-md drop-shadow-sm backdrop-blur-sm"
        x-data="{ open: true }" x-init="setTimeout(() => { open = false }, 5000)" x-show="open"
        x-transition:enter="transition duration-500 transform ease-out" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition duration-500 transform ease-in"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
        <span class="ml-2">{{ session('success') }}</span>
        <button @click="open = false">
            <svg width="23" height="23" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M5.152 5.152a1.2 1.2 0 0 1 1.696 0L12 10.303l5.152-5.151a1.2 1.2 0 1 1 1.696 1.696L13.697 12l5.151 5.152a1.2 1.2 0 0 1-1.696 1.696L12 13.697l-5.152 5.151a1.2 1.2 0 0 1-1.696-1.696L10.303 12 5.152 6.848a1.2 1.2 0 0 1 0-1.696Z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
@endif
@if (session()->has('error'))
    <div id="sessionMsg"
        class="container fixed left-0 right-0 top-14 z-50 flex w-fit items-center justify-between gap-2 rounded-md bg-red-500 bg-opacity-80 p-2 text-white shadow-md drop-shadow-sm backdrop-blur-sm"
        x-data="{ open: true }" x-init="setTimeout(() => { open = false }, 5000)" x-show="open"
        x-transition:enter="transition duration-500 transform ease-out" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition duration-500 transform ease-in"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
        <span class="ml-2">{{ session('invalid') }}</span>
        <button @click="open = false">
            <svg width="23" height="23" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M5.152 5.152a1.2 1.2 0 0 1 1.696 0L12 10.303l5.152-5.151a1.2 1.2 0 1 1 1.696 1.696L13.697 12l5.151 5.152a1.2 1.2 0 0 1-1.696 1.696L12 13.697l-5.152 5.151a1.2 1.2 0 0 1-1.696-1.696L10.303 12 5.152 6.848a1.2 1.2 0 0 1 0-1.696Z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
@endif
