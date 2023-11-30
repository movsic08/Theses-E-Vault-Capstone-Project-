<div>

    @include('components.admin.modals.deleting-reported-comment')
    @include('components.admin.modals.view-reported-comment')
    <x-session_flash />
    <section class="container">
        <div class="px-4">
            <h1 class="font-black text-primary-color">Reported comments panel</h1>
        </div>

        <div class="mb-8 mt-3 max-w-[85rem] rounded-2xl bg-white px-5 py-2 drop-shadow-md">
            <div class="relative flex w-full flex-col items-center justify-between px-4 py-2 md:flex-row">
                <div wire:loading
                    wire:target='search, commentStatus, paginate, selectedDate, category_report, showBox, addMarkReport, showDel '
                    class="absolute -left-[0.5rem] top-[1rem] inline-block h-4 w-4 animate-spin rounded-full border-4 border-solid border-primary-color border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                    role="status">
                    <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                </div>
                <section class="flex gap-2 lg:gap-4">
                    <div>
                        <label for="default-search"
                            class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white">Search</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input wire:model.live.debounce.300ms='search' type="search" id="default-search"
                                placeholder="Search comment"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        </div>
                    </div>
                    <div class="flex items-center">
                        <x-label-input for="status">Status</x-label-input>
                        <select id="status" wire:model.live='commentStatus'
                            class="ml-2 w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm capitalize text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                            <option value="all">All</option>
                            <option value="0">pending</option>
                            <option value="1">Resolved</option>
                        </select>
                    </div>
                </section>
                <div class="flex items-center">
                    <x-label-input for="Date">Date</x-label-input>
                    <x-input-field class="ml-2" wire:model.live='selectedDate' type="date" name=""
                        id="Date" />
                </div>
                <div class="flex items-center">
                    <x-label-input for="category_report">Category</x-label-input>
                    <select id="category_report" wire:model.live='category_report'
                        class="ml-2 w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm capitalize text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option selected value="all">All</option>
                        <option value="spam">Spam</option>
                        <option value="nudity">nudity</option>
                        <option value="violence">violence</option>
                        <option value="false_information">false information</option>
                        <option value="hate_speech">hate speech</option>
                        <option value="inappropriate">inappropriate</option>
                        <option value="other">other</option>
                    </select>
                </div>
                <div class="flex items-center">
                    <x-label-input for="countpage">Items</x-label-input>
                    <select id="countpage" wire:model.live='paginate'
                        class="ml-2 w-full rounded-lg border border-gray-300 bg-gray-50 bg-opacity-20 p-2 text-sm text-gray-900 backdrop-blur-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>
                </div>
            </div>
            <div class="custom-scrollbar overflow-x-auto">
                <div class="max-w-full lg:max-h-[32rem]">
                    <table class="min-w-full">
                        <thead class="sticky top-0 bg-white bg-opacity-50 backdrop-blur">
                            <tr>
                                <th class="px-6 py-2 text-left font-bold text-gray-700">
                                    Comment
                                </th>
                                <th class="px-4 py-2 text-left font-bold text-gray-700">
                                    Commentor name
                                </th>
                                <th class="px-4 py-2 text-left font-bold text-gray-700">
                                    Reported by
                                </th>
                                <th class="px-3 py-2 text-left font-bold text-gray-700">
                                    Category
                                </th>
                                <th class="p-2 text-left font-bold text-gray-700">
                                    Status
                                </th>
                                <th class="p-2 text-left font-bold text-gray-700">
                                    Created at
                                </th>
                                <th class="flex justify-center px-6 py-2 font-bold text-gray-700">
                                    <svg class="h-4 text-gray-700" viewBox="0 0 31 31" fill="currentColor">
                                        <path
                                            d="M18.0614 2.83145C17.3089 0.279368 13.6922 0.279368 12.9397 2.83145L12.7575 3.44978C12.6449 3.83181 12.4484 4.18381 12.1821 4.47998C11.9159 4.77615 11.5868 5.00899 11.2188 5.16142C10.8509 5.31384 10.4536 5.38199 10.0559 5.36087C9.6582 5.33976 9.27028 5.2299 8.92057 5.03937L8.35474 4.7302C6.01557 3.45708 3.45912 6.01499 4.73224 8.3527L5.04141 8.91854C5.23221 9.2683 5.34229 9.65635 5.36355 10.0542C5.38481 10.4521 5.31672 10.8496 5.16428 11.2177C5.01183 11.5858 4.7789 11.9151 4.48257 12.1815C4.18625 12.4478 3.83405 12.6444 3.45182 12.7569L2.83203 12.9392C0.279948 13.6917 0.279948 17.3083 2.83203 18.0608L3.45036 18.2431C3.83239 18.3556 4.18439 18.5522 4.48056 18.8184C4.77673 19.0847 5.00957 19.4138 5.16199 19.7817C5.31442 20.1496 5.38257 20.547 5.36145 20.9447C5.34034 21.3424 5.23048 21.7303 5.03995 22.08L4.73078 22.6458C3.45766 24.985 6.01557 27.5429 8.35328 26.2683L8.91912 25.9592C9.26888 25.7684 9.65693 25.6583 10.0548 25.637C10.4526 25.6158 10.8502 25.6838 11.2183 25.8363C11.5864 25.9887 11.9157 26.2217 12.1821 26.518C12.4484 26.8143 12.645 27.1665 12.7575 27.5487L12.9397 28.1685C13.6922 30.7206 17.3089 30.7206 18.0614 28.1685L18.2437 27.5487C18.356 27.1666 18.5524 26.8144 18.8186 26.518C19.0848 26.2217 19.414 25.9888 19.782 25.8363C20.15 25.6839 20.5474 25.6158 20.9452 25.637C21.343 25.6583 21.7309 25.7684 22.0806 25.9592L22.6464 26.2698C24.9856 27.5415 27.5435 24.985 26.2689 22.6473L25.9597 22.08C25.7695 21.7303 25.6598 21.3426 25.6389 20.9451C25.6179 20.5475 25.6861 20.1504 25.8385 19.7826C25.9909 19.4149 26.2237 19.0859 26.5197 18.8198C26.8157 18.5537 27.1675 18.3571 27.5493 18.2446L28.1691 18.0608C30.7212 17.3083 30.7212 13.6917 28.1691 12.9392L27.5493 12.7569C27.1673 12.6444 26.8153 12.4478 26.5191 12.1816C26.223 11.9153 25.9901 11.5862 25.8377 11.2183C25.6853 10.8504 25.6171 10.453 25.6382 10.0553C25.6594 9.65762 25.7692 9.2697 25.9597 8.91999L26.2704 8.35416C27.542 6.01499 24.9856 3.45854 22.6479 4.73166L22.0806 5.04083C21.7309 5.23109 21.3431 5.34072 20.9456 5.3617C20.5481 5.38267 20.151 5.31446 19.7832 5.16205C19.4155 5.00965 19.0865 4.77691 18.8204 4.48089C18.5543 4.18487 18.3577 3.83306 18.2452 3.45124L18.0614 2.83145ZM15.5006 20.8404C14.7815 20.8695 14.0639 20.753 13.3909 20.4979C12.7179 20.2428 12.1035 19.8544 11.5844 19.3559C11.0653 18.8573 10.6522 18.2591 10.3701 17.597C10.088 16.9349 9.94255 16.2226 9.94255 15.5029C9.94255 14.7832 10.088 14.0709 10.3701 13.4088C10.6522 12.7467 11.0653 12.1485 11.5844 11.65C12.1035 11.1515 12.7179 10.763 13.3909 10.5079C14.0639 10.2528 14.7815 10.1363 15.5006 10.1654C16.8698 10.2333 18.1605 10.8251 19.1056 11.8182C20.0507 12.8113 20.5777 14.1298 20.5777 15.5007C20.5777 16.8717 20.0507 18.1901 19.1056 19.1832C18.1605 20.1763 16.8698 20.7681 15.5006 20.836V20.8404Z" />
                                    </svg>
                                </th>
                            </tr>
                        </thead>
                        <div class="overflow-y-auto overflow-x-hidden">
                            <tbody class="w-full text-gray-500">
                                @foreach ($reportCommentList as $item)
                                    <tr class="h-[4rem] min-h-[4rem] border-b border-slate-100">
                                        <td class="whitespace-normal px-6 py-2">
                                            @php
                                                $commentData = \App\Models\DocuPostComment::where('id', $item->reported_comment_id)->first();
                                                if ($commentData) {
                                                    $comment = $commentData->comment_content;
                                                } else {
                                                    $comment = 'Not found';
                                                }

                                            @endphp
                                            <p>{{ $comment }}</p>
                                        </td>
                                        <td class="whitespace-normal px-4 py-2">
                                            <div class="flex items-center gap-2 whitespace-nowrap">
                                                @php
                                                    $userReported = \App\Models\User::where('id', $item->reported_user_id)->first();
                                                    // dump($userReported);
                                                    if ($userReported) {
                                                        if ($userReported->profile_picture == null) {
                                                            $imgLinkReported = null;
                                                        } else {
                                                            $imgLinkReported = $userReported->profile_picture;
                                                        }
                                                        if ($userReported->first_name == null && $userReported->last_name == null) {
                                                            $fullNameReported = 'Deleted user';
                                                        } else {
                                                            $fullNameReported = $userReported->first_name . ' ' . $userReported->last_name;
                                                        }
                                                    } else {
                                                        $imgLinkReported = null;
                                                        $fullNameReported = 'Deleted user';
                                                    }
                                                @endphp
                                                <img class="h-5 w-5 rounded-full object-cover"
                                                    src="{{ $imgLinkReported == null ? asset('assets/default_profile.png') : asset('storage/' . $imgLinkReported) }}"
                                                    alt="profile" srcset="">
                                                <span class="text-sm md:text-base">{{ $fullNameReported }}</span>
                                            </div>
                                        </td>
                                        <td class="whitespace-normal px-4 py-2">
                                            <div class="flex items-center gap-2 whitespace-nowrap">
                                                @php
                                                    $userReporter = \App\Models\User::where('id', $item->reporter_user_id)->first();
                                                    if ($userReporter) {
                                                        if ($userReporter->profile_picture == null) {
                                                            $imgLinkReporter = null;
                                                        } else {
                                                            $imgLinkReporter = $userReporter->profile_picture;
                                                        }
                                                        if ($userReporter->first_name == null && $userReporter->last_name == null) {
                                                            $fullNameReporter = '<strong class="text-red-700">Deleted user</strong';
                                                        } else {
                                                            $fullNameReporter = $userReporter->first_name . ' ' . $userReporter->last_name;
                                                        }
                                                    } else {
                                                    }
                                                @endphp
                                                <img class="h-5 w-5 rounded-full object-cover"
                                                    src="{{ $imgLinkReporter == null ? asset('assets/default_profile.png') : asset('storage/' . $imgLinkReporter) }}"
                                                    alt="profile" srcset="">
                                                <span class="text-sm md:text-base">{{ $fullNameReporter }}</span>
                                            </div>
                                        </td>
                                        <td
                                            class="whitespace-normal px-4 py-2 font-medium capitalize text-primary-color">
                                            <p>{{ str_replace('_', ' ', $item->report_title) }}</p>
                                        </td>
                                        <td class="whitespace-normal p-2 capitalize">
                                            <p
                                                class="{{ $item->report_status == 0 ? 'text-orange-700 bg-orange-100' : 'text-green-700 bg-green-100' }} w-24 rounded-md px-2 py-1 text-center font-semibold">
                                                {{ $item->report_status == 0 ? 'Pending' : 'Resolved' }}</p>
                                        </td>
                                        <td class="whitespace-normal p-2 font-medium capitalize text-primary-color">
                                            <p> {{ \Carbon\Carbon::parse($item->created_at)->format('M d Y') }}</p>
                                        </td>
                                        <td class="whitespace-normal p-2 font-medium capitalize text-primary-color">
                                            <div class="flex items-center justify-center gap-1">
                                                @if ($commentData != null)
                                                    <span wire:click='showBox({{ $item->id }})'
                                                        class="cursor-pointer rounded-md bg-sky-600 p-1 duration-500 ease-in-out hover:bg-sky-800">
                                                        <svg class="min-h-[1.1rem] min-w-[1.1rem] text-white"
                                                            fill="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 14.4a2.4 2.4 0 1 0 0-4.8 2.4 2.4 0 0 0 0 4.8Z">
                                                            </path>
                                                            <path fill-rule="evenodd"
                                                                d="M.55 12C2.078 7.132 6.626 3.6 12 3.6s9.922 3.532 11.45 8.4c-1.528 4.868-6.076 8.4-11.45 8.4S2.078 16.868.55 12Zm16.25 0a4.8 4.8 0 1 1-9.6 0 4.8 4.8 0 0 1 9.6 0Z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </span>
                                                    <span wire:click='addMarkReport({{ $item->id }})'
                                                        class="hover: cursor-pointer rounded-md bg-yellow-600 p-1 duration-500 ease-in-out hover:bg-yellow-800">
                                                        <svg class="min-h-[1.1rem] min-w-[1.1rem] text-white"
                                                            fill="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M8.25 5A2.75 2.75 0 0 1 11 2.25h2A2.75 2.75 0 0 1 15.75 5v2a.75.75 0 0 1-.75.75H9A.75.75 0 0 1 8.25 7V5ZM11 3.75c-.69 0-1.25.56-1.25 1.25v1.25h4.5V5c0-.69-.56-1.25-1.25-1.25h-2Z"
                                                                clip-rule="evenodd"></path>
                                                            <path fill-rule="evenodd"
                                                                d="M6.487 4.929c.126-.06.267.036.266.176L6.75 7A2.25 2.25 0 0 0 9 9.25h6A2.25 2.25 0 0 0 17.25 7V5.104c0-.14.14-.236.267-.175A3.498 3.498 0 0 1 19.5 8.085v10.49a3.39 3.39 0 0 1-2.972 3.365 36.639 36.639 0 0 1-9.056 0A3.391 3.391 0 0 1 4.5 18.575V8.085a3.5 3.5 0 0 1 1.987-3.156ZM15 12a.75.75 0 0 1 0 1.5H9A.75.75 0 0 1 9 12h6Zm-1 3a.75.75 0 0 1 0 1.5H9A.75.75 0 0 1 9 15h5Z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </span>
                                                @endif

                                                <span wire:click='showDel({{ $item->id }})'
                                                    class="hover: cursor-pointer rounded-md bg-red-600 p-1 duration-500 ease-in-out hover:bg-red-800">
                                                    <svg class="min-h-[1.1rem] min-w-[1.1rem] text-white"
                                                        fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M10.8 2.4a1.2 1.2 0 0 0-1.073.664L8.858 4.8H4.8a1.2 1.2 0 0 0 0 2.4v12a2.4 2.4 0 0 0 2.4 2.4h9.6a2.4 2.4 0 0 0 2.4-2.4v-12a1.2 1.2 0 1 0 0-2.4h-4.058l-.87-1.736A1.2 1.2 0 0 0 13.2 2.4h-2.4ZM8.4 9.6a1.2 1.2 0 0 1 2.4 0v7.2a1.2 1.2 0 1 1-2.4 0V9.6Zm6-1.2a1.2 1.2 0 0 0-1.2 1.2v7.2a1.2 1.2 0 1 0 2.4 0V9.6a1.2 1.2 0 0 0-1.2-1.2Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </div>
                    </table>
                    <div
                        class="sticky bottom-0 right-0 flex w-full items-center justify-center bg-white bg-opacity-50 backdrop-blur">
                        {{ $reportCommentList->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
