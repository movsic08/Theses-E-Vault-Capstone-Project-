@include('partials.__header')
<x-navbar />

<div class="z-40 flex min-h-screen w-screen flex-col text-primary-color md:flex">

    <x-main_nav />

    <div class="mx-3 px-3 py-2">
        <h1 class="font-semibold">List of collections</h1>
    </div>
    <div class="flex flex-col space-y-4 md:flex-row md:space-y-0">
        <div class="container space-y-6">
            {{-- TITLE --}}
            <div class="rounded-md bg-white p-6 drop-shadow-md">
                <div class="flex">
                    <div class="-ml-4 flex w-72 items-start justify-start">
                        <svg class="" fill="currentColor" viewBox="0 0 24 24">
                            <svg class="" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9.027 14.91c.168-.099.352-.195.551-.286-.168.25-.348.493-.54.727-.336.404-.597.62-.762.687a.312.312 0 0 1-.042.014.338.338 0 0 1-.031-.053c-.067-.132-.065-.26.048-.432.127-.198.383-.425.776-.658Zm2.946-1.977c-.142.03-.284.06-.427.094a25.2 25.2 0 0 0 .6-1.26c.19.351.394.695.612 1.03-.26.038-.523.083-.785.136Zm3.03 1.127a4.662 4.662 0 0 1-.522-.492c.274.006.521.026.735.065.38.068.559.176.621.25.02.021.031.049.032.077a.524.524 0 0 1-.072.24.368.368 0 0 1-.113.15.128.128 0 0 1-.083.017c-.108-.003-.31-.08-.598-.307Zm-2.67-5.695c-.048.293-.13.629-.24.995a5.82 5.82 0 0 1-.106-.416c-.092-.423-.105-.756-.056-.986.046-.212.132-.298.236-.34a.621.621 0 0 1 .174-.048.71.71 0 0 1 .038.238c.006.146-.008.332-.046.558v-.001Z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M7.2 2.4h9.6a2.4 2.4 0 0 1 2.4 2.4v14.4a2.4 2.4 0 0 1-2.4 2.4H7.2a2.4 2.4 0 0 1-2.4-2.4V4.8a2.4 2.4 0 0 1 2.4-2.4Zm.198 14.002c.108.216.276.412.525.503a.95.95 0 0 0 .696-.036c.382-.156.762-.523 1.112-.944.4-.48.82-1.112 1.225-1.812a13.979 13.979 0 0 1 2.396-.487c.36.46.732.856 1.092 1.14.336.264.724.484 1.121.5.216.011.43-.046.612-.165a1.24 1.24 0 0 0 .425-.499c.108-.217.174-.444.165-.676a1.013 1.013 0 0 0-.24-.621c-.27-.324-.715-.48-1.152-.558a6.91 6.91 0 0 0-1.602-.06 13.146 13.146 0 0 1-1.176-2.023c.3-.792.525-1.541.624-2.153a3.72 3.72 0 0 0 .058-.737 1.487 1.487 0 0 0-.152-.646.841.841 0 0 0-.573-.438c-.242-.051-.492 0-.72.093-.453.18-.692.564-.782.987-.088.408-.048.884.055 1.364.106.487.286 1.017.516 1.554a23.64 23.64 0 0 1-1.274 2.672 9.189 9.189 0 0 0-1.779.774c-.444.264-.839.576-1.076.944-.252.392-.33.857-.096 1.324Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="text-justify text-sm font-semibold text-secondary-color">Using internet of things
                            (IoT)
                            to knowledge management
                            to improve organizational performances: A case study on selected companies from different
                            industries in the Philippines
                        </h2>
                    </div>
                </div>
                {{-- AUTHTORS --}}
                <div class="flex items-start space-x-2">
                    <div class="h-auto w-14 items-start">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M10.8 19.2s-1.2 0-1.2-1.2 1.2-4.8 6-4.8 6 3.6 6 4.8c0 1.2-1.2 1.2-1.2 1.2h-9.6Zm4.8-7.2a3.6 3.6 0 1 0 0-7.2 3.6 3.6 0 0 0 0 7.2Z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M8.66 19.2A2.685 2.685 0 0 1 8.4 18c0-1.626.816-3.3 2.324-4.464A7.592 7.592 0 0 0 8.4 13.2c-4.8 0-6 3.6-6 4.8 0 1.2 1.2 1.2 1.2 1.2h5.06Z"
                                clip-rule="evenodd"></path>
                            <path d="M7.8 12a3 3 0 1 0 .001-6 3 3 0 0 0 0 6Z"></path>
                        </svg>
                    </div>
                    <ul class="flex flex-wrap text-sm">
                        <li>Jude Emmanuel Thaddeus Q.Altamarino, </li>
                        <li>Marvin Jerome T. Chua,</li>
                        <li> Lucas C. Nicdao,</li>
                        <li>and Pablo Isidro N. Pagkatipunan</li>
                    </ul>
                </div>
                {{-- TAGS --}}
                <div class="flex items-start space-x-2">
                    <div class="h-auto w-8 items-start">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M5.28 4.32a1.2 1.2 0 0 1 1.2-1.2h5.503a1.2 1.2 0 0 1 .849.352l8.4 8.4a1.2 1.2 0 0 1 0 1.697l-5.503 5.503a1.2 1.2 0 0 1-1.697 0l-8.4-8.4a1.2 1.2 0 0 1-.352-.849V4.32Zm4.2 4.8a1.8 1.8 0 1 0 0-3.6 1.8 1.8 0 0 0 0 3.6Z">
                            </path>
                            <path
                                d="M4.431 11.272a1.2 1.2 0 0 1-.351-.848V4.32a1.2 1.2 0 0 0-1.2 1.2v5.504c0 .318.126.623.351.848l8.4 8.4a1.2 1.2 0 0 0 1.697 0l.052-.052-8.949-8.948Z">
                            </path>
                        </svg>
                    </div>
                    <ul class="flex flex-wrap text-sm">
                        <li>Cybercartography;</li>
                        <li>Histo-cultural Trail;</li>
                        <li>Landscape Walking Approach</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container space-y-6">
            {{-- TITLE --}}
            <div class="rounded-md bg-white p-6 drop-shadow-md">
                <div class="flex">
                    <div class="-ml-4 flex w-72 items-start justify-start">
                        <svg class="" fill="currentColor" viewBox="0 0 24 24">
                            <svg class="" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9.027 14.91c.168-.099.352-.195.551-.286-.168.25-.348.493-.54.727-.336.404-.597.62-.762.687a.312.312 0 0 1-.042.014.338.338 0 0 1-.031-.053c-.067-.132-.065-.26.048-.432.127-.198.383-.425.776-.658Zm2.946-1.977c-.142.03-.284.06-.427.094a25.2 25.2 0 0 0 .6-1.26c.19.351.394.695.612 1.03-.26.038-.523.083-.785.136Zm3.03 1.127a4.662 4.662 0 0 1-.522-.492c.274.006.521.026.735.065.38.068.559.176.621.25.02.021.031.049.032.077a.524.524 0 0 1-.072.24.368.368 0 0 1-.113.15.128.128 0 0 1-.083.017c-.108-.003-.31-.08-.598-.307Zm-2.67-5.695c-.048.293-.13.629-.24.995a5.82 5.82 0 0 1-.106-.416c-.092-.423-.105-.756-.056-.986.046-.212.132-.298.236-.34a.621.621 0 0 1 .174-.048.71.71 0 0 1 .038.238c.006.146-.008.332-.046.558v-.001Z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M7.2 2.4h9.6a2.4 2.4 0 0 1 2.4 2.4v14.4a2.4 2.4 0 0 1-2.4 2.4H7.2a2.4 2.4 0 0 1-2.4-2.4V4.8a2.4 2.4 0 0 1 2.4-2.4Zm.198 14.002c.108.216.276.412.525.503a.95.95 0 0 0 .696-.036c.382-.156.762-.523 1.112-.944.4-.48.82-1.112 1.225-1.812a13.979 13.979 0 0 1 2.396-.487c.36.46.732.856 1.092 1.14.336.264.724.484 1.121.5.216.011.43-.046.612-.165a1.24 1.24 0 0 0 .425-.499c.108-.217.174-.444.165-.676a1.013 1.013 0 0 0-.24-.621c-.27-.324-.715-.48-1.152-.558a6.91 6.91 0 0 0-1.602-.06 13.146 13.146 0 0 1-1.176-2.023c.3-.792.525-1.541.624-2.153a3.72 3.72 0 0 0 .058-.737 1.487 1.487 0 0 0-.152-.646.841.841 0 0 0-.573-.438c-.242-.051-.492 0-.72.093-.453.18-.692.564-.782.987-.088.408-.048.884.055 1.364.106.487.286 1.017.516 1.554a23.64 23.64 0 0 1-1.274 2.672 9.189 9.189 0 0 0-1.779.774c-.444.264-.839.576-1.076.944-.252.392-.33.857-.096 1.324Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="text-justify text-sm font-semibold text-secondary-color">Using internet of things
                            (IoT)
                            to knowledge management
                            to improve organizational performances: A case study on selected companies from different
                            industries in the Philippines
                        </h2>
                    </div>
                </div>
                {{-- AUTHTORS --}}
                <div class="flex items-start space-x-2">
                    <div class="h-auto w-14 items-start">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M10.8 19.2s-1.2 0-1.2-1.2 1.2-4.8 6-4.8 6 3.6 6 4.8c0 1.2-1.2 1.2-1.2 1.2h-9.6Zm4.8-7.2a3.6 3.6 0 1 0 0-7.2 3.6 3.6 0 0 0 0 7.2Z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M8.66 19.2A2.685 2.685 0 0 1 8.4 18c0-1.626.816-3.3 2.324-4.464A7.592 7.592 0 0 0 8.4 13.2c-4.8 0-6 3.6-6 4.8 0 1.2 1.2 1.2 1.2 1.2h5.06Z"
                                clip-rule="evenodd"></path>
                            <path d="M7.8 12a3 3 0 1 0 .001-6 3 3 0 0 0 0 6Z"></path>
                        </svg>
                    </div>
                    <ul class="flex flex-wrap text-sm">
                        <li>Jude Emmanuel Thaddeus Q.Altamarino, </li>
                        <li>Marvin Jerome T. Chua,</li>
                        <li> Lucas C. Nicdao,</li>
                        <li>and Pablo Isidro N. Pagkatipunan</li>
                    </ul>
                </div>
                {{-- TAGS --}}
                <div class="flex items-start space-x-2">
                    <div class="h-auto w-8 items-start">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M5.28 4.32a1.2 1.2 0 0 1 1.2-1.2h5.503a1.2 1.2 0 0 1 .849.352l8.4 8.4a1.2 1.2 0 0 1 0 1.697l-5.503 5.503a1.2 1.2 0 0 1-1.697 0l-8.4-8.4a1.2 1.2 0 0 1-.352-.849V4.32Zm4.2 4.8a1.8 1.8 0 1 0 0-3.6 1.8 1.8 0 0 0 0 3.6Z">
                            </path>
                            <path
                                d="M4.431 11.272a1.2 1.2 0 0 1-.351-.848V4.32a1.2 1.2 0 0 0-1.2 1.2v5.504c0 .318.126.623.351.848l8.4 8.4a1.2 1.2 0 0 0 1.697 0l.052-.052-8.949-8.948Z">
                            </path>
                        </svg>
                    </div>
                    <ul class="flex flex-wrap text-sm">
                        <li>Cybercartography;</li>
                        <li>Histo-cultural Trail;</li>
                        <li>Landscape Walking Approach</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container space-y-6">
            {{-- TITLE --}}
            <div class="rounded-md bg-white p-6 drop-shadow-md">
                <div class="flex">
                    <div class="-ml-4 flex w-72 items-start justify-start">
                        <svg class="" fill="currentColor" viewBox="0 0 24 24">
                            <svg class="" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9.027 14.91c.168-.099.352-.195.551-.286-.168.25-.348.493-.54.727-.336.404-.597.62-.762.687a.312.312 0 0 1-.042.014.338.338 0 0 1-.031-.053c-.067-.132-.065-.26.048-.432.127-.198.383-.425.776-.658Zm2.946-1.977c-.142.03-.284.06-.427.094a25.2 25.2 0 0 0 .6-1.26c.19.351.394.695.612 1.03-.26.038-.523.083-.785.136Zm3.03 1.127a4.662 4.662 0 0 1-.522-.492c.274.006.521.026.735.065.38.068.559.176.621.25.02.021.031.049.032.077a.524.524 0 0 1-.072.24.368.368 0 0 1-.113.15.128.128 0 0 1-.083.017c-.108-.003-.31-.08-.598-.307Zm-2.67-5.695c-.048.293-.13.629-.24.995a5.82 5.82 0 0 1-.106-.416c-.092-.423-.105-.756-.056-.986.046-.212.132-.298.236-.34a.621.621 0 0 1 .174-.048.71.71 0 0 1 .038.238c.006.146-.008.332-.046.558v-.001Z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M7.2 2.4h9.6a2.4 2.4 0 0 1 2.4 2.4v14.4a2.4 2.4 0 0 1-2.4 2.4H7.2a2.4 2.4 0 0 1-2.4-2.4V4.8a2.4 2.4 0 0 1 2.4-2.4Zm.198 14.002c.108.216.276.412.525.503a.95.95 0 0 0 .696-.036c.382-.156.762-.523 1.112-.944.4-.48.82-1.112 1.225-1.812a13.979 13.979 0 0 1 2.396-.487c.36.46.732.856 1.092 1.14.336.264.724.484 1.121.5.216.011.43-.046.612-.165a1.24 1.24 0 0 0 .425-.499c.108-.217.174-.444.165-.676a1.013 1.013 0 0 0-.24-.621c-.27-.324-.715-.48-1.152-.558a6.91 6.91 0 0 0-1.602-.06 13.146 13.146 0 0 1-1.176-2.023c.3-.792.525-1.541.624-2.153a3.72 3.72 0 0 0 .058-.737 1.487 1.487 0 0 0-.152-.646.841.841 0 0 0-.573-.438c-.242-.051-.492 0-.72.093-.453.18-.692.564-.782.987-.088.408-.048.884.055 1.364.106.487.286 1.017.516 1.554a23.64 23.64 0 0 1-1.274 2.672 9.189 9.189 0 0 0-1.779.774c-.444.264-.839.576-1.076.944-.252.392-.33.857-.096 1.324Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="text-justify text-sm font-semibold text-secondary-color">Using internet of things
                            (IoT)
                            to knowledge management
                            to improve organizational performances: A case study on selected companies from different
                            industries in the Philippines
                        </h2>
                    </div>
                </div>
                {{-- AUTHTORS --}}
                <div class="flex items-start space-x-2">
                    <div class="h-auto w-14 items-start">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M10.8 19.2s-1.2 0-1.2-1.2 1.2-4.8 6-4.8 6 3.6 6 4.8c0 1.2-1.2 1.2-1.2 1.2h-9.6Zm4.8-7.2a3.6 3.6 0 1 0 0-7.2 3.6 3.6 0 0 0 0 7.2Z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M8.66 19.2A2.685 2.685 0 0 1 8.4 18c0-1.626.816-3.3 2.324-4.464A7.592 7.592 0 0 0 8.4 13.2c-4.8 0-6 3.6-6 4.8 0 1.2 1.2 1.2 1.2 1.2h5.06Z"
                                clip-rule="evenodd"></path>
                            <path d="M7.8 12a3 3 0 1 0 .001-6 3 3 0 0 0 0 6Z"></path>
                        </svg>
                    </div>
                    <ul class="flex flex-wrap text-sm">
                        <li>Jude Emmanuel Thaddeus Q.Altamarino, </li>
                        <li>Marvin Jerome T. Chua,</li>
                        <li> Lucas C. Nicdao,</li>
                        <li>and Pablo Isidro N. Pagkatipunan</li>
                    </ul>
                </div>
                {{-- TAGS --}}
                <div class="flex items-start space-x-2">
                    <div class="h-auto w-8 items-start">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M5.28 4.32a1.2 1.2 0 0 1 1.2-1.2h5.503a1.2 1.2 0 0 1 .849.352l8.4 8.4a1.2 1.2 0 0 1 0 1.697l-5.503 5.503a1.2 1.2 0 0 1-1.697 0l-8.4-8.4a1.2 1.2 0 0 1-.352-.849V4.32Zm4.2 4.8a1.8 1.8 0 1 0 0-3.6 1.8 1.8 0 0 0 0 3.6Z">
                            </path>
                            <path
                                d="M4.431 11.272a1.2 1.2 0 0 1-.351-.848V4.32a1.2 1.2 0 0 0-1.2 1.2v5.504c0 .318.126.623.351.848l8.4 8.4a1.2 1.2 0 0 0 1.697 0l.052-.052-8.949-8.948Z">
                            </path>
                        </svg>
                    </div>
                    <ul class="flex flex-wrap text-sm">
                        <li>Cybercartography;</li>
                        <li>Histo-cultural Trail;</li>
                        <li>Landscape Walking Approach</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container space-y-6">
            {{-- TITLE --}}
            <div class="rounded-md bg-white p-6 drop-shadow-md">
                <div class="flex">
                    <div class="-ml-4 flex w-72 items-start justify-start">
                        <svg class="" fill="currentColor" viewBox="0 0 24 24">
                            <svg class="" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9.027 14.91c.168-.099.352-.195.551-.286-.168.25-.348.493-.54.727-.336.404-.597.62-.762.687a.312.312 0 0 1-.042.014.338.338 0 0 1-.031-.053c-.067-.132-.065-.26.048-.432.127-.198.383-.425.776-.658Zm2.946-1.977c-.142.03-.284.06-.427.094a25.2 25.2 0 0 0 .6-1.26c.19.351.394.695.612 1.03-.26.038-.523.083-.785.136Zm3.03 1.127a4.662 4.662 0 0 1-.522-.492c.274.006.521.026.735.065.38.068.559.176.621.25.02.021.031.049.032.077a.524.524 0 0 1-.072.24.368.368 0 0 1-.113.15.128.128 0 0 1-.083.017c-.108-.003-.31-.08-.598-.307Zm-2.67-5.695c-.048.293-.13.629-.24.995a5.82 5.82 0 0 1-.106-.416c-.092-.423-.105-.756-.056-.986.046-.212.132-.298.236-.34a.621.621 0 0 1 .174-.048.71.71 0 0 1 .038.238c.006.146-.008.332-.046.558v-.001Z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M7.2 2.4h9.6a2.4 2.4 0 0 1 2.4 2.4v14.4a2.4 2.4 0 0 1-2.4 2.4H7.2a2.4 2.4 0 0 1-2.4-2.4V4.8a2.4 2.4 0 0 1 2.4-2.4Zm.198 14.002c.108.216.276.412.525.503a.95.95 0 0 0 .696-.036c.382-.156.762-.523 1.112-.944.4-.48.82-1.112 1.225-1.812a13.979 13.979 0 0 1 2.396-.487c.36.46.732.856 1.092 1.14.336.264.724.484 1.121.5.216.011.43-.046.612-.165a1.24 1.24 0 0 0 .425-.499c.108-.217.174-.444.165-.676a1.013 1.013 0 0 0-.24-.621c-.27-.324-.715-.48-1.152-.558a6.91 6.91 0 0 0-1.602-.06 13.146 13.146 0 0 1-1.176-2.023c.3-.792.525-1.541.624-2.153a3.72 3.72 0 0 0 .058-.737 1.487 1.487 0 0 0-.152-.646.841.841 0 0 0-.573-.438c-.242-.051-.492 0-.72.093-.453.18-.692.564-.782.987-.088.408-.048.884.055 1.364.106.487.286 1.017.516 1.554a23.64 23.64 0 0 1-1.274 2.672 9.189 9.189 0 0 0-1.779.774c-.444.264-.839.576-1.076.944-.252.392-.33.857-.096 1.324Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="text-justify text-sm font-semibold text-secondary-color">Using internet of things
                            (IoT)
                            to knowledge management
                            to improve organizational performances: A case study on selected companies from different
                            industries in the Philippines
                        </h2>
                    </div>
                </div>
                {{-- AUTHTORS --}}
                <div class="flex items-start space-x-2">
                    <div class="h-auto w-14 items-start">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M10.8 19.2s-1.2 0-1.2-1.2 1.2-4.8 6-4.8 6 3.6 6 4.8c0 1.2-1.2 1.2-1.2 1.2h-9.6Zm4.8-7.2a3.6 3.6 0 1 0 0-7.2 3.6 3.6 0 0 0 0 7.2Z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M8.66 19.2A2.685 2.685 0 0 1 8.4 18c0-1.626.816-3.3 2.324-4.464A7.592 7.592 0 0 0 8.4 13.2c-4.8 0-6 3.6-6 4.8 0 1.2 1.2 1.2 1.2 1.2h5.06Z"
                                clip-rule="evenodd"></path>
                            <path d="M7.8 12a3 3 0 1 0 .001-6 3 3 0 0 0 0 6Z"></path>
                        </svg>
                    </div>
                    <ul class="flex flex-wrap text-sm">
                        <li>Jude Emmanuel Thaddeus Q.Altamarino, </li>
                        <li>Marvin Jerome T. Chua,</li>
                        <li> Lucas C. Nicdao,</li>
                        <li>and Pablo Isidro N. Pagkatipunan</li>
                    </ul>
                </div>
                {{-- TAGS --}}
                <div class="flex items-start space-x-2">
                    <div class="h-auto w-8 items-start">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M5.28 4.32a1.2 1.2 0 0 1 1.2-1.2h5.503a1.2 1.2 0 0 1 .849.352l8.4 8.4a1.2 1.2 0 0 1 0 1.697l-5.503 5.503a1.2 1.2 0 0 1-1.697 0l-8.4-8.4a1.2 1.2 0 0 1-.352-.849V4.32Zm4.2 4.8a1.8 1.8 0 1 0 0-3.6 1.8 1.8 0 0 0 0 3.6Z">
                            </path>
                            <path
                                d="M4.431 11.272a1.2 1.2 0 0 1-.351-.848V4.32a1.2 1.2 0 0 0-1.2 1.2v5.504c0 .318.126.623.351.848l8.4 8.4a1.2 1.2 0 0 0 1.697 0l.052-.052-8.949-8.948Z">
                            </path>
                        </svg>
                    </div>
                    <ul class="flex flex-wrap text-sm">
                        <li>Cybercartography;</li>
                        <li>Histo-cultural Trail;</li>
                        <li>Landscape Walking Approach</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container space-y-6">
            {{-- TITLE --}}
            <div class="rounded-md bg-white p-6 drop-shadow-md">
                <div class="flex">
                    <div class="-ml-4 flex w-72 items-start justify-start">
                        <svg class="" fill="currentColor" viewBox="0 0 24 24">
                            <svg class="" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9.027 14.91c.168-.099.352-.195.551-.286-.168.25-.348.493-.54.727-.336.404-.597.62-.762.687a.312.312 0 0 1-.042.014.338.338 0 0 1-.031-.053c-.067-.132-.065-.26.048-.432.127-.198.383-.425.776-.658Zm2.946-1.977c-.142.03-.284.06-.427.094a25.2 25.2 0 0 0 .6-1.26c.19.351.394.695.612 1.03-.26.038-.523.083-.785.136Zm3.03 1.127a4.662 4.662 0 0 1-.522-.492c.274.006.521.026.735.065.38.068.559.176.621.25.02.021.031.049.032.077a.524.524 0 0 1-.072.24.368.368 0 0 1-.113.15.128.128 0 0 1-.083.017c-.108-.003-.31-.08-.598-.307Zm-2.67-5.695c-.048.293-.13.629-.24.995a5.82 5.82 0 0 1-.106-.416c-.092-.423-.105-.756-.056-.986.046-.212.132-.298.236-.34a.621.621 0 0 1 .174-.048.71.71 0 0 1 .038.238c.006.146-.008.332-.046.558v-.001Z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M7.2 2.4h9.6a2.4 2.4 0 0 1 2.4 2.4v14.4a2.4 2.4 0 0 1-2.4 2.4H7.2a2.4 2.4 0 0 1-2.4-2.4V4.8a2.4 2.4 0 0 1 2.4-2.4Zm.198 14.002c.108.216.276.412.525.503a.95.95 0 0 0 .696-.036c.382-.156.762-.523 1.112-.944.4-.48.82-1.112 1.225-1.812a13.979 13.979 0 0 1 2.396-.487c.36.46.732.856 1.092 1.14.336.264.724.484 1.121.5.216.011.43-.046.612-.165a1.24 1.24 0 0 0 .425-.499c.108-.217.174-.444.165-.676a1.013 1.013 0 0 0-.24-.621c-.27-.324-.715-.48-1.152-.558a6.91 6.91 0 0 0-1.602-.06 13.146 13.146 0 0 1-1.176-2.023c.3-.792.525-1.541.624-2.153a3.72 3.72 0 0 0 .058-.737 1.487 1.487 0 0 0-.152-.646.841.841 0 0 0-.573-.438c-.242-.051-.492 0-.72.093-.453.18-.692.564-.782.987-.088.408-.048.884.055 1.364.106.487.286 1.017.516 1.554a23.64 23.64 0 0 1-1.274 2.672 9.189 9.189 0 0 0-1.779.774c-.444.264-.839.576-1.076.944-.252.392-.33.857-.096 1.324Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="text-justify text-sm font-semibold text-secondary-color">Using internet of things
                            (IoT)
                            to knowledge management
                            to improve organizational performances: A case study on selected companies from different
                            industries in the Philippines
                        </h2>
                    </div>
                </div>
                {{-- AUTHTORS --}}
                <div class="flex items-start space-x-2">
                    <div class="h-auto w-14 items-start">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M10.8 19.2s-1.2 0-1.2-1.2 1.2-4.8 6-4.8 6 3.6 6 4.8c0 1.2-1.2 1.2-1.2 1.2h-9.6Zm4.8-7.2a3.6 3.6 0 1 0 0-7.2 3.6 3.6 0 0 0 0 7.2Z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M8.66 19.2A2.685 2.685 0 0 1 8.4 18c0-1.626.816-3.3 2.324-4.464A7.592 7.592 0 0 0 8.4 13.2c-4.8 0-6 3.6-6 4.8 0 1.2 1.2 1.2 1.2 1.2h5.06Z"
                                clip-rule="evenodd"></path>
                            <path d="M7.8 12a3 3 0 1 0 .001-6 3 3 0 0 0 0 6Z"></path>
                        </svg>
                    </div>
                    <ul class="flex flex-wrap text-sm">
                        <li>Jude Emmanuel Thaddeus Q.Altamarino, </li>
                        <li>Marvin Jerome T. Chua,</li>
                        <li> Lucas C. Nicdao,</li>
                        <li>and Pablo Isidro N. Pagkatipunan</li>
                    </ul>
                </div>
                {{-- TAGS --}}
                <div class="flex items-start space-x-2">
                    <div class="h-auto w-8 items-start">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M5.28 4.32a1.2 1.2 0 0 1 1.2-1.2h5.503a1.2 1.2 0 0 1 .849.352l8.4 8.4a1.2 1.2 0 0 1 0 1.697l-5.503 5.503a1.2 1.2 0 0 1-1.697 0l-8.4-8.4a1.2 1.2 0 0 1-.352-.849V4.32Zm4.2 4.8a1.8 1.8 0 1 0 0-3.6 1.8 1.8 0 0 0 0 3.6Z">
                            </path>
                            <path
                                d="M4.431 11.272a1.2 1.2 0 0 1-.351-.848V4.32a1.2 1.2 0 0 0-1.2 1.2v5.504c0 .318.126.623.351.848l8.4 8.4a1.2 1.2 0 0 0 1.697 0l.052-.052-8.949-8.948Z">
                            </path>
                        </svg>
                    </div>
                    <ul class="flex flex-wrap text-sm">
                        <li>Cybercartography;</li>
                        <li>Histo-cultural Trail;</li>
                        <li>Landscape Walking Approach</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container space-y-6">
            {{-- TITLE --}}
            <div class="rounded-md bg-white p-6 drop-shadow-md">
                <div class="flex">
                    <div class="-ml-4 flex w-72 items-start justify-start">
                        <svg class="" fill="currentColor" viewBox="0 0 24 24">
                            <svg class="" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9.027 14.91c.168-.099.352-.195.551-.286-.168.25-.348.493-.54.727-.336.404-.597.62-.762.687a.312.312 0 0 1-.042.014.338.338 0 0 1-.031-.053c-.067-.132-.065-.26.048-.432.127-.198.383-.425.776-.658Zm2.946-1.977c-.142.03-.284.06-.427.094a25.2 25.2 0 0 0 .6-1.26c.19.351.394.695.612 1.03-.26.038-.523.083-.785.136Zm3.03 1.127a4.662 4.662 0 0 1-.522-.492c.274.006.521.026.735.065.38.068.559.176.621.25.02.021.031.049.032.077a.524.524 0 0 1-.072.24.368.368 0 0 1-.113.15.128.128 0 0 1-.083.017c-.108-.003-.31-.08-.598-.307Zm-2.67-5.695c-.048.293-.13.629-.24.995a5.82 5.82 0 0 1-.106-.416c-.092-.423-.105-.756-.056-.986.046-.212.132-.298.236-.34a.621.621 0 0 1 .174-.048.71.71 0 0 1 .038.238c.006.146-.008.332-.046.558v-.001Z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M7.2 2.4h9.6a2.4 2.4 0 0 1 2.4 2.4v14.4a2.4 2.4 0 0 1-2.4 2.4H7.2a2.4 2.4 0 0 1-2.4-2.4V4.8a2.4 2.4 0 0 1 2.4-2.4Zm.198 14.002c.108.216.276.412.525.503a.95.95 0 0 0 .696-.036c.382-.156.762-.523 1.112-.944.4-.48.82-1.112 1.225-1.812a13.979 13.979 0 0 1 2.396-.487c.36.46.732.856 1.092 1.14.336.264.724.484 1.121.5.216.011.43-.046.612-.165a1.24 1.24 0 0 0 .425-.499c.108-.217.174-.444.165-.676a1.013 1.013 0 0 0-.24-.621c-.27-.324-.715-.48-1.152-.558a6.91 6.91 0 0 0-1.602-.06 13.146 13.146 0 0 1-1.176-2.023c.3-.792.525-1.541.624-2.153a3.72 3.72 0 0 0 .058-.737 1.487 1.487 0 0 0-.152-.646.841.841 0 0 0-.573-.438c-.242-.051-.492 0-.72.093-.453.18-.692.564-.782.987-.088.408-.048.884.055 1.364.106.487.286 1.017.516 1.554a23.64 23.64 0 0 1-1.274 2.672 9.189 9.189 0 0 0-1.779.774c-.444.264-.839.576-1.076.944-.252.392-.33.857-.096 1.324Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="text-justify text-sm font-semibold text-secondary-color">Using internet of things
                            (IoT)
                            to knowledge management
                            to improve organizational performances: A case study on selected companies from different
                            industries in the Philippines
                        </h2>
                    </div>
                </div>
                {{-- AUTHTORS --}}
                <div class="flex items-start space-x-2">
                    <div class="h-auto w-14 items-start">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M10.8 19.2s-1.2 0-1.2-1.2 1.2-4.8 6-4.8 6 3.6 6 4.8c0 1.2-1.2 1.2-1.2 1.2h-9.6Zm4.8-7.2a3.6 3.6 0 1 0 0-7.2 3.6 3.6 0 0 0 0 7.2Z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M8.66 19.2A2.685 2.685 0 0 1 8.4 18c0-1.626.816-3.3 2.324-4.464A7.592 7.592 0 0 0 8.4 13.2c-4.8 0-6 3.6-6 4.8 0 1.2 1.2 1.2 1.2 1.2h5.06Z"
                                clip-rule="evenodd"></path>
                            <path d="M7.8 12a3 3 0 1 0 .001-6 3 3 0 0 0 0 6Z"></path>
                        </svg>
                    </div>
                    <ul class="flex flex-wrap text-sm">
                        <li>Jude Emmanuel Thaddeus Q.Altamarino, </li>
                        <li>Marvin Jerome T. Chua,</li>
                        <li> Lucas C. Nicdao,</li>
                        <li>and Pablo Isidro N. Pagkatipunan</li>
                    </ul>
                </div>
                {{-- TAGS --}}
                <div class="flex items-start space-x-2">
                    <div class="h-auto w-8 items-start">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M5.28 4.32a1.2 1.2 0 0 1 1.2-1.2h5.503a1.2 1.2 0 0 1 .849.352l8.4 8.4a1.2 1.2 0 0 1 0 1.697l-5.503 5.503a1.2 1.2 0 0 1-1.697 0l-8.4-8.4a1.2 1.2 0 0 1-.352-.849V4.32Zm4.2 4.8a1.8 1.8 0 1 0 0-3.6 1.8 1.8 0 0 0 0 3.6Z">
                            </path>
                            <path
                                d="M4.431 11.272a1.2 1.2 0 0 1-.351-.848V4.32a1.2 1.2 0 0 0-1.2 1.2v5.504c0 .318.126.623.351.848l8.4 8.4a1.2 1.2 0 0 0 1.697 0l.052-.052-8.949-8.948Z">
                            </path>
                        </svg>
                    </div>
                    <ul class="flex flex-wrap text-sm">
                        <li>Cybercartography;</li>
                        <li>Histo-cultural Trail;</li>
                        <li>Landscape Walking Approach</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container md:w-1/2">
            <div class="rounded-md bg-white p-4 drop-shadow-md">
                <h1>Im sidebar</h1>
            </div>

        </div>
    </div>







</div>


@include('partials.__footer')
