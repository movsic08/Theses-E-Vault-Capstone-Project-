<div class="container">
    {{-- <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('formSubmitted', function() {
                location.reload(); // Refresh the entire page
            });
        });
    </script> --}}
    <x-session_flash />
    @section('title', 'Search ' . $query)
    <form wire:submit='searchNewDocu'>
        <div class="flex w-full items-center justify-between rounded-lg bg-white px-3 py-2 backdrop-blur-md">
            <div class="flex w-full items-center">
                <svg class="h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="m21 21-2.243-2.247-2.243-2.247"></path>
                    <path d="M19 10.5a8.5 8.5 0 1 1-17 0 8.5 8.5 0 0 1 17 0Z"></path>
                </svg>
                <input class="mx-2 w-full p-2 focus:border-b focus:border-gray-500 focus:outline-none"
                    wire:model='query' type="search" name="" value="{{ $query }}" id="">
            </div>
            <div class="flex items-center gap-2">
                <option value="">Filter</option>
                <button type="submit" class="rounded-lg bg-blue-500 p-2 text-white">Search</button>
            </div>
        </div>
    </form>
    <div class="mt-4">
        <strong class="my-2">{{ $resultsCount }}
            @if ($resultsCount <= 1)
                Result
            @else
                Results
        </strong>
        @endif
        <div class="flex flex-col gap-3 lg:flex-row">
            <div wire:loading wire:target='searchNewDocu' class="w-full bg-white p-20">
                <h2>LOADING>>></h2>
            </div>
            {{-- data result box  --}}
            <section class="w-full" wire:loading.remove>
                @if (!$results->isEmpty())
                    <div class="flex w-full flex-col gap-3">
                        @foreach ($results as $resultsItem)
                            <div
                                class="w-full rounded-lg border border-gray-200 bg-white p-2 text-gray-600 drop-shadow">
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
                                        {{-- {{ $userData->first_name }} {{ $userData->last_name }} --}}
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
                @else
                    {{-- no result box --}}
                    <div class="w-full bg-white">
                        <h2>No result</h2>
                    </div>
                @endif
            </section>
            <div class="h-fit w-1/2 rounded-lg bg-white p-2">
                <h2>UI am side</h2>
            </div>
        </div>
    </div>
</div>
