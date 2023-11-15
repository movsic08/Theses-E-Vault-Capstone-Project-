<div class="container">
    @section('title', 'Search "' . $query . '"')
    <x-session_flash />

    @include('livewire.partials.docu-search-result-share')
    <div class="mb-4 mt-3 md:container md:mx-3">
        <div class="relative mb-8 flex flex-col gap-4 lg:flex-row lg:gap-8">
            <section class="flex w-full flex-col gap-4">
                <div class="flex w-full items-center justify-between text-primary-color">
                    <div><strong>Search for:</strong> <span class="font-medium">{{ $query }}</span></div>
                    <strong class="ml-1 whitespace-nowrap text-primary-color lg:hidden">{{ $resultsCount }}
                        @if ($resultsCount <= 1)
                            Result found
                        @else
                            Results found
                        @endif
                    </strong>
                </div>
                <form wire:submit='searchNewDocu' class="-mt-2">
                    <div
                        class="flex w-full items-center justify-between rounded-full bg-white px-2 py-1 drop-shadow-md backdrop-blur-md md:px-3 md:py-2">
                        <div class="flex w-full items-center">
                            <svg class="h-6 text-primary-color" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-width="4" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="m21 21-2.243-2.247-2.243-2.247"></path>
                                <path d="M19 10.5a8.5 8.5 0 1 1-17 0 8.5 8.5 0 0 1 17 0Z"></path>
                            </svg>
                            <input
                                class="mx-2 w-full p-2 font-medium text-primary-color focus:border-b focus:border-gray-500 focus:outline-none"
                                wire:model='search' type="search" placeholder="Search now..."
                                value="{{ $query }}" id="">
                        </div>
                        <div class="flex items-center gap-2">
                            <option value="">Filter</option>
                            <button type="submit"
                                class="rounded-full bg-blue-500 p-2 text-sm font-bold text-white drop-shadow-md duration-500 ease-in-out hover:bg-blue-800">Search</button>
                        </div>
                    </div>
                </form>
                <div class="flex w-full items-start justify-between">
                    <strong class="ml-1 hidden whitespace-nowrap text-primary-color lg:block">{{ $resultsCount }}
                        @if ($resultsCount <= 1)
                            Result found
                        @else
                            Results found
                        @endif
                    </strong>
                    <section class="flex w-full justify-between gap-2 lg:w-fit lg:justify-normal">
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


                @if (!$results->isEmpty())
                    <div class="relative flex w-full flex-col gap-5">
                        <div wire:loading wire:target='searchNewDocu, sort_by, items'
                            class="absolute z-30 h-full w-full bg-opacity-50 backdrop-blur">
                            <div class="container mt-20 w-fit rounded-xl bg-white p-14 drop-shadow-md">
                                <div class="flex h-full flex-col items-center justify-center gap-2">
                                    <div
                                        class="relative h-24 w-24 animate-spin rounded-full bg-gradient-to-r from-yellow-500 to-blue-800">
                                        <div
                                            class="absolute left-1/2 top-1/2 h-20 w-20 -translate-x-1/2 -translate-y-1/2 transform rounded-full border-2 border-white bg-gray-200">
                                        </div>
                                    </div>
                                    <strong class="text-primary-color md:text-lg lg:text-xl">Searching...</strong>
                                </div>
                            </div>
                        </div>
                        @foreach ($results as $resultsItem)
                            <div
                                class="w-full rounded-2xl border border-gray-200 bg-white px-5 py-2 text-gray-600 drop-shadow-md duration-500">
                                <div class="flex w-full flex-col gap-1 border-b border-gray-400 py-2">
                                    <div class="flex w-full items-start justify-between">
                                        <div class="flex w-full items-start">
                                            <a wire:click='viewsCount({{ $resultsItem->id }})'
                                                href="{{ route('view-document', ['reference' => $resultsItem->reference]) }}"
                                                class="text-md font-bold text-primary-color md:text-lg lg:text-xl"
                                                target="">
                                                {{ $resultsItem->title }}
                                            </a>
                                        </div>
                                        <div class="flex items-start justify-center text-end">
                                            @php
                                                $checkBookmark = \App\Models\BookmarkList::where('user_id', auth()->id())
                                                    ->where('docu_post_id', $resultsItem->id)
                                                    ->count();
                                            @endphp
                                            <svg wire:click="bookmark({{ $resultsItem->id }}, '{{ $resultsItem->reference }}')"
                                                class="{{ $checkBookmark > 0 ? 'bg-gray-800 text-gray-50' : 'bg-gray-200' }} h-7 cursor-pointer rounded-md p-1"
                                                fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.8 4.8a2.4 2.4 0 0 1 2.4-2.4h9.6a2.4 2.4 0 0 1 2.4 2.4V21a.601.601 0 0 1-.933.5L12 18.122 5.732 21.5A.6.6 0 0 1 4.8 21V4.8Zm2.4-1.2A1.2 1.2 0 0 0 6 4.8v15.08l5.668-2.979a.599.599 0 0 1 .664 0L18 19.88V4.8a1.2 1.2 0 0 0-1.2-1.2H7.2Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="text-xs font-light capitalize lg:text-sm">
                                        {{-- @php
                                            $userData = \App\Models\User::find($resultsItem->user_id);
                                        @endphp --}}

                                        @if ($resultsItem->author_1 != null)
                                            {{ $resultsItem->author_1 }}
                                        @endif
                                        @if ($resultsItem->author_2 != null)
                                            {{ ', ' . $resultsItem->author_2 }}
                                        @endif
                                        @if ($resultsItem->author_3 != null)
                                            {{ ', ' . $resultsItem->author_3 }}
                                        @endif
                                        @if ($resultsItem->author_4 != null)
                                            {{ ', ' . $resultsItem->author_4 }}
                                        @endif
                                        @if ($resultsItem->author_5 != null)
                                            {{ ', ' . $resultsItem->author_5 }}
                                        @endif
                                        @if ($resultsItem->author_6 != null)
                                            {{ ', ' . $resultsItem->author_6 }}
                                        @endif
                                        @if ($resultsItem->author_7 != null)
                                            {{ ', ' . $resultsItem->author_7 }}
                                        @endif

                                    </div>
                                </div>
                                <div class="border-b border-gray-400 py-2 md:py-6">
                                    <a href="{{ route('search-result-page', ['q' => $resultsItem->course]) }}"
                                        target="_blank" class="text-xs font-semibold text-blue-600 lg:text-base">
                                        <p class="leading-3">{{ $resultsItem->course }}</p>
                                    </a>
                                    <div
                                        class="mt-1 line-clamp-6 overflow-hidden rounded-lg bg-slate-100 p-1 font-medium md:mt-2 md:line-clamp-4 lg:line-clamp-5">
                                        <p class="text-sm lg:text-base lg:leading-relaxed">
                                            {{ $resultsItem->abstract_or_summary }}
                                        </p>
                                    </div>
                                </div>

                                <p class="my-2 text-xs text-gray-600 lg:text-sm">
                                    <a class="mr-1 bg-gray-50 px-1 hover:text-blue-600"
                                        href="{{ route('search-result-page', ['q' => $resultsItem->keyword_1]) }}"
                                        target="_blank" rel="noopener noreferrer">#{{ $resultsItem->keyword_1 }}</a>
                                    <a class="mr-1 bg-gray-50 px-1 hover:text-blue-600"
                                        href="{{ route('search-result-page', ['q' => $resultsItem->keyword_2]) }}"
                                        target="_blank" rel="noopener noreferrer">#{{ $resultsItem->keyword_2 }}</a>
                                    <a class="mr-1 bg-gray-50 px-1 hover:text-blue-600"
                                        href="{{ route('search-result-page', ['q' => $resultsItem->keyword_3]) }}"
                                        target="_blank" rel="noopener noreferrer">#{{ $resultsItem->keyword_3 }}</a>
                                    <a class="mr-1 bg-gray-50 px-1 hover:text-blue-600"
                                        href="{{ route('search-result-page', ['q' => $resultsItem->keyword_4]) }}"
                                        target="_blank" rel="noopener noreferrer">#{{ $resultsItem->keyword_4 }}</a>
                                    @if ($resultsItem->keyword_5 != null)
                                        <a class="mr-1 bg-gray-50 px-1 hover:text-blue-600"
                                            href="{{ route('search-result-page', ['q' => $resultsItem->keyword_5]) }}"
                                            target="_blank"
                                            rel="noopener noreferrer">#{{ $resultsItem->keyword_5 }}</a>
                                    @endif
                                <div class="flex w-full items-center justify-between pb-2 lg:items-end">
                                    <div class="flex items-center gap-2">
                                        <svg class="-mr-1 h-8 text-primary-color" fill="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.027 14.91c.168-.099.352-.195.551-.286-.168.25-.348.493-.54.727-.336.404-.597.62-.762.687a.312.312 0 0 1-.042.014.338.338 0 0 1-.031-.053c-.067-.132-.065-.26.048-.432.127-.198.383-.425.776-.658Zm2.946-1.977c-.142.03-.284.06-.427.094a25.2 25.2 0 0 0 .6-1.26c.19.351.394.695.612 1.03-.26.038-.523.083-.785.136Zm3.03 1.127a4.662 4.662 0 0 1-.522-.492c.274.006.521.026.735.065.38.068.559.176.621.25.02.021.031.049.032.077a.524.524 0 0 1-.072.24.368.368 0 0 1-.113.15.128.128 0 0 1-.083.017c-.108-.003-.31-.08-.598-.307Zm-2.67-5.695c-.048.293-.13.629-.24.995a5.82 5.82 0 0 1-.106-.416c-.092-.423-.105-.756-.056-.986.046-.212.132-.298.236-.34a.621.621 0 0 1 .174-.048.71.71 0 0 1 .038.238c.006.146-.008.332-.046.558v-.001Z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M7.2 2.4h9.6a2.4 2.4 0 0 1 2.4 2.4v14.4a2.4 2.4 0 0 1-2.4 2.4H7.2a2.4 2.4 0 0 1-2.4-2.4V4.8a2.4 2.4 0 0 1 2.4-2.4Zm.198 14.002c.108.216.276.412.525.503a.95.95 0 0 0 .696-.036c.382-.156.762-.523 1.112-.944.4-.48.82-1.112 1.225-1.812a13.979 13.979 0 0 1 2.396-.487c.36.46.732.856 1.092 1.14.336.264.724.484 1.121.5.216.011.43-.046.612-.165a1.24 1.24 0 0 0 .425-.499c.108-.217.174-.444.165-.676a1.013 1.013 0 0 0-.24-.621c-.27-.324-.715-.48-1.152-.558a6.91 6.91 0 0 0-1.602-.06 13.146 13.146 0 0 1-1.176-2.023c.3-.792.525-1.541.624-2.153a3.72 3.72 0 0 0 .058-.737 1.487 1.487 0 0 0-.152-.646.841.841 0 0 0-.573-.438c-.242-.051-.492 0-.72.093-.453.18-.692.564-.782.987-.088.408-.048.884.055 1.364.106.487.286 1.017.516 1.554a23.64 23.64 0 0 1-1.274 2.672 9.189 9.189 0 0 0-1.779.774c-.444.264-.839.576-1.076.944-.252.392-.33.857-.096 1.324Z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <a href="{{ route('search-result-page', ['q' => $resultsItem->document_type]) }}"
                                            target="_blank"
                                            class="rounded-lg border border-red-600 bg-red-100 px-2 py-1 text-xs text-red-600 md:text-sm">
                                            {{ $resultsItem->document_type }}
                                        </a>
                                        <div
                                            class="flex items-center gap-1 rounded-md bg-sky-500 p-1 font-semibold text-white">
                                            <svg class="h-5" fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2 4.917a2.5 2.5 0 0 1 2.5-2.5h15a2.5 2.5 0 0 1 2.5 2.5v10a2.5 2.5 0 0 1-2.5 2.5h-3.125a1.25 1.25 0 0 0-1 .5L13 21.083a1.25 1.25 0 0 1-2 0l-2.375-3.166a1.25 1.25 0 0 0-1-.5H4.5a2.5 2.5 0 0 1-2.5-2.5v-10Zm8.992 3.457a2.113 2.113 0 0 0-.283-.34 1.835 1.835 0 0 0-.586-.405l-.01-.005a2.231 2.231 0 0 0-.945-.207C7.97 7.417 7 8.349 7 9.501c0 1.15.97 2.082 2.168 2.082a2.22 2.22 0 0 0 1.163-.325c-.171.487-.487 1.005-1.012 1.525a.507.507 0 0 0 .013.738.56.56 0 0 0 .768-.013c1.668-1.661 1.713-3.447 1.176-4.632a3.077 3.077 0 0 0-.284-.5v-.002Zm4.758 2.884c-.17.487-.488 1.005-1.012 1.525a.507.507 0 0 0 .014.738.56.56 0 0 0 .767-.013c1.667-1.661 1.712-3.447 1.177-4.632a3.08 3.08 0 0 0-.285-.5 2.114 2.114 0 0 0-.284-.342 1.832 1.832 0 0 0-.586-.405l-.01-.005a2.23 2.23 0 0 0-.944-.207c-1.196 0-2.167.932-2.167 2.084 0 1.15.971 2.082 2.168 2.082a2.22 2.22 0 0 0 1.163-.325h-.001Z">
                                                </path>
                                            </svg>
                                            <small>{{ $resultsItem->citation_count }}</small>
                                        </div>
                                        <div wire:click="share('{{ $resultsItem->reference }}')"
                                            class="flex cursor-pointer items-center gap-1 rounded-md bg-primary-color p-1 font-semibold text-white">
                                            <svg class="h-5" fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M20.028 14.094a.406.406 0 0 0-.137.285 44.4 44.4 0 0 1-.25 3.032c-.154 1.318-1.22 2.367-2.55 2.516a46.217 46.217 0 0 1-10.183 0 2.892 2.892 0 0 1-2.55-2.516 44.421 44.421 0 0 1 0-10.32 2.893 2.893 0 0 1 2.55-2.517 46.21 46.21 0 0 1 6.725-.252c.163.005.3-.118.312-.28l.05-.703c.002-.041.006-.082.011-.123.025-.194-.11-.386-.306-.393a47.672 47.672 0 0 0-6.958.26c-2.012.226-3.637 1.81-3.873 3.833a45.922 45.922 0 0 0 0 10.67c.236 2.022 1.86 3.607 3.873 3.832a47.77 47.77 0 0 0 10.516 0c2.012-.225 3.637-1.81 3.873-3.833a45.91 45.91 0 0 0 .3-4.347c.004-.183-.22-.273-.347-.144-.34.346-.692.679-1.056 1Z">
                                                </path>
                                                <path
                                                    d="M7.867 15.55a.5.5 0 0 1-.367-.494l.06-2.463a6.5 6.5 0 0 1 6.497-6.344h1.258a61.47 61.47 0 0 1 .107-1.87l.068-.93a.752.752 0 0 1 1.155-.58 19.381 19.381 0 0 1 5.305 5.025l.456.635a.5.5 0 0 1 0 .583l-.456.635a19.382 19.382 0 0 1-5.305 5.024.754.754 0 0 1-1.083-.303.769.769 0 0 1-.072-.275l-.068-.931a61.112 61.112 0 0 1-.121-2.23l-.354-.054a5.5 5.5 0 0 0-5.61 2.736l-.902 1.6a.5.5 0 0 1-.568.236Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center gap-1 text-xs font-bold text-gray-600 lg:text-[0.9rem]">
                                        <svg class="h-4" fill="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.375 2A.625.625 0 0 1 7 2.625v.625h10v-.625a.625.625 0 1 1 1.25 0v.625h1.25a2.5 2.5 0 0 1 2.5 2.5V19.5a2.5 2.5 0 0 1-2.5 2.5h-15A2.5 2.5 0 0 1 2 19.5V5.75a2.5 2.5 0 0 1 2.5-2.5h1.25v-.625A.625.625 0 0 1 6.375 2Zm12.442 3.75H5.181c-.375 0-.681.28-.681.625v1.25c0 .345.305.625.681.625H18.82c.375 0 .681-.28.681-.625v-1.25c0-.345-.305-.625-.683-.625Zm-3.25 7.318a.626.626 0 1 0-.885-.886l-3.307 3.31-1.432-1.435a.627.627 0 0 0-.886.886l1.875 1.874a.625.625 0 0 0 .886 0l3.75-3.75Z">
                                            </path>
                                        </svg>
                                        {{ \Carbon\Carbon::parse($resultsItem->date_of_approval)->format('M Y') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="sticky bottom-2 right-0 mt-2 flex w-full items-center justify-center">
                        @if ($results->hasPages())
                            <div class="rounded-lg border border-gray-300 bg-opacity-50 px-4 py-2 backdrop-blur-lg">
                                {{ $results->links() }}
                            </div>
                        @endif

                    </div>
                @else
                    <div
                        class="flex w-full flex-col items-center justify-center gap-4 rounded-xl bg-white p-10 drop-shadow">
                        <svg class="h-36 lg:h-44" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                            viewBox="0 0 647.63626 632.17383" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path
                                d="M687.3279,276.08691H512.81813a15.01828,15.01828,0,0,0-15,15v387.85l-2,.61005-42.81006,13.11a8.00676,8.00676,0,0,1-9.98974-5.31L315.678,271.39691a8.00313,8.00313,0,0,1,5.31006-9.99l65.97022-20.2,191.25-58.54,65.96972-20.2a7.98927,7.98927,0,0,1,9.99024,5.3l32.5498,106.32Z"
                                transform="translate(-276.18187 -133.91309)" fill="#f2f2f2" />
                            <path
                                d="M725.408,274.08691l-39.23-128.14a16.99368,16.99368,0,0,0-21.23-11.28l-92.75,28.39L380.95827,221.60693l-92.75,28.4a17.0152,17.0152,0,0,0-11.28028,21.23l134.08008,437.93a17.02661,17.02661,0,0,0,16.26026,12.03,16.78926,16.78926,0,0,0,4.96972-.75l63.58008-19.46,2-.62v-2.09l-2,.61-64.16992,19.65a15.01489,15.01489,0,0,1-18.73-9.95l-134.06983-437.94a14.97935,14.97935,0,0,1,9.94971-18.73l92.75-28.4,191.24024-58.54,92.75-28.4a15.15551,15.15551,0,0,1,4.40966-.66,15.01461,15.01461,0,0,1,14.32032,10.61l39.0498,127.56.62012,2h2.08008Z"
                                transform="translate(-276.18187 -133.91309)" fill="#3f3d56" />
                            <path
                                d="M398.86279,261.73389a9.0157,9.0157,0,0,1-8.61133-6.3667l-12.88037-42.07178a8.99884,8.99884,0,0,1,5.9712-11.24023l175.939-53.86377a9.00867,9.00867,0,0,1,11.24072,5.9707l12.88037,42.07227a9.01029,9.01029,0,0,1-5.9707,11.24072L401.49219,261.33887A8.976,8.976,0,0,1,398.86279,261.73389Z"
                                transform="translate(-276.18187 -133.91309)" fill="#3535d0" />
                            <circle cx="190.15351" cy="24.95465" r="20" fill="#3535d0" />
                            <circle cx="190.15351" cy="24.95465" r="12.66462" fill="#fff" />
                            <path
                                d="M878.81836,716.08691h-338a8.50981,8.50981,0,0,1-8.5-8.5v-405a8.50951,8.50951,0,0,1,8.5-8.5h338a8.50982,8.50982,0,0,1,8.5,8.5v405A8.51013,8.51013,0,0,1,878.81836,716.08691Z"
                                transform="translate(-276.18187 -133.91309)" fill="#e6e6e6" />
                            <path
                                d="M723.31813,274.08691h-210.5a17.02411,17.02411,0,0,0-17,17v407.8l2-.61v-407.19a15.01828,15.01828,0,0,1,15-15H723.93825Zm183.5,0h-394a17.02411,17.02411,0,0,0-17,17v458a17.0241,17.0241,0,0,0,17,17h394a17.0241,17.0241,0,0,0,17-17v-458A17.02411,17.02411,0,0,0,906.81813,274.08691Zm15,475a15.01828,15.01828,0,0,1-15,15h-394a15.01828,15.01828,0,0,1-15-15v-458a15.01828,15.01828,0,0,1,15-15h394a15.01828,15.01828,0,0,1,15,15Z"
                                transform="translate(-276.18187 -133.91309)" fill="#3f3d56" />
                            <path
                                d="M801.81836,318.08691h-184a9.01015,9.01015,0,0,1-9-9v-44a9.01016,9.01016,0,0,1,9-9h184a9.01016,9.01016,0,0,1,9,9v44A9.01015,9.01015,0,0,1,801.81836,318.08691Z"
                                transform="translate(-276.18187 -133.91309)" fill="#3535d0" />
                            <circle cx="433.63626" cy="105.17383" r="20" fill="#3535d0" />
                            <circle cx="433.63626" cy="105.17383" r="12.18187" fill="#fff" />
                        </svg>
                        <strong class="text-lg font-extrabold uppercase text-primary-color lg:text-2xl">No found, try
                            again.</strong>
                    </div>
                @endif
            </section>
            <div class="mb-4 h-[20rem] w-full lg:sticky lg:right-0 lg:top-[5rem] lg:w-1/2">
                <div class="flex w-full flex-col gap-2 rounded-lg bg-white p-3 drop-shadow">
                    <div class="flex w-full items-center justify-center gap-2">
                        <div class="w-fit rounded-lg border border-green-800 bg-green-100 p-1 text-green-800">
                            <svg class="h-3" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.5 6.75h5.25V12"></path>
                                <path
                                    d="m2.25 17.25 5.69-5.69a1.5 1.5 0 0 1 2.12 0l2.38 2.38a1.5 1.5 0 0 0 2.12 0L21 7.5">
                                </path>
                            </svg>
                        </div>
                        <strong class="text-green-800">Trending post</strong>
                    </div>
                    @if ($count < 3)
                        <section>
                            <div class="mt-2 flex flex-col items-center justify-center gap-1">
                                <img class="h-52" src="{{ asset('assets/svgs/undraw_empty_re_opql.svg') }}"
                                    alt="svg file" srcset="">
                                <p class="text-center text-xl font-bold text-primary-color">Currently, there are no
                                    trending posts.</p>
                            </div>
                        </section>
                    @else
                        <section class="flex flex-col gap-2 lg:gap-3">

                            @foreach ($trendingPosts as $index => $item)
                                @php
                                    $getData = \App\Models\DocuPost::where('id', $item->post_id)->first();
                                @endphp
                                <div
                                    class="@if ($index == 0) bg-yellow-400 @elseif($index == 1) bg-[#075DEF] @else  bg-sky-100 text-[#075DEF] @endif flex w-full gap-1 rounded-md px-3 py-2 font-medium text-white">
                                    <small
                                        class="@if ($index == 0) bg-yellow-500 @elseif($index == 1) bg-[#4e88eb] @else  bg-sky-400  text-white @endif flex h-[1rem] w-[1rem] items-center justify-center rounded-full text-[0.65rem] font-medium text-white">
                                        {{ $index + 1 }}
                                    </small>
                                    <p class="line-clamp-1 text-xs">{{ $getData->title }}</p>
                                </div>
                            @endforeach

                        </section>
                    @endif
                </div>
                <div class="my-4 mb-4 flex w-full flex-col gap-2 rounded-lg bg-white p-3 drop-shadow lg:mt-8">
                    <strong class="text-primary-color">Document Types</strong>
                    <div class="flex flex-col gap-2 lg:gap-3">
                        @foreach ($documentTypeCounts as $type => $count)
                            <div class="flex w-full justify-between rounded bg-sky-100 px-3 py-2 font-semibold">
                                <div class="flex gap-1">
                                    <span
                                        class="flex w-fit items-center justify-center rounded-md bg-sky-500 px-2 text-sm text-white">S</span>
                                    <p class="line-clamp-1 text-sky-800">{{ $type }}</p>
                                </div>
                                <span
                                    class="w-10 rounded-md bg-sky-500 px-2 text-center text-white">{{ $count }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
