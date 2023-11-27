<x-app-layout>

    {{-- @livewire('profile-edit-tab') --}}
    <div
        class="relative grid flex-grow grid-flow-row-dense grid-cols-7 gap-4 px-7 py-2 text-primary-color md:mx-8 md:my-2 md:px-0">
        <!-- Row 1, Column 1 -->
        <div class="z-10 col-span-7 flex flex-col justify-center md:col-span-7 lg:col-span-4">
            <h1 class="text-6xl font-black md:text-7xl">THESIS <span class="text-secondary-color">KIOSK</span></h1>
        </div>
        <!-- Row 2, Column 1 -->
        <div
            class="justify-centermd:col-span-3 z-10 col-span-7 flex items-center md:col-span-4 md:items-start md:justify-center lg:col-span-4">
            <p class="text-xl font-light md:text-2xl">Welcome to Thesis Kiosk!, a dedicated platform designed to showcase
                exceptional
                research and
                scholarly works. Be inspired by the groundbreaking discoveries, critical
                analyses, and creative endeavors presented by talented undergraduate researchers from esteemed
                institutions. Begin your journey of exploration today. </p>
        </div>
        <!-- Row 1, Column 2 -->
        <style>

        </style>

        <div
            class="relative -bottom-[6rem] z-0 hidden p-4 md:col-span-3 md:flex md:items-center md:justify-center lg:col-span-3 lg:row-span-3">
            <img class="animate-indexBounce absolute -left-[3rem] -top-[10rem] z-10 h-[24rem]"
                src="{{ asset('assets/svgs/letterT.svg') }}" alt="">
            <img class="animate-tbounce absolute -right-[1rem] bottom-8 z-20" src="{{ asset('assets/svgs/book.svg') }}"
                alt="">
        </div>


        <!-- Row 2, Column 2 -->
        <div
            class="z-10 col-span-7 flex items-center justify-center md:col-span-6 md:flex-row md:items-start md:justify-start lg:col-span-4">
            <a href="{{ route('home', ['clicked' => true]) }}" class="animation w-full animate-bounce rounded-full bg-primary-color py-2 text-center text-white shadow-[0_3px_10px_rgb(0,0,0,0.2)] shadow-blue-950 transition duration-1000 hover:bg-sky-900 hover:shadow-[0_3px_10px_rgb(0,0,0,0.2)] hover:shadow-sky-800 md:w-1/2">
                Explore now
            </a>
        </div>

    </div>
</x-app-layout>
