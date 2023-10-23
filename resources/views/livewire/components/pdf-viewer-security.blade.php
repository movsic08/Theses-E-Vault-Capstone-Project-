<div>
    <x-session_flash />
    <h2>VjJSagPBw3HNojo8g8</h2>
    @if ($PDFlocked)
        <div class="w-full">
            <div class="flex w-full items-center justify-center">
                <div class="w-[20rem] rounded-md bg-white p-4 drop-shadow-lg">
                    <h2 class="md:text2xl text-center text-lg font-extrabold text-primary-color">PDF IS LOCKED</h2>
                    <div class="my-1 rounded-md border border-blue-300 bg-blue-100 p-2 text-blue-950">
                        <p class="text-xs font-light">If you don't have know where to find the generated key for you,
                            you can find
                            it in the view
                            document page. Just click on generate key and paste it here to unlock</p>
                    </div>
                    <form action="" wire:submit.prevent='unlockPDFForm'>
                        <x-label-input>Enter the generated key</x-label-input>
                        <x-input-field wire:model.live='key_input' placeholder='Key here' />
                        @error('key_input')
                            <small class="text-red-500">{{ $message }}</small>
                            <br>
                        @enderror

                        <input type="submit" value="Enter"
                            class="mt-1 w-fit cursor-pointer rounded-md bg-blue-700 px-2 py-1 text-white duration-500 ease-in-out hover:bg-primary-color">
                    </form>
                </div>
            </div>
        </div>
    @endif

    {!! $pdfViewerContent !!}

    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('refreshSection', (event) => {
                console.log('NA DISPATCH');
            });
        });
    </script>


</div>
