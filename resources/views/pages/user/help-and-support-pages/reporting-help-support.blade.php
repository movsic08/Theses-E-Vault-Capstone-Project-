<x-app-layout>

    @section('title', 'Help Center')
    <div class="lg:container">
        <div class="container">
            <div class="lg:px-20">
                <div class="mb-5 rounded-xl bg-white pb-4 shadow-md md:px-4">
                    <div class="container">
                        <div class="relative rounded-b-xl bg-gradient-to-t from-blue-400 via-blue-500 to-blue-600 p-4">
                            <div class="relative flex w-full items-center justify-center">
                                <a href="{{ route('help-and-support') }}" wire:navigate
                                    class="absolute left-0 top-0 flex w-fit items-center rounded-lg pr-3 text-white duration-200 ease-in-out hover:text-primary-color">
                                    <svg class="h-7" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M14.03 7.47a.75.75 0 0 1 0 1.06L10.56 12l3.47 3.47a.75.75 0 1 1-1.06 1.06l-4-4a.75.75 0 0 1 0-1.06l4-4a.75.75 0 0 1 1.06 0Z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Back
                                    page</a>
                                <img class="mt-1 h-[14rem]" src="{{ asset('assets\svgs\reporting-ico.svg') }}"
                                    alt=" svg ico ">
                            </div>
                            <div class="flex w-full items-center justify-between">
                                <strong class="text-base text-white lg:text-3xl">Reporting</strong>
                                <button
                                    class="flex items-center gap-1 whitespace-nowrap rounded-lg bg-white px-2 py-1 text-xs text-blue-500 md:px-3 md:py-2 md:text-base">Copy
                                    link
                                    <svg class="h-6" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.25 9A5.75 5.75 0 0 1 9 3.25h7.013a.75.75 0 0 1 0 1.5H9A4.25 4.25 0 0 0 4.75 9v7.107a.75.75 0 0 1-1.5 0V9Z">
                                        </path>
                                        <path
                                            d="M18.403 6.793a44.372 44.372 0 0 0-9.806 0 2.011 2.011 0 0 0-1.774 1.76 42.581 42.581 0 0 0 0 9.893 2.01 2.01 0 0 0 1.774 1.76c3.241.363 6.565.363 9.806 0a2.01 2.01 0 0 0 1.774-1.76 42.579 42.579 0 0 0 0-9.893 2.011 2.011 0 0 0-1.774-1.76Z">
                                        </path>
                                    </svg></button>
                            </div>
                        </div>
                        <div class="px-1 lg:container lg:px-0">
                            <div class="mt-2 font-medium text-gray-800">
                                <p>>This resource provides invaluable tips and detailed
                                    instructions to enhance your proficiency when navigating theses kiosk
                                    website.</p>
                                <div class="mb-6 mt-4">

                                    <div x-data="{ tab1: true }">
                                        <!-- Accordion Item 1 -->
                                        <div class="mb-4">
                                            <button @click="tab1 = !tab1"
                                                class="flex w-full items-center justify-between rounded-t-lg bg-blue-100 px-4 py-2 text-left font-bold text-primary-color">
                                                How to report a comment?
                                                <span x-show="tab1">
                                                    <svg class="h-9" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.53 14.03a.75.75 0 0 1-1.06 0L12 10.56l-3.47 3.47a.75.75 0 0 1-1.06-1.06l4-4a.75.75 0 0 1 1.06 0l4 4a.75.75 0 0 1 0 1.06Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                                <span x-show="!tab1">
                                                    <svg class="h-9" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.53 8.97a.75.75 0 0 1 0 1.06l-4 4a.75.75 0 0 1-1.06 0l-4-4a.75.75 0 1 1 1.06-1.06L12 12.44l3.47-3.47a.75.75 0 0 1 1.06 0Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                            <div x-show="tab1" class="bg-white p-4 text-gray-800">
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>Go to the comment that you want to report. </span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>Click Report comment. </span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>To give feedback, click the option that best describes how
                                                        this comment goes against our Community Standards. If you can't
                                                        see any options that fit, click Other to add additional
                                                        information about your report.</span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>You will receive a notification regarding your report once the
                                                        admin reviewed your report.</span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>Currently, you can't report a comment on your own profile, but
                                                        you can delete and edit it. </span>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
