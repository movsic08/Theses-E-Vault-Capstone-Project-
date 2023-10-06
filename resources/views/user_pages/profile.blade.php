<x-app-layout>

    @section('title', 'Profile')
    {{-- @dd(auth()->user()) --}}
    <div class="container">
        <x-session_flash />
    </div>
    <div class="md:container">
        @if ($checkedAccount !== null)
            <div class="mx-2 mt-6 rounded-2xl bg-slate-50 px-12 py-8 drop-shadow-md">
                <div
                    class="flex h-full w-full flex-col justify-between rounded-sm border border-slate-200 bg-white drop-shadow-sm md:flex-row">
                    <div class="flex w-[25%] flex-grow items-center justify-center">
                        <img class="h-full w-full object-cover"
                            src="{{ $checkedAccount->profile_picture ? asset('storage/' . $checkedAccount->profile_picture) : asset('assets/default_profile.png') }}"
                            alt="UserProfile">
                    </div>
                    <div class="h-fit w-[80%] px-12 py-8">
                        <div class="leading-tight">
                            <h1 class="text-[4rem] font-black text-gray-800">{{ $fullName }}</h1>
                            <h2 class="-mt-4 font-semibold">{{ '@' . $checkedAccount->username }}</h2>
                        </div>

                        <h1 class="mt-4 w-fit rounded-md bg-blue-300 p-2 font-semibold text-blue-800">Bachelor of
                            Science in
                            Information
                            Technology</h1>
                        <h2 class="font-semibold">3rd year - Block B</h2>
                        <div class="mt-2 flex w-full items-center justify-end">
                            @if (auth()->user()->id === $currentUserId)
                                <a wire:navigate href="{{ route('edit-profile', ['activeTab' => 'tab1']) }}"
                                    class="w-fit rounded-md bg-blue-700 p-2 text-center text-white">Edit profile</a>
                            @else
                                <button class="rounded-md bg-primary-color p-2 text-white">Message</button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div x-data="{ activeTab: 'about' }">
                        <!-- Tab buttons -->
                        <ul class="flex space-x-4">
                            <li>
                                <button @click="activeTab = 'about'" class="p-2"
                                    :class="{
                                        'border-b-2 border-primary-color  font-bold': activeTab === 'about',
                                        'duration-400font-medium ease-in-out hover:rounded-md hover:bg-primary-color hover:text-white': activeTab ===
                                            !'about'
                                    }">
                                    About
                                </button>
                            </li>
                            <li>
                                <button @click="activeTab = 'post'" class="p-2"
                                    :class="{
                                        'border-b-2 border-primary-color  font-bold': activeTab === 'post',
                                        'duration-400font-medium ease-in-out hover:rounded-md hover:bg-primary-color hover:text-white': activeTab ===
                                            !'post'
                                    }">
                                    Posts
                                </button>
                            </li>
                            <li>
                                <button @click="activeTab = 'document'" class="p-2"
                                    :class="{
                                        'border-b-2 border-primary-color  font-bold': activeTab === 'document',
                                        'duration-400font-medium ease-in-out hover:rounded-md hover:bg-primary-color hover:text-white': activeTab ===
                                            !'document'
                                    }">
                                    Document
                                </button>
                            </li>
                        </ul>

                        <!-- Tab content -->
                        <div class="mt-3 flex w-full flex-col lg:flex-row" x-show="activeTab === 'about'">
                            <div class="w-full lg:w-1/2">one</div>
                            <div class="w-full lg:w-1/2">2</div>
                        </div>
                        <div class="mt-3" x-show="activeTab === 'post'">Posts content
                            goes here.</div>
                        <div class="mt-3" x-show="activeTab === 'document'">Documents
                            content goes here.</div>
                    </div>

                </div>
            </div>
        @else
            <div class="bg-white">
                <h2>No account found</h2>
            </div>
        @endif
    </div>
</x-app-layout>
