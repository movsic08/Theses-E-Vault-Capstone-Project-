<div>
    <section class="flex flex-col items-center justify-center">

        <div class="w-[80%] lg:w-[50%]">

            <div class="flex flex-col items-center justify-center gap-4">
                <div class="flex w-full mt-1 flex-row items-center justify-between text-primary-color">
                    <strong>Notifications</strong>
                    <strong>Setting</strong>
                </div>
                @foreach ($notificationItems as $item)
                    <a href="{{ $item->link }}" wire:navigate wire:click="clickedNotification({{ $item->id }})"
                        @click="$dispatch('notification-read')"
                        class="{{ $item->is_read == 0 ? 'bg-blue-300  duration-700 hover:bg-blue-400 ease-in-out bg-opacity-20 hover:bg-opacity-50' : 'bg-white bg-opacity-60' }} relative flex h-full items-center rounded-md border border-slate-300 p-2 drop-shadow-lg backdrop-blur-sm">
                        <div class="flex h-full items-start justify-start">
                            @if ($item->category == 'system')
                                <img class="ml-4 h-10 w-10" src=" {{ asset('icons/logo.svg') }}" alt="">
                            @elseif($item->category == 'docu post')
                                <svg class="ml-4 h-10 w-10" fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.027 14.91c.168-.099.352-.195.551-.286-.168.25-.348.493-.54.727-.336.404-.597.62-.762.687a.312.312 0 0 1-.042.014.338.338 0 0 1-.031-.053c-.067-.132-.065-.26.048-.432.127-.198.383-.425.776-.658Zm2.946-1.977c-.142.03-.284.06-.427.094a25.2 25.2 0 0 0 .6-1.26c.19.351.394.695.612 1.03-.26.038-.523.083-.785.136Zm3.03 1.127a4.662 4.662 0 0 1-.522-.492c.274.006.521.026.735.065.38.068.559.176.621.25.02.021.031.049.032.077a.524.524 0 0 1-.072.24.368.368 0 0 1-.113.15.128.128 0 0 1-.083.017c-.108-.003-.31-.08-.598-.307Zm-2.67-5.695c-.048.293-.13.629-.24.995a5.82 5.82 0 0 1-.106-.416c-.092-.423-.105-.756-.056-.986.046-.212.132-.298.236-.34a.621.621 0 0 1 .174-.048.71.71 0 0 1 .038.238c.006.146-.008.332-.046.558v-.001Z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M7.2 2.4h9.6a2.4 2.4 0 0 1 2.4 2.4v14.4a2.4 2.4 0 0 1-2.4 2.4H7.2a2.4 2.4 0 0 1-2.4-2.4V4.8a2.4 2.4 0 0 1 2.4-2.4Zm.198 14.002c.108.216.276.412.525.503a.95.95 0 0 0 .696-.036c.382-.156.762-.523 1.112-.944.4-.48.82-1.112 1.225-1.812a13.979 13.979 0 0 1 2.396-.487c.36.46.732.856 1.092 1.14.336.264.724.484 1.121.5.216.011.43-.046.612-.165a1.24 1.24 0 0 0 .425-.499c.108-.217.174-.444.165-.676a1.013 1.013 0 0 0-.24-.621c-.27-.324-.715-.48-1.152-.558a6.91 6.91 0 0 0-1.602-.06 13.146 13.146 0 0 1-1.176-2.023c.3-.792.525-1.541.624-2.153a3.72 3.72 0 0 0 .058-.737 1.487 1.487 0 0 0-.152-.646.841.841 0 0 0-.573-.438c-.242-.051-.492 0-.72.093-.453.18-.692.564-.782.987-.088.408-.048.884.055 1.364.106.487.286 1.017.516 1.554a23.64 23.64 0 0 1-1.274 2.672 9.189 9.189 0 0 0-1.779.774c-.444.264-.839.576-1.076.944-.252.392-.33.857-.096 1.324Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            @elseif($item->category == 'comment_report_feedback')
                                <svg class="ml-4 h-10 w-10"fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.36 4C6.58 4 2.643 9.857 4.824 15.21l.933 2.288a.5.5 0 0 1-.15.579L3.634 19.66a.5.5 0 0 0 .313.89h7.82a8.732 8.732 0 0 0 8.733-8.732C20.5 7.5 17 4 12.682 4h-.321Z">
                                    </path>
                                </svg>
                            @endif
                        </div>
                        <div class="ml-4 flex w-full items-center justify-between">
                            <div class="leading-tight">
                                <strong class="text-lg text-primary-color">{{ $item->header_message }}</strong>
                                <p class="text-sm">{!! $item->content_message !!}</p>
                            </div>
                            @if ($item->is_read == 0)
                                <div class="absolute right-1 top-2 h-2 w-2 rounded-full bg-primary-color">
                                </div>
                            @endif
                            <div class="flex items-end justify-end">
                                <small
                                    class="whitespace-nowrap">{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</small>

                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</div>
