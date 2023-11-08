<div class="h-screen w-screen overflow-hidden">
    <x-session_flash />
    <x-modals.forgot-pass-success></x-modals.forgot-pass-success>
    <img class="fixed bottom-0 right-0 -z-10 object-contain opacity-95" src="{{ asset('icons/wave.svg') }}" alt="wave bg">
    <div class="container z-20 h-full w-full">
        <div class="h-full w-full drop-shadow-2xl">
            <div class="flex h-full w-full items-center justify-center">
                <div class="flex h-[32rem] w-[55rem]">

                    <div
                        class="flex h-full w-full flex-grow items-center justify-center rounded-lg bg-white md:w-full md:rounded-r-none">
                        {{-- Fully center --}}
                        <div x-data="{ send: true, otp: false, pass: false }" x-on:open-send.window = "send = true"
                            x-on:close-send.window = "send = false" x-on:open-otp.window = "otp = true"
                            x-on:close-otp.window = "otp = false" x-on:open-pass.window = "pass = true"
                            x-on:close-pass.window = "pass = false"
                            class="mx-20 flex flex-col items-center justify-center gap-7 p-2">

                            {{-- enter email --}}
                            <section x-show=" send " class="flex flex-col items-center gap-3" style="display: none"
                                x-transition.delay.300ms:enter.duration.500ms>
                                <div class="rounded-full bg-blue-100 p-3">
                                    <img class="h-10" src="{{ asset('icons/logo.svg') }}" alt="Icon Description">
                                </div>
                                <div class="flex flex-col gap-2 text-center text-gray-600">
                                    <strong class="text-lg text-primary-color md:text-xl lg:text-2xl">Forgot Your
                                        Password?</strong>
                                    <small class="text-xs font-medium">To reset your password, please enter the
                                        email
                                        address associated with your
                                        account. We will send you a one-time password (OTP) that you can use to
                                        reset
                                        your
                                        password securely.</small>
                                </div>
                                <div class="flex flex-col items-center justify-center gap-5">
                                    <div class="w-full">
                                        <x-input-field wire:model.live='email' type="email"
                                            wire:keydown.enter="resetPassword" class="w-full md:w-[15rem] lg:w-[20rem]"
                                            placeholder="Enter your email"></x-input-field>
                                        @error('email')
                                            <span class="w-full px-1 text-xs text-red-700">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <button wire:click.prevent="resetPassword" wire:loading.attr="disabled"
                                        class="flex w-fit items-center justify-center gap-2 rounded-xl bg-blue-900 px-3 py-1 font-medium text-white duration-500 ease-in-out hover:bg-primary-color">
                                        <div wire:loading wire:target="resetPassword"
                                            class="z-20 inline-block h-3 w-3 animate-spin rounded-full border-2 border-solid border-white border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]">
                                        </div>
                                        <span>Send OTP</span>
                                    </button>


                                    <a href="{{ route('login') }}"
                                        class="flex h-full w-full items-center justify-center gap-1 text-sm font-semibold text-blue-800">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox=""
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.03 8.53a.75.75 0 1 0-1.06-1.06l-4 4a.748.748 0 0 0 0 1.06l4 4a.75.75 0 1 0 1.06-1.06l-2.72-2.72H18a.75.75 0 0 0 0-1.5H8.31l2.72-2.72Z">
                                            </path>
                                        </svg>
                                        <span>Return to login</span></a>
                                </div>
                            </section>

                            {{-- enter otp code area --}}
                            <section x-show="otp" x-transition.delay.300ms:enter.duration.500ms x-transiton:leave
                                class="flex w-full flex-col items-center justify-center">
                                <div class="w-fit rounded-2xl bg-blue-100 p-2">
                                    <svg class="h-10 w-10 text-primary-color" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.29 4.908a54.397 54.397 0 0 1 9.42 0l1.511.13a2.888 2.888 0 0 1 2.313 1.546.235.235 0 0 1-.091.307l-6.266 3.88a4.25 4.25 0 0 1-4.4.045L3.47 7.088a.236.236 0 0 1-.103-.293A2.889 2.889 0 0 1 5.78 5.039l1.51-.131Z">
                                        </path>
                                        <path
                                            d="M3.362 8.767a.248.248 0 0 0-.373.187 30.351 30.351 0 0 0 .184 7.56A2.888 2.888 0 0 0 5.78 18.96l1.51.131c3.135.273 6.287.273 9.422 0l1.51-.13a2.888 2.888 0 0 0 2.606-2.449 30.35 30.35 0 0 0 .161-7.779.247.247 0 0 0-.377-.182l-5.645 3.494a5.75 5.75 0 0 1-5.951.061l-5.653-3.34Z">
                                        </path>
                                    </svg>
                                </div>
                                <strong class="my-2 text-lg text-primary-color">An one-time password has been sent
                                    successfully."</strong>
                                <span class="mb-2 rounded-2xl bg-green-100 p-2 text-xs font-medium text-green-800">Check
                                    your
                                    <strong> {{ $email }}</strong> inbox now. If the OTP is already expired you
                                    can request another one by clicking the request new OTP button below.</span>

                                <div class="mt-4 flex flex-col items-center justify-center gap-3">
                                    <div class="w-full">
                                        <x-input-field wire:model.live='otpInput' type="text"
                                            wire:keydown.enter="resetPassword" class="w-full"
                                            placeholder="Enter your OTP here"></x-input-field>
                                        @error('otpInput')
                                            <span class="w-full px-1 text-xs text-red-700">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        @error('validateOtp')
                                            <span class="w-full px-1 text-xs text-red-700">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        @error('newOTPSent')
                                            <span class="w-full rounded-xl bg-green-100 px-1 text-xs text-green-700">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <button wire:click.prevent='requestNewOTp'
                                        class="rounded-lg bg-blue-500 p-2 font-medium text-white duration-500 hover:bg-blue-800">Request
                                        new code</button>
                                    <button wire:click.prevent="confirmOTP" wire:loading.attr="disabled"
                                        class="flex w-fit items-center justify-center gap-2 rounded-xl bg-blue-900 px-3 py-1 font-medium text-white duration-500 ease-in-out hover:bg-primary-color">
                                        <div wire:loading wire:target="confirmOTP"
                                            class="z-20 inline-block h-3 w-3 animate-spin rounded-full border-2 border-solid border-white border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]">
                                        </div>
                                        <span>Confirm</span>
                                    </button>

                                    <div class="container flex w-full items-center justify-end">
                                        <button @click="otp = false, send = true"
                                            class="mt-8 flex h-full w-fit cursor-pointer items-center justify-center gap-1 rounded-full bg-blue-100 px-3 py-2 text-sm font-semibold text-blue-800 duration-500 ease-in-out hover:bg-blue-200">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox=""
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.03 8.53a.75.75 0 1 0-1.06-1.06l-4 4a.748.748 0 0 0 0 1.06l4 4a.75.75 0 1 0 1.06-1.06l-2.72-2.72H18a.75.75 0 0 0 0-1.5H8.31l2.72-2.72Z">
                                                </path>
                                            </svg>
                                            <span>Go back</span></button>
                                    </div>
                                </div>
                            </section>

                            {{-- change pass --}}
                            <section x-show="pass" x-transition.delay.300ms:enter.duration.500ms x-transiton:leave
                                class="flex w-full flex-col items-center justify-center">
                                <div class="w-fit rounded-2xl bg-blue-100 p-2">
                                    <svg class="h-10 w-10 text-primary-color" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M1.25 12a5.75 5.75 0 0 1 10.8-2.75H21c.966 0 1.75.784 1.75 1.75v2.5a.75.75 0 0 1-.75.75h-2.25V16a.75.75 0 0 1-.75.75h-2.5a.75.75 0 0 1-.75-.75v-1.75h-3.457A5.751 5.751 0 0 1 1.25 12ZM7 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <strong class="my-2 text-lg text-primary-color">Change your password now.</strong>
                                <span class="mb-2 rounded-2xl bg-blue-100 p-2 text-xs text-blue-800">
                                    Please always remember your password. Safeguarding your password is crucial to
                                    ensure the security of your account and data. Avoid sharing your password with
                                    anyone and consider using a combination of upper and lower-case letters, numbers,
                                    and symbols to create a strong and secure password.
                                </span>
                                <div class="flex w-full flex-col items-center justify-center gap-5">
                                    <div class="container flex w-full flex-col gap-2">
                                        <div class="w-full">
                                            <x-label-input>Password</x-label-input>
                                            <x-input-field wire:model.live='password' type="password" class="w-full"
                                                placeholder="Password"></x-input-field>
                                            @error('password')
                                                <span class="w-full px-1 text-xs text-red-700">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="w-full">
                                            <x-label-input>Confirm Password</x-label-input>
                                            <x-input-field wire:model.live='password_confirmation' type="password"
                                                wire:keydown.enter="changePassword" class="w-full"
                                                placeholder="Confirm password"></x-input-field>
                                            @error('password_confirmation')
                                                <span class="w-full px-1 text-xs text-red-700">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="container flex w-full items-center justify-end">
                                        <button wire:click.prevent="changePassword" wire:loading.attr="disabled"
                                            class="flex w-fit items-center justify-center gap-2 rounded-xl bg-blue-900 px-3 py-1 font-medium text-white duration-500 ease-in-out hover:bg-primary-color">
                                            <div wire:loading wire:target="changePassword"
                                                class="z-20 inline-block h-3 w-3 animate-spin rounded-full border-2 border-solid border-white border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]">
                                            </div>
                                            <span>Change password</span>
                                        </button>
                                    </div>
                                    <div class="flex w-full items-center justify-start">
                                        <button @click="pass = false, otp = true"
                                            class="flex h-full w-fit cursor-pointer items-center justify-center gap-1 rounded-full bg-blue-100 px-3 py-2 text-sm font-semibold text-blue-800 duration-500 ease-in-out hover:bg-blue-200">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox=""
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.03 8.53a.75.75 0 1 0-1.06-1.06l-4 4a.748.748 0 0 0 0 1.06l4 4a.75.75 0 1 0 1.06-1.06l-2.72-2.72H18a.75.75 0 0 0 0-1.5H8.31l2.72-2.72Z">
                                                </path>
                                            </svg>
                                            <span>Go back</span></button>
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>

                    <div class="hidden h-full w-[45%] flex-shrink rounded-r-lg bg-red-100 md:block">
                        <img class="h-full w-full rounded-r-lg object-cover"
                            src="{{ asset('icons/stacked-steps-haikei.svg') }}" alt="Icon Description">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
