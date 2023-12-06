<x-app-layout>
    @section('title', 'Help Center')
    <div class="absolute inset-x-0 top-0 -z-20 w-full">
        <img src="{{ asset('assets/svgs/helpAndSupportBg.svg') }}" alt="">
    </div>
    <div>
        <section class="container">
            <div class="flex h-full flex-col items-center justify-center md:p-2">
                <h2
                    class="mx-[2rem] mt-7 text-center text-[1.13rem] font-extrabold text-primary-color dark:text-white md:text-2xl lg:mx-[10rem] lg:text-5xl">
                    How can we help you?</h2>
                <p
                    class="mx-[2rem] mt-4 w-full rounded-lg px-4 py-2 text-justify text-sm text-primary-color drop-shadow-md backdrop-blur-sm dark:text-slate-200 md:w-[85%] md:px-6 md:py-4 lg:w-[60%] lg:text-base">
                    Welcome to our
                    comprehensive Help and Support
                    Center for Theses
                    E-Vault
                    Website. Whether you're a user seeking assistance or an administrator looking for insights, our
                    resources cover some topics, including troubleshooting, user guides, and feature highlights.
                    Explore our carefully curated content to enhance your understanding and optimize your interaction
                    with the Theses E-Vault Website.</p>
            </div>

            <div class="mb-5 mt-8 flex w-full items-center justify-center">
                <div class="flex w-fit flex-col items-start justify-center gap-2">
                    <div class="flex w-full items-center justify-start">
                        <strong class="text-2xl text-primary-color dark:text-slate-200">Topics</strong>
                    </div>
                    <div
                        class="grid grid-cols-6 items-start justify-center gap-8 text-primary-color dark:text-slate-200">
                        <a href="{{ route('account-help-center') }}" wire:navigate
                            class="col-span-6 flex h-[17rem] w-[17rem] flex-col items-center justify-center rounded-lg bg-white p-6 drop-shadow-lg duration-300 hover:scale-105 hover:bg-blue-100 dark:bg-slate-800 dark:hover:bg-slate-700 md:col-span-3 lg:col-span-2">
                            <svg class="h-full rounded-3xl text-primary-color dark:text-slate-200" fill="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.8 19.2s-1.2 0-1.2-1.2 1.2-4.8 6-4.8 6 3.6 6 4.8c0 1.2-1.2 1.2-1.2 1.2h-9.6Zm4.8-7.2a3.6 3.6 0 1 0 0-7.2 3.6 3.6 0 0 0 0 7.2Z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M8.66 19.2A2.685 2.685 0 0 1 8.4 18c0-1.626.816-3.3 2.324-4.464A7.592 7.592 0 0 0 8.4 13.2c-4.8 0-6 3.6-6 4.8 0 1.2 1.2 1.2 1.2 1.2h5.06Z"
                                    clip-rule="evenodd"></path>
                                <path d="M7.8 12a3 3 0 1 0 .001-6 3 3 0 0 0 0 6Z"></path>
                            </svg>
                            <div class="mt-6 min-h-[6rem]">
                                <strong class="text-lg uppercase"> Account</strong>
                                <small class="flex leading-tight">Explore essential tips and instructions for managing
                                    your account on the Theses E-Vault website.</small>
                            </div>
                        </a>
                        <a href="{{ route('using-theses-kiosk-help-center') }}" wire:navigate
                            class="col-span-6 flex h-[17rem] w-[17rem] flex-col items-center justify-center rounded-lg bg-white p-6 drop-shadow-lg duration-300 hover:scale-105 hover:bg-blue-100 dark:bg-slate-800 dark:hover:bg-slate-700 md:col-span-3 lg:col-span-2">
                            <img class="h-[6rem]" src="{{ asset('icons/logo.svg') }}" alt="logo">
                            <div class="mt-6 min-h-[6rem]">
                                <strong class="text-lg uppercase"> Using Theses E-Vault</strong>
                                <small class="flex leading-tight">This resource provides invaluable tips and detailed
                                    instructions to enhance your proficiency when navigating Theses E-Vault
                                    website.</small>
                            </div>
                        </a>
                        <a href="{{ route('reporting-help-center') }}" wire:navigate
                            class="col-span-6 flex h-[17rem] w-[17rem] flex-col items-center justify-center rounded-lg bg-white p-6 drop-shadow-lg duration-300 hover:scale-105 hover:bg-blue-100 dark:bg-slate-800 dark:hover:bg-slate-700 md:col-span-3 lg:col-span-2">
                            <svg class="h-full rounded-3xl text-primary-color dark:text-slate-200" fill="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.534 2.502A.6.6 0 0 1 19.8 3v9a.6.6 0 0 1-.377.557L19.2 12l.223.557-.003.001-.007.004-.028.01a26.883 26.883 0 0 1-1.733.6c-.979.303-2.255.628-3.252.628-1.016 0-1.857-.336-2.59-.63l-.033-.012c-.76-.306-1.409-.558-2.177-.558-.84 0-1.965.276-2.924.573-.43.134-.855.28-1.276.438V21a.6.6 0 1 1-1.2 0V3a.6.6 0 1 1 1.2 0v.338c.271-.095.595-.204.948-.312.98-.3 2.256-.627 3.252-.627 1.008 0 1.829.333 2.545.623l.052.022c.746.301 1.397.555 2.203.555.84 0 1.966-.276 2.925-.572.546-.17 1.086-.361 1.618-.571l.023-.009.005-.002h.001">
                                </path>
                            </svg>
                            <div class="mt-6 min-h-[6rem]">
                                <strong class="text-lg uppercase">Reporting</strong>
                                <small class="flex leading-tight">Discover instruction for effectively reporting
                                    comments. </small>
                            </div>
                        </a>

                    </div>
                </div>

            </div>
        </section>
    </div>
</x-app-layout>
