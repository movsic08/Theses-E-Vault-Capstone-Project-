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
                    class="mx-[2rem] mt-4 w-full rounded-lg px-4 py-2 text-justify text-sm text-primary-color drop-shadow-md backdrop-blur-sm md:w-[85%] md:px-6 md:py-4 lg:w-[60%] lg:text-base">
                    Welcome to our
                    comprehensive Help and Support
                    Center for Theses
                    Kiosk
                    Website. Whether you're a user seeking assistance or an administrator looking for insights, our
                    resources cover some topics, including troubleshooting, user guides, and feature highlights.
                    Explore our carefully curated content to enhance your understanding and optimize your interaction
                    with the Theseses Kiosk Website.</p>
            </div>

            <div class="mt-20 flex w-full items-center justify-center">
                <div class="flex w-fit flex-col items-start justify-center gap-2">
                    <div class="flex w-full items-center justify-start">
                        <strong class="text-2xl text-primary-color">Topics</strong>
                    </div>
                    <div class="flex flex-col items-start justify-center gap-8 text-primary-color md:flex-row">
                        <div
                            class="flex h-[16rem] w-[16rem] flex-col items-center justify-center rounded-lg bg-white p-6 drop-shadow-lg duration-300 hover:bg-slate-200">
                            <img class="h-[6rem]" src="{{ asset('icons/logo.svg') }}" alt="logo">
                            <div class="mt-6">
                                <strong class="text-lg uppercase"> Account</strong>
                                <small class="flex leading-tight">Tips and instructions in using Theses Kiosk
                                    website.</small>
                            </div>
                        </div>
                        <div
                            class="flex h-[16rem] w-[16rem] flex-col items-center justify-center rounded-lg bg-white p-6 drop-shadow-lg duration-300 hover:bg-slate-200">
                            <img class="h-[6rem]" src="{{ asset('icons/logo.svg') }}" alt="logo">
                            <div class="mt-6">
                                <strong class="text-lg uppercase"> Using Theses Kisok</strong>
                                <small class="flex leading-tight">Tips and instructions in using Theses Kiosk
                                    website.</small>
                            </div>
                        </div>
                        <div
                            class="flex h-[16rem] w-[16rem] flex-col items-center justify-center rounded-lg bg-white p-6 drop-shadow-lg duration-300 hover:bg-slate-200">
                            <img class="h-[6rem]" src="{{ asset('icons/logo.svg') }}" alt="logo">
                            <div class="mt-6">
                                <strong class="text-lg uppercase">Reporting</strong>
                                <small class="flex leading-tight">Tips and instructions in using Theses Kiosk
                                    website.</small>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
    </div>
</x-app-layout>
