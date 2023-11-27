<div x-data="{ verifyAcc: false, verifiedMessage: false, enterOTP: true }" x-show="verifyAcc" x-on:open-va.window="verifyAcc = true"
    x-on:close-va.window="verifyAcc = false" x-on:keydown.escape.window="verifyAcc = false"
    x-on:open-ot.window="verifiedMessage = true" x-on:close-me.window="enterOTP = false" x-transition:enter.duration.400ms
    x-transition:leave.duration.300ms @click.away="verifyAcc = false"
    class="fixed inset-0 z-50 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm"
    style="display: none">
    {{-- enter otp box --}}
    <div x-show="enterOTP" x-transition:enter.duration.400ms x-transition:leave.duration.100ms
        class="mx-3 mt-20 flex w-fit flex-col gap-1 rounded-xl bg-white px-10 py-8 text-center text-gray-600 drop-shadow-lg">
        <img class="h-10" src="{{ asset('icons/logo.svg') }}" alt="Icon Description">
        <strong class="text-lg">Enter verification code</strong>
        <h1 class="">We've send a code to <strong> {{ $verifyEmail }}</strong></h1>
        <form wire:submit="checkOtpInput">
            <section class="flex flex-col items-center justify-center">
                <label class="" for="">Enter the 6 letters to verify your account</label>
                <div class="mt-5 flex w-full flex-row justify-evenly capitalize">
                    @for ($i = 1; $i <= 6; $i++)
                        <input type="text"
                            class="@error('input' . $i) border-red-600 @enderror h-10 w-10 rounded-md border-2 border-gray-300 text-center text-lg font-semibold capitalize focus:border-blue-800 focus:outline-none"
                            maxlength="1" id="input{{ $i }}" wire:model.live="input{{ $i }}" onkeyup="fn(this, 'input{{ ($i % 6) + 1 }}')">
                    @endfor
                    <script>
                        function fn(froo, too) {
                            var len = froo.value.length;
                            var mx = froo.getAttribute("maxlength");

                            if (len == mx) {
                                document.getElementById(too).focus();
                            }
                        }
                    </script>

                </div>
                @error('validateOtp')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
                @error('alreadySent')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
                <span>Didn't get a code? <button><Strong>Request new code</Strong></button></span>
                <div class="mt-5 flex w-full flex-col gap-2 md:flex-row">
                    <button wire:click="closeOtpBox"
                        class="w-full rounded-md border border-gray-400 p-1 text-gray-600 hover:bg-gray-600 hover:text-white">
                        Cancel
                    </button>
                    <button class="w-full rounded-md bg-blue-600 p-1 text-white hover:bg-blue-800"
                        wire:loading.attr="disabled">
                        Verify
                    </button>
                </div>
            </section>
        </form>
        
        
    </div>

    {{-- confirmation box --}}
    <div x-show="verifiedMessage" x-transition:enter.duration.800ms x-transition:leave.duration.300ms
        class="mx-3 mt-20 flex w-[40%] flex-col items-center gap-3 rounded-xl bg-white px-10 py-8 text-gray-600 drop-shadow-lg md:w-[35%]">
        <div class="flex items-center justify-center">
            <script src="https://cdn.lordicon.com/lordicon.js"></script>
            <lord-icon src="https://cdn.lordicon.com/guqkthkk.json" trigger="in" state="in-reveal"
                style="width:5rem;height:5rem">
            </lord-icon>
        </div>
        <strong class="text-green-700">Account Verified!</strong>
        <p class="my-2 rounded-lg border-green-700 bg-green-100 px-3 py-2 text-center text-green-700">Congratulations on
            successfully
            verifying your account. Welcome to our platform!</p>
        <button wire:click="closeVerifiedBox"
            class="w-full rounded-md border bg-primary-color p-1 text-white hover:bg-blue-900">
            Close
        </button>
    </div>
</div>


