<div class="md:gradient-bg-light container sticky top-0 z-30 w-full bg-slate-100 bg-opacity-70 backdrop-blur-md">
    <div class="container flex w-full items-center justify-between p-4 text-base font-semibold text-blue-950">
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
                <h1 class="hidden md:block">Admin</h1>
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

    <div id="mobileMenu" class="absolute hidden h-fit w-full bg-slate-100 bg-opacity-10 backdrop-blur-md">
        <div class="bg-slate-700 bg-opacity-20 backdrop-blur-sm">
            <h2>i am moile bersion</h2>
        </div>
    </div>


</div>
