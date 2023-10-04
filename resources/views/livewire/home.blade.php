<div>
    @section('title', 'Home')
    <x-session_flash />

    <section class="container">
        <h2 class="text-secondary-color">List of Collections</h2>
    </section>

    <section class="grid grid-cols-5 gap-4 text-primary-color md:container">
        {{-- 1st div (Scrollable) --}}
        <div class="col-span-5 flex flex-col gap-4 lg:col-span-3">
            {{-- @if (!is_null($skeletonData)) --}}
            @if ($docuPostData == null)
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
            <div class="md:container">
                <div class="mt-2 space-y-6">

                    @foreach ($docuPostData as $docuData)
                        <div
                            class="flex items-start bg-white p-4 drop-shadow-lg duration-500 ease-in-out hover:-translate-y-1 md:rounded-3xl">
                            <div
                                class="mr-2 hidden max-h-[2rem] min-h-[2rem] min-w-[2rem] max-w-[2rem] flex-grow md:block">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37 49" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.16667 0H22.4878C23.3053 0.000714796 24.089 0.323839 24.6667 0.898333L36.0956 12.25C36.3823 12.5344 36.6097 12.8722 36.7649 13.2439C36.9201 13.6157 37 14.0142 37 14.4167V42.875C37 44.4995 36.3503 46.0574 35.1938 47.206C34.0373 48.3547 32.4688 49 30.8333 49H6.16667C4.53116 49 2.96265 48.3547 1.80617 47.206C0.649699 46.0574 0 44.4995 0 42.875V6.125C0 4.50055 0.649699 2.94263 1.80617 1.79397C2.96265 0.64531 4.53116 0 6.16667 0ZM23.125 4.59375V10.7187C23.125 11.531 23.4498 12.3099 24.0281 12.8843C24.6063 13.4586 25.3906 13.7812 26.2083 13.7812H32.375L23.125 4.59375ZM6.67542 41.8593C6.95292 42.4105 7.38458 42.9107 8.02437 43.143C8.61068 43.3385 9.24984 43.3056 9.81271 43.0511C10.7942 42.653 11.7706 41.7164 12.6699 40.6445C13.6977 39.4144 14.7769 37.804 15.8175 36.0176C17.8292 35.4257 19.8892 35.0099 21.9739 34.7747C22.8989 35.9486 23.8547 36.9593 24.7797 37.6841C25.6431 38.3578 26.64 38.9193 27.6601 38.9601C28.2151 38.9882 28.7649 38.8427 29.2326 38.539C29.705 38.2195 30.0822 37.7796 30.3246 37.2655C30.6021 36.7117 30.7717 36.1324 30.7485 35.5403C30.7286 34.9581 30.5113 34.3997 30.1319 33.9555C29.4381 33.1286 28.2947 32.7305 27.1719 32.5314C25.8104 32.3219 24.429 32.2705 23.0556 32.3783C21.8959 30.75 20.8847 29.0222 20.034 27.2154C20.8048 25.1942 21.3829 23.2827 21.6373 21.7208C21.7497 21.1003 21.7996 20.4702 21.7863 19.8399C21.7828 19.2681 21.6493 18.7046 21.3958 18.1912C21.2492 17.9081 21.041 17.661 20.7864 17.4676C20.5317 17.2743 20.237 17.1396 19.9235 17.0734C19.3017 16.9433 18.6593 17.0734 18.0735 17.3108C16.9095 17.7702 16.2954 18.7502 16.0642 19.8297C15.8381 20.8709 15.9408 22.0832 16.2055 23.3107C16.4778 24.5536 16.9403 25.9062 17.5313 27.2767C16.5847 29.6154 15.4914 31.8929 14.2578 34.0958C12.6683 34.5922 11.136 35.2543 9.6868 36.0711C8.54597 36.7449 7.53104 37.5411 6.92208 38.4803C6.27458 39.4782 6.07417 40.6674 6.67542 41.8593Z"
                                        fill="#0A2647" />
                                </svg>
                            </div>
                            <div class="relative flex flex-col">
                                <div class="">
                                    <div class="mr-6 flex">
                                        <a href="{{ route('view-document', ['reference' => $docuData->reference]) }}"
                                            target="_blank" class="text-[1rem] font-medium text-primary-color">
                                            {{ $docuData->title }}
                                        </a>
                                    </div>
                                    <svg class="absolute right-0 top-2 max-h-[1.3rem] min-h-[1.3rem] min-w-[1.3rem] max-w-[1.3rem] cursor-pointer"
                                        wire:click='boomarkItem({{ $docuData->id }})' xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 23 32" fill="none">
                                        <g clip-path="url(#clip0_1607_1378)">
                                            <path
                                                d="M21.3438 31.8082C21.0763 31.8087 20.8179 31.708 20.6175 31.5252L11.5 23.1598L2.3825 31.5267C2.22467 31.6714 2.02966 31.7658 1.82098 31.7987C1.61231 31.8315 1.39889 31.8013 1.20648 31.7117C1.01407 31.6221 0.850892 31.4769 0.736624 31.2937C0.622356 31.1105 0.561885 30.8971 0.562505 30.6792V4.71144C0.563663 3.51406 1.02497 2.36606 1.84519 1.51938C2.66541 0.672697 3.77754 0.196508 4.9375 0.195312H18.0625C19.2225 0.196508 20.3346 0.672697 21.1548 1.51938C21.975 2.36606 22.4363 3.51406 22.4375 4.71144V30.6792C22.4375 30.9786 22.3223 31.2658 22.1171 31.4775C21.912 31.6893 21.6338 31.8082 21.3438 31.8082Z"
                                                fill="#3D4448" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1607_1378">
                                                <rect width="23" height="32" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="mt-2 flex">

                                    <div class="ml-1 flex flex-wrap gap-1 font-light leading-tight text-gray-800">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="max-h-[1.5rem] min-h-[1.5rem] min-w-[1.5rem] max-w-[1.5rem] text-gray-700"
                                            viewBox="0 0 25 25" fill="currentColor">
                                            <path
                                                d="M5.5 4.5C5.5 4.16848 5.6317 3.85054 5.86612 3.61612C6.10054 3.3817 6.41848 3.25 6.75 3.25H12.4823C12.6466 3.25001 12.8092 3.2824 12.961 3.34531C13.1127 3.40823 13.2506 3.50044 13.3667 3.61667L22.1167 12.3667C22.3511 12.6011 22.4828 12.919 22.4828 13.2505C22.4828 13.582 22.3511 13.9 22.1167 14.1344L16.3844 19.8667C16.15 20.1011 15.832 20.2328 15.5005 20.2328C15.169 20.2328 14.8511 20.1011 14.6167 19.8667L5.86667 11.1167C5.75044 11.0006 5.65823 10.8627 5.59531 10.711C5.53239 10.5592 5.50001 10.3966 5.5 10.2323V4.5ZM9.875 9.5C10.1212 9.5 10.365 9.4515 10.5925 9.35727C10.82 9.26305 11.0267 9.12494 11.2008 8.95083C11.3749 8.77672 11.513 8.57002 11.6073 8.34253C11.7015 8.11505 11.75 7.87123 11.75 7.625C11.75 7.37877 11.7015 7.13495 11.6073 6.90747C11.513 6.67998 11.3749 6.47328 11.2008 6.29917C11.0267 6.12507 10.82 5.98695 10.5925 5.89273C10.365 5.7985 10.1212 5.75 9.875 5.75C9.37772 5.75 8.9008 5.94754 8.54917 6.29917C8.19754 6.65081 8 7.12772 8 7.625C8 8.12228 8.19754 8.59919 8.54917 8.95083C8.9008 9.30246 9.37772 9.5 9.875 9.5Z"
                                                fill="" />
                                            <path
                                                d="M4.61563 11.7417C4.38152 11.5073 4.25002 11.1896 4.25 10.8583V4.5C3.91848 4.5 3.60054 4.6317 3.36612 4.86612C3.1317 5.10054 3 5.41848 3 5.75V11.4833C3 11.8146 3.13125 12.1323 3.36562 12.3667L12.1156 21.1167C12.35 21.3511 12.668 21.4828 12.9995 21.4828C13.331 21.4828 13.6489 21.3511 13.8833 21.1167L13.9375 21.0625L4.61563 11.7417Z"
                                                fill="" />
                                        </svg>
                                        <a href="#" target="_blank"
                                            class="whitespace-nowrap rounded-md bg-slate-100 px-1 duration-200 hover:bg-slate-400 hover:text-white">Abseenteism
                                            Key</a>
                                        <a href="#" target="_blank"
                                            class="whitespace-nowrap rounded-md bg-slate-100 px-1 duration-200 hover:bg-slate-400 hover:text-white">Abseenteism</a>
                                        <a href="#" target="_blank"
                                            class="whitespace-nowrap rounded-md bg-slate-100 px-1 duration-200 hover:bg-slate-400 hover:text-white">Research
                                            works</a>
                                        <a href="#" target="_blank"
                                            class="whitespace-nowrap rounded-md bg-slate-100 px-1 duration-200 hover:bg-slate-400 hover:text-white">Health
                                            matters</a>
                                        <a href="#" target="_blank"
                                            class="whitespace-nowrap rounded-md bg-slate-100 px-1 duration-200 hover:bg-slate-400 hover:text-white">Depression</a>
                                        <a href="#" target="_blank"
                                            class="whitespace-nowrap rounded-md bg-slate-100 px-1 duration-200 hover:bg-slate-400 hover:text-white">Money</a>
                                        <a href="#" target="_blank"
                                            class="whitespace-nowrap rounded-md bg-slate-100 px-1 duration-200 hover:bg-slate-400 hover:text-white">Grades
                                            failling</a>
                                        <a href="#" target="_blank"
                                            class="whitespace-nowrap rounded-md bg-slate-100 px-1 duration-200 hover:bg-slate-400 hover:text-white">School</a>
                                    </div>
                                </div>
                                <p class="mt-2 line-clamp-3 text-gray-800 md:line-clamp-4 lg:line-clamp-5">
                                    This research analysis was conducted to examine the influence of gamified
                                    loyalty
                                    programs on customer satisfaction and purchase intention among Shopee users in
                                    Metro
                                    Manila, with intrinsic motivation as a moderating variable, and its indirect
                                    impact
                                    on customer loyalty. Data was collected from a minimum of 200 respondents
                                    Manila, with intrinsic motivation as a moderating variable, and its indirect
                                    impact
                                    on customer loyalty. Data was collected from a minimum of 200 respondents
                                    Manila, with intrinsic motivation as a moderating variable, and its indirect
                                    impact
                                    on customer loyalty. Data was collected from a minimum of 200 respondents
                                </p>
                                <div class="mt-2 flex">
                                    <div class="flex flex-wrap gap-1 leading-tight text-gray-800">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="max-h-[1.5rem] min-h-[1.5rem] min-w-[1.5rem] max-w-[1.5rem] text-gray-700"
                                            viewBox="0 0 25 25" fill="currentColor">
                                            <path
                                                d="M11.25 20C11.25 20 10 20 10 18.75C10 17.5 11.25 13.75 16.25 13.75C21.25 13.75 22.5 17.5 22.5 18.75C22.5 20 21.25 20 21.25 20H11.25ZM16.25 12.5C17.2446 12.5 18.1984 12.1049 18.9016 11.4017C19.6049 10.6984 20 9.74456 20 8.75C20 7.75544 19.6049 6.80161 18.9016 6.09835C18.1984 5.39509 17.2446 5 16.25 5C15.2554 5 14.3016 5.39509 13.5983 6.09835C12.8951 6.80161 12.5 7.75544 12.5 8.75C12.5 9.74456 12.8951 10.6984 13.5983 11.4017C14.3016 12.1049 15.2554 12.5 16.25 12.5Z"
                                                fill="" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.02083 20.0005C8.83522 19.6104 8.74252 19.1825 8.75 18.7505C8.75 17.0568 9.6 15.313 11.1708 14.1005C10.3869 13.859 9.57021 13.741 8.75 13.7505C3.75 13.7505 2.5 17.5005 2.5 18.7505C2.5 20.0005 3.75 20.0005 3.75 20.0005H9.02083Z"
                                                fill="" />
                                            <path
                                                d="M8.12493 12.5C8.95374 12.5001 9.74865 12.171 10.3348 11.5851C10.9209 10.9991 11.2503 10.2043 11.2505 9.37552C11.2506 8.54672 10.9215 7.75181 10.3355 7.16566C9.74958 6.57951 8.95478 6.25014 8.12598 6.25C7.29717 6.25 6.50232 6.57924 5.91627 7.16529C5.33022 7.75134 5.00098 8.5462 5.00098 9.375C5.00098 10.2038 5.33022 10.9987 5.91627 11.5847C6.50232 12.1708 7.29613 12.5 8.12493 12.5Z"
                                                fill="" />
                                        </svg>
                                        <span class="whitespace-nowrap">Elmer Tirao</span>
                                        <span class="whitespace-nowrap">John Ruiz Melando</span>
                                        <span class="whitespace-nowrap">Jose Rizal</span>
                                        <span class="whitespace-nowrap">Martin Fernandez</span>
                                    </div>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <div class="flex flex-col-reverse gap-1 md:flex-row">
                                        <div class="w-fit rounded-md bg-blue-800 p-1 text-white">Capstone</div>
                                        <div class="w-fit rounded-md bg-blue-800 p-1 text-white">Bachelor of
                                            Science in
                                            Information Technology</div>
                                    </div>
                                    <span>Jan 08, 2023</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        {{-- 2nd div (Fixed Right Side) --}}
        <div class="sticky right-0 top-[4rem] col-span-5 h-fit lg:col-span-2">
            <div class="flex flex-col gap-1">
                <div class="my-1 rounded-3xl bg-white drop-shadow-lg">
                    <div class="rounded-t-lg py-2 text-center">
                        <strong>Latest research works</strong>
                    </div>
                    <div class="h-full py-2 md:h-[15rem] lg:h-[18rem]">
                        <div class="flex h-full flex-col gap-2">
                            @if ($latestDocuPostData == null || count($latestDocuPostData) === 0)
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
                                <div class="custom-scrollbar h-full overflow-y-auto">
                                    @foreach ($latestDocuPostData as $itemLatest)
                                        <div class="px-2">
                                            <a href=""
                                                class="rounded-md bg-blue-500 px-1 text-sm text-white duration-200 ease-in-out hover:bg-blue-800">{{ $itemLatest->document_type }}</a>
                                            <a href="{{ route('view-document', ['reference' => $itemLatest->reference]) }}"
                                                class="text-sm duration-200 ease-in-out hover:font-medium hover:text-primary-color">{{ $itemLatest->title }}
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
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
                            @if ($latestDocuPostData == null)
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
