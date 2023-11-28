<div x-data="{ shareBox: false }" x-show="shareBox" x-on:open-shr.window="shareBox = true; shareLink = $event.detail.shareLink"
    x-on:close-shr.window="shareBox = false" x-on:keydown.escape.window="shareBox = false"
    x-transition:enter.duration.400ms x-transition:leave.duration.300ms @click.away="shareBox = false"
    class="fixed inset-0 z-50 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm"
    style="display: none">
    <div class="mx-4 mt-24 w-full rounded-lg bg-white p-6 text-primary-color drop-shadow-md md:max-w-md">

        <!-- Modal Header -->
        <div class="mb-4 flex items-center justify-between">
            <h2 class="text-xl font-semibold">Cite this</h2>

            <span @click="shareBox = false" class="cursor-pointer">&times;</span>
        </div>

        <!--  Body -->
        <div>

            <p class="mb-2">Copy the link below:</p>
            <textarea class="custom-scrollbar w-full rounded-md border border-gray-400 p-2 text-sm outline-primary-color"
                type="text" wire:model.live="citation" rows="8" placeholder="Abstract or summary of your work"></textarea>

        </div>
        <div class="flex w-full justify-end font-bold">
            <button class="rounded bg-blue-500 px-4 py-2 text-white duration-300 hover:bg-blue-800">Copy Link</button>
        </div>

    </div>
</div>
