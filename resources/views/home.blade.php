<x-app-layout>
    @section('title', 'Home')
    <x-session_flash />
    <div class="container">
        <section>
            <h2 class="text-secondary-color">List of Collections</h2>
        </section>

        <section class="grid grid-cols-5 gap-4 text-primary-color">
            {{-- 1st div (Scrollable) --}}
            <div class="col-span-5 flex flex-col gap-4 lg:col-span-3">
                @if (count($docuPostData) === 0)
                    <section
                        class="bg-primary relative z-10 flex h-[35.2rem] items-center justify-center rounded-lg border border-gray-300 bg-white p-5 py-[120px] text-gray-700 drop-shadow-lg">
                        <div class="container mx-auto">
                            <div class="-mx-4 flex">
                                <div class="w-full px-4">
                                    <div class="mx-auto flex max-w-[400px] flex-col items-center text-center">
                                        <svg class="h-[10rem] text-gray-700" fill="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14 2.25a.25.25 0 0 1 .25.25v5.647c0 .414.336.75.75.75h4.5a.25.25 0 0 1 .25.25V19A2.75 2.75 0 0 1 17 21.75H7A2.75 2.75 0 0 1 4.25 19V5A2.75 2.75 0 0 1 7 2.25h7Z">
                                            </path>
                                            <path
                                                d="M16.086 2.638c-.143-.115-.336.002-.336.186v4.323c0 .138.112.25.25.25h3.298c.118 0 .192-.124.124-.22L16.408 2.98a1.748 1.748 0 0 0-.322-.342Z">
                                            </path>
                                        </svg>
                                        <h4 class="mb-3 text-[22px] font-semibold leading-tight">
                                            Oops! There is no upload Document yet.
                                        </h4>
                                        <p class="mb-8 text-lg">
                                            If
                                            you find it
                                            as bug or something went wrong. Contact
                                            the
                                            administrator immediately. Thank you for your cooperation.
                                        </p>
                                        <a href="{{ route('user.logout') }}"
                                            class="hover:text-primary inline-block rounded-lg border bg-primary-color px-8 py-3 text-center text-base font-semibold text-white transition">
                                            Logout
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
                <div class="mt-2 space-y-6">
                    @foreach ($docuPostData as $docuData)
                        <div
                            class="rounded-3xl bg-white p-4 drop-shadow-lg duration-500 ease-in-out hover:-translate-y-1">
                            <div class="ml-4 flex justify-between">
                                <div class="w-full">
                                    <a wire:navigate href="{{ route('view-document', [$docuData->reference]) }}"
                                        class="mr-4 font-semi-bold text-primary-color">{{ $docuData->title }}</a>
                                    <div class="flex items-center justify-between gap-2">
                                        <div class="flex gap-1">
                                            <svg class="min-h-6 h-6 max-h-6 w-6 text-primary-color" viewBox="0 0 46 46"
                                                fill="none">
                                                <path
                                                    d="M10.1201 8.28047C10.1201 7.67047 10.3624 7.08546 10.7938 6.65412C11.2251 6.22279 11.8101 5.98047 12.4201 5.98047H22.9675C23.2698 5.98048 23.5691 6.04008 23.8483 6.15584C24.1275 6.27161 24.3812 6.44127 24.5948 6.65514L40.6948 22.7551C41.1261 23.1865 41.3684 23.7715 41.3684 24.3814C41.3684 24.9914 41.1261 25.5764 40.6948 26.0077L30.1474 36.5551C29.716 36.9864 29.131 37.2287 28.5211 37.2287C27.9111 37.2287 27.3261 36.9864 26.8948 36.5551L10.7948 20.4551C10.5809 20.2415 10.4113 19.9879 10.2955 19.7087C10.1797 19.4294 10.1201 19.1301 10.1201 18.8279V8.28047ZM18.1701 17.4805C18.6232 17.4805 19.0718 17.3912 19.4904 17.2179C19.9089 17.0445 20.2893 16.7903 20.6096 16.47C20.93 16.1496 21.1841 15.7693 21.3575 15.3507C21.5309 14.9322 21.6201 14.4835 21.6201 14.0305C21.6201 13.5774 21.5309 13.1288 21.3575 12.7102C21.1841 12.2916 20.93 11.9113 20.6096 11.591C20.2893 11.2706 19.9089 11.0165 19.4904 10.8431C19.0718 10.6697 18.6232 10.5805 18.1701 10.5805C17.2551 10.5805 16.3776 10.944 15.7306 11.591C15.0836 12.238 14.7201 13.1155 14.7201 14.0305C14.7201 14.9455 15.0836 15.823 15.7306 16.47C16.3776 17.117 17.2551 17.4805 18.1701 17.4805Z"
                                                    fill="black" />
                                                <path
                                                    d="M8.49277 21.604C8.06202 21.1727 7.82005 20.5881 7.82002 19.9786V8.2793C7.21002 8.2793 6.62501 8.52162 6.19367 8.95295C5.76234 9.38428 5.52002 9.9693 5.52002 10.5793V21.1286C5.52002 21.7381 5.76152 22.3227 6.19277 22.754L22.2928 38.854C22.7241 39.2853 23.3091 39.5276 23.9191 39.5276C24.529 39.5276 25.114 39.2853 25.5454 38.854L25.645 38.7543L8.49277 21.604Z"
                                                    fill="black" />
                                            </svg>
                                            <span
                                                class="cursor-pointer bg-gray-50 duration-300 ease-in hover:bg-primary-color hover:text-white">
                                                {{ $docuData->keyword_1 }} </span>
                                            <span
                                                class="cursor-pointer bg-gray-50 duration-300 ease-in hover:bg-primary-color hover:text-white">
                                                {{ $docuData->keyword_2 }} </span>
                                            <span
                                                class="cursor-pointer bg-gray-50 duration-300 ease-in hover:bg-primary-color hover:text-white">
                                                {{ $docuData->keyword_3 }} </span>
                                            <span
                                                class="cursor-pointer bg-gray-50 duration-300 ease-in hover:bg-primary-color hover:text-white">
                                                {{ $docuData->keyword_4 }} </span>
                                            <span
                                                class="cursor-pointer bg-gray-50 duration-300 ease-in hover:bg-primary-color hover:text-white">
                                                {{ $docuData->keyword_5 }} </span>
                                            <span
                                                class="cursor-pointer bg-gray-50 duration-300 ease-in hover:bg-primary-color hover:text-white">
                                                {{ $docuData->keyword_6 }} </span>
                                        </div>
                                        <div class="mr-4">
                                            {{ \Carbon\Carbon::parse($docuData->date_of_approval)->format('M d Y') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start justify-end pr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="47" height="61"
                                        viewBox="0 0 47 61" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.83333 0H28.5656C29.604 0.000889848 30.5995 0.403146 31.3333 1.11833L45.8511 15.25C46.2153 15.6041 46.5042 16.0245 46.7014 16.4874C46.8985 16.9502 47 17.4463 47 17.9473V53.375C47 55.3973 46.1747 57.3367 44.7057 58.7667C43.2366 60.1967 41.2442 61 39.1667 61H7.83333C5.7558 61 3.76336 60.1967 2.29433 58.7667C0.825294 57.3367 0 55.3973 0 53.375V7.625C0 5.60272 0.825294 3.66328 2.29433 2.23331C3.76336 0.803345 5.7558 0 7.83333 0ZM29.375 5.71875V13.3437C29.375 14.3549 29.7876 15.3246 30.5222 16.0396C31.2567 16.7546 32.2529 17.1562 33.2917 17.1562H41.125L29.375 5.71875ZM8.47958 52.1105C8.83208 52.7968 9.38041 53.4195 10.1931 53.7086C10.9379 53.952 11.7498 53.9111 12.4648 53.5942C13.7116 53.0986 14.9519 51.9326 16.0942 50.5982C17.3998 49.0669 18.7706 47.0621 20.0925 44.8382C22.6479 44.1014 25.2647 43.5837 27.9128 43.2909C29.0878 44.7524 30.3019 46.0105 31.4769 46.9128C32.5736 47.7516 33.84 48.4505 35.1358 48.5014C35.8408 48.5363 36.5392 48.3552 37.1333 47.9771C37.7334 47.5794 38.2125 47.0318 38.5204 46.3918C38.8729 45.7023 39.0883 44.9811 39.059 44.2441C39.0337 43.5193 38.7576 42.8241 38.2756 42.2711C37.3944 41.2417 35.9419 40.7461 34.5156 40.4983C32.7862 40.2375 31.0315 40.1735 29.2869 40.3077C27.8137 38.2806 26.5292 36.1296 25.4485 33.8804C26.4277 31.3642 27.1621 28.9845 27.4852 27.0402C27.628 26.2677 27.6914 25.4833 27.6745 24.6986C27.6701 23.9869 27.5005 23.2853 27.1784 22.6462C26.9922 22.2938 26.7278 21.9861 26.4043 21.7454C26.0809 21.5047 25.7064 21.3371 25.3082 21.2547C24.5183 21.0927 23.7024 21.2547 22.9582 21.5502C21.4797 22.122 20.6996 23.342 20.4058 24.6859C20.1186 25.9822 20.2492 27.4913 20.5853 29.0195C20.9313 30.5667 21.5188 32.2506 22.2695 33.9567C21.067 36.8682 19.6782 39.7034 18.1113 42.4458C16.0921 43.0638 14.1458 43.8881 12.3049 44.9049C10.8557 45.7436 9.56646 46.7349 8.79292 47.9041C7.97042 49.1463 7.71583 50.6268 8.47958 52.1105Z"
                                            fill="#041A32" />
                                    </svg>
                                </div>
                            </div>

                            <div class="my-1 ml-4 line-clamp-4 font-light lg:line-clamp-3">
                                {{ $docuData->abstract_or_summary }}
                            </div>
                            <ul class="ml-4 flex flex-wrap">
                                <svg class="min-h-6 mr-2 max-h-6 text-primary-color" viewBox="0 0 46 46" fill="none">
                                    <path
                                        d="M20.7 36.7992C20.7 36.7992 18.4 36.7992 18.4 34.4992C18.4 32.1992 20.7 25.2992 29.9 25.2992C39.1 25.2992 41.4 32.1992 41.4 34.4992C41.4 36.7992 39.1 36.7992 39.1 36.7992H20.7ZM29.9 22.9992C31.73 22.9992 33.4851 22.2723 34.7791 20.9783C36.0731 19.6843 36.8 17.9292 36.8 16.0992C36.8 14.2692 36.0731 12.5142 34.7791 11.2202C33.4851 9.92618 31.73 9.19922 29.9 9.19922C28.07 9.19922 26.315 9.92618 25.021 11.2202C23.727 12.5142 23 14.2692 23 16.0992C23 17.9292 23.727 19.6843 25.021 20.9783C26.315 22.2723 28.07 22.9992 29.9 22.9992Z"
                                        fill="black" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.5983 36.7998C16.2568 36.0819 16.0862 35.2947 16.1 34.4998C16.1 31.3833 17.664 28.1748 20.5543 25.9438C19.1119 25.4994 17.6092 25.2822 16.1 25.2998C6.89997 25.2998 4.59998 32.1998 4.59998 34.4998C4.59998 36.7998 6.89998 36.7998 6.89998 36.7998H16.5983Z"
                                        fill="black" />
                                    <path
                                        d="M14.95 23C16.475 23.0003 17.9376 22.3947 19.0161 21.3165C20.0946 20.2384 20.7007 18.776 20.7009 17.251C20.7012 15.726 20.0956 14.2633 19.0175 13.1848C17.9393 12.1063 16.4769 11.5003 14.9519 11.5C13.4269 11.5 11.9644 12.1058 10.886 13.1841C9.80771 14.2625 9.2019 15.725 9.2019 17.25C9.2019 18.775 9.80771 20.2375 10.886 21.3159C11.9644 22.3942 13.425 23 14.95 23Z"
                                        fill="black" />
                                </svg>
                                <li class="mr-3 whitespace-nowrap">{{ $docuData->author_1 }}</li>
                                <li class="mr-3 whitespace-nowrap">{{ $docuData->author_2 }}</li>
                                <li class="mr-3 whitespace-nowrap">{{ $docuData->author_3 }}</li>
                                <li class="mr-3 whitespace-nowrap">{{ $docuData->author_4 }}</li>
                            </ul>
                            <div class="ml-4 mt-1 flex flex-row gap-2">
                                <div class="rounded-full bg-yellow-700 px-2 text-white">
                                    {{ $docuData->document_type }}
                                </div>
                                <div class="rounded-full bg-emerald-800 px-2 text-white">
                                    {{ $docuData->course }}
                                </div>
                                <div class="rounded-full bg-slate-500 text-white">Citation count ba?</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- 2nd div (Fixed Right Side) --}}
            <div class="sticky right-0 top-[4rem] col-span-5 h-fit lg:col-span-2">
                <div class="flex flex-col gap-1">
                    <div class="my-1 rounded-3xl bg-white drop-shadow-lg">
                        <div class="rounded-t-lg py-2 text-center">
                            <strong>Latest research works</strong>
                        </div>
                        <div class="custom-scrollbar h-full overflow-y-auto py-2 md:h-[15rem] lg:h-[18rem]">
                            <div class="flex h-full flex-col gap-2">
                                @if (count($latestDocuPostData) === 0)
                                    <section
                                        class="bg-primary relative z-10 flex h-full items-center justify-center text-gray-700 drop-shadow-lg">
                                        <div class="container">
                                            <div class="-mx-4 flex h-full">
                                                <div class="h-full w-full px-4">
                                                    <div
                                                        class="flex h-full max-w-[400px] flex-col items-center justify-center text-center">
                                                        <svg class="h-[5rem] text-gray-700" fill="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M14 2.25a.25.25 0 0 1 .25.25v5.647c0 .414.336.75.75.75h4.5a.25.25 0 0 1 .25.25V19A2.75 2.75 0 0 1 17 21.75H7A2.75 2.75 0 0 1 4.25 19V5A2.75 2.75 0 0 1 7 2.25h7Z">
                                                            </path>
                                                            <path
                                                                d="M16.086 2.638c-.143-.115-.336.002-.336.186v4.323c0 .138.112.25.25.25h3.298c.118 0 .192-.124.124-.22L16.408 2.98a1.748 1.748 0 0 0-.322-.342Z">
                                                            </path>
                                                        </svg>
                                                        <h4 class="mb-3 text-[22px] font-semibold leading-tight">
                                                            Oops! There is no upload Document yet.
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                @else
                                    @foreach ($latestDocuPostData as $itemLatest)
                                        <div class="px-2">
                                            <a href=""
                                                class="rounded-md bg-blue-500 px-1 text-sm text-white duration-200 ease-in-out hover:bg-blue-800">{{ $itemLatest->document_type }}</a>
                                            <a href="{{ route('view-document', ['reference' => $itemLatest->reference]) }}"
                                                class="text-sm duration-200 ease-in-out hover:font-medium hover:text-primary-color">{{ $itemLatest->title }}
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="my-1 rounded-3xl bg-white drop-shadow-lg">
                        <div class="py-2 text-center">
                            <strong>Latest Posts</strong>
                        </div>
                        <div class="custom-scrollbar h-full overflow-y-auto py-2 md:h-[15rem] lg:h-[18rem]">
                            <div class="flex h-full flex-col gap-2">
                                @if (count($latestDocuPostData) === 0)
                                    <section
                                        class="bg-primary relative z-10 flex h-full items-center justify-center text-gray-700 drop-shadow-lg">
                                        <div class="container">
                                            <div class="-mx-4 flex h-full">
                                                <div class="h-full w-full px-4">
                                                    <div
                                                        class="flex h-full max-w-[400px] flex-col items-center justify-center text-center">
                                                        <svg class="h-[5rem] text-gray-700" fill="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M14 2.25a.25.25 0 0 1 .25.25v5.647c0 .414.336.75.75.75h4.5a.25.25 0 0 1 .25.25V19A2.75 2.75 0 0 1 17 21.75H7A2.75 2.75 0 0 1 4.25 19V5A2.75 2.75 0 0 1 7 2.25h7Z">
                                                            </path>
                                                            <path
                                                                d="M16.086 2.638c-.143-.115-.336.002-.336.186v4.323c0 .138.112.25.25.25h3.298c.118 0 .192-.124.124-.22L16.408 2.98a1.748 1.748 0 0 0-.322-.342Z">
                                                            </path>
                                                        </svg>
                                                        <h4 class="mb-3 text-[22px] font-semibold leading-tight">
                                                            Oops! There is no upload Document yet.
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                @else
                                    @foreach ($latestDocuPostData as $itemLatest)
                                        <div class="px-2">
                                            <a href=""
                                                class="rounded-md bg-blue-500 px-1 text-sm text-white duration-200 ease-in-out hover:bg-blue-800">{{ $itemLatest->document_type }}</a>
                                            <a href="{{ route('view-document', ['reference' => $itemLatest->reference]) }}"
                                                class="text-sm duration-200 ease-in-out hover:font-medium hover:text-primary-color">{{ $itemLatest->title }}
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
