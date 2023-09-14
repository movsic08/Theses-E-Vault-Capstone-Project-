<section
    class="md:gradient-bg-light sticky top-0 z-30 bg-slate-100 bg-opacity-70 backdrop-blur-md md:px-7 md:py-1 lg:px-7">
    <div
        class="container top-0 flex w-full items-center justify-between px-7 py-2 text-base font-semibold text-blue-950 md:px-2">
        @php
            $currentHour = now()->format('g');
            
            if ($currentHour >= 5 && $currentHour < 12) {
                $greeting = 'evening';
            } elseif ($currentHour >= 12 && $currentHour < 18) {
                $greeting = 'afternoon';
            } else {
                $greeting = 'Morning';
            }
        @endphp
        <h1 class="">Good {{ $greeting }},
            @auth
                @if (empty(auth()->user()->first_name))
                    {{ auth()->user()->username }}
                @else
                    {{ auth()->user()->first_name }}!
                @endif
            @endauth
            @guest
                Guest!
            @endguest
        </h1>
        <div class="flex flex-row items-center justify-center">
            @if (empty(auth()->user()->staff_id))
                <h1 class="hidden md:block">User</h1>
            @else
                <h1 class="hidden md:block"> {{ auth()->user()->username }}</h1>
                @if (auth()->user()->profile_picture)
                    <img class="h-7 w-7 rounded-full object-cover md:mx-2"
                        src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture">
                @else
                    <img class="h-7 w-7 rounded-full object-cover md:mx-2"
                        src="{{ asset('assets/default_profile.png') }}" alt="Default Profile Picture">
                @endif
            @endif
            <button id="left-btn" class="ml-2 md:hidden">
                <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M4 6h16v2H4V6Zm4 5h12v2H8v-2Zm5 5h7v2h-7v-2Z"></path>
                </svg>
            </button>
            <button id="menu-hide-btn" class="ml-2 hidden md:hidden">
                <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242-1.414-1.414Z">
                    </path>
                </svg>
            </button>
        </div>
    </div>
    {{-- mobile version --}}
    <div class="relative">
        <div id="mobileMenu" class="absolute hidden h-auto w-screen bg-slate-100 backdrop-blur-sm">
            <div class="text-sm font-semibold">
                <div id="sample"
                    class="div-container mx-1 mb-2 flex items-center justify-between rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a href="" class="flex items-center">
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
                        <div class="ml-2 flex flex-col">
                            <p class="hideName block md:hidden">Notification</p>
                        </div>
                    </a>
                    <p id="msgCount" class="rounded-lg bg-slate-200 px-4 py-1 text-xs font-normal md:hidden">1
                        Notification</p>
                </div>

                <div
                    class="mx-1 my-2 flex flex-row items-center justify-between rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a href="" class="flex items-center">
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
                <div class="mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a href="{{ route('home') }}" class="flex items-center">
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
                <div class="mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a href="" class="flex items-center">
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
                <div class="mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a href="" class="flex items-center">
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
                @auth
                    <div class="mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                        <a href="{{ route('user.profile') }}" class="flex items-center">
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
            <div>
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
                    @else
                    @endauth
                </div>
            </div>

        </div>
    </div>


</section>
