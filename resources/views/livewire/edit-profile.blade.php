<div>
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
                        <input type="text" wire:model="confirmationInput" id="confirmInput"
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
                        <button wire:click="deletemyAccount" id="confirmBTN"
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
            <div class="mx-3 flex w-fit flex-col gap-1 rounded-md bg-white px-10 py-5 text-center md:w-2/5">
                <form action="">
                    <h1>The otp is sent to your {{ $verifyEmail }}</h1>
                    <label for="">Enter the 6 letters to verify your account</label>
                    <input type="text">
                </form>
            </div>
        </div>
    @endif




    <x-session_flash />
    <div class="container mb-4">
        <h1 class="font-bold">Account information</h1>
    </div>

    <section class="container flex h-full flex-col gap-3 lg:flex-row">
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
                            <label title="Click to upload" for="profile_picture" class="cursor-pointer">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9.75 13a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0Z"></path>
                                    <path fill-rule="evenodd"
                                        d="M7.474 7.642A3.142 3.142 0 0 1 10.616 4.5h2.768a3.143 3.143 0 0 1 3.142 3.142.03.03 0 0 0 .026.029l2.23.18c.999.082 1.82.82 2.007 1.805a22.07 22.07 0 0 1 .104 7.613l-.097.604a2.505 2.505 0 0 1-2.27 2.099l-1.943.157a56.61 56.61 0 0 1-9.166 0l-1.943-.157a2.505 2.505 0 0 1-2.27-2.1l-.097-.603c-.407-2.525-.371-5.1.104-7.613a2.226 2.226 0 0 1 2.007-1.804l2.23-.181a.028.028 0 0 0 .026-.029ZM12 9.25a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </label>
                            <input wire:model="profile_picture" type="file" id="profile_picture" hidden />
                        </div>
                    </div>
                    @error('profile_picture')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror @if ($user->first_name == null || $user->last_name == null)
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
                        <a class="flex h-full items-center">Facebook</a>
                    </div>
                    <div class="flex h-16 w-1/2 items-center justify-center rounded-lg bg-white p-4 drop-shadow-lg">
                        <a class="flex h-full items-center">Microsoft Team</a>
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
                        <form wire:submit.prevent="editProfile">
                            <div class="tab-content flex max-h-fit min-h-[26.5rem] w-full flex-col justify-between gap-0 rounded-b-lg bg-white px-6 py-4 text-gray-600 drop-shadow-lg md:gap-1"
                                id="tab-1">
                                <div class="flex w-full flex-col gap-0 md:flex-row md:gap-4">
                                    <div class="flex w-full flex-col md:mb-0 md:w-1/2">
                                        <label class="text-sm font-semibold" for="fname">First name</label>
                                        <input class="rounded-md border border-gray-400 p-1 text-sm" type="text"
                                            wire:model="first_name" id="fname" />
                                        @error('first_name')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="flex w-full flex-col md:mb-0 md:w-1/2">
                                        <label for="fname" class="text-sm font-semibold">Last name</label>
                                        <input class="rounded-md border border-gray-400 p-1 text-sm" type="text"
                                            wire:model="last_name" id="fname" value="{{ $user->last_name }}" />
                                        @error('last_name')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex w-full flex-col gap-0 md:flex-row md:gap-4">
                                    <div class="flex w-full flex-col md:w-1/2">
                                        <label class="text-sm font-semibold" for="email">Email address</label>
                                        <input class="rounded-md border border-gray-400 p-1 text-sm" type="email"
                                            wire:model="email" id="email" value="{{ $user->email }}" />
                                        @error('email')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="flex w-full flex-col md:w-1/2">
                                        <label for="pnumber" class="text-sm font-semibold">Phone number</label>
                                        <input class="rounded-md border border-gray-400 p-1 text-sm" type="text"
                                            wire:model="phone_no" id="pnumber" value="{{ $user->phone_no }}" />
                                        @error('phone_no')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex w-full flex-col gap-0 md:flex-row md:gap-4">
                                    <div class="flex w-full flex-col md:w-1/2">
                                        <label class="text-sm font-semibold" for="studentID">Student ID</label>
                                        <input class="rounded-md border border-gray-400 p-1 text-sm" type="text"
                                            wire:model="student_id" id="studentID" value="{{ $user->student_id }}" />
                                        @error('student_id')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="flex w-full flex-col md:w-1/2">
                                        <label class="text-sm font-semibold" for="usernames">Username</label>
                                        <input class="rounded-md border border-gray-400 p-1 text-sm" type="text"
                                            wire:model="username" id="usernames" value="{{ $user->username }}" />
                                        @error('username')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label class="text-sm font-semibold" for="bachelor_degree">Bachelor Degree</label>
                                    <select wire:model="bachelor_degree_input" id="bachelor-degree"
                                        class="w-full rounded-md border border-gray-400 p-1 text-sm">
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
                                    <input class="rounded-md border border-gray-400 p-1 text-sm" type="text"
                                        wire:model="address" id="address" value="{{ $user->address }}" />
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
                            class="flex max-h-fit min-h-[26.5rem] w-full flex-col gap-0 rounded-b-lg bg-white p-4 px-6 py-4 text-gray-600 drop-shadow-lg md:gap-4">
                            <form wire:submit.prevent="changePassword" wire:loading.class="loading">
                                <section class="flex flex-col gap-2">
                                    <div class="flex w-full flex-col">
                                        <label class="text-sm font-semibold" for="currentPassword">Current
                                            password</label>
                                        <input class="rounded-md border border-gray-400 p-2 text-sm" type="password"
                                            wire:model="current_password" id="currentPassword" />
                                        @error('current_password')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="flex w-full flex-col">
                                        <label class="text-sm font-semibold" for="password">New password</label>
                                        <input class="rounded-md border border-gray-400 p-2 text-sm" type="password"
                                            wire:model="password" id="password" />
                                        @error('password')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="flex w-full flex-col">
                                        <label class="text-sm font-semibold" for="password_confirmation">Confirm
                                            password</label>
                                        <input class="rounded-md border border-gray-400 p-2 text-sm" type="password"
                                            wire:model="password_confirmation" id="password_confirmation" />
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
                            class="flex min-h-[26.5rem] w-full flex-col gap-0 rounded-b-lg bg-white p-4 px-6 py-4 text-gray-600 drop-shadow-lg md:gap-4">
                            <h2>Link your social media account.</h2>
                            <section>
                                <form wire:submit.prevent="addUrl">
                                    <div class="flex w-full flex-col">
                                        <label class="text-sm font-semibold" for="fb_url">Facebook account URL</label>
                                        <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                            wire:model="facebook_url" id="fb_url" />
                                        @error('facebook_url')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="flex w-full flex-col">
                                        <label class="text-sm font-semibold" for="ms_url">Microsoft account URL</label>
                                        <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                            wire:model="ms_url" id="ms_url" />
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
                                <form wire:submit.prevent="verifyMyEmail">
                                    <div class="flex h-fit items-center justify-center">
                                        @if (auth()->user()->is_verified == false)
                                            <div class="mx-3 flex items-center text-red-700">
                                                <svg fill="currentColor" height="40" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M21.6 12a9.6 9.6 0 1 1-19.2 0 9.6 9.6 0 0 1 19.2 0Zm-8.4 4.8a1.2 1.2 0 1 1-2.4 0 1.2 1.2 0 0 1 2.4 0ZM12 6a1.2 1.2 0 0 0-1.2 1.2V12a1.2 1.2 0 1 0 2.4 0V7.2A1.2 1.2 0 0 0 12 6Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <p class="text-xs text-red-600">
                                                Your account is not yet verified. To access all
                                                features, please verify your account to confirm
                                                you are a student status at PSU-ACC. Binding
                                                your institutional email account will help you
                                                to recover your account.
                                            </p>
                                        @else
                                            <h1>Account is verified</h1>
                                        @endif
                                    </div>
                                    <div class="flex w-full flex-col">
                                        <label class="text-sm font-semibold" for="verifyEmail">Institutional Email</label>
                                        <small>To verify your account, you need to use your
                                            institutional account.</small>
                                        <input class="rounded-md border border-gray-400 p-2 text-sm" type="email"
                                            wire:model="verifyEmail" id="email" />
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
                        </div>
                    @elseif ($activeTab === 'tab4')
                        <form wire:submit.prevent="submitForm('tab4')">
                            <input type="text" wire:model="formData.tab4" placeholder="Form in Tab 4" />
                            <button type="submit">Submit Tab 4</button>
                        </form>
                    @endif
                </div>
            </section>
        </section>
    </div>
