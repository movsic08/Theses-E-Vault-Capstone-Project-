<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-q97JTfRDFRtduqL1VGGExE6Te7+d2shUod+Cq+R6a6jyuWhUxFGvEPIzmimkQPPo+C0kndbbQgERG0hBDMzL5A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @section('title', 'Help Center')
    <div class="container">
        <div class="container">
            <div class="px-20">
                <div class="rounded-xl bg-white px-4 pb-4 shadow-md">
                    <div class="container">
                        <div class="relative rounded-b-xl bg-gradient-to-t from-blue-400 via-blue-500 to-blue-600 p-4">
                            <div class="relative flex w-full items-center justify-center">
                                <a href="{{ route('help-and-support') }}" wire:navigate
                                    class="absolute left-0 top-0 flex items-center rounded-lg py-2 pr-3 text-white">
                                    <svg class="h-7" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M14.03 7.47a.75.75 0 0 1 0 1.06L10.56 12l3.47 3.47a.75.75 0 1 1-1.06 1.06l-4-4a.75.75 0 0 1 0-1.06l4-4a.75.75 0 0 1 1.06 0Z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Back
                                    page</a>
                                <img class="h-[15rem]" src="{{ asset('assets\svgs\account-help-ico.svg') }}"
                                    alt=" svg ico ">
                            </div>
                            <div class="flex w-full items-center justify-between">
                                <strong class="text-3xl text-white">Account management</strong>
                                <button class="flex items-center gap-1 rounded-lg bg-white px-3 py-2 text-blue-500">Copy
                                    link <svg class="h-6" fill="currentColor" viewBox="0 0 24 24"
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
                        <div class="container">
                            <div class="mt-2 font-medium text-gray-800">
                                <p>Manage and learn about name changes and more. Explore essential tips and instructions
                                    for managing
                                    your account on the Theses Kiosk website.</p>
                                <div class="mb-6 mt-4">

                                    <div x-data="{ tab1: true, tab2: true }">
                                        <!-- Accordion Item 1 -->
                                        <div class="mb-4">
                                            <button @click="tab1 = !tab1"
                                                class="flex w-full items-center justify-between rounded-t-lg bg-blue-100 px-4 py-2 text-left font-bold text-primary-color">
                                                How to change my password account?
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

                                                <li class="list-item"><span>On the mobile version, toggle the menu
                                                        burger in the top
                                                        right
                                                        corner and click on “User”. On tablets and larger screens,
                                                        click
                                                        the user icon in the left corner.</span></li>

                                            </div>
                                        </div>

                                        <!-- Accordion Item 2 -->
                                        <div class="mb-4">
                                            <button @click="tab2 = !tab2"
                                                class="flex w-full items-center justify-between rounded-t-lg bg-blue-100 px-4 py-2 text-left font-bold text-primary-color">
                                                Section 1
                                                <span x-show="tab2">
                                                    <svg class="h-9" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.53 14.03a.75.75 0 0 1-1.06 0L12 10.56l-3.47 3.47a.75.75 0 0 1-1.06-1.06l4-4a.75.75 0 0 1 1.06 0l4 4a.75.75 0 0 1 0 1.06Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                                <span x-show="!tab2">
                                                    <svg class="h-9" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.53 8.97a.75.75 0 0 1 0 1.06l-4 4a.75.75 0 0 1-1.06 0l-4-4a.75.75 0 1 1 1.06-1.06L12 12.44l3.47-3.47a.75.75 0 0 1 1.06 0Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                            <div x-show="tab2" class="bg-white p-4 text-gray-800">
                                                <!-- Content for Section 1 -->
                                                <p>This is the content for Section 1.</p>
                                            </div>
                                        </div>

                                        <!-- Add more accordion items as needed -->
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
