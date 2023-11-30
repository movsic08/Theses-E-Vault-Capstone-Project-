<nav id="sidebar-nav"
    class="sticky left-full top-0 z-50 hidden h-screen max-h-screen w-auto bg-white bg-opacity-100 text-gray-700 drop-shadow-xl backdrop-blur-sm dark:bg-red-900 md:left-0 md:flex md:h-screen md:w-14 md:flex-col md:justify-between md:rounded-r-xl">
    {{-- LOGO AND NAME AND FEATURE CONTAINER --}}
    <div class="">
        <div>
            <div class="flex items-center justify-between space-x-1 p-4">
                <img height="30" width="30" src="{{ asset('icons/logo.svg') }}" alt="logo" srcset="">
                <h1 class="hideName block text-sm md:hidden">ThesisKIosk</h1>
                <button id="sidebarBtn" class="absolute -right-7 z-40 hidden md:block">
                    <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2a10 10 0 1 1 0 20 10 10 0 0 1 0-20Zm-4.375 9.375a.625.625 0 1 0 0 1.25h7.241l-2.684 2.682a.627.627 0 0 0 .886.885l3.75-3.75a.625.625 0 0 0 0-.885l-3.75-3.75a.626.626 0 1 0-.886.886l2.684 2.682H7.625Z">
                        </path>
                    </svg>
                </button>
            </div>
            {{-- home --}}
            <div
                class="{{ request()->routeIs('admin-home') ? 'bg-slate-200  ' : 'hover:bg-slate-300' }} mx-1 my-2 rounded-xl p-1 px-3 py-2.5 duration-500">
                <a wire:navigate href="{{ route('admin-home') }}" class="flex items-center">
                    <div class="relative">
                        <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12.848 2.752a1.2 1.2 0 0 0-1.696 0l-8.4 8.4a1.2 1.2 0 0 0 1.696 1.696l.352-.351V20.4A1.2 1.2 0 0 0 6 21.6h2.4a1.2 1.2 0 0 0 1.2-1.2V18a1.2 1.2 0 0 1 1.2-1.2h2.4a1.2 1.2 0 0 1 1.2 1.2v2.4a1.2 1.2 0 0 0 1.2 1.2H18a1.2 1.2 0 0 0 1.2-1.2v-7.903l.352.351a1.2 1.2 0 0 0 1.696-1.696l-8.4-8.4Z">
                            </path>
                        </svg>
                    </div>
                    <p class="hideName block pl-2 text-sm md:hidden">Home</p>
                </a>
            </div>
            {{-- users --}}
            <div
                class="{{ request()->routeIs('admin-users-panel') ? 'bg-slate-200 ' : 'hover:bg-slate-300' }} mx-1 my-2 rounded-xl p-1 px-3 py-2.5 duration-500">
                <a wire:navigate href="{{ route('admin-users-panel') }}" class="flex items-center">
                    <div class="relative">
                        <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M10.8 19.2s-1.2 0-1.2-1.2 1.2-4.8 6-4.8 6 3.6 6 4.8c0 1.2-1.2 1.2-1.2 1.2h-9.6Zm4.8-7.2a3.6 3.6 0 1 0 0-7.2 3.6 3.6 0 0 0 0 7.2Z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M8.66 19.2A2.685 2.685 0 0 1 8.4 18c0-1.626.816-3.3 2.324-4.464A7.592 7.592 0 0 0 8.4 13.2c-4.8 0-6 3.6-6 4.8 0 1.2 1.2 1.2 1.2 1.2h5.06Z"
                                clip-rule="evenodd"></path>
                            <path d="M7.8 12a3 3 0 1 0 .001-6 3 3 0 0 0 0 6Z"></path>
                        </svg>
                    </div>
                    <p class="hideName block pl-2 text-sm md:hidden">Users</p>
                </a>
            </div>
            {{-- analyics --}}
            <div
                class="{{ request()->routeIs('admin-analytics') ? 'bg-slate-200 ' : 'hover:bg-slate-300' }} mx-1 my-2 rounded-xl p-1 px-3 py-2.5 duration-500">
                <a wire:navigate href="{{ route('admin-analytics') }}" class="flex items-center">
                    <div class="relative">
                        <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 6h2v14H9V6Zm4 2h2v12h-2V8Zm4-4h2v16h-2V4ZM5 12h2v8H5v-8Z"></path>
                        </svg>
                    </div>
                    <p class="hideName block pl-2 text-sm md:hidden">Analytics</p>
                </a>
            </div>
            {{-- add documents --}}
            <div
                class="{{ request()->routeIs('admin-docu-post-panel') ? 'bg-slate-200 ' : 'hover:bg-slate-300' }} mx-1 my-2 rounded-xl p-1 px-3 py-2.5 duration-500">
                <a wire:navigate href="{{ route('admin-docu-post-panel') }}" class="flex items-center">
                    <div class="relative">
                        <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M14.25 2.5a.25.25 0 0 0-.25-.25H7A2.75 2.75 0 0 0 4.25 5v14A2.75 2.75 0 0 0 7 21.75h10A2.75 2.75 0 0 0 19.75 19V9.147a.25.25 0 0 0-.25-.25H15a.75.75 0 0 1-.75-.75V2.5Zm-.219 10.836a.75.75 0 0 0 .938-1.172l-2.494-1.995a.747.747 0 0 0-.473-.169h-.008a.747.747 0 0 0-.465.166l-2.497 1.998a.75.75 0 0 0 .937 1.172l1.281-1.026v3.44a.75.75 0 1 0 1.5 0v-3.44l1.281 1.026Z"
                                clip-rule="evenodd"></path>
                            <path
                                d="M15.75 2.824c0-.184.193-.301.336-.186.121.098.23.212.323.342l3.013 4.197c.068.096-.006.22-.124.22H16a.25.25 0 0 1-.25-.25V2.824Z">
                            </path>
                        </svg>
                    </div>
                    <p class="hideName block pl-2 text-sm md:hidden">Add docu</p>
                </a>
            </div>
            {{-- add documents --}}
            <div
                class="{{ request()->routeIs('admin-reported-comments') ? 'bg-slate-200 ' : 'hover:bg-slate-300' }} mx-1 my-2 rounded-xl p-1 px-3 py-2.5 duration-500">
                <a wire:navigate href="{{ route('admin-reported-comments') }}" class="flex items-center">
                    <div class="relative">
                        <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 2H4c-1.103 0-2 .897-2 2v18l4-4h14c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2Zm-7 13h-2v-2h2v2Zm0-4h-2V5h2v6Z">
                            </path>
                        </svg>
                    </div>
                    <p class="hideName block pl-2 text-sm md:hidden">Add docu</p>
                </a>
            </div>

            <div class="text-sm font-semibold">


                {{-- setting area --}}
                <div
                    class="{{ request()->routeIs('admin-system-setting') ? 'bg-slate-200 ' : 'hover:bg-slate-300' }} mx-1 my-2 flex flex-row items-center justify-between rounded-xl p-1 px-3 py-2.5 duration-500">
                    <a wire:navigate href="{{ route('admin-system-setting', ['tab' => 'profile']) }}"
                        class="flex items-center">
                        <div class="relative">
                            <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M10.835 2.908c.303-1.212 2.025-1.212 2.33 0l.088.358a1.2 1.2 0 0 0 2.028.542l.256-.263c.869-.9 2.36-.038 2.016 1.163l-.1.355a1.2 1.2 0 0 0 1.484 1.484l.354-.101c1.2-.344 2.062 1.147 1.164 2.016l-.264.256a1.2 1.2 0 0 0 .542 2.028l.358.089c1.212.303 1.212 2.025 0 2.33l-.358.088a1.202 1.202 0 0 0-.542 2.028l.264.256c.898.869.037 2.36-1.164 2.016l-.355-.1a1.2 1.2 0 0 0-1.484 1.484l.101.354c.344 1.2-1.147 2.062-2.016 1.164l-.256-.264a1.201 1.201 0 0 0-2.028.542l-.088.358c-.304 1.212-2.025 1.212-2.33 0l-.09-.358a1.202 1.202 0 0 0-2.027-.542l-.256.264c-.869.898-2.36.037-2.016-1.164l.1-.355a1.2 1.2 0 0 0-1.483-1.484l-.355.101c-1.2.344-2.062-1.147-1.163-2.016l.263-.256a1.2 1.2 0 0 0-.542-2.028l-.358-.088c-1.212-.304-1.212-2.025 0-2.33l.358-.09a1.2 1.2 0 0 0 .542-2.027l-.263-.256c-.9-.869-.038-2.36 1.163-2.016l.355.1a1.2 1.2 0 0 0 1.484-1.483l-.101-.355c-.344-1.2 1.147-2.062 2.016-1.163l.256.263a1.2 1.2 0 0 0 2.028-.542l.089-.358Zm7.38 9.717h-5.903L8.77 17.348a6.245 6.245 0 0 0 9.446-4.723Zm0-1.25A6.247 6.247 0 0 0 8.77 6.65l3.542 4.725h5.904v-.001ZM8.31 6.958c-.038.027-.073.054-.11.082l.11-.082Zm-.54.444A6.23 6.23 0 0 0 5.753 12c0 1.818.778 3.456 2.019 4.597L11.218 12 7.771 7.402Zm.43 9.558.11.08-.11-.08Z">
                                </path>
                            </svg>
                        </div>
                        <p class="hideName block pl-2 text-sm md:hidden">Chat</p>
                    </a>
                    <p class="rounded-lg bg-slate-200 px-4 py-1 text-xs font-normal md:hidden">1 Message</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Setting --}}
    <div>
        <div class="text-sm font-semibold">
            {{-- <div class="mx-1 my-2 rounded-xl p-1 px-3 py-2.5 duration-500">
                <a wire:navigate href="" class="flex items-center">
                    <div class="relative">
                        <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 11.807A9.002 9.002 0 0 1 10.049 2a9.942 9.942 0 0 0-5.12 2.735c-3.905 3.905-3.905 10.237 0 14.142 3.906 3.906 10.237 3.905 14.143 0a9.946 9.946 0 0 0 2.735-5.119A9.004 9.004 0 0 1 12 11.807Z">
                            </path>
                        </svg>
                    </div>

                    <p class="hideName block pl-2 text-sm md:hidden">Dark</p>
                </a>
            </div> --}}


            @auth
                <div class="mx-1 my-2 rounded-xl p-1 px-3 py-2.5 duration-500">
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
                            <p class="hideName block pl-2 text-sm md:hidden">LogOut</p>
                        </button>
                    </form>
                </div>
            @endauth

        </div>
    </div>
</nav>
