<div class="container flex flex-col justify-center">
    @section('title', 'Bookmark')
    @if ($confirmationBox)
        <div
            class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-600 bg-opacity-25 backdrop-blur-sm">
            <div
                class="mx-3 flex w-fit flex-col gap-1 rounded-xl bg-white px-10 py-8 text-center text-gray-600 drop-shadow-lg">
                This will remove to your bookmark list
                <form action="" wire:submit.prevent='removeFromList'>
                    <input type="text" wire.model='deletingItemId' value="{{ $deletingItemId }}">
                    <input type="text" wire.model='deletingReferId' value="{{ $deletingReferId }}">
                    <h2>{{ $deletingItemId }}</h2>
                    <h2>{{ $deletingReferId }}</h2>
                    <div class="flex w-full flex-col gap-2 md:flex-row">
                        <button type="submit" class="rounded-md bg-primary-color p-2 text-white md:w-1/2">Yes</button>
                        <div wire:click='closeConfirmationBox'
                            class="cursor-pointer rounded-md border border-primary-color p-2 text-center md:w-1/2">No
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <div class="my-1 flex items-center justify-between px-2">
        <h2>Bookmark List</h2>
        <h2>User/List of bookmark</h2>
    </div>
    @if (count($bookmarkLists) === 0)
        <section
            class="my-5 flex h-[34.5rem] w-full items-center justify-center rounded-lg bg-white px-8 py-6 drop-shadow-lg">

            <h1 class="text-[3rem] font-black text-primary-color">No bookmark yet</h1>
        </section>
    @else
        <section class="flex flex-col gap-4">
            @foreach ($bookmarkLists as $bookmarkedItem)
                @php
                    $docuPost = \App\Models\DocuPost::where('reference', $bookmarkedItem->reference)
                        ->where('id', $bookmarkedItem->docu_post_id)
                        ->first();
                @endphp
                <div class="flex min-h-[6rem] rounded-xl bg-white p-6 drop-shadow-md">
                    <div class="flex-grow">
                        @if ($docuPost)
                            <a wire:navigate
                                href="{{ route('view-document', ['reference' => $bookmarkedItem->reference]) }}"
                                class="font-semibold text-primary-color">{{ $docuPost->title }}</a>
                        @else
                            <span class="text-red-500">Document is deleted, try contacting administrator.</span>
                        @endif
                    </div>
                    <div class="ml-6 mr-3 flex flex-col items-center gap-2 md:flex-row">
                        <button
                            class="h-fit rounded-lg bg-blue-800 p-2 text-white duration-200 ease-in-out hover:bg-blue-900">
                            <svg class="h-5" viewBox="0 0 34 34" fill="none">
                                <path
                                    d="M23.25 5.5415C23.2497 4.3195 23.6791 3.1363 24.4631 2.19893C25.2471 1.26156 26.3357 0.629697 27.5385 0.413897C28.7413 0.198097 29.9817 0.412099 31.0427 1.01846C32.1036 1.62483 32.9176 2.58494 33.3422 3.73082C33.7667 4.8767 33.7749 6.13539 33.3651 7.28666C32.9554 8.43794 32.1539 9.40849 31.1009 10.0285C30.0479 10.6485 28.8103 10.8785 27.6048 10.6783C26.3994 10.4781 25.3027 9.86033 24.5066 8.93317L10.5116 15.4332C10.8333 16.4528 10.8333 17.5468 10.5116 18.5665L24.5066 25.0665C25.348 24.088 26.5226 23.4567 27.8029 23.2949C29.0831 23.1332 30.3779 23.4524 31.4362 24.1909C32.4945 24.9293 33.2409 26.0343 33.5309 27.2918C33.8209 28.5492 33.6338 29.8695 33.0058 30.9969C32.3778 32.1242 31.3536 32.9782 30.1318 33.3935C28.91 33.8088 27.5775 33.7556 26.3926 33.2444C25.2077 32.7333 24.2548 31.8004 23.7185 30.6267C23.1822 29.4529 23.1008 28.1219 23.49 26.8915L9.49495 20.3915C8.80211 21.1989 7.8786 21.7748 6.84866 22.0417C5.81872 22.3085 4.73176 22.2536 3.73399 21.8842C2.73623 21.5148 1.87553 20.8487 1.26768 19.9754C0.659826 19.1022 0.333984 18.0638 0.333984 16.9998C0.333984 15.9359 0.659826 14.8975 1.26768 14.0242C1.87553 13.151 2.73623 12.4849 3.73399 12.1155C4.73176 11.7461 5.81872 11.6911 6.84866 11.958C7.8786 12.2248 8.80211 12.8007 9.49495 13.6082L23.49 7.10817C23.3305 6.60125 23.2496 6.07291 23.25 5.5415Z"
                                    fill="white" />
                            </svg>
                        </button>
                        <button
                            wire:click='showConfirmation("{{ $bookmarkedItem->id }}", "{{ $bookmarkedItem->user_id }} ")'
                            class="h-fit rounded-lg bg-red-700 p-2 text-white duration-200 ease-in-out hover:bg-red-800">
                            <svg class="h-5" viewBox="0 0 40 40" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 35V8C8 6.93913 8.42143 5.92172 9.17157 5.17157C9.92172 4.42143 10.9391 4 12 4H28C29.0609 4 30.0783 4.42143 30.8284 5.17157C31.5786 5.92172 32 6.93913 32 8V35C32.0002 35.1737 31.9551 35.3444 31.8693 35.4954C31.7834 35.6464 31.6597 35.7724 31.5104 35.861C31.361 35.9497 31.1911 35.9979 31.0175 36.0009C30.8438 36.0039 30.6724 35.9617 30.52 35.8783L20 30.1383L9.48 35.8783C9.32763 35.9617 9.15618 36.0039 8.98253 36.0009C8.80887 35.9979 8.639 35.9497 8.48964 35.861C8.34028 35.7724 8.21658 35.6464 8.13073 35.4954C8.04487 35.3444 7.99982 35.1737 8 35ZM16 16C15.7348 16 15.4804 16.1054 15.2929 16.2929C15.1054 16.4804 15 16.7348 15 17C15 17.2652 15.1054 17.5196 15.2929 17.7071C15.4804 17.8946 15.7348 18 16 18H24C24.2652 18 24.5196 17.8946 24.7071 17.7071C24.8946 17.5196 25 17.2652 25 17C25 16.7348 24.8946 16.4804 24.7071 16.2929C24.5196 16.1054 24.2652 16 24 16H16Z"
                                    fill="white" />
                            </svg>
                        </button>
                        <a wire:navigate
                            href="{{ route('view-document', ['reference' => $bookmarkedItem->reference]) }}"
                            class="h-fit rounded-lg bg-orange-600 p-2 text-white duration-200 ease-in-out hover:bg-orange-700">
                            <svg class="h-5" viewBox="0 0 40 40" fill="none">
                                <path
                                    d="M25 19.4004C25 20.7265 24.4732 21.9982 23.5355 22.9359C22.5979 23.8736 21.3261 24.4004 20 24.4004C18.6739 24.4004 17.4021 23.8736 16.4645 22.9359C15.5268 21.9982 15 20.7265 15 19.4004C15 18.0743 15.5268 16.8025 16.4645 15.8649C17.4021 14.9272 18.6739 14.4004 20 14.4004C21.3261 14.4004 22.5979 14.9272 23.5355 15.8649C24.4732 16.8025 25 18.0743 25 19.4004Z"
                                    fill="white" />
                                <path
                                    d="M4 19.4004C4 19.4004 10 8.40039 20 8.40039C30 8.40039 36 19.4004 36 19.4004C36 19.4004 30 30.4004 20 30.4004C10 30.4004 4 19.4004 4 19.4004ZM20 26.4004C21.8565 26.4004 23.637 25.6629 24.9497 24.3501C26.2625 23.0374 27 21.2569 27 19.4004C27 17.5439 26.2625 15.7634 24.9497 14.4506C23.637 13.1379 21.8565 12.4004 20 12.4004C18.1435 12.4004 16.363 13.1379 15.0503 14.4506C13.7375 15.7634 13 17.5439 13 19.4004C13 21.2569 13.7375 23.0374 15.0503 24.3501C16.363 25.6629 18.1435 26.4004 20 26.4004Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </section>

    @endif

</div>
</div>
