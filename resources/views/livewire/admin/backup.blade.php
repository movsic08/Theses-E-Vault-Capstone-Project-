<x-app-layout>

    @section('title', 'Profile')
    {{-- @dd(auth()->user()) --}}
    <div class="container">
        <x-session_flash />
    </div>
    <div class="md:container">
        @if ($checkedAccount !== null)
            <div class="mx-2 mt-6 rounded-md bg-slate-50 p-8 drop-shadow-md">
                <div
                    class="flex h-full w-full justify-between rounded-sm border border-slate-200 bg-white drop-shadow-sm">
                    <div class="h-[20%] w-[20%] flex-grow">
                        <img class="" src="{{ asset('assets/default_profile.png') }}" alt="UserProfile"
                            srcset="">
                    </div>
                    <div class="h-fit w-[80%] p-8">
                        <div class="leading-tight">
                            <h1 class="text-[4rem] font-black text-gray-800">Elmer Tirao</h1>
                            <h2 class="-mt-4 font-semibold">@username</h2>
                        </div>

                        <h1 class="mt-4 w-fit rounded-md bg-blue-300 p-2 font-semibold text-blue-800">Bachelor of
                            Science in
                            Information
                            Technology</h1>
                        <h2 class="font-semibold">3rd year - Block B</h2>
                        <div class="mt-2 flex w-full items-center justify-end">
                            @if (auth()->check() && auth()->user()->id === $currentUserId)
                                <a wire:navigate href="{{ route('edit-profile', ['tab' => '1']) }}"
                                    class="w-fit rounded-md bg-blue-700 p-2 text-center text-white">Edit profile</a>
                            @else
                                <button class="rounded-md bg-primary-color p-2 text-white">Message</button>
                            @endif
                        </div>
                    </div>
                </div>
                <h2>Hello</h2>
            </div>
        @else
            <div class="bg-white">
                <h2>No account found</h2>
            </div>
        @endif
    </div>
</x-app-layout>
