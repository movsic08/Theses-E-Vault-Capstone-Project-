<div x-data="{ shareBox: false, shareLink: '' }" x-show="shareBox" x-on:open-shr.window="shareBox = true; shareLink = $event.detail.shareLink"
    x-on:close-shr.window="shareBox = false" x-on:keydown.escape.window="shareBox = false"
    x-transition:enter.duration.400ms x-transition:leave.duration.300ms @click.away="shareBox = false"
    class="fixed inset-0 z-50 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm"
    style="display: none">
    <div class="mx-4 mt-24 w-full rounded-lg bg-white p-6 drop-shadow-md md:max-w-md">

        <!-- Modal Header -->
        <div class="mb-4 flex items-center justify-between">
            <h2 class="text-xl font-semibold">Share Link </h2>
            <span @click="shareBox = false" class="cursor-pointer">&times;</span>
        </div>

        <!--  Body -->
        <div>
            <p class="mb-2">Copy the link below:</p>
            <x-input-field wire:model.live='shareLink' type="text" id="value" class="mb-4 w-full rounded border p-2" x-ref="shareInput"></x-input-field>
        </div>

        <div class="flex w-full justify-end font-bold">
            <button wire:click="copyLink('{{ $shareLink }}')" id="copy" class="rounded bg-blue-500 px-4 py-2 text-white duration-300 hover:bg-blue-800">Copy Link</button>
        </div>
        
    </div>
    <script>
        // this is copy to clipboard logic begin
        const COPY = document.querySelector('#copy');
        const VALUE = document.querySelector('#value');
    
        COPY.addEventListener('click', () => {
            try {
                if (navigator.clipboard) {
                    navigator.clipboard.writeText(VALUE.value);
                    console.log('Link copied to clipboard!');
                } else {
                    fallbackCopyTextToClipboard(VALUE.value);
                }
            } catch (err) {
                console.error('Error copying to clipboard:', err);
            }
        });
    
        function fallbackCopyTextToClipboard(text) {
            const textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
    
            try {
                document.execCommand('copy');
                console.log('Link copied to clipboard using fallback method!');
            } catch (err) {
                console.error('Error copying to clipboard:', err);
            }
    
            document.body.removeChild(textArea);
        }
        // this is copy to clipboard logic end
    </script>
    
    
</div>
