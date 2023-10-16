<div>
    <section class="container">
        <div class="my-2 w-full">
            <div class="flex flex-col items-center justify-center gap-4">
                <strong>Notifactions</strong>
            </div>
        </div>
        <div class="w-full">
            <div class="flex flex-col items-center justify-center gap-4">
                @foreach ($notificationItems as $item)
                    <a href="{{ $item->link }}" wire:navigate wire:click='clickedNotification({{ $item->id }})'
                        class="{{ $item->is_read == 0 ? 'bg-slate-200 duration-700 ease-in-out' : 'bg-white' }} relative flex w-[50%] items-center rounded-md p-2 drop-shadow-md">
                        <img class="ml-4 h-10 w-10" src=" {{ asset('icons/logo.svg') }}" alt="">
                        <div class="ml-4 flex w-full items-center justify-between">
                            <div class="leading-tight">
                                <strong>{{ $item->header_message }}</strong>
                                <p>{{ $item->content_message }}</p>
                            </div>
                            @if ($item->is_read == 0)
                                <div class="absolute right-1 top-2 h-2 w-2 rounded-full bg-primary-color">
                                </div>
                            @endif
                            <small
                                class="absolute bottom-1 right-1">{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</small>

                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</div>
