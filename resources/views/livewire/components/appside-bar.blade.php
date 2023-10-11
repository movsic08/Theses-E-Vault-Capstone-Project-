<div class="relative hidden md:block">
    <script src="{{ asset('js/sideBar.js') }}"></script>
    <div class="sticky top-0 z-50">
        <button id="sidebarBtn" class="absolute -right-4 top-4 hidden text-gray-600 md:block">
            <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M12 2a10 10 0 1 1 0 20 10 10 0 0 1 0-20Zm-4.375 9.375a.625.625 0 1 0 0 1.25h7.241l-2.684 2.682a.627.627 0 0 0 .886.885l3.75-3.75a.625.625 0 0 0 0-.885l-3.75-3.75a.626.626 0 1 0-.886.886l2.684 2.682H7.625Z">
                </path>
            </svg>
        </button>
    </div>
    <nav id="sidebar-nav"
        class="sticky bottom-0 left-0 top-0 z-40 flex h-screen w-[4rem] flex-col items-center justify-between rounded-r-xl bg-white p-2 drop-shadow-2xl lg:p-3">
        {{-- app name and logo --}}
        <section class="items-center-remover flex flex-col">
            <a wire:navigate href="{{ route('index') }}" class="relative flex p-2">
                <div class="relative w-fit">
                    <img class="max-h-[2rem] min-h-[2rem] min-w-[2rem] max-w-[2rem]" src="{{ asset('icons/logo.svg') }}"
                        alt="logo" srcset="">
                </div>
                <p class="hideName block pl-2 text-sm md:hidden">Thesis Kiosk</p>
            </a>

            {{-- main features  --}}
            {{-- notifction --}}
            <div class="items-center-remover flex flex-col items-center gap-3 pt-2">
                @auth
                    <a wire:navigate href="{{ route('user-notification') }}"
                        class="{{ request()->routeIs('user-notification') ? ' bg-slate-200' : 'hover:bg-slate-300  duration-500 ease-in-out' }} relative flex rounded-xl p-2">
                        <div class="relative w-fit">
                            <svg class="h-6 w-6 text-gray-700" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
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
                    {{-- message --}}
                    <a wire:navigate href="{{ route('user-messages') }}"
                        class="{{ request()->routeIs('user-messages') ? ' bg-slate-200' : 'hover:bg-slate-300  duration-500 ease-in-out' }} flex items-center rounded-xl p-2">
                        <div class="relative">
                            <svg class="h-6 w-6 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.276 9.68a10.281 10.281 0 0 0-3.62-5.844A10.66 10.66 0 0 0 11.992 1.5c-2.856 0-5.523 1.1-7.517 3.098C2.548 6.531 1.492 9.083 1.5 11.783c0 1.98.581 3.915 1.671 5.567l.204.283L2.25 22.5l5.381-1.339s.108.036.188.067c.08.03.765.293 1.493.497.604.168 1.863.422 2.848.422 2.796 0 5.407-1.083 7.352-3.05a10.332 10.332 0 0 0 2.988-7.308c0-.709-.075-1.416-.224-2.108Z">
                                </path>
                            </svg>
                            <div
                                class="absolute -right-1 -top-1 flex h-4 w-4 items-center justify-center rounded-full border-2 border-white bg-gray-700 text-gray-100">
                                <p class="text-[8px]">1</p>
                            </div>
                        </div>
                        <p class="hideName block pl-2 md:hidden">Messages</p>
                    </a>
                @endauth
                {{-- HOME --}}
                <a wire:navigate href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? ' bg-slate-200' : 'hover:bg-slate-300  duration-500 ease-in-out' }} flex items-center rounded-xl p-2">
                    <div class="relative">
                        <svg class="h-6 w-6 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12.848 2.752a1.2 1.2 0 0 0-1.696 0l-8.4 8.4a1.2 1.2 0 0 0 1.696 1.696l.352-.351V20.4A1.2 1.2 0 0 0 6 21.6h2.4a1.2 1.2 0 0 0 1.2-1.2V18a1.2 1.2 0 0 1 1.2-1.2h2.4a1.2 1.2 0 0 1 1.2 1.2v2.4a1.2 1.2 0 0 0 1.2 1.2H18a1.2 1.2 0 0 0 1.2-1.2v-7.903l.352.351a1.2 1.2 0 0 0 1.696-1.696l-8.4-8.4Z">
                            </path>
                        </svg>
                    </div>
                    <p class="hideName block pl-2 md:hidden">Home</p>
                </a>
                {{-- search --}}
                <a wire:navigate href="{{ route('user-search') }}"
                    class="{{ request()->routeIs('user-search') ? ' bg-slate-200' : 'hover:bg-slate-300  duration-500 ease-in-out' }} flex items-center rounded-xl p-2">
                    <div class="relative">
                        <svg class="h-6 w-6 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M10.8 10.8a2.4 2.4 0 1 1 4.8 0 2.4 2.4 0 0 1-4.8 0Z"></path>
                            <path fill-rule="evenodd"
                                d="M12 21.6a9.6 9.6 0 1 0 0-19.2 9.6 9.6 0 0 0 0 19.2ZM13.2 6a4.8 4.8 0 0 0-4.135 7.238L6.352 15.95a1.2 1.2 0 0 0 1.696 1.698l2.714-2.713A4.8 4.8 0 1 0 13.2 6Z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <p class="hideName block pl-2 md:hidden">Search</p>
                </a>
                {{-- catalogue --}}
                <a wire:navigate href="{{ route('user-catalogue') }}"
                    class="{{ request()->routeIs('user-catalogue') ? ' bg-slate-200' : 'hover:bg-slate-300  duration-500 ease-in-out' }} flex items-center rounded-xl p-2">
                    <div class="relative flex items-center justify-center">
                        <svg class="h-6 w-6 text-gray-700" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 4.837c-1.182-1.016-2.895-1.168-4.455-1.012-1.817.184-3.65.807-4.793 1.326a.6.6 0 0 0-.352.546v13.2a.6.6 0 0 0 .849.546c1.058-.48 2.763-1.057 4.416-1.224 1.69-.17 3.108.105 3.867 1.053a.6.6 0 0 0 .936 0c.76-.948 2.177-1.223 3.867-1.053 1.653.167 3.36.744 4.417 1.224a.6.6 0 0 0 .848-.546v-13.2a.6.6 0 0 0-.351-.546c-1.143-.52-2.976-1.142-4.793-1.326-1.56-.157-3.274-.004-4.456 1.012Z">
                            </path>
                        </svg>
                    </div>
                    <p class="hideName block pl-2 md:hidden">Catologue</p>
                </a>
                {{-- bookmark --}}
                <a wire:navigate href="{{ route('user-bookmark') }}"
                    class="{{ request()->routeIs('user-bookmark') ? ' bg-slate-200' : 'hover:bg-slate-300  duration-500 ease-in-out' }} flex items-center rounded-xl p-2">
                    <div class="relative">
                        <svg class="h-6 w-6 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M6 21a1 1 0 0 1-.863-.496A1 1 0 0 1 5 20V5.33A2.28 2.28 0 0 1 7.2 3h9.6A2.28 2.28 0 0 1 19 5.33V20a1 1 0 0 1-1.5.86l-5.67-3.21-5.33 3.2A1 1 0 0 1 6 21Z">
                            </path>
                        </svg>
                    </div>
                    <p class="hideName block pl-2 md:hidden">Bookmark</p>
                </a>
                @auth
                    {{-- user/profile --}}
                    <a wire:navigate href="{{ route('user-profile', ['username' => auth()->user()->username]) }}"
                        class="{{ request()->routeIs('user-profile') && request()->route('username') === auth()->user()->username ? ' bg-slate-200' : 'hover:bg-slate-300  duration-500 ease-in-out' }} flex items-center rounded-xl p-2">
                        <div class="relative">
                            <svg class="h-6 w-6 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 3.75a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5Z"></path>
                                <path
                                    d="M8 13.25A3.75 3.75 0 0 0 4.25 17v1.188c0 .754.546 1.396 1.29 1.517 4.278.699 8.642.699 12.92 0a1.537 1.537 0 0 0 1.29-1.517V17A3.75 3.75 0 0 0 16 13.25h-.34c-.185 0-.369.03-.544.086l-.866.283a7.251 7.251 0 0 1-4.5 0l-.866-.283a1.752 1.752 0 0 0-.543-.086H8Z">
                                </path>
                            </svg>
                        </div>
                        <p class="hideName block pl-2 md:hidden">User</p>
                    </a>
                @endauth
            </div>
        </section>
        {{-- lower --}}
        <div class="items-center-remover flex flex-col gap-3 pt-2">
            <a wire:navigate href=""
                class="{{ request()->routeIs('') ? ' bg-slate-200' : 'hover:bg-slate-300  duration-500 ease-in-out' }} relative flex rounded-xl p-2">
                <div class="relative w-fit">
                    <svg class="h-6 w-6 text-gray-700" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 11.807A9.002 9.002 0 0 1 10.049 2a9.942 9.942 0 0 0-5.12 2.735c-3.905 3.905-3.905 10.237 0 14.142 3.906 3.906 10.237 3.905 14.143 0a9.946 9.946 0 0 0 2.735-5.119A9.004 9.004 0 0 1 12 11.807Z">
                        </path>
                    </svg>
                </div>
                <p class="hideName block pl-2 md:hidden">Dark</p>
            </a>
            <a wire:navigate href="{{ route('help-and-support') }}"
                class="{{ request()->routeIs('help-and-support') ? ' bg-slate-200' : 'hover:bg-slate-300  duration-500 ease-in-out' }} relative flex rounded-xl p-2">
                <div class="relative w-fit">
                    <svg class="h-6 w-6 text-gray-700" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2Zm1 16h-2v-2h2v2Zm.976-4.885c-.196.158-.385.309-.535.459-.408.407-.44.777-.441.793v.133h-2v-.167c0-.118.029-1.177 1.026-2.174.195-.195.437-.393.691-.599.734-.595 1.216-1.029 1.216-1.627a1.934 1.934 0 0 0-3.867.001h-2A3.939 3.939 0 0 1 12 6a3.939 3.939 0 0 1 3.934 3.934c0 1.597-1.179 2.55-1.958 3.181Z">
                        </path>
                    </svg>
                </div>
                <p class="hideName block pl-2 md:hidden">Help</p>
            </a>
            @auth
                {{-- logout --}}
                <form action="{{ route('user.logout') }}"
                    class="flex cursor-pointer rounded-xl p-2 duration-500 ease-in-out hover:bg-slate-300" method="POST">
                    @csrf
                    <button type="submit">
                        <div class="relative">
                            <svg class="h-6 w-6 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M5 5v14a1 1 0 0 0 1 1h3v-2H7V6h2V4H6a1 1 0 0 0-1 1Zm14.242-.97-8-2A1 1 0 0 0 10 3v18a.999.999 0 0 0 1.242.97l8-2A1 1 0 0 0 20 19V5a1 1 0 0 0-.758-.97ZM15 12.188a1 1 0 0 1-2 0v-.377a1 1 0 1 1 2 0v.377Z">
                                </path>
                            </svg>
                        </div>
                        <p class="hideName block pl-2 md:hidden">LogOut</p>
                    </button>
                </form>
            @endauth
        </div>
    </nav>
</div>
