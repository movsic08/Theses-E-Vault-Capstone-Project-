<div class="container">
    @section('title', 'Search ' . $query)
    <x-session_flash />

    <div class="mx-3 mt-4">
        <div class="relative mb-8 flex flex-col gap-4 lg:flex-row lg:gap-8">
            <section class="flex w-full flex-col gap-4">
                <div class="flex w-full items-center justify-between text-primary-color">
                    <div><strong>Search:</strong> <span>{{ $query }}</span></div>
                    <strong class="my-2">{{ $resultsCount }}
                        @if ($resultsCount <= 1)
                            Result
                        @else
                            Results
                        @endif
                    </strong>
                </div>
                <form wire:submit='searchNewDocu' class="-mt-2">
                    <div
                        class="flex w-full items-center justify-between rounded-lg bg-white px-3 py-2 drop-shadow-md backdrop-blur-md">
                        <div class="flex w-full items-center">
                            <svg class="h-6 text-primary-color" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-width="4" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="m21 21-2.243-2.247-2.243-2.247"></path>
                                <path d="M19 10.5a8.5 8.5 0 1 1-17 0 8.5 8.5 0 0 1 17 0Z"></path>
                            </svg>
                            <input class="mx-2 w-full p-2 focus:border-b focus:border-gray-500 focus:outline-none"
                                wire:model='search' type="search" placeholder="Search now..."
                                value="{{ $oldSearch }}" id="">
                        </div>
                        <div class="flex items-center gap-2">
                            <option value="">Filter</option>
                            <button type="submit" class="rounded-lg bg-blue-500 p-2 text-white">Search</button>
                        </div>
                    </div>
                </form>
                @if (!$results->isEmpty())
                    <div class="relative flex w-full flex-col gap-4">
                        <div wire:loading wire:target='searchNewDocu'
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
                                class="w-full rounded-lg border border-gray-200 bg-white p-2 text-gray-600 drop-shadow-md">
                                <div class="flex w-full items-center justify-between">
                                    <div class="flex">
                                        <svg class="ml-2 mr-3 h-14 min-h-[3.5rem] w-14 min-w-[3.5rem]"
                                            viewBox="0 0 47 61" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.83333 0H28.5656C29.604 0.000889848 30.5995 0.403146 31.3333 1.11833L45.8511 15.25C46.2153 15.6041 46.5042 16.0245 46.7014 16.4874C46.8985 16.9502 47 17.4463 47 17.9473V53.375C47 55.3973 46.1747 57.3367 44.7057 58.7667C43.2366 60.1967 41.2442 61 39.1667 61H7.83333C5.7558 61 3.76336 60.1967 2.29433 58.7667C0.825294 57.3367 0 55.3973 0 53.375V7.625C0 5.60272 0.825294 3.66328 2.29433 2.23331C3.76336 0.803345 5.7558 0 7.83333 0ZM29.375 5.71875V13.3437C29.375 14.3549 29.7876 15.3246 30.5222 16.0396C31.2567 16.7546 32.2529 17.1562 33.2917 17.1562H41.125L29.375 5.71875ZM8.47958 52.1105C8.83208 52.7968 9.38041 53.4195 10.1931 53.7086C10.9379 53.952 11.7498 53.9111 12.4648 53.5942C13.7116 53.0986 14.9519 51.9326 16.0942 50.5982C17.3998 49.0669 18.7706 47.0621 20.0925 44.8382C22.6479 44.1014 25.2647 43.5837 27.9128 43.2909C29.0878 44.7524 30.3019 46.0105 31.4769 46.9128C32.5736 47.7516 33.84 48.4505 35.1358 48.5014C35.8408 48.5363 36.5392 48.3552 37.1333 47.9771C37.7334 47.5794 38.2125 47.0318 38.5204 46.3918C38.8729 45.7023 39.0883 44.9811 39.059 44.2441C39.0337 43.5193 38.7576 42.8241 38.2756 42.2711C37.3944 41.2417 35.9419 40.7461 34.5156 40.4983C32.7862 40.2375 31.0315 40.1735 29.2869 40.3077C27.8137 38.2806 26.5292 36.1296 25.4485 33.8804C26.4277 31.3642 27.1621 28.9845 27.4852 27.0402C27.628 26.2677 27.6914 25.4833 27.6745 24.6986C27.6701 23.9869 27.5005 23.2853 27.1784 22.6462C26.9922 22.2938 26.7278 21.9861 26.4043 21.7454C26.0809 21.5047 25.7064 21.3371 25.3082 21.2547C24.5183 21.0927 23.7024 21.2547 22.9582 21.5502C21.4797 22.122 20.6996 23.342 20.4058 24.6859C20.1186 25.9822 20.2492 27.4913 20.5853 29.0195C20.9313 30.5667 21.5188 32.2506 22.2695 33.9567C21.067 36.8682 19.6782 39.7034 18.1113 42.4458C16.0921 43.0638 14.1458 43.8881 12.3049 44.9049C10.8557 45.7436 9.56646 46.7349 8.79292 47.9041C7.97042 49.1463 7.71583 50.6268 8.47958 52.1105Z"
                                                fill="#041A32" />
                                        </svg>
                                        <a href="{{ route('view-document', ['reference' => $resultsItem->reference]) }}"
                                            class="font-medium text-primary-color" target="">
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
                                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.8 4.8a2.4 2.4 0 0 1 2.4-2.4h9.6a2.4 2.4 0 0 1 2.4 2.4V21a.601.601 0 0 1-.933.5L12 18.122 5.732 21.5A.6.6 0 0 1 4.8 21V4.8Zm2.4-1.2A1.2 1.2 0 0 0 6 4.8v15.08l5.668-2.979a.599.599 0 0 1 .664 0L18 19.88V4.8a1.2 1.2 0 0 0-1.2-1.2H7.2Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4 flex w-full justify-between">
                                    <div class="flex">
                                        <p class="mr-2 text-red-600">
                                            {{ $resultsItem->document_type }}
                                        </p>
                                        <p class="text-blue-600">
                                            {{ $resultsItem->course }}
                                        </p>
                                    </div>
                                    <div class="mr-4">
                                        {{ \Carbon\Carbon::parse($resultsItem->date_of_approval)->format('M d Y') }}
                                    </div>
                                </div>
                                <div class="my-1 ml-4 line-clamp-4 font-light lg:line-clamp-3">
                                    {{ $resultsItem->abstract_or_summary }}
                                </div>
                                <div class="ml-4">
                                    #AVsebteinsm
                                </div>
                                <div class="ml-4 mt-1 flex w-fit items-center gap-2 rounded-full bg-gray-300 px-2">
                                    @php
                                        $userData = \App\Models\User::find($resultsItem->user_id);
                                    @endphp
                                    <img class="h-4 rounded-full object-cover"
                                        src="{{ asset('assets/default_profile.png') }}" alt="profile">
                                    <span class="text-sm">
                                        {{ $resultsItem->author_1 }}
                                    </span>
                                    <span class="ml-1 text-sm">
                                        {{ $resultsItem->author_2 }}
                                    </span>
                                    <span class="ml-1 text-sm">
                                        {{ $resultsItem->author_3 }}
                                    </span>
                                    <span class="ml-1 text-sm">
                                        {{ $resultsItem->author_4 }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="sticky bottom-2 right-0 mt-2 flex w-full items-center justify-center">
                        <div class="rounded-lg border border-gray-300 bg-opacity-50 px-4 py-2 backdrop-blur-lg">
                            {{ $results->links() }}
                        </div>
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
            <div class="sticky right-0 top-[5rem] max-h-big w-full rounded-lg bg-white p-2 drop-shadow lg:w-1/2">
                <h2>UI am side</h2>
            </div>
        </div>
    </div>
</div>
