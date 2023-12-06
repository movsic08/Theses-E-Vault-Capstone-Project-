<div class="mx-2 mb-6">
    {{-- upload picture --}}
    {{-- @if ($uploadProfileBox)
        <div class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-500 bg-opacity-25 backdrop-blur-sm"
            x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
            x-on:livewire-upload-finish="uploading = false; progress = 0"
            x-on:livewire-upload-error="uploading = false; progress = 0"
            x-on:livewire-upload-progress="progress = $event.detail.progress">
            <div
                class="relative mx-3 mt-14 flex w-fit flex-col gap-1 rounded-md bg-white px-10 py-5 text-center md:w-2/5">
                <svg wire:click='showProfileUpload' class="absolute right-6 top-4 h-8 text-red-500" fill="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M22 12a10 10 0 1 1-20 0 10 10 0 0 1 20 0ZM8.693 7.808a.626.626 0 1 0-.885.885L11.116 12l-3.308 3.307a.626.626 0 1 0 .885.885L12 12.884l3.307 3.308a.627.627 0 0 0 .885-.885L12.884 12l3.308-3.307a.627.627 0 0 0-.885-.885L12 11.116 8.693 7.808Z">
                    </path>
                </svg>
                <h2 class="">Upload profile picture</h2>
                <form wire:submit.prevent='changeProfile' class="relative flex flex-col items-center justify-center">
                    <div class="relative">
                        @if ($user->profile_picture)
                            <img class="h-[10rem] w-[10rem] rounded-full object-cover"
                                src="{{ $profile_picture ? $profile_picture->temporaryUrl() : asset('storage/' . $user->profile_picture) }}"
                                alt="Profile Picture" />
                        @else
                            <img class="h-[10rem] w-[10rem] rounded-full object-cover"
                                src="{{ $profile_picture ? $profile_picture->temporaryUrl() : asset('assets/default_profile.png') }}"
                                alt="Default Profile Picture" />
                        @endif
                        <div
                            class="absolute bottom-[0.6rem] left-[7.5rem] h-8 w-8 rounded-full bg-blue-600 p-1 text-white duration-300 hover:h-9 hover:w-9 hover:bg-blue-800">
                            <label for="dp">
                                <svg class="cursor-pointer" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9.75 13a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0Z"></path>
                                    <path fill-rule="evenodd"
                                        d="M7.474 7.642A3.142 3.142 0 0 1 10.616 4.5h2.768a3.143 3.143 0 0 1 3.142 3.142.03.03 0 0 0 .026.029l2.23.18c.999.082 1.82.82 2.007 1.805a22.07 22.07 0 0 1 .104 7.613l-.097.604a2.505 2.505 0 0 1-2.27 2.099l-1.943.157a56.61 56.61 0 0 1-9.166 0l-1.943-.157a2.505 2.505 0 0 1-2.27-2.1l-.097-.603c-.407-2.525-.371-5.1.104-7.613a2.226 2.226 0 0 1 2.007-1.804l2.23-.181a.028.028 0 0 0 .026-.029ZM12 9.25a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </label>
                            <input accept="image/png, image/jpeg" wire:model="profile_picture" type="file"
                                id="dp" hidden />
                        </div>
                    </div>
                    @error('profile_picture')
                        <small class="my-1 text-red-500">{{ $message }}</small>
                    @enderror
                    <button class="mt-4 rounded-md bg-primary-color p-1 text-white" type="submit">Finalize</button>
                </form>
                <div x-show="uploading" x-cloak>
                    <div class="h-2 overflow-hidden rounded-full bg-gray-200">
                        <div class="h-4 rounded-full bg-gradient-to-r from-green-500 to-blue-500"
                            :style="'width: ' + progress + '%'"></div>
                    </div>
                    <div class="mt-2">Uploading...</div>
                </div>
                <div x-show="!uploading && progress > 0" x-cloak>
                    Upload complete!
                </div>
            </div>
        </div>

    @endif --}}
    @include('livewire.partials.editProfilePartials.upload-profile')

    @include('livewire.partials.editProfilePartials.user-view-edit-docu')
    {{-- confirmation delete box --}}
    @include('livewire.partials.editProfilePartials.delete-account-box')

    {{-- box for otp --}}
    @include('livewire.partials.editProfilePartials.verify-account-otp')


    <div x-data="{ deleteFile: false }" x-show="deleteFile" x-on:open-df.window="deleteFile = true"
        x-on:close-df.window="deleteFile = false" x-on:keydown.escape.window="deleteFile = false"
        x-transition:enter.duration.400ms x-transition:leave.duration.300ms @click.away="deleteFile = false"
        class="fixed inset-0 z-50 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm"
        style="display: none">
        <div
            class="mx-3 mt-16 flex w-fit flex-col gap-1 rounded-xl bg-white px-10 py-8 text-center text-gray-600 drop-shadow-lg md:w-3/5 lg:w-4/12">
            <h2><strong>Are you sure you want to delete your uploaded document?</strong></h2>
            <form action="" wire:submit="deleteDocuPostYes">
                <input type="text" hidden wire:model="userPostID" value="{{ $userPostID }}">
                <h1>{{ $postitle }}</h1>
                <div class="mt-4 flex w-full flex-col items-center justify-center gap-2 md:flex-row">
                    <div class="w-full cursor-pointer rounded-md border border-red-700 bg-white p-2 duration-200 hover:bg-red-100"
                        @click=" deleteFile  = false ">Close</div>
                    <button
                        class="w-full rounded-md bg-red-700 p-2 text-white duration-300 ease-in-out hover:bg-red-900"
                        type="submit">Yes</button>
                </div>
            </form>
        </div>
    </div>


    <x-session_flash />
    <div class="container mb-4">
        <h1 class="font-bold text-primary-color dark:text-slate-100">Account information</h1>
    </div>

    <section class="container flex flex-col gap-6 lg:flex-row">
        @include('livewire.partials.editProfilePartials.account-info-box')
        <section class="w-full lg:w-3/5">
            <div
                class="flex flex-row gap-6 rounded-t-lg border-b border-gray-300 bg-white px-8 text-gray-600 dark:bg-slate-800 dark:text-slate-100 md:gap-10 lg:gap-14">
                <button wire:click="setActiveTab('tab1')"
                    class="{{ $activeTab === 'tab1' ? 'border-b-4 text-primary-color dark:border-slate-400 dark:text-slate-300 border-primary-color py-3 pt-5 font-bold' : '' }}">
                    General
                </button>
                <button wire:click="setActiveTab('tab2')"
                    class="{{ $activeTab === 'tab2' ? 'border-b-4 text-primary-color dark:border-slate-400 dark:text-slate-300 border-primary-color py-3 pt-5 font-bold' : '' }}">
                    Security
                </button>
                <button wire:click="setActiveTab('tab3')"
                    class="{{ $activeTab === 'tab3' ? 'border-b-4 text-primary-color dark:border-slate-400 dark:text-slate-300 border-primary-color py-3 pt-5 font-bold' : '' }}">
                    Links
                </button>
                <button wire:click="setActiveTab('tab4')"
                    class="{{ $activeTab === 'tab4' ? 'border-b-4 text-primary-color dark:border-slate-400 dark:text-slate-300 border-primary-color py-3 pt-5 font-bold' : '' }}">
                    Files
                </button>
            </div>
            <div>
                @if ($activeTab === 'tab1')
                    {{-- tab for general --}}
                    @include('livewire.partials.editProfilePartials.general-tab')
                @elseif ($activeTab === 'tab2')
                    {{-- tab for security --}}
                    @include('livewire.partials.editProfilePartials.security-tab')
                @elseif ($activeTab === 'tab3')
                    @include('livewire.partials.editProfilePartials.link-tab')
                @elseif ($activeTab === 'tab4')
                    {{-- files tab --}}
                    @include('livewire.partials.editProfilePartials.file-tab')
                @endif
            </div>
        </section>
    </section>
</div>
