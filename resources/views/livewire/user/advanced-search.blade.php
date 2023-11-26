<div>
    <script wire:ignore src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/datepicker.min.js"></script>
    <section class="container">
        <div class="mt-14 flex h-full flex-col items-center justify-center md:mt-[4rem] md:p-2">
            <div class="flex w-full flex-col items-center justify-center">
                <img class="h-[3rem] md:h-[5rem]" src="{{ asset('icons/logo.svg') }}" alt="logo">
                <h2
                    class="mx-[2rem] mt-4 text-center text-lg font-extrabold text-primary-color dark:text-white md:mt-7 md:text-2xl lg:mx-[10rem] lg:text-4xl">
                    UNLOCKING
                    ACADEMIC
                    INSIGHTS:
                    EXPLORE
                    THE
                    REALM OF
                    RESEARCH
                    WORKS,
                    THESES, CAPSTONE, AND FEASIBILITY STUDIES</h2>
            </div>
            <div class="my-4 flex flex-col gap-2 md:gap-4">

                <div x-data="{ dateOption: 'month-and-year-only' }" x-data="{ dateOption: '' }"
                    class="gradient-border flex flex-col items-center justify-center gap-2 rounded-xl border border-gray-200 bg-white bg-opacity-30 p-3 shadow-xl backdrop-blur-md md:mx-0 md:gap-4 md:p-6 lg:px-10 lg:py-6"
                    for="search-docu">
                    {{-- search input --}}
                    <div class="flex w-full">
                        <input
                            class="h-10 w-[18rem] rounded-l-full border-b-2 border-l-2 border-t-2 px-4 font-medium drop-shadow-md focus:border-gray-400 focus:outline-none md:w-full lg:h-14 lg:w-[30.8rem]"
                            wire:keydown.enter='findResult' type="search" id="search-docu" wire:model.live='search'
                            placeholder="Advanced search">
                        <button wire:click='findResult'
                            class="custom-blue-via flex h-[2.5rem] w-[2.5rem] items-center justify-center rounded-r-full p-2 drop-shadow-lg md:h-[2.4rem] md:w-[4rem] lg:h-14">
                            <svg wire:loading.remove wire:target='findResult' class="h-5"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 43 37" fill="none">
                                <path
                                    d="M18.1262 27.7507C21.184 27.7501 24.1537 26.834 26.5624 25.1483L34.1356 31.9255L36.5716 29.7456L28.9984 22.9684C30.8831 20.8126 31.9074 18.1544 31.9081 15.4173C31.9081 8.61703 25.7252 3.08398 18.1262 3.08398C10.5271 3.08398 4.34418 8.61703 4.34418 15.4173C4.34418 22.2176 10.5271 27.7507 18.1262 27.7507ZM18.1262 6.16732C23.8267 6.16732 28.4626 10.3159 28.4626 15.4173C28.4626 20.5187 23.8267 24.6673 18.1262 24.6673C12.4256 24.6673 7.78967 20.5187 7.78967 15.4173C7.78967 10.3159 12.4256 6.16732 18.1262 6.16732Z"
                                    fill="white" />
                            </svg>
                            <div wire:loading wire:target='findResult'
                                class="inline-block h-5 w-5 animate-spin rounded-full border-4 border-solid border-white border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                                role="status">
                                <span
                                    class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                            </div>
                        </button>
                    </div>
                    {{-- data picker --}}
                    <section class="w-full">
                        <div class="flex w-full flex-col items-start justify-between gap-2 md:flex-row">
                            <div class="flex w-full flex-col items-start justify-start gap-1 md:w-fit">
                                {{-- date option --}}
                                <div class="flex w-full flex-row items-center justify-start md:flex-col">
                                    <label for="dateOpt"
                                        class="mr-1 block whitespace-nowrap text-sm font-medium text-gray-700 md:mr-0">Start
                                        Date Option</label>
                                    <select id="dateOpt" x-model="dateOption" wire:model.live='datepicker'
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 md:w-fit">
                                        <option value="month-and-year-only">Month and year</option>
                                        <option value="date-range">Date range</option>
                                    </select>
                                </div>

                            </div>
                            {{-- month and year --}}
                            <div x-show="dateOption === 'month-and-year-only'"
                                x-transition:enter.duration.400ms.delay.300ms x-transition:leave.duration.200ms
                                class="relative w-full transition-all">
                                <div class="flex w-full flex-row items-start md:flex-col">
                                    <label for="monthYear"
                                        class="mr-1 block w-fit whitespace-nowrap text-left text-sm font-medium text-gray-700">Month
                                        and
                                        Year:</label>
                                    <input type="month" id="monthYear" name="monthYear" wire:model='dateMYOnly'
                                        class="w-full rounded-md border border-gray-300 p-1.5 focus:border-blue-500 focus:outline-none">
                                </div>
                            </div>

                            {{-- date range --}}
                            <div x-show="dateOption === 'date-range'" x-transition:enter.duration.400ms.delay.300ms
                                x-transition:leave.duration.200ms
                                class="flex w-full flex-col items-center transition-all">
                                <div class="flex w-full flex-col items-center gap-2 md:flex-row md:justify-center">
                                    <div class="flex w-full flex-row items-center md:flex-col">
                                        <label for="startDate"
                                            class="mr-1 block whitespace-nowrap text-sm font-medium text-gray-700 md:mr-0">Start
                                            Date:</label>
                                        <input wire:model.live='dateRangeStart' type="month" id="startDate"
                                            name="startDate"
                                            class="w-full rounded-md border border-gray-300 p-1.5 focus:border-blue-500 focus:outline-none">
                                    </div>
                                    <div class="flex w-full flex-row items-center md:flex-col">
                                        <label for="endDate"
                                            class="mr-1 block whitespace-nowrap text-sm font-medium text-gray-700">End
                                            Date:</label>
                                        <input wire:model.live='dateRangeEnd' type="month" id="endDate"
                                            name="endDate"
                                            class="w-full rounded-md border border-gray-300 p-1.5 focus:border-blue-500 focus:outline-none">
                                    </div>
                                </div>
                            </div>

                        </div>
                        @error('dateMYOnly')
                            <small class="mt-1 text-red-500">{{ $message }}</small>
                        @enderror
                        @error('dateRangeStart')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </section>
                    {{-- language and document type  --}}
                    <div class="flex w-full flex-row items-center justify-start gap-2">
                        <div class="flex w-full flex-col items-center gap-1 md:flex-row md:gap-2">
                            <x-label-input class="whitespace-nowrap">Document type</x-label-input>
                            <select wire:model.live='docuTypeInput'
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                <option selected value="all">all</option>
                                @foreach ($documentTypes as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex w-full flex-col items-center gap-1 md:flex-row md:gap-2">
                            <x-label-input>Language</x-label-input>
                            <select x-model="dateOption"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                <option selected value="all">all</option>
                                <option value="month-and-year-only">English</option>
                            </select>
                        </div>
                    </div>
                </div>

                <a href="{{ route('user-search') }}" wire:navigate
                    class="flex w-fit items-center justify-center gap-1 rounded-md border border-blue-500 bg-blue-100 bg-opacity-30 px-2 py-1 text-xs font-extrabold text-blue-900 backdrop-blur-sm duration-200 ease-in-out hover:bg-blue-700 hover:text-white md:px-2 md:py-1 md:text-base">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.03 8.53a.75.75 0 1 0-1.06-1.06l-4 4a.748.748 0 0 0 0 1.06l4 4a.75.75 0 1 0 1.06-1.06l-2.72-2.72H18a.75.75 0 0 0 0-1.5H8.31l2.72-2.72Z">
                        </path>
                    </svg>Basic
                    search</a>
            </div>
        </div>
    </section>

    <svg class="svg-bg -z-10 h-full w-full dark:bg-primary-color" version="1.1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1600 950"
        preserveAspectRatio="xMidYMax slice">
        <defs>
            <linearGradient id="bg">
                <stop offset="0%" style="stop-color:rgba(237, 240, 34, 0.774))"></stop>
                <stop offset="50%" style="stop-color:rgba(1, 46, 124, 0.456)"></stop>
                <stop offset="100%" style="stop-color:rgba(241, 238, 45, 0.741)"></stop>
            </linearGradient>
            <path id="wave" fill="url(#bg)" d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
 s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
        </defs>
        <g>
            <use xlink:href='#wave' opacity=".3">
                <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="10s"
                    calcMode="spline" values="270 230; -334 180; 270 230" keyTimes="0; .5; 1"
                    keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
            </use>
            <use xlink:href='#wave' opacity=".6">
                <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="8s"
                    calcMode="spline" values="-270 230;243 220;-270 230" keyTimes="0; .6; 1"
                    keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
            </use>
            <use xlink:href='#wave' opacty=".9">
                <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="6s"
                    calcMode="spline" values="0 230;-140 200;0 230" keyTimes="0; .4; 1"
                    keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
            </use>
        </g>
    </svg>
</div>
