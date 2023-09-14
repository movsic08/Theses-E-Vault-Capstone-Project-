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
                <div class="mt-2 space-y-4">
                    @foreach ($docuPostData as $docuData)
                        <div
                            class="grid w-full grid-cols-7 gap-2 rounded-lg bg-white p-2 drop-shadow-lg duration-500 ease-in-out hover:-translate-y-1">
                            <div class="col-span-7 grid w-full grid-cols-7 gap-2">
                                <div class="col-span-1 flex items-center justify-center">
                                    <svg class="h-10" viewBox="0 0 63 82" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.5 0H38.29C39.6819 0.00119619 41.0164 0.541935 42 1.50333L61.46 20.5C61.9482 20.976 62.3354 21.5412 62.5997 22.1633C62.8639 22.7855 63 23.4524 63 24.1259V71.75C63 74.4685 61.8938 77.0756 59.9246 78.9978C57.9555 80.9201 55.2848 82 52.5 82H10.5C7.71523 82 5.04451 80.9201 3.07538 78.9978C1.10625 77.0756 0 74.4685 0 71.75V10.25C0 7.53153 1.10625 4.9244 3.07538 3.00215C5.04451 1.07991 7.71523 0 10.5 0ZM39.375 7.6875V17.9375C39.375 19.2967 39.9281 20.6003 40.9127 21.5614C41.8973 22.5225 43.2326 23.0625 44.625 23.0625H55.125L39.375 7.6875ZM11.3662 70.0502C11.8387 70.9727 12.5737 71.8098 13.6631 72.1984C14.6614 72.5256 15.7497 72.4706 16.7081 72.0447C18.3794 71.3784 20.0419 69.811 21.5731 68.0173C23.3231 65.9587 25.1606 63.2639 26.9325 60.2743C30.3578 59.2839 33.8654 58.5879 37.415 58.1944C38.99 60.159 40.6175 61.8502 42.1925 63.0631C43.6625 64.1906 45.36 65.1302 47.0969 65.1985C48.0419 65.2455 48.9781 65.0021 49.7744 64.4939C50.5788 63.9591 51.221 63.223 51.6337 62.3627C52.1062 61.4359 52.395 60.4665 52.3556 59.4756C52.3217 58.5013 51.9517 57.5668 51.3056 56.8234C50.1244 55.4397 48.1775 54.7734 46.2656 54.4403C43.9475 54.0897 41.5954 54.0037 39.2569 54.1841C37.2822 51.4591 35.5604 48.5677 34.1119 45.5442C35.4244 42.1617 36.4087 38.9628 36.8419 36.3491C37.0333 35.3107 37.1183 34.2563 37.0956 33.2015C37.0897 32.2446 36.8624 31.3015 36.4306 30.4425C36.181 29.9687 35.8266 29.5551 35.393 29.2315C34.9594 28.908 34.4576 28.6827 33.9237 28.5719C32.865 28.3541 31.7712 28.5719 30.7737 28.9691C28.7919 29.7378 27.7463 31.3778 27.3525 33.1844C26.9675 34.9269 27.1425 36.9555 27.5931 39.0098C28.0569 41.0897 28.8444 43.3532 29.8506 45.6467C28.2387 49.5605 26.3772 53.3718 24.2769 57.0583C21.5703 57.889 18.9614 58.9971 16.4937 60.364C14.5512 61.4915 12.8231 62.824 11.7862 64.3956C10.6837 66.0655 10.3425 68.0557 11.3662 70.0502Z"
                                            fill="#041A32" />
                                    </svg>
                                </div>
                                <div class="col-span-6">
                                    <a wire:navigate
                                        href="{{ route('view-document', ['reference' => $docuData->reference]) }}"
                                        class="text-md whitespace-normal font-semibold leading-tight text-primary-color lg:text-base">
                                        {{ $docuData->title }}</a>
                                </div>
                            </div>
                            <div class="col-span-7 flex gap-2 pl-[1.2rem] md:pl-[4.2rem] lg:pl-[1.2rem]">
                                <button
                                    class="flex w-fit flex-row items-center justify-center gap-1 rounded-md bg-blue-500 px-2 py-1">
                                    <svg class="h-5" viewBox="0 0 29 29" fill="none">
                                        <path
                                            d="M26.0999 13.5328C26.0999 19.1395 20.9065 23.6828 14.4999 23.6828C13.352 23.6852 12.2077 23.5366 11.0972 23.2406C10.2514 23.6695 8.30599 24.4924 5.03503 25.0289C4.74503 25.076 4.5239 24.7751 4.63869 24.5045C5.15224 23.2925 5.61624 21.677 5.75519 20.2028C3.97894 18.4217 2.8999 16.0872 2.8999 13.5328C2.8999 7.92977 8.09574 3.38281 14.4999 3.38281C20.9065 3.38281 26.0999 7.92856 26.0999 13.5328ZM13.3314 11.7445C13.236 11.602 13.1258 11.47 13.0028 11.3506C12.809 11.1505 12.5779 10.9904 12.3225 10.8793L12.3104 10.8745C11.9672 10.7147 11.593 10.6322 11.2144 10.6328C9.82486 10.6328 8.70111 11.7155 8.70111 13.0507C8.70111 14.3847 9.82486 15.4674 11.2144 15.4674C11.7123 15.4674 12.1751 15.3284 12.5642 15.0891C12.366 15.6534 11.9987 16.2552 11.3897 16.8581C11.3323 16.9142 11.2871 16.9814 11.2568 17.0556C11.2264 17.1298 11.2116 17.2094 11.2132 17.2896C11.2148 17.3697 11.2327 17.4487 11.266 17.5216C11.2993 17.5945 11.3471 17.6599 11.4066 17.7136C11.5288 17.825 11.6888 17.8854 11.8541 17.8827C12.0194 17.8801 12.1774 17.8144 12.2959 17.6991C14.2304 15.7731 14.2824 13.6996 13.6613 12.3257C13.5697 12.1225 13.4593 11.9271 13.3314 11.7445ZM18.8499 15.0891C18.6529 15.6534 18.2844 16.2552 17.6754 16.8581C17.618 16.9142 17.5727 16.9814 17.5424 17.0557C17.512 17.1299 17.4973 17.2096 17.499 17.2898C17.5007 17.37 17.5188 17.449 17.5523 17.5219C17.5857 17.5948 17.6338 17.6601 17.6935 17.7136C17.8155 17.8249 17.9754 17.8853 18.1405 17.8826C18.3055 17.8799 18.4634 17.8143 18.5817 17.6991C20.5162 15.7731 20.5682 13.6996 19.9471 12.3257C19.8555 12.1225 19.745 11.9283 19.6172 11.7457C19.5218 11.6028 19.4116 11.4704 19.2885 11.3506C19.0948 11.1504 18.8637 10.9903 18.6082 10.8793L18.5962 10.8745C18.2533 10.7149 17.8796 10.6324 17.5014 10.6328C16.1142 10.6328 14.9881 11.7155 14.9881 13.0507C14.9881 14.3847 16.1142 15.4674 17.5014 15.4674C17.978 15.4688 18.4457 15.3379 18.8523 15.0891H18.8499Z"
                                            fill="white" />
                                    </svg>
                                    <span class="font-semibold text-white">1</span>
                                </button>
                                <button class="rounded-md bg-blue-800 px-2 py-1 text-[0.9rem] text-white">
                                    {{ $docuData->course }}
                                </button>
                                <button class="rounded-md bg-green-800 px-2 py-1 text-[0.9rem] text-white">
                                    {{ $docuData->document_type }}
                                </button>
                            </div>
                            <div class="col-span-7 w-full pl-[1.2rem] md:pl-[4.2rem] lg:pl-[1.2rem]">
                                <p class="text-sm">{{ $docuData->abstract_or_summary }}</p>
                            </div>
                            {{-- authors --}}
                            {{-- <div class="col-span-7 flex pl-[1.2rem] md:pl-[4.2rem] lg:pl-[1.2rem]">
                                <div class="flex items-center gap-2">
                                    <div class="h-5 w-5">
                                        <svg class="text-gray-800" fill="currentColor">
                                            <path
                                                d="M10.8 19.2s-1.2 0-1.2-1.2 1.2-4.8 6-4.8 6 3.6 6 4.8c0 1.2-1.2 1.2-1.2 1.2h-9.6Zm4.8-7.2a3.6 3.6 0 1 0 0-7.2 3.6 3.6 0 0 0 0 7.2Z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M8.66 19.2A2.685 2.685 0 0 1 8.4 18c0-1.626.816-3.3 2.324-4.464A7.592 7.592 0 0 0 8.4 13.2c-4.8 0-6 3.6-6 4.8 0 1.2 1.2 1.2 1.2 1.2h5.06Z"
                                                clip-rule="evenodd"></path>
                                            <path d="M7.8 12a3 3 0 1 0 .001-6 3 3 0 0 0 0 6Z"></path>
                                        </svg>
                                    </div>
                                    <div class="text-[0.8rem] text-gray-600">
                                        <div class="grid grid-cols-4 gap-2 leading-[0.7rem]">
                                            <span class="col-span-2 lg:col-span-1">{{ $docuData->author_1 }}</span>
                                            <span class="col-span-2 lg:col-span-1">{{ $docuData->author_2 }}</span>
                                            <span class="col-span-2 lg:col-span-1">{{ $docuData->author_3 }}</span>
                                            <span class="col-span-2 lg:col-span-1">{{ $docuData->author_4 }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- keywords --}}
                            {{-- <div class="col-span-7 flex items-center gap-1 pl-[1.2rem] md:pl-[4.2rem] lg:pl-[1.2rem]">
                                <div>
                                    <svg class="h-6 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M5.28 4.32a1.2 1.2 0 0 1 1.2-1.2h5.503a1.2 1.2 0 0 1 .849.352l8.4 8.4a1.2 1.2 0 0 1 0 1.697l-5.503 5.503a1.2 1.2 0 0 1-1.697 0l-8.4-8.4a1.2 1.2 0 0 1-.352-.849V4.32Zm4.2 4.8a1.8 1.8 0 1 0 0-3.6 1.8 1.8 0 0 0 0 3.6Z">
                                        </path>
                                        <path
                                            d="M4.431 11.272a1.2 1.2 0 0 1-.351-.848V4.32a1.2 1.2 0 0 0-1.2 1.2v5.504c0 .318.126.623.351.848l8.4 8.4a1.2 1.2 0 0 0 1.697 0l.052-.052-8.949-8.948Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex gap-2 text-[0.8rem] text-gray-600">
                                    <a class="cursor-pointer duration-300 ease-in-out hover:text-blue-700">
                                        {{ $docuData->keyword_1 }}
                                    </a>
                                    <a class="cursor-pointer duration-300 ease-in-out hover:text-blue-700">
                                        {{ $docuData->keyword_2 }}
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- 2nd div (Fixed Right Side) --}}
            <div class="sticky right-0 top-[4rem] col-span-5 h-fit lg:col-span-2">
                <div class="flex flex-col gap-1">
                    <div class="my-1 drop-shadow-lg">
                        <div class="rounded-t-lg bg-gray-600 py-2 text-center text-white">
                            <h1>Latest research works</h1>
                        </div>
                        <div class="custom-scrollbar h-full overflow-y-auto rounded-b-lg bg-white py-2 lg:h-[15rem]">
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
                    <div class="my-1 drop-shadow-lg">
                        <div class="rounded-t-lg bg-gray-600 py-2 text-center text-white">
                            <h1>Latest Posts</h1>
                        </div>
                        <div class="custom-scrollbar h-full overflow-y-auto rounded-b-lg bg-white py-2 lg:h-[15rem]">
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
