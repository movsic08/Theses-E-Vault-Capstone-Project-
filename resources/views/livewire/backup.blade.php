<div class="relative">
    @section('title', 'Home')
    <x-session_flash />

    <div class="container">
        <section class="grid grid-cols-5 gap-8 text-primary-color md:container">
            {{-- 1st div (Scrollable) --}}
            <div class="col-span-5 flex flex-col gap-4 lg:col-span-3">


                <div class="mt-6">
                    <div
                        class="mb-3 flex w-full items-center justify-between rounded-full border border-slate-200 bg-white px-4 py-2 drop-shadow-md">
                        <p class="flex flex-col text-xs leading-3 md:text-base">
                            <Strong>SHARE YOUR WORKS</Strong>
                            <small class="text-xs">Looking for something? <a wire:navigate href=""
                                    class="hover:text-blue-500 hover:underline">click search
                                </a></small>
                        </p>
                        <a wire:navigate href="{{ route('user-upload-document-form') }}"
                            class="h-fit rounded-full bg-blue-800 px-2 py-1 font-semibold text-white duration-300 ease-in-out hover:bg-primary-color">Upload</a>
                    </div>
                    <div class="mb-2 mt-3 flex w-full items-center justify-start gap-2 border-t border-gray-300 pt-2">
                        <section class="flex w-full justify-between gap-2 text-sm lg:w-fit lg:justify-normal">
                            <div
                                class="relative flex w-fit items-center justify-end rounded-lg border border-slate-200 bg-slate-50 px-2 py-1 drop-shadow-sm">
                                <label for="items" class="mr-1 font-medium text-primary-color">Items: </label>
                                <div class="relative">
                                    <select id="items" wire:model.live='items'
                                        class="cursor-pointer appearance-none rounded-md border border-slate-300 bg-white px-2 py-1 pl-8 pr-1 leading-tight drop-shadow-sm transition duration-300 ease-in-out focus:border-blue-500 focus:bg-white focus:shadow-md focus:outline-none">
                                        <option value="5">5</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2">
                                        <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="relative flex w-fit items-center justify-end rounded-lg border border-slate-200 bg-slate-50 px-2 py-1 drop-shadow-sm">
                                <label for="sortBy" class="mr-1 font-medium text-primary-color">Sort by: </label>
                                <div class="relative">
                                    <select id="sortBy" wire:model.live='sort_by'
                                        class="cursor-pointer appearance-none rounded-md border border-slate-300 bg-white px-2 py-1 pl-8 pr-4 leading-tight drop-shadow-sm transition duration-300 ease-in-out focus:border-blue-500 focus:bg-white focus:shadow-md focus:outline-none">
                                        <option value="relevance">Relevance</option>
                                        <option value="newest">Newest</option>
                                        <option value="oldest">Oldest</option>
                                        <option value="a-z">From A_Z</option>
                                        <option value="z-a">From Z-A</option>
                                        <option value="most_cited">Most cited</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2">
                                        <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="mt-4 space-y-6">
                        @foreach ($docuPostData as $docuData)
                            <section
                                class="rounded-xl bg-white p-5 drop-shadow-lg duration-500 ease-in-out hover:-translate-y-1">
                                <div class="relative flex w-full items-start gap-2 border-b border-gray-300 pb-3">
                                    <strong class="text-base md:pr-6 md:text-lg">Lorem ipsum, dolor sit amet
                                        consectetur
                                        adipisicing
                                        elit. Repellat
                                        deserunt assumenda natus dolore culpa nobis ea provident ullam laborum,
                                        exercitationem tenetur odit nisi accusamus possimus suscipit ipsum
                                        voluptatum ducimus quis!</strong>
                                    <svg class="absolute right-0 top-0 max-h-[1.5rem] min-h-[1.5rem] min-w-[1.5rem] max-w-[1.5rem] cursor-pointer text-gray-700"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.8 4.8V21a.6.6 0 0 0 .888.527L12 18.083l6.312 3.444A.6.6 0 0 0 19.2 21V4.8a2.4 2.4 0 0 0-2.4-2.4H7.2a2.4 2.4 0 0 0-2.4 2.4Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="mt-3 flex flex-col gap-2 text-xs font-medium md:flex-row md:text-sm">
                                    <div class="h-fit w-fit rounded-full bg-sky-700 px-2 py-1 text-white">
                                        Feasib
                                    </div>
                                    <div
                                        class="h-fit w-fit rounded-full border-blue-700 bg-blue-100 px-2 py-1 text-blue-700">
                                        Bachelor of science in information technology
                                    </div>
                                </div>
                                <p
                                    class="my-2 line-clamp-4 rounded-lg border border-slate-200 bg-slate-50 px-2 py-1 text-sm md:line-clamp-5 md:text-base">
                                    Lorem ipsum, dolor sit
                                    amet
                                    consectetur Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam,
                                    maxime, sequi obcaecati laboriosam eveniet amet temporibus soluta veniam iste
                                    dolore itaque explicabo natus adipisci enim alias nihil sapiente voluptatum
                                    omnis?
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe exercitationem
                                    nostrum error soluta itaque rerum est quidem commodi sapiente adipisci, omnis
                                    accusamus fuga esse eveniet vero eligendi at, consequuntur tempora. adipisicing
                                    elit. Ullam
                                    inventore
                                    assumenda, fugiat soluta sequi quasi odit tenetur dolorem ad? Expedita provident
                                    cupiditate reprehenderit facilis officia! Est atque incidunt explicabo nihil?
                                </p>

                                <div class="flex items-start pb-2">
                                    <svg class="mr-1 max-h-[1.5rem] min-h-[1.5rem] min-w-[1.5rem] max-w-[1.5rem]"
                                        fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.28 4.32a1.2 1.2 0 0 1 1.2-1.2h5.503a1.2 1.2 0 0 1 .849.352l8.4 8.4a1.2 1.2 0 0 1 0 1.697l-5.503 5.503a1.2 1.2 0 0 1-1.697 0l-8.4-8.4a1.2 1.2 0 0 1-.352-.849V4.32Zm4.2 4.8a1.8 1.8 0 1 0 0-3.6 1.8 1.8 0 0 0 0 3.6Z">
                                        </path>
                                        <path
                                            d="M4.431 11.272a1.2 1.2 0 0 1-.351-.848V4.32a1.2 1.2 0 0 0-1.2 1.2v5.504c0 .318.126.623.351.848l8.4 8.4a1.2 1.2 0 0 0 1.697 0l.052-.052-8.949-8.948Z">
                                        </path>
                                    </svg>
                                    <p class="font-medium text-gray-600">
                                        <a class="px-1 hover:bg-gray-100 hover:text-blue-600">testing
                                            ngdrone,</a>
                                        <a class="px-1 hover:bg-gray-100 hover:text-blue-600" target="_blank"
                                            rel="noopener noreferrer">tester,</a>
                                        <a class="px-1 hover:bg-gray-100 hover:text-blue-600" target="_blank"
                                            rel="noopener noreferrer">tester,</a>
                                        <a class="px-1 hover:bg-gray-100 hover:text-blue-600" target="_blank"
                                            rel="noopener noreferrer">tester taalga ba,</a>
                                        @if (true)
                                            <a class="px-1 hover:bg-gray-100 hover:text-blue-600" target="_blank"
                                                rel="noopener noreferrer">testerng mundo,</a>
                                        @endif
                                        @if (true)
                                            <a class="px-1 hover:bg-gray-100 hover:text-blue-600" target="_blank"
                                                rel="noopener noreferrer">tester,</a>
                                        @endif
                                        @if (true)
                                            <a class="px-1 hover:bg-gray-100 hover:text-blue-600" target="_blank"
                                                rel="noopener noreferrer">tester,</a>
                                        @endif
                                        @if (true)
                                            <a class="px-1 hover:bg-gray-100 hover:text-blue-600" target="_blank"
                                                rel="noopener noreferrer">tester</a>
                                        @endif
                                    </p>
                                </div>
                                <div class="flex items-center justify-between border-t border-slate-200 pt-2">
                                    <div class="flex items-center gap-2">
                                        <div class="rounded-full bg-sky-100 p-1">
                                            <svg width="24" height="24" fill="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.027 14.91c.168-.099.352-.195.551-.286-.168.25-.348.493-.54.727-.336.404-.597.62-.762.687a.312.312 0 0 1-.042.014.338.338 0 0 1-.031-.053c-.067-.132-.065-.26.048-.432.127-.198.383-.425.776-.658Zm2.946-1.977c-.142.03-.284.06-.427.094a25.2 25.2 0 0 0 .6-1.26c.19.351.394.695.612 1.03-.26.038-.523.083-.785.136Zm3.03 1.127a4.662 4.662 0 0 1-.522-.492c.274.006.521.026.735.065.38.068.559.176.621.25.02.021.031.049.032.077a.524.524 0 0 1-.072.24.368.368 0 0 1-.113.15.128.128 0 0 1-.083.017c-.108-.003-.31-.08-.598-.307Zm-2.67-5.695c-.048.293-.13.629-.24.995a5.82 5.82 0 0 1-.106-.416c-.092-.423-.105-.756-.056-.986.046-.212.132-.298.236-.34a.621.621 0 0 1 .174-.048.71.71 0 0 1 .038.238c.006.146-.008.332-.046.558v-.001Z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M7.2 2.4h9.6a2.4 2.4 0 0 1 2.4 2.4v14.4a2.4 2.4 0 0 1-2.4 2.4H7.2a2.4 2.4 0 0 1-2.4-2.4V4.8a2.4 2.4 0 0 1 2.4-2.4Zm.198 14.002c.108.216.276.412.525.503a.95.95 0 0 0 .696-.036c.382-.156.762-.523 1.112-.944.4-.48.82-1.112 1.225-1.812a13.979 13.979 0 0 1 2.396-.487c.36.46.732.856 1.092 1.14.336.264.724.484 1.121.5.216.011.43-.046.612-.165a1.24 1.24 0 0 0 .425-.499c.108-.217.174-.444.165-.676a1.013 1.013 0 0 0-.24-.621c-.27-.324-.715-.48-1.152-.558a6.91 6.91 0 0 0-1.602-.06 13.146 13.146 0 0 1-1.176-2.023c.3-.792.525-1.541.624-2.153a3.72 3.72 0 0 0 .058-.737 1.487 1.487 0 0 0-.152-.646.841.841 0 0 0-.573-.438c-.242-.051-.492 0-.72.093-.453.18-.692.564-.782.987-.088.408-.048.884.055 1.364.106.487.286 1.017.516 1.554a23.64 23.64 0 0 1-1.274 2.672 9.189 9.189 0 0 0-1.779.774c-.444.264-.839.576-1.076.944-.252.392-.33.857-.096 1.324Z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div class="h-5 border-r border-slate-400 pr-1 text-gray-500">
                                        </div>
                                        <p class="font-medium text-gray-500">Nov 2023</p>
                                    </div>
                                    <div class="mr-2 flex gap-3 font-medium text-gray-500">
                                        <div class="flex items-center gap-2">
                                            <svg width="20" height="20" fill="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2 4.917a2.5 2.5 0 0 1 2.5-2.5h15a2.5 2.5 0 0 1 2.5 2.5v10a2.5 2.5 0 0 1-2.5 2.5h-3.125a1.25 1.25 0 0 0-1 .5L13 21.083a1.25 1.25 0 0 1-2 0l-2.375-3.166a1.25 1.25 0 0 0-1-.5H4.5a2.5 2.5 0 0 1-2.5-2.5v-10Zm8.992 3.457a2.113 2.113 0 0 0-.283-.34 1.835 1.835 0 0 0-.586-.405l-.01-.005a2.231 2.231 0 0 0-.945-.207C7.97 7.417 7 8.349 7 9.501c0 1.15.97 2.082 2.168 2.082a2.22 2.22 0 0 0 1.163-.325c-.171.487-.487 1.005-1.012 1.525a.507.507 0 0 0 .013.738.56.56 0 0 0 .768-.013c1.668-1.661 1.713-3.447 1.176-4.632a3.077 3.077 0 0 0-.284-.5v-.002Zm4.758 2.884c-.17.487-.488 1.005-1.012 1.525a.507.507 0 0 0 .014.738.56.56 0 0 0 .767-.013c1.667-1.661 1.712-3.447 1.177-4.632a3.08 3.08 0 0 0-.285-.5 2.114 2.114 0 0 0-.284-.342 1.832 1.832 0 0 0-.586-.405l-.01-.005a2.23 2.23 0 0 0-.944-.207c-1.196 0-2.167.932-2.167 2.084 0 1.15.971 2.082 2.168 2.082a2.22 2.22 0 0 0 1.163-.325h-.001Z">
                                                </path>
                                            </svg>
                                            <span>2</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg width="22" height="22" fill="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15 11.64a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                                <path
                                                    d="M2.4 11.64S6 5.04 12 5.04s9.6 6.6 9.6 6.6-3.6 6.6-9.6 6.6-9.6-6.6-9.6-6.6Zm9.6 4.2a4.2 4.2 0 1 0 0-8.4 4.2 4.2 0 0 0 0 8.4Z">
                                                </path>
                                            </svg>
                                            <span>2</span>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endforeach

                    </div>
                </div>

            </div>
            {{-- 2nd div (Fixed Right Side) --}}
            <div class="sticky right-0 top-[4.3rem] col-span-5 h-fit lg:col-span-2">
                <div class="flex flex-col gap-2">
                    {{-- 1st section sticky --}}
                    <section class="mb-2 rounded-3xl bg-white drop-shadow-lg">
                        <div class="rounded-t-lg py-2 text-center">
                            <strong>Trending post</strong>
                        </div>
                        <div class="h-full py-2 md:max-h-[14rem] lg:max-h-[17rem]">
                            <div class="flex h-full flex-col gap-2">

                                <div class="custom-scrollbar h-full overflow-y-auto">

                                    <div class="my-1.5 px-2">
                                        <a href=""
                                            class="rounded-md bg-blue-500 px-1 text-sm text-white duration-200 ease-in-out hover:bg-blue-800">{{ $itemLatest->document_type }}</a>
                                        <a href="{{ route('view-document', ['reference' => $itemLatest->reference]) }}"
                                            class="text-sm duration-200 ease-in-out hover:font-medium hover:text-primary-color">{{ $itemLatest->title }}
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </section>

                </div>
            </div>

        </section>
    </div>

</div>
