<div class="container">
    <x-session_flash />
    <div class="px-4">
        <div class="my-3 flex justify-between">
            <h2>List of Uploaded Documents</h2>
            <button>Add new document</button>
        </div>
        <div class="mb-8 rounded-2xl bg-white px-5 py-2 drop-shadow-md">
            <h1>Sub enu area</h1>
            <div class="custom-scrollbar overflow-x-auto">
                <div class="max-h-[35rem]">
                    <table class="min-w-full">
                        <thead class="sticky top-0 bg-white bg-opacity-25 backdrop-blur-md">
                            <tr>
                                <th class="px-6 py-2 text-left font-bold text-gray-700">
                                    Title
                                </th>
                                <th class="px-6 py-2 text-left font-bold text-gray-700">
                                    Date
                                </th>
                                <th class="px-6 py-2 text-left font-bold text-gray-700">
                                    Uploader
                                </th>
                                <th class="px-6 py-2 text-left font-bold text-gray-700">
                                    Type
                                </th>
                                <th class="px-6 py-2 text-left font-bold text-gray-700">
                                    Status
                                </th>
                                <th
                                    class="flex items-center justify-center px-6 py-2 text-left font-bold text-gray-700">
                                    <svg class="h-4 text-gray-500" viewBox="0 0 31 31" fill="currentColor">
                                        <path
                                            d="M18.0614 2.83145C17.3089 0.279368 13.6922 0.279368 12.9397 2.83145L12.7575 3.44978C12.6449 3.83181 12.4484 4.18381 12.1821 4.47998C11.9159 4.77615 11.5868 5.00899 11.2188 5.16142C10.8509 5.31384 10.4536 5.38199 10.0559 5.36087C9.6582 5.33976 9.27028 5.2299 8.92057 5.03937L8.35474 4.7302C6.01557 3.45708 3.45912 6.01499 4.73224 8.3527L5.04141 8.91854C5.23221 9.2683 5.34229 9.65635 5.36355 10.0542C5.38481 10.4521 5.31672 10.8496 5.16428 11.2177C5.01183 11.5858 4.7789 11.9151 4.48257 12.1815C4.18625 12.4478 3.83405 12.6444 3.45182 12.7569L2.83203 12.9392C0.279948 13.6917 0.279948 17.3083 2.83203 18.0608L3.45036 18.2431C3.83239 18.3556 4.18439 18.5522 4.48056 18.8184C4.77673 19.0847 5.00957 19.4138 5.16199 19.7817C5.31442 20.1496 5.38257 20.547 5.36145 20.9447C5.34034 21.3424 5.23048 21.7303 5.03995 22.08L4.73078 22.6458C3.45766 24.985 6.01557 27.5429 8.35328 26.2683L8.91912 25.9592C9.26888 25.7684 9.65693 25.6583 10.0548 25.637C10.4526 25.6158 10.8502 25.6838 11.2183 25.8363C11.5864 25.9887 11.9157 26.2217 12.1821 26.518C12.4484 26.8143 12.645 27.1665 12.7575 27.5487L12.9397 28.1685C13.6922 30.7206 17.3089 30.7206 18.0614 28.1685L18.2437 27.5487C18.356 27.1666 18.5524 26.8144 18.8186 26.518C19.0848 26.2217 19.414 25.9888 19.782 25.8363C20.15 25.6839 20.5474 25.6158 20.9452 25.637C21.343 25.6583 21.7309 25.7684 22.0806 25.9592L22.6464 26.2698C24.9856 27.5415 27.5435 24.985 26.2689 22.6473L25.9597 22.08C25.7695 21.7303 25.6598 21.3426 25.6389 20.9451C25.6179 20.5475 25.6861 20.1504 25.8385 19.7826C25.9909 19.4149 26.2237 19.0859 26.5197 18.8198C26.8157 18.5537 27.1675 18.3571 27.5493 18.2446L28.1691 18.0608C30.7212 17.3083 30.7212 13.6917 28.1691 12.9392L27.5493 12.7569C27.1673 12.6444 26.8153 12.4478 26.5191 12.1816C26.223 11.9153 25.9901 11.5862 25.8377 11.2183C25.6853 10.8504 25.6171 10.453 25.6382 10.0553C25.6594 9.65762 25.7692 9.2697 25.9597 8.91999L26.2704 8.35416C27.542 6.01499 24.9856 3.45854 22.6479 4.73166L22.0806 5.04083C21.7309 5.23109 21.3431 5.34072 20.9456 5.3617C20.5481 5.38267 20.151 5.31446 19.7832 5.16205C19.4155 5.00965 19.0865 4.77691 18.8204 4.48089C18.5543 4.18487 18.3577 3.83306 18.2452 3.45124L18.0614 2.83145ZM15.5006 20.8404C14.7815 20.8695 14.0639 20.753 13.3909 20.4979C12.7179 20.2428 12.1035 19.8544 11.5844 19.3559C11.0653 18.8573 10.6522 18.2591 10.3701 17.597C10.088 16.9349 9.94255 16.2226 9.94255 15.5029C9.94255 14.7832 10.088 14.0709 10.3701 13.4088C10.6522 12.7467 11.0653 12.1485 11.5844 11.65C12.1035 11.1515 12.7179 10.763 13.3909 10.5079C14.0639 10.2528 14.7815 10.1363 15.5006 10.1654C16.8698 10.2333 18.1605 10.8251 19.1056 11.8182C20.0507 12.8113 20.5777 14.1298 20.5777 15.5007C20.5777 16.8717 20.0507 18.1901 19.1056 19.1832C18.1605 20.1763 16.8698 20.7681 15.5006 20.836V20.8404Z" />
                                    </svg>
                                </th>
                            </tr>
                        </thead>
                        <div class="overflow-y-auto overflow-x-hidden">
                            <tbody class="w-full text-gray-500">
                                @foreach ($listOfDucoPost as $itemPost)
                                    <tr>
                                        <td class="whitespace-normal px-6 py-2">
                                            {{ $itemPost->title }}
                                        </td>
                                        <td class="w-fit whitespace-nowrap px-6 py-2">
                                            {{ \Carbon\Carbon::parse($itemPost->created_at)->format('M d Y') }}
                                        </td>
                                        <td class="whitespace-normal px-6 py-2">
                                            {{ $itemPost->author_1 }}
                                        </td>
                                        <td class="whitespace-normal px-6 py-2">
                                            {{ $itemPost->document_type }}
                                        </td>
                                        <td class="whitespace-normal px-6 py-2">
                                            @if ($itemPost->status == 0)
                                                <div
                                                    class="w-full rounded-md bg-orange-500 px-2 py-1 text-center text-sm font-medium uppercase text-white">
                                                    pending
                                                </div>
                                            @elseif ($itemPost->status == 1)
                                                <div
                                                    class="w-full rounded-md bg-green-500 px-2 py-1 text-center text-sm font-medium uppercase text-white">
                                                    approved
                                                </div>
                                            @elseif ($itemPost->status == 2)
                                                <div
                                                    class="w-full rounded-md bg-red-500 px-2 py-1 text-center text-sm font-medium uppercase text-white">
                                                    deleted
                                                </div>
                                            @elseif ($itemPost->status == 3)
                                                <div
                                                    class="w-full rounded-md bg-green-500 px-2 py-1 text-center text-sm font-medium uppercase text-white">
                                                    revision
                                                </div>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-2">
                                            E A V D R
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
