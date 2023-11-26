<div>
    <section class="flex flex-col items-center justify-center">

        <div class="w-[80%] lg:w-[50%]">

            <div class="mb-6 flex flex-col items-center justify-center gap-4">
                <div class="mt-1 flex w-full flex-row items-center justify-between text-primary-color">
                    <strong class="text-base md:text-lg">Notifications</strong>
                    <div x-data="{ open: false }" @click.away="open = false" class="relative">
                        <!-- Toggle button -->
                        <button @click="open = !open" class="text-gray-600 focus:outline-none">
                            <svg class="h-6 w-6 text-primary-color duration-300 hover:rotate-6" fill="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.756 3.313c-.516-1.75-2.996-1.75-3.512 0l-.125.424a1.83 1.83 0 0 1-2.631 1.09L7.1 4.615c-1.604-.873-3.357.881-2.484 2.484l.212.388a1.83 1.83 0 0 1-1.09 2.632l-.425.125c-1.75.516-1.75 2.996 0 3.512l.424.125a1.83 1.83 0 0 1 1.09 2.631l-.212.388c-.873 1.604.881 3.358 2.484 2.484l.388-.212a1.83 1.83 0 0 1 2.632 1.09l.125.425c.516 1.75 2.996 1.75 3.512 0l.125-.425a1.829 1.829 0 0 1 2.631-1.09l.388.213c1.604.872 3.358-.881 2.484-2.484l-.212-.389a1.83 1.83 0 0 1 1.09-2.63l.425-.126c1.75-.516 1.75-2.996 0-3.512l-.425-.125a1.83 1.83 0 0 1-1.09-2.631l.213-.388c.872-1.604-.881-3.357-2.484-2.484l-.389.212a1.83 1.83 0 0 1-2.63-1.09l-.126-.425ZM12 15.662a3.663 3.663 0 1 1 0-7.32 3.663 3.663 0 0 1 0 7.317v.002Z">
                                </path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div x-show="open"
                            class="absolute right-0 mt-2 w-[14rem] origin-top-right rounded-md border border-gray-300 shadow-lg ring-1 ring-black ring-opacity-5 backdrop-blur-md md:w-48">
                            <div class="w-full">
                                <button wire:click='readAll'
                                    class="block w-full rounded-md px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 hover:bg-opacity-50">
                                    Mark all as read
                                </button>
                                <button wire:click='unreadAll'
                                    class="block w-full rounded-md px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 hover:bg-opacity-50">
                                    Mark all as unread
                                </button>
                                <button wire:click='deleteAll'
                                    class="block w-full rounded-md px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 hover:bg-opacity-50">
                                    Delete all</button>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($notificationItems as $item)
                    <div
                        class="{{ $item->is_read == 0 ? ' bg-slate-200 border border-slate-300  duration-700 hover:bg-slate-300 ease-in-out ' : 'bg-white bg-opacity-60' }} w-full rounded-lg px-4 py-2 shadow-lg">
                        <a href="{{ $item->link }}" wire:navigate
                            wire:click="clickedNotification({{ $item->id }})" class="flex w-full items-start gap-1">
                            @if ($item->category == 'system')
                                <img class="h-10 w-10" src=" {{ asset('icons/logo.svg') }}" alt="comment ico">
                            @elseif($item->category == 'docu post')
                                <img class="h-10 w-10" src="{{ asset('assets/svgs/notification/pdf-ico.svg') }}"
                                    alt="comment ico">
                            @elseif($item->category == 'comment_report_feedback')
                                <img class="h-10 w-10" src="{{ asset('assets/svgs/notification/comment_report.svg') }}"
                                    alt="comment ico">
                            @endif
                            <section>
                                <strong class="text-primary-color">{{ $item->header_message }}</strong>
                                <p class="my-1 text-sm text-gray-800 md:text-base">
                                    {!! $item->content_message !!}
                                </p>
                            </section>
                        </a>
                        <div class="mt-1 flex w-full justify-between text-sm text-gray-800">
                            <div>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                            </div>
                            <div class="flex list-none gap-2">
                                @if ($item->is_read == 0)
                                    <li wire:click='markAsRead({{ $item->id }})'
                                        class="cursor-pointer duration-300 hover:text-primary-color hover:underline">
                                        Mark as
                                        read
                                    </li>
                                @else
                                    <li class="">Read</li>
                                @endif
                                <li wire:click='deleteNotification({{ $item->id }})'
                                    class="cursor-pointer duration-300 hover:text-primary-color hover:underline">Delete
                                </li>
                            </div>
                        </div>
                    </div>
                @endforeach
                <section class="my-2 flex w-full items-center justify-end">
                    @if ($notificationItems->count() < $totalItems)
                        <button wire:click='loadMore' class="text-primary-color duration-200 hover:font-semibold">See
                            more</button>
                    @endif
                </section>

            </div>
        </div>
    </section>
</div>
