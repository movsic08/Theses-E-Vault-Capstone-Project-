<script src="{{ asset('js/sideBar.js') }}"></script>
<nav id="sidebar-nav"
    class="sticky bottom-0 left-0 top-0 z-50 hidden h-screen w-14 flex-col justify-between rounded-r-xl bg-white text-gray-700 drop-shadow-lg md:flex">
    <section>
        {{-- logo ang name --}}
        <div>
            <div id="sample"
                class="mx-1 mb-2 flex items-center justify-between rounded-md p-1 px-3 py-2.5 duration-500">
                <a wire:navigate href="{{ route('index') }}" class="flex items-center">
                    <img height="30" width="30" src="{{ asset('icons/logo.svg') }}" alt="logo" srcset="">
                    <div class="ml-2 flex flex-col">
                        <p class="hideName block md:hidden">Thesis Kiosk</p>
                    </div>
                </a>
                <p id="msgCount" class="rounded-lg bg-slate-200 px-4 py-1 text-xs font-normal md:hidden">1
                    Notification</p>
            </div>
            <button id="sidebarBtn" class="absolute -right-7 top-2 z-40 hidden md:block">
                <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 2a10 10 0 1 1 0 20 10 10 0 0 1 0-20Zm-4.375 9.375a.625.625 0 1 0 0 1.25h7.241l-2.684 2.682a.627.627 0 0 0 .886.885l3.75-3.75a.625.625 0 0 0 0-.885l-3.75-3.75a.626.626 0 1 0-.886.886l2.684 2.682H7.625Z">
                    </path>
                </svg>
            </button>
        </div>

        {{-- menus --}}
        <div class="text-sm font-semibold">
            @auth
                {{-- notification --}}
                <div
                    class="{{ request()->routeIs('user-notification') ? 'bg-gray-800 rounded-full text-white' : '' }} mx-1 my-2 flex flex-row items-center justify-between rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a wire:navigate href="{{ route('user-notification') }}" class="flex items-center">
                        <div class="relative">
                            <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 22a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22Zm7-7.414V10c0-3.217-2.185-5.927-5.145-6.742A1.99 1.99 0 0 0 12 2a1.99 1.99 0 0 0-1.855 1.258C7.185 4.074 5 6.783 5 10v4.586l-1.707 1.707A.996.996 0 0 0 3 17v1a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-1a.996.996 0 0 0-.293-.707L19 14.586Z">
                                </path>
                            </svg>
                            <div
                                class="absolute -right-1 -top-1 flex h-4 w-4 items-center justify-center rounded-full border-2 border-white bg-gray-700 text-gray-100">
                                <p class="text-[8px]">1</p>
                            </div>
                        </div>
                        <p class="hideName block pl-2 md:hidden">Notification</p>
                    </a>
                    <p class="rounded-lg bg-slate-200 px-4 py-1 text-xs font-normal md:hidden">1 NOtification</p>
                </div>
                {{-- message area --}}
                <div
                    class="{{ request()->routeIs('user-messages') ? 'bg-gray-800 rounded-full text-white' : '' }} mx-1 my-2 flex flex-row items-center justify-between rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a wire:navigate href="{{ route('user-messages') }}" class="flex items-center">
                        <div class="relative">
                            <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.276 9.68a10.281 10.281 0 0 0-3.62-5.844A10.66 10.66 0 0 0 11.992 1.5c-2.856 0-5.523 1.1-7.517 3.098C2.548 6.531 1.492 9.083 1.5 11.783c0 1.98.581 3.915 1.671 5.567l.204.283L2.25 22.5l5.381-1.339s.108.036.188.067c.08.03.765.293 1.493.497.604.168 1.863.422 2.848.422 2.796 0 5.407-1.083 7.352-3.05a10.332 10.332 0 0 0 2.988-7.308c0-.709-.075-1.416-.224-2.108Z">
                                </path>
                            </svg>
                            <div
                                class="absolute -right-1 -top-1 flex h-4 w-4 items-center justify-center rounded-full border-2 border-white bg-gray-700 text-gray-100">
                                <p class="text-[8px]">1</p>
                            </div>
                        </div>
                        <p class="hideName block pl-2 md:hidden">Chat</p>
                    </a>
                    <p class="rounded-lg bg-slate-200 px-4 py-1 text-xs font-normal md:hidden">1 Message</p>
                </div>
            @endauth

            <div
                class="{{ request()->routeIs('home') ? 'bg-gray-800 rounded-full text-white' : '' }} mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                <a wire:navigate href="{{ route('home') }}" class="flex items-center">
                    <div class="relative">
                        <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12.848 2.752a1.2 1.2 0 0 0-1.696 0l-8.4 8.4a1.2 1.2 0 0 0 1.696 1.696l.352-.351V20.4A1.2 1.2 0 0 0 6 21.6h2.4a1.2 1.2 0 0 0 1.2-1.2V18a1.2 1.2 0 0 1 1.2-1.2h2.4a1.2 1.2 0 0 1 1.2 1.2v2.4a1.2 1.2 0 0 0 1.2 1.2H18a1.2 1.2 0 0 0 1.2-1.2v-7.903l.352.351a1.2 1.2 0 0 0 1.696-1.696l-8.4-8.4Z">
                            </path>
                        </svg>
                    </div>
                    <p class="hideName block pl-2 md:hidden">Home</p>
                </a>
            </div>
            <div
                class="{{ request()->routeIs('user-search') ? 'bg-gray-800 rounded-full text-white' : '' }} mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                <a wire:navigate href="{{ route('user-search') }}" class="flex items-center">
                    <div class="relative">
                        <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M10.8 10.8a2.4 2.4 0 1 1 4.8 0 2.4 2.4 0 0 1-4.8 0Z"></path>
                            <path fill-rule="evenodd"
                                d="M12 21.6a9.6 9.6 0 1 0 0-19.2 9.6 9.6 0 0 0 0 19.2ZM13.2 6a4.8 4.8 0 0 0-4.135 7.238L6.352 15.95a1.2 1.2 0 0 0 1.696 1.698l2.714-2.713A4.8 4.8 0 1 0 13.2 6Z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <p class="hideName block pl-2 md:hidden">Search</p>
                </a>
            </div>
            <div
                class="{{ request()->routeIs('user-catalogue') ? 'bg-gray-800 rounded-full text-white' : '' }} mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                <a wire:navigate href="{{ route('user-catalogue') }}" class="flex items-center">
                    <div class="relative">
                        <svg width="25" height="25" fill="currentColor" viewBox="0 0 33 28">
                            <g clip-path="url(#clip0_549_3071)">
                                <path
                                    d="M30.7188 0.28125C26.0958 0.301667 22.6615 0.9375 20.175 2.03708C18.32 2.85813 17.5938 3.47792 17.5938 5.58083V27.625C20.436 25.0613 22.9575 24.3438 32.9062 24.3438V0.28125H30.7188Z"
                                    fill="#3D4448" />
                                <path
                                    d="M2.28125 0.28125C6.90417 0.301667 10.3385 0.9375 12.825 2.03708C14.68 2.85813 15.4062 3.47792 15.4062 5.58083V27.625C12.564 25.0613 10.0425 24.3438 0.09375 24.3438V0.28125H2.28125Z"
                                    fill="#3D4448" />
                            </g>
                            <defs>
                                <clipPath id="clip0_549_3071">
                                    <rect width="33" height="28" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <p class="hideName block pl-2 md:hidden">Catalogue</p>
                </a>
            </div>
            @auth
                {{-- bookmark --}}
                <div
                    class="{{ request()->routeIs('user-bookmark') ? 'bg-gray-800 rounded-full text-white' : '' }} mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a wire:navigate href="{{ route('user-bookmark') }}" class="flex items-center">
                        <div class="relative">
                            <svg class="relative" width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M6 21a1 1 0 0 1-.863-.496A1 1 0 0 1 5 20V5.33A2.28 2.28 0 0 1 7.2 3h9.6A2.28 2.28 0 0 1 19 5.33V20a1 1 0 0 1-1.5.86l-5.67-3.21-5.33 3.2A1 1 0 0 1 6 21Z">
                                </path>
                            </svg>
                        </div>
                        <p class="hideName block pl-2 md:hidden">Bookmark</p>
                    </a>
                </div>
                {{-- user --}}
                <div
                    class="{{ request()->routeIs('user.profile') ? 'bg-gray-800 rounded-full text-white' : '' }} mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a wire:navigate href="{{ route('user.profile') }}" class="flex items-center">
                        <div class="relative">
                            <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 3.75a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5Z"></path>
                                <path
                                    d="M8 13.25A3.75 3.75 0 0 0 4.25 17v1.188c0 .754.546 1.396 1.29 1.517 4.278.699 8.642.699 12.92 0a1.537 1.537 0 0 0 1.29-1.517V17A3.75 3.75 0 0 0 16 13.25h-.34c-.185 0-.369.03-.544.086l-.866.283a7.251 7.251 0 0 1-4.5 0l-.866-.283a1.752 1.752 0 0 0-.543-.086H8Z">
                                </path>
                            </svg>
                        </div>
                        <p class="hideName block pl-2 md:hidden">User</p>
                    </a>
                </div>
            @endauth

        </div>
    </section>
    <section>
        <div class="text-sm font-semibold">
            <div class="mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                <a href="" class="flex items-center">
                    <div class="relative">
                        <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 11.807A9.002 9.002 0 0 1 10.049 2a9.942 9.942 0 0 0-5.12 2.735c-3.905 3.905-3.905 10.237 0 14.142 3.906 3.906 10.237 3.905 14.143 0a9.946 9.946 0 0 0 2.735-5.119A9.004 9.004 0 0 1 12 11.807Z">
                            </path>
                        </svg>
                    </div>

                    <p class="hideName block pl-2 md:hidden">Dark</p>
                </a>
            </div>
            <div class="mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                <a href="" class="flex items-center">
                    <div class="relative">
                        <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2Zm1 16h-2v-2h2v2Zm.976-4.885c-.196.158-.385.309-.535.459-.408.407-.44.777-.441.793v.133h-2v-.167c0-.118.029-1.177 1.026-2.174.195-.195.437-.393.691-.599.734-.595 1.216-1.029 1.216-1.627a1.934 1.934 0 0 0-3.867.001h-2A3.939 3.939 0 0 1 12 6a3.939 3.939 0 0 1 3.934 3.934c0 1.597-1.179 2.55-1.958 3.181Z">
                            </path>
                        </svg>
                    </div>
                    <p class="hideName block pl-2 md:hidden">Help</p>
                </a>
            </div>

            @auth
                <div class="mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <form action="{{ route('user.logout') }}" method="POST">
                        @csrf
                        <button class="flex items-center" type="submit">
                            <div class="relative">
                                <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M5 5v14a1 1 0 0 0 1 1h3v-2H7V6h2V4H6a1 1 0 0 0-1 1Zm14.242-.97-8-2A1 1 0 0 0 10 3v18a.999.999 0 0 0 1.242.97l8-2A1 1 0 0 0 20 19V5a1 1 0 0 0-.758-.97ZM15 12.188a1 1 0 0 1-2 0v-.377a1 1 0 1 1 2 0v.377Z">
                                    </path>
                                </svg>
                            </div>
                            <p class="hideName block pl-2 md:hidden">LogOut</p>
                        </button>
                    </form>
                </div>
            @endauth

        </div>
    </section>
</nav>
