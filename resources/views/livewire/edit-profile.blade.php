<div>
    {{-- upload picture --}}
    @if ($uploadProfileBox)
        <div class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-500 bg-opacity-25 backdrop-blur-sm"
            x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
            x-on:livewire-upload-finish="uploading = false; progress = 0"
            x-on:livewire-upload-error="uploading = false; progress = 0"
            x-on:livewire-upload-progress="progress = $event.detail.progress">
            <div class="relative mx-3 flex w-fit flex-col gap-1 rounded-md bg-white px-10 py-5 text-center md:w-2/5">
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

    @endif

    {{-- confirmation delete box --}}
    @if ($showDeleteBox)
        <section id="deleteConfirmationBox" class="">
            <div
                class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-600 bg-opacity-25 backdrop-blur-sm">
                <div class="mx-3 flex w-fit flex-col gap-1 rounded-md bg-white px-10 py-5 text-center md:w-2/5">
                    <h1 class="text-lg font-bold text-gray-500">Woah, there!</h1>
                    <section class="text-sm text-red-700">
                        <p>
                            This action is irreversible and will permanently delete
                            all your data associated with this account. If you
                            proceed, you will lose access to your account and all
                            its contents. Please take a moment to consider this
                            decision. If you're certain about deleting your account,
                            click the "Delete Account" button below.
                        </p>
                    </section>
                    <div class="flex justify-center">
                        <input type="text" wire:model.live="confirmationInput" id="confirmInput"
                            class="rounded-md border border-gray-400 p-2" placeholder="Confirm, by typing DELETE"
                            id="" />
                        <div wire:loading.remove
                            class="{{ $confirmationInput ? '' : 'hidden' }} my-auto ml-2 flex h-8 w-8 items-center justify-center rounded-full bg-gray-200">
                            @if (!$confirmationInput)
                                <span class="hidden">Hidden content</span> <!-- Add hidden class -->
                            @elseif ($confirmationInput === 'DELETE')
                                ✅ <!-- Checkmark indicator -->
                            @else
                                ❌ <!-- X indicator -->
                            @endif
                        </div>
                        <div wire:loading>
                            <!-- Show loading spinner while checking input -->
                            <div class="my-auto ml-2 flex h-8 w-8 items-center justify-center rounded-full bg-gray-200">
                                <div class="h-4 w-4 animate-spin rounded-full border-t-2 border-primary-color"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex w-full flex-col gap-2 md:flex-row">
                        <button wire:click="showdelBox"
                            class="w-full rounded-md bg-gray-600 p-1 text-white duration-200 ease-in hover:bg-gray-700">
                            Cancel
                        </button>
                        <button
                            @if ($confirmationInput !== 'DELETE') @else
                         wire:click="deletemyAccount" @endif
                            id="confirmBTN"
                            class="{{ $confirmationInput === 'DELETE' ? 'bg-red-700 hover:bg-red-900' : 'bg-red-400' }} w-full rounded-md p-1 text-white"
                            @if ($confirmationInput !== 'DELETE' || !$confirmationInput) disabled @endif>
                            Yes, Delete it
                        </button>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($enterOtpBox)
        {{-- box for otp --}}
        <div
            class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-600 bg-opacity-25 backdrop-blur-sm">
            <div
                class="mx-3 flex w-fit flex-col gap-1 rounded-xl bg-white px-10 py-8 text-center text-gray-600 drop-shadow-lg">
                <img class="h-10" src="{{ asset('icons/logo.svg') }}" alt="Icon Description">
                <h1 class="font-bold">Enter verification code</h1>
                <h1 class="">We've send a code to <strong> {{ $verifyEmail }}</strong></h1>
                <form wire:submit="checkOtpInput">
                    <section class="flex flex-col items-center justify-center">
                        <label class="" for="">Enter the 6 letters to verify your account</label>
                        <div class="flex w-full flex-row justify-evenly capitalize">
                            @for ($i = 1; $i <= 6; $i++)
                                <input type="text"
                                    class="@error('input' . $i) border-red-600 @enderror h-10 w-10 rounded-md border-2 border-gray-300 text-center text-lg font-semibold capitalize focus:border-blue-400 focus:ring focus:ring-blue-200"
                                    maxlength="1" id="input{{ $i }}"
                                    wire:model.live="input{{ $i }}">
                            @endfor
                        </div>
                        @error('validateOtp')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                        @error('alreadySent')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                        <span>Didn't get a code? <button><Strong>Request new code</Strong></button></span>
                        <div class="flex w-full flex-col gap-3 md:flex-row">
                            <button wire:click="closeOtpBox"
                                class="w-full rounded-md border border-gray-400 p-1 text-gray-600 hover:bg-gray-600 hover:text-white">
                                Cancel
                            </button>
                            <button class="w-full rounded-md bg-blue-600 p-1 text-white hover:bg-blue-800"
                                wire:loading.attr="disabled">
                                Verify
                            </button>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    @endif

    @if ($verifiedBox)
        <div
            class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-600 bg-opacity-25 backdrop-blur-sm">
            <div
                class="mx-3 flex w-fit flex-col gap-1 rounded-xl bg-white px-10 py-8 text-center text-gray-600 drop-shadow-lg">
                <div class="flex items-center justify-center">
                    <svg width="46" height="46" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.52 4.146a3.68 3.68 0 0 0 2.094-.868 3.68 3.68 0 0 1 4.772 0 3.68 3.68 0 0 0 2.094.868 3.68 3.68 0 0 1 3.374 3.374 3.67 3.67 0 0 0 .868 2.094 3.68 3.68 0 0 1 0 4.772 3.679 3.679 0 0 0-.868 2.094 3.68 3.68 0 0 1-3.374 3.374 3.679 3.679 0 0 0-2.094.868 3.68 3.68 0 0 1-4.772 0 3.679 3.679 0 0 0-2.094-.868 3.68 3.68 0 0 1-3.374-3.374 3.68 3.68 0 0 0-.868-2.094 3.68 3.68 0 0 1 0-4.772 3.68 3.68 0 0 0 .868-2.094A3.68 3.68 0 0 1 7.52 4.146Zm8.928 6.302a1.2 1.2 0 0 0-1.696-1.696L10.8 12.703l-1.552-1.551a1.2 1.2 0 0 0-1.696 1.696l2.4 2.4a1.2 1.2 0 0 0 1.696 0l4.8-4.8Z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h1>Account Verified!</h1>
                <p>You have succesfully verified your acocunt.</p>
                <button wire:click="closeVerifiedBox"
                    class="w-full rounded-md border border-gray-400 p-1 text-gray-600 hover:bg-gray-600 hover:text-white">
                    Close
                </button>
            </div>
        </div>
    @endif

    @if ($showDeleteDocuPostBox)
        <div
            class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-600 bg-opacity-25 backdrop-blur-sm">
            <div
                class="mx-3 flex w-fit flex-col gap-1 rounded-xl bg-white px-10 py-8 text-center text-gray-600 drop-shadow-lg md:w-3/5 lg:w-4/12">
                <h2><strong>Are you sure you want to delete your uploaded document?</strong></h2>
                <form action="" wire:submit="deleteDocuPostYes">
                    <input type="text" hidden wire:model="deletedPostID " value="{{ $docuPostID }}">
                    <input type="text" hidden wire:model="userPostID" value="{{ $userPostID }}">
                    <h1><em>{{ $postitle }}</em></h1>
                    <h1> {{ $docuPostID }}</h1>
                    <div class="flex w-full flex-col items-center justify-center gap-2 md:flex-row">
                        <button
                            class="w-full rounded-md border border-red-700 bg-white p-2 duration-200 hover:bg-red-100"
                            wire:click.prevent="closeDeletePostBox">Close</button>
                        <button
                            class="w-full rounded-md bg-red-700 p-2 text-white duration-300 ease-in-out hover:bg-red-900"
                            type="submit">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <x-session_flash />
    <div class="container mb-4">
        <h1 class="font-bold">Account information</h1>
    </div>

    <section class="container flex flex-col gap-3 lg:flex-row">
        <section class="flex w-full flex-col gap-3 lg:w-2/5">
            <div class="flex min-h-[25.5rem] flex-col justify-between rounded-xl bg-white p-4 drop-shadow-lg">
                <div class="flex flex-col items-center justify-center gap-2">
                    <div class="relative">
                        @if ($user->profile_picture)
                            <img class="h-40 w-40 rounded-full object-cover"
                                src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" />
                        @else
                            <img class="h-40 w-40 rounded-full object-cover"
                                src="{{ asset('assets/default_profile.png') }}" alt="Default Profile Picture" />
                        @endif

                        <div
                            class="absolute bottom-0 right-3 h-8 w-8 rounded-full bg-blue-600 p-1 text-white duration-300 hover:h-9 hover:w-9 hover:bg-blue-800">
                            <svg wire:click='showProfileUpload' class="cursor-pointer" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M9.75 13a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0Z"></path>
                                <path fill-rule="evenodd"
                                    d="M7.474 7.642A3.142 3.142 0 0 1 10.616 4.5h2.768a3.143 3.143 0 0 1 3.142 3.142.03.03 0 0 0 .026.029l2.23.18c.999.082 1.82.82 2.007 1.805a22.07 22.07 0 0 1 .104 7.613l-.097.604a2.505 2.505 0 0 1-2.27 2.099l-1.943.157a56.61 56.61 0 0 1-9.166 0l-1.943-.157a2.505 2.505 0 0 1-2.27-2.1l-.097-.603c-.407-2.525-.371-5.1.104-7.613a2.226 2.226 0 0 1 2.007-1.804l2.23-.181a.028.028 0 0 0 .026-.029ZM12 9.25a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    @if ($user->first_name == null || $user->last_name == null)
                        <p class="text-red-500 md:ml-4">
                            Please complete editing your profile. <br />
                            <span>First and last name missing</span>
                        </p>
                    @else
                        <h3 class="font-semibold">
                            {{ $user->first_name }} {{ $user->last_name }}
                        </h3>
                    @endif
                </div>
                <div class="flex flex-col md:flex-row">
                    <p class="font-bold text-gray-700">Username</p>
                    @if ($user->username == null)
                        <p class="text-red-500 md:ml-4">Username is empty.</p>
                    @else
                        <p class="whitespace-normal text-gray-500 md:pl-4">
                            {{ $user->username }}
                        </p>
                    @endif
                </div>
                <div class="flex flex-col md:flex-row">
                    <p class="font-bold text-gray-700">Student ID</p>
                    @if ($user->student_id == null)
                        <p class="text-red-500 md:ml-4">Student ID is empty.</p>
                    @else
                        <p class="whitespace-normal text-gray-500 md:pl-4">
                            {{ $user->student_id }}
                        </p>
                    @endif
                </div>

                <div class="flex flex-col md:flex-row">
                    <p class="font-bold text-gray-700">Email</p>
                    <p class="whitespace-normal text-gray-500 md:pl-14">
                        {{ $user->email }}
                    </p>
                </div>
                <div class="flex flex-col md:flex-row">
                    <p class="font-bold text-gray-700">Phone</p>
                    @if ($user->phone_no == null)
                        <div class="text-red-500 md:ml-12">
                            Phone number is empty.
                        </div>
                    @else
                        <p class="whitespace-normal text-gray-500 md:pl-12">
                            {{ $user->phone_no }}
                        </p>
                    @endif
                </div>
                <div class="flex flex-col md:flex-row">
                    <p class="font-bold text-gray-700">Address</p>
                    @if ($user->address == null)
                        <p class="text-red-500 md:ml-8">Address is empty.</p>
                    @else
                        <p class="whitespace-normal text-gray-500 md:pl-8">
                            {{ $user->address }}
                        </p>
                    @endif
                </div>
                <div class="flex flex-col md:flex-row">
                    <p class="font-bold text-gray-700">Bachelor</p>
                    @if ($user->bachelor_degree === null)
                        <p class="text-red-500 md:ml-7">
                            Bachelor degree is empty.
                        </p>
                    @else
                        @php
                            $bachelorDegree = \App\Models\BachelorDegree::find($user->bachelor_degree);
                            
                        @endphp
                        @if ($bachelorDegree)
                            <p class="whitespace-normal text-gray-500 md:pl-7">
                                {{ $bachelorDegree->name }}
                            </p>
                        @else
                            <p class="text-red-500 md:ml-7">
                                Bachelor degree not found.
                            </p>
                        @endif
                    @endif
                </div>
            </div>
            <div class="flex gap-3">
                <div
                    class="flex h-16 w-full items-center justify-center rounded-lg bg-white p-4 drop-shadow-lg md:w-1/2">
                    <a class="flex items-center">Facebook</a>
                </div>
                <div class="flex h-16 w-1/2 items-center justify-center rounded-lg bg-white p-4 drop-shadow-lg">
                    <a class="flex items-center">Microsoft Team</a>
                </div>
            </div>
        </section>
        <section class="w-full lg:w-3/5">
            <div
                class="flex flex-row gap-6 rounded-t-lg border-b border-gray-300 bg-white px-8 text-gray-600 md:gap-10 lg:gap-14">
                <button wire:click="setActiveTab('tab1')"
                    class="{{ $activeTab === 'tab1' ? 'border-b-4 border-primary-color py-3 pt-5 font-bold' : '' }}">
                    General
                </button>
                <button wire:click="setActiveTab('tab2')"
                    class="{{ $activeTab === 'tab2' ? 'border-b-4 border-primary-color py-3 pt-5 font-bold' : '' }}">
                    Security
                </button>
                <button wire:click="setActiveTab('tab3')"
                    class="{{ $activeTab === 'tab3' ? 'border-b-4 border-primary-color py-3 pt-5 font-bold' : '' }}">
                    Links
                </button>
                <button wire:click="setActiveTab('tab4')"
                    class="{{ $activeTab === 'tab4' ? 'border-b-4 border-primary-color py-3 pt-5 font-bold' : '' }}">
                    Files
                </button>
            </div>
            <div>
                @if ($activeTab === 'tab1') {{-- tab for general --}}
                    <form wire:submit="editProfile">
                        <div class="tab-content flex max-h-fit min-h-[26.5rem] w-full flex-col justify-between gap-0 rounded-b-lg bg-white px-6 py-4 text-gray-600 drop-shadow-lg md:gap-1 lg:h-[30rem]"
                            id="tab-1">
                            <div class="flex w-full flex-col gap-0 md:flex-row md:gap-4">
                                <div class="flex w-full flex-col md:mb-0 md:w-1/2">
                                    <label class="text-sm font-semibold" for="fname">First name</label>
                                    <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                        wire:model.live="first_name" id="fname" />
                                    @error('first_name')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="flex w-full flex-col md:mb-0 md:w-1/2">
                                    <label for="fname" class="text-sm font-semibold">Last name</label>
                                    <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                        wire:model.live="last_name" id="fname" value="{{ $user->last_name }}" />
                                    @error('last_name')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex w-full flex-col gap-0 md:flex-row md:gap-4">
                                <div class="flex w-full flex-col md:w-1/2">
                                    <label class="text-sm font-semibold" for="email">Email address</label>
                                    <input class="rounded-md border border-gray-400 p-2 text-sm" type="email"
                                        wire:model.live="email" id="email" value="{{ $user->email }}" />
                                    @error('email')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="flex w-full flex-col md:w-1/2">
                                    <label for="pnumber" class="text-sm font-semibold">Phone number</label>
                                    <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                        wire:model.live="phone_no" id="pnumber" value="{{ $user->phone_no }}" />
                                    @error('phone_no')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex w-full flex-col gap-0 md:flex-row md:gap-4">
                                <div class="flex w-full flex-col md:w-1/2">
                                    <label class="text-sm font-semibold" for="studentID">Student ID</label>
                                    <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                        wire:model.live="student_id" id="studentID"
                                        value="{{ $user->student_id }}" />
                                    @error('student_id')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="flex w-full flex-col md:w-1/2">
                                    <label class="text-sm font-semibold" for="usernames">Username</label>
                                    <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                        wire:model.live="username" id="usernames" value="{{ $user->username }}" />
                                    @error('username')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full">
                                <label class="text-sm font-semibold" for="bachelor_degree">Bachelor Degree</label>
                                <select wire:model.live="bachelor_degree_input" id="bachelor-degree"
                                    class="w-full rounded-md border border-gray-400 p-2 text-sm">
                                    @if ($user->bachelor_degree == null)
                                        @foreach ($bachelor_degree_data as $degree)
                                            <option class="text-sm" value="{{ $degree->id }}">
                                                {{ $degree->name }}
                                            </option>
                                        @endforeach
                                    @else
                                        @php
                                            $selectedDegree = \App\Models\BachelorDegree::find($user->bachelor_degree);
                                        @endphp
                                        <option value="{{ $user->bachelor_degree }}" selected>
                                            {{ $selectedDegree->name }}
                                        </option>
                                        @foreach ($bachelor_degree_data as $degree)
                                            @if ($degree->id != $user->bachelor_degree)
                                                <option class="text-sm" value="{{ $degree->id }}">
                                                    {{ $degree->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                @error('bachelor_degree_input')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="flex w-full flex-col">
                                <label class="text-sm font-semibold" for="address">Address</label>
                                <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                    wire:model.live="address" id="address" value="{{ $user->address }}" />
                                @error('address')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="flex w-full flex-col gap-3 md:flex-row lg:w-1/2">
                                <button class="w-full rounded-md bg-blue-600 p-1 text-white hover:bg-blue-800"
                                    type="submit" wire:loading.attr="disabled">
                                    Save
                                </button>
                                <button
                                    class="w-full rounded-md border border-gray-400 p-1 text-gray-600 hover:bg-gray-600 hover:text-white">
                                    Cancel
                                </button>
                                <div wire:loading>
                                    <!-- Show loading spinner while the action is being processed -->
                                    <div
                                        class="my-auto ml-2 flex h-8 w-8 items-center justify-center rounded-full bg-gray-200">
                                        <div class="h-4 w-4 animate-spin rounded-full border-t-2 border-primary-color">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @elseif ($activeTab === 'tab2')
                    {{-- tab for security --}}
                    <div
                        class="flex max-h-fit min-h-[26.5rem] w-full flex-col gap-0 rounded-b-lg bg-white p-4 px-6 py-4 text-gray-600 drop-shadow-lg md:gap-4 lg:h-[30rem]">
                        <form wire:submit="changePassword" wire:loading.class="loading">
                            <section class="flex flex-col gap-2">
                                <div class="flex w-full flex-col">
                                    <label class="text-sm font-semibold" for="currentPassword">Current
                                        password</label>
                                    <input class="rounded-md border border-gray-400 p-2 text-sm" type="password"
                                        wire:model.live="current_password" id="currentPassword" />
                                    @error('current_password')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="flex w-full flex-col">
                                    <label class="text-sm font-semibold" for="password">New password</label>
                                    <input class="rounded-md border border-gray-400 p-2 text-sm" type="password"
                                        wire:model.live="password" id="password" />
                                    @error('password')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="flex w-full flex-col">
                                    <label class="text-sm font-semibold" for="password_confirmation">Confirm
                                        password</label>
                                    <input class="rounded-md border border-gray-400 p-2 text-sm" type="password"
                                        wire:model.live="password_confirmation" id="password_confirmation" />
                                    @error('password_confirmation')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="flex w-full flex-col gap-3 md:flex-row lg:w-1/2">
                                    <button class="w-full rounded-md bg-blue-600 p-1 text-white hover:bg-blue-800"
                                        wire:click.prevent="changePassword" wire:loading.attr="disabled">
                                        Save
                                    </button>
                                    <button
                                        class="w-full rounded-md border border-gray-400 p-1 text-gray-600 hover:bg-gray-600 hover:text-white">
                                        Cancel
                                    </button>
                                </div>
                            </section>
                        </form>
                        <section class="flex flex-col gap-2">
                            <h2 class="font-bold">Delete Account</h2>
                            <p class="text-sm">
                                Once your account is deleted, all of its resources
                                and data will be permanently deleted. hBefore
                                deleting your account, please download any data or
                                information that you wish to retain.
                            </p>
                            <a class="w-full">
                                <span id="deleteButton" wire:click="showdelBox"
                                    class="w-full cursor-pointer rounded-md bg-red-600 p-2 font-semi-bold text-white duration-200 ease-in hover:bg-red-800 md:w-1/3 lg:w-1/2">Delete
                                    account</span>
                            </a>
                        </section>
                    </div>
                @elseif ($activeTab === 'tab3')
                    <div
                        class="flex min-h-[26.5rem] w-full flex-col gap-0 rounded-b-lg bg-white p-4 px-6 py-4 text-gray-600 drop-shadow-lg md:gap-4 lg:h-[30rem]">
                        <h2>Link your social media account.</h2>
                        <section>
                            <form wire:submit="addUrl" class="flex flex-col gap-2">
                                <div class="flex w-full flex-col">
                                    <label class="text-sm font-semibold" for="fb_url">Facebook account URL</label>
                                    <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                        wire:model.live="facebook_url" id="fb_url" />
                                    @error('facebook_url')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="flex w-full flex-col">
                                    <label class="text-sm font-semibold" for="ms_url">Microsoft account URL</label>
                                    <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                        wire:model.live="ms_url" id="ms_url" />
                                    @error('ms_url')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="flex w-full flex-col gap-3 md:flex-row lg:w-1/2">
                                    <button class="w-full rounded-md bg-blue-600 p-1 text-white hover:bg-blue-800"
                                        wire:loading.attr="disabled">
                                        Save
                                    </button>
                                    <button
                                        class="w-full rounded-md border border-gray-400 p-1 text-gray-600 hover:bg-gray-600 hover:text-white">
                                        Cancel
                                    </button>
                                </div>
                            </form>

                        </section>
                        <section>
                            <h2>Account Verification</h2>
                            <form wire:submit="verifyMyEmail">
                                <div class="flex h-fit items-center justify-center">
                                    @php
                                        $user = auth()->user();
                                        $areTheyEmpty = empty($user->first_name) || empty($user->last_name) || empty($user->address) || empty($user->phone_no);
                                    @endphp
                                    @if ($areTheyEmpty)
                                        <div class="mx-3 flex items-center text-red-700">
                                            <svg fill="currentColor" height="40" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M21.6 12a9.6 9.6 0 1 1-19.2 0 9.6 9.6 0 0 1 19.2 0Zm-8.4 4.8a1.2 1.2 0 1 1-2.4 0 1.2 1.2 0 0 1 2.4 0ZM12 6a1.2 1.2 0 0 0-1.2 1.2V12a1.2 1.2 0 1 0 2.4 0V7.2A1.2 1.2 0 0 0 12 6Z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <p class="text-xs text-red-600">
                                            Your accounts information is incomplete, please fill out the details
                                            required before you can verify you account.
                                        </p>
                                    @else
                                        @if (auth()->user()->is_verified == false)
                                            <div class="mx-3 flex items-center text-yellow-700">
                                                <svg fill="currentColor" height="40" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M21.6 12a9.6 9.6 0 1 1-19.2 0 9.6 9.6 0 0 1 19.2 0Zm-8.4 4.8a1.2 1.2 0 1 1-2.4 0 1.2 1.2 0 0 1 2.4 0ZM12 6a1.2 1.2 0 0 0-1.2 1.2V12a1.2 1.2 0 1 0 2.4 0V7.2A1.2 1.2 0 0 0 12 6Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <p class="text-xs text-yellow-600">
                                                Your account is not yet verified. To access all
                                                features, please verify your account to confirm
                                                you are a student status at PSU-ACC. Binding
                                                your institutional email account will help you
                                                to recover your account.
                                            </p>
                                        @else
                                            <div class="mx-3 flex items-center text-blue-600">
                                                <svg fill="currentColor" height="40" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M7.52 4.146a3.68 3.68 0 0 0 2.094-.868 3.68 3.68 0 0 1 4.772 0 3.68 3.68 0 0 0 2.094.868 3.68 3.68 0 0 1 3.374 3.374 3.67 3.67 0 0 0 .868 2.094 3.68 3.68 0 0 1 0 4.772 3.679 3.679 0 0 0-.868 2.094 3.68 3.68 0 0 1-3.374 3.374 3.679 3.679 0 0 0-2.094.868 3.68 3.68 0 0 1-4.772 0 3.679 3.679 0 0 0-2.094-.868 3.68 3.68 0 0 1-3.374-3.374 3.68 3.68 0 0 0-.868-2.094 3.68 3.68 0 0 1 0-4.772 3.68 3.68 0 0 0 .868-2.094A3.68 3.68 0 0 1 7.52 4.146Zm8.928 6.302a1.2 1.2 0 0 0-1.696-1.696L10.8 12.703l-1.552-1.551a1.2 1.2 0 0 0-1.696 1.696l2.4 2.4a1.2 1.2 0 0 0 1.696 0l4.8-4.8Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <div class="flex flex-col text-xs">
                                                <p>
                                                    Account Verified! Welcome to our Research & Thesis Hub! 🎓
                                                </p>
                                                <p> Your institutional account has been verified. Dive into
                                                    a world of research,
                                                    thesis, and capstone excellence. Enjoy exploring and learning on our
                                                    platform!</p>
                                                <p> Happy researching! 📚🔍</p>
                                            </div>
                                        @endif
                                    @endif

                                </div>
                                <div class="flex w-full flex-col">
                                    <label class="text-sm font-semibold" for="verifyEmail">Institutional Email</label>
                                    @if (auth()->user()->is_verified == false)
                                        <small>To verify your account, you need to use your institutional
                                            account.</small>
                                    @endif
                                    <input
                                        class="{{ auth()->user()->is_verified ? 'text-gray-400' : '' }} /> rounded-md border border-gray-400 p-2 text-sm"
                                        type="email" wire:model.live="verifyEmail" id="email"
                                        {{ auth()->user()->is_verified || $areTheyEmpty ? 'disabled' : '' }} />
                                    @error('verifyEmail')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="flex w-full flex-col gap-3 md:flex-row lg:w-1/2">
                                    <div wire:loading>
                                        <!-- Show loading spinner while the action is being processed -->
                                        <div
                                            class="my-auto ml-2 flex h-8 w-8 items-center justify-center rounded-full bg-gray-200">
                                            <div
                                                class="h-4 w-4 animate-spin rounded-full border-t-2 border-primary-color">
                                            </div>
                                        </div>
                                    </div>
                                    @if ($areTheyEmpty)
                                    @else
                                        @if (auth()->user()->is_verified == false)
                                            <button
                                                class="w-full rounded-md bg-blue-600 p-1 text-white hover:bg-blue-800"
                                                wire:loading.attr="disabled">
                                                Save
                                            </button>
                                            <button
                                                class="w-full rounded-md border border-gray-400 p-1 text-gray-600 hover:bg-gray-600 hover:text-white">
                                                Cancel
                                            </button>
                                        @endif
                                    @endif
                                </div>
                            </form>
                        </section>
                    </div>
                @elseif ($activeTab === 'tab4')
                    <div
                        class="flex min-h-[26.5rem] w-full flex-col gap-0 rounded-b-lg bg-white p-4 px-6 py-4 text-gray-600 drop-shadow-lg md:gap-4 lg:h-[30rem]">
                        {{-- <div>
                                <Button class="rounded-md bg-blue-700 p-2 text-white">Upload document</Button>
                            </div> --}}
                        @php
                            $user = auth()->user();
                            $areTheyEmpty = empty($user->first_name) || empty($user->last_name) || empty($user->address) || empty($user->phone_no);
                        @endphp
                        @if ($areTheyEmpty)
                            <div class="my-auto flex flex-col items-center justify-center text-center">
                                <div class="flex h-36 w-36 items-center justify-center rounded-full bg-gray-200">
                                    <svg height="80" viewBox="0 0 113 113" fill="none">
                                        <path
                                            d="M4.30044 42.0087L10.5201 92.8941C10.6953 94.3772 11.4089 95.7444 12.5255 96.736C13.6421 97.7277 15.084 98.2749 16.5774 98.2737H96.4308C97.9249 98.2748 99.3674 97.7269 100.484 96.7343C101.601 95.7417 102.314 94.3734 102.488 92.8895L108.698 42.0087C108.742 41.6427 108.708 41.2716 108.598 40.9198C108.488 40.568 108.305 40.2436 108.06 39.9681C107.815 39.6926 107.514 39.4721 107.178 39.3214C106.842 39.1707 106.477 39.0931 106.108 39.0938H6.89507C6.52614 39.0933 6.16129 39.1709 5.82451 39.3215C5.48774 39.4722 5.18667 39.6924 4.94113 39.9678C4.6956 40.2431 4.51114 40.5673 4.39991 40.9191C4.28869 41.2709 4.25784 41.6422 4.30044 42.0087Z"
                                            fill="#C7C7C7" />
                                        <path
                                            d="M101.755 27.7823C101.755 26.166 101.113 24.6158 99.9696 23.4729C98.8267 22.33 97.2766 21.6879 95.6602 21.6879H54.0718L43.6283 14.7256H17.3339C15.7183 14.7268 14.1694 15.3694 13.0275 16.5122C11.8856 17.655 11.2441 19.2044 11.2441 20.82V32.1314H101.755V27.7777V27.7823Z"
                                            fill="#C7C7C7" />
                                    </svg>
                                </div>
                                <p>Account information is incomplete, fill out the needed information <a
                                        href="{{ route('edit-profile', 'tab1') }}" wire:navigate
                                        class="font-bold text-primary-color underline">here</a> and verify account
                                    to upload files.</p>
                            </div>
                        @else
                            @if ($user->is_verified == false)
                                <p>Verify your account first</p>
                            @else
                                @if (!empty($docu_posts))
                                    <section class="flex h-full flex-col gap-2">
                                        <div class="flex items-end justify-end">
                                            <a class="flex w-fit flex-row items-center justify-center gap-1 rounded-md bg-blue-600 px-2 py-1 text-white duration-200 ease-out hover:bg-blue-700"
                                                wire:navigate href="{{ route('user-upload-document-form') }}">Add new
                                                <svg class="h-5" viewBox="0 0 28 28" fill="none">
                                                    <path
                                                        d="M14 2.625C7.728 2.625 2.625 7.728 2.625 14C2.625 20.272 7.728 25.375 14 25.375C20.272 25.375 25.375 20.272 25.375 14C25.375 7.728 20.272 2.625 14 2.625ZM18.375 14.875H14.875V18.375C14.875 18.6071 14.7828 18.8296 14.6187 18.9937C14.4546 19.1578 14.2321 19.25 14 19.25C13.7679 19.25 13.5454 19.1578 13.3813 18.9937C13.2172 18.8296 13.125 18.6071 13.125 18.375V14.875H9.625C9.39294 14.875 9.17038 14.7828 9.00628 14.6187C8.84219 14.4546 8.75 14.2321 8.75 14C8.75 13.7679 8.84219 13.5454 9.00628 13.3813C9.17038 13.2172 9.39294 13.125 9.625 13.125H13.125V9.625C13.125 9.39294 13.2172 9.17038 13.3813 9.00628C13.5454 8.84219 13.7679 8.75 14 8.75C14.2321 8.75 14.4546 8.84219 14.6187 9.00628C14.7828 9.17038 14.875 9.39294 14.875 9.625V13.125H18.375C18.6071 13.125 18.8296 13.2172 18.9937 13.3813C19.1578 13.5454 19.25 13.7679 19.25 14C19.25 14.2321 19.1578 14.4546 18.9937 14.6187C18.8296 14.7828 18.6071 14.875 18.375 14.875Z"
                                                        fill="white" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="flex h-full flex-col justify-between">
                                            <table class="min-w-full">
                                                <thead>
                                                    <tr class="my-2 font-semibold text-gray-800">
                                                        <th scope="col" class="text-start">Title</th>
                                                        <th scope="col" class="text-center">Date Uploaded</th>
                                                        <th scope="col" class="text-center">Status</th>
                                                        <th scope="col" class="">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-sm">
                                                    @foreach ($docu_posts as $docuPost)
                                                        <tr class="">
                                                            <td scope="col" class="w-2/5 overflow-ellipsis py-2">
                                                                {{ $docuPost->title }}</td>
                                                            <td scope="col" class="py-2 text-center">
                                                                {{ \Carbon\Carbon::parse($docuPost->created_at)->format('d M Y') }}
                                                            </td>
                                                            <td scope="col" class="py-2">
                                                                @if ($docuPost->status == 0)
                                                                    <div
                                                                        class="flex w-fit flex-row-reverse items-center justify-center rounded-md bg-yellow-500 px-2 py-1 text-white">
                                                                        <span class="px-1"> Pending </span>
                                                                        <svg class="h-4" viewBox="0 0 20 20"
                                                                            fill="none">
                                                                            <path
                                                                                d="M10 0C7.34784 0 4.8043 1.05357 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 15.5221 4.47692 20 10 20C15.5221 20 20 15.5221 20 10C20 4.47692 15.5221 0 10 0ZM14.6154 11.5385H10C9.79599 11.5385 9.60033 11.4574 9.45607 11.3132C9.31181 11.1689 9.23077 10.9732 9.23077 10.7692V3.84615C9.23077 3.64214 9.31181 3.44648 9.45607 3.30223C9.60033 3.15797 9.79599 3.07692 10 3.07692C10.204 3.07692 10.3997 3.15797 10.5439 3.30223C10.6882 3.44648 10.7692 3.64214 10.7692 3.84615V10H14.6154C14.8194 10 15.0151 10.081 15.1593 10.2253C15.3036 10.3696 15.3846 10.5652 15.3846 10.7692C15.3846 10.9732 15.3036 11.1689 15.1593 11.3132C15.0151 11.4574 14.8194 11.5385 14.6154 11.5385Z"
                                                                                fill="#FFFBFB" />
                                                                        </svg>
                                                                    </div>
                                                                @elseif($docuPost->status == 1)
                                                                    <div
                                                                        class="flex w-fit flex-row-reverse items-center justify-center rounded-md bg-green-700 px-2 py-1 text-white">
                                                                        <span class="px-1"> Approved </span>
                                                                        <svg class="h-4" viewBox="0 0 21 21"
                                                                            fill="none">
                                                                            <path
                                                                                d="M20.0827 10.5003C20.0827 13.042 19.073 15.4795 17.2758 17.2768C15.4786 19.074 13.041 20.0837 10.4993 20.0837C7.95769 20.0837 5.52013 19.074 3.72291 17.2768C1.92569 15.4795 0.916016 13.042 0.916016 10.5003C0.916016 7.95867 1.92569 5.52111 3.72291 3.72389C5.52013 1.92666 7.95769 0.916992 10.4993 0.916992C13.041 0.916992 15.4786 1.92666 17.2758 3.72389C19.073 5.52111 20.0827 7.95867 20.0827 10.5003ZM15.3274 6.87112C15.2419 6.78576 15.1401 6.71853 15.028 6.67346C14.9159 6.62839 14.7958 6.6064 14.6751 6.60882C14.5543 6.61123 14.4352 6.638 14.325 6.68752C14.2148 6.73703 14.1157 6.80828 14.0337 6.89699L9.8726 12.1975L7.3656 9.68958C7.19645 9.52489 6.96926 9.43343 6.73319 9.43501C6.49711 9.43659 6.27116 9.53106 6.10423 9.698C5.9373 9.86493 5.84282 10.0909 5.84124 10.327C5.83967 10.563 5.93112 10.7902 6.09581 10.9594L9.26597 14.1305C9.35151 14.2154 9.45323 14.2822 9.56509 14.327C9.67696 14.3719 9.79668 14.3938 9.91716 14.3914C10.0376 14.3891 10.1564 14.3626 10.2665 14.3135C10.3765 14.2644 10.4756 14.1937 10.5578 14.1056L15.3399 8.12845C15.503 7.95892 15.5932 7.73221 15.591 7.49696C15.5889 7.26171 15.4946 7.03667 15.3284 6.87016H15.3265L15.3274 6.87112Z"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </div>
                                                                @else
                                                                    <div
                                                                        class="flex w-fit flex-row-reverse items-center justify-center rounded-md bg-red-500 px-2 py-1 text-white">
                                                                        <span class="px-1"> Deleted </span>
                                                                        <svg class="h-4" fill="currentColor"
                                                                            viewBox="0 0 24 24">
                                                                            <path fill-rule="evenodd"
                                                                                d="M7.2 2.4a2.4 2.4 0 0 0-2.4 2.4v14.4a2.4 2.4 0 0 0 2.4 2.4h9.6a2.4 2.4 0 0 0 2.4-2.4V8.897a2.4 2.4 0 0 0-.703-1.697L14.4 3.103a2.4 2.4 0 0 0-1.697-.703H7.2ZM8.4 12a1.2 1.2 0 0 0 0 2.4h7.2a1.2 1.2 0 1 0 0-2.4H8.4Z"
                                                                                clip-rule="evenodd"></path>
                                                                        </svg>
                                                                    </div>
                                                                @endif

                                                            </td>
                                                            <td scope="col" class="py-2 text-center">
                                                                <div
                                                                    class="flex flex-col items-center gap-1 md:flex-row">
                                                                    <a href="{{ route('view-document', ['reference' => $docuPost->reference]) }}"
                                                                        class="rounded-md bg-blue-600 p-1 duration-100 ease-in-out hover:bg-blue-800">
                                                                        <svg class="h-5" viewBox="0 0 23 23"
                                                                            fill="none">
                                                                            <path
                                                                                d="M11.5 14.375C12.2625 14.375 12.9938 14.0721 13.5329 13.5329C14.0721 12.9938 14.375 12.2625 14.375 11.5C14.375 10.7375 14.0721 10.0062 13.5329 9.46707C12.9938 8.9279 12.2625 8.625 11.5 8.625C10.7375 8.625 10.0062 8.9279 9.46707 9.46707C8.9279 10.0062 8.625 10.7375 8.625 11.5C8.625 12.2625 8.9279 12.9938 9.46707 13.5329C10.0062 14.0721 10.7375 14.375 11.5 14.375Z"
                                                                                fill="white" />
                                                                            <path
                                                                                d="M17.7359 6.34225C15.7713 4.99579 13.6697 4.3125 11.4904 4.3125C9.52775 4.3125 7.61396 4.89708 5.80367 6.04133C3.97613 7.19708 2.185 9.29967 0.71875 11.5C1.90517 13.477 3.52954 15.5087 5.22004 16.675C7.15971 18.01 9.269 18.6875 11.4895 18.6875C13.6908 18.6875 15.7952 18.0109 17.7474 16.675C19.4647 15.4982 21.1006 13.4684 22.2812 11.5C21.0958 9.54883 19.4561 7.52196 17.7359 6.34225ZM11.5 15.8125C10.3563 15.8125 9.25935 15.3581 8.4506 14.5494C7.64185 13.7406 7.1875 12.6437 7.1875 11.5C7.1875 10.3563 7.64185 9.25935 8.4506 8.4506C9.25935 7.64185 10.3563 7.1875 11.5 7.1875C12.6437 7.1875 13.7406 7.64185 14.5494 8.4506C15.3581 9.25935 15.8125 10.3563 15.8125 11.5C15.8125 12.6437 15.3581 13.7406 14.5494 14.5494C13.7406 15.3581 12.6437 15.8125 11.5 15.8125Z"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </a>
                                                                    <div
                                                                        class="rounded-md bg-cyan-600 p-1 duration-100 ease-in-out hover:bg-cyan-800">
                                                                        <svg class="h-5" viewBox="0 0 23 23"
                                                                            fill="none">
                                                                            <path
                                                                                d="M4.62683 20.8475H2.15625V18.3759L16.0885 4.41016L18.5936 6.91524L4.62683 20.8475Z"
                                                                                fill="white" />
                                                                            <path
                                                                                d="M19.1243 6.37867L16.6211 3.87551L18.0433 2.49838C18.2627 2.27797 18.5991 2.15626 18.9115 2.15626C19.0653 2.15573 19.2176 2.1857 19.3598 2.24442C19.5019 2.30315 19.631 2.38946 19.7395 2.49838L20.5033 3.26217C20.6117 3.37063 20.6975 3.49945 20.7559 3.64123C20.8143 3.783 20.8441 3.93493 20.8435 4.08826C20.8435 4.40259 20.7218 4.73705 20.5014 4.95746L19.1243 6.37867Z"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </div>
                                                                    <div wire:click="deletePost('{{ $docuPost->id }}',' {{ $docuPost->title }}', '{{ $docuPost->user_id }}' )"
                                                                        class="rounded-md bg-red-600 p-1 duration-100 ease-in-out hover:bg-red-800">
                                                                        <svg class="h-5" viewBox="0 0 23 23"
                                                                            fill="none">
                                                                            <path
                                                                                d="M20.1049 4.3125H15.0938V2.15625C15.0938 1.96563 15.018 1.78281 14.8832 1.64802C14.7484 1.51323 14.5656 1.4375 14.375 1.4375H8.625C8.43438 1.4375 8.25156 1.51323 8.11677 1.64802C7.98198 1.78281 7.90625 1.96563 7.90625 2.15625V4.3125H2.89512L2.875 6.10938H4.35754L5.26029 20.2151C5.28318 20.5797 5.44403 20.9219 5.71015 21.1722C5.97626 21.4224 6.32769 21.562 6.693 21.5625H16.307C16.6722 21.5623 17.0236 21.4231 17.2898 21.1732C17.5561 20.9233 17.7173 20.5814 17.7407 20.217L18.6425 6.10938H20.125L20.1049 4.3125ZM7.90625 18.6875L7.50183 7.1875H8.98438L9.38879 18.6875H7.90625ZM12.2188 18.6875H10.7812V7.1875H12.2188V18.6875ZM13.2969 4.3125H9.70312V3.05421C9.70338 3.00659 9.72247 2.96101 9.75623 2.92743C9.78999 2.89385 9.83567 2.875 9.88329 2.875H13.1167C13.1645 2.875 13.2103 2.89398 13.2441 2.92777C13.2779 2.96156 13.2969 3.00738 13.2969 3.05517V4.3125ZM15.0938 18.6875H13.6112L14.0156 7.1875H15.4982L15.0938 18.6875Z"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <br>
                                            <br>
                                            <div class="flex items-center justify-center">
                                                {{ $docu_posts->links() }}
                                            </div>
                                        </div>
                                    </section>
                                @else
                                    <div class="flex flex-col items-center justify-center">
                                        <div
                                            class="flex h-36 w-36 items-center justify-center rounded-full bg-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="80"
                                                viewBox="0 0 113 113" fill="none">
                                                <path
                                                    d="M4.30044 42.0087L10.5201 92.8941C10.6953 94.3772 11.4089 95.7444 12.5255 96.736C13.6421 97.7277 15.084 98.2749 16.5774 98.2737H96.4308C97.9249 98.2748 99.3674 97.7269 100.484 96.7343C101.601 95.7417 102.314 94.3734 102.488 92.8895L108.698 42.0087C108.742 41.6427 108.708 41.2716 108.598 40.9198C108.488 40.568 108.305 40.2436 108.06 39.9681C107.815 39.6926 107.514 39.4721 107.178 39.3214C106.842 39.1707 106.477 39.0931 106.108 39.0938H6.89507C6.52614 39.0933 6.16129 39.1709 5.82451 39.3215C5.48774 39.4722 5.18667 39.6924 4.94113 39.9678C4.6956 40.2431 4.51114 40.5673 4.39991 40.9191C4.28869 41.2709 4.25784 41.6422 4.30044 42.0087Z"
                                                    fill="#C7C7C7" />
                                                <path
                                                    d="M101.755 27.7823C101.755 26.166 101.113 24.6158 99.9696 23.4729C98.8267 22.33 97.2766 21.6879 95.6602 21.6879H54.0718L43.6283 14.7256H17.3339C15.7183 14.7268 14.1694 15.3694 13.0275 16.5122C11.8856 17.655 11.2441 19.2044 11.2441 20.82V32.1314H101.755V27.7777V27.7823Z"
                                                    fill="#C7C7C7" />
                                            </svg>
                                        </div>
                                        <p>You haven't uploaded any documents yet.</p>
                                        <small>Upload a new file below.</small>
                                        <a href="{{ route('upload-document-form') }}"
                                            class="rounded-lg bg-blue-800 p-1 text-sm text-white">UPLOAD FILE</a>
                                    </div>
                                @endif
                            @endif
                        @endif
                    </div>
                @endif
            </div>
        </section>
    </section>
</div>
