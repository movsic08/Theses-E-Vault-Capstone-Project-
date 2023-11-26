<section class="flex w-full flex-col gap-3 lg:w-2/5">
    <div class="flex min-h-[25.5rem] flex-col justify-between rounded-xl bg-white p-8 drop-shadow-lg">
        <div class="flex flex-col items-center justify-center gap-2">
            <div class="relative">
                @if ($user->profile_picture)
                    <img class="h-40 w-40 rounded-full object-cover"
                        src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" />
                @else
                    <img class="h-40 w-40 rounded-full object-cover" src="{{ asset('assets/default_profile.png') }}"
                        alt="Default Profile Picture" />
                @endif

                <div
                    class="absolute bottom-0 right-3 h-8 w-8 rounded-full bg-blue-600 p-1 text-white duration-300 hover:h-9 hover:w-9 hover:bg-blue-800">
                    <svg wire:click='showProfileUpload' class="cursor-pointer" fill="currentColor" viewBox="0 0 24 24">
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
                <h3 class="text-xl font-bold text-gray-800 md:text-2xl">
                    {{ $user->first_name }} {{ $user->last_name }}
                </h3>
            @endif
        </div>
        <div class="mt-4 flex flex-col md:flex-row">
            <p class="font-bold text-gray-700">Username</p>
            @if ($user->username == null)
                <p class="text-red-500 md:ml-4">Username is empty.</p>
            @else
                <p class="whitespace-normal text-gray-500 md:pl-4">
                    {{ $user->username }}
                </p>
            @endif
        </div>
        <div class="mt-4 flex flex-col md:flex-row">
            <p class="font-bold text-gray-700">Student ID</p>
            @if ($user->student_id == null)
                <p class="text-red-500 md:ml-4">Student ID is empty.</p>
            @else
                <p class="whitespace-normal text-gray-500 md:pl-4">
                    {{ $user->student_id }}
                </p>
            @endif
        </div>

        <div class="mt-4 flex flex-col md:flex-row">
            <p class="font-bold text-gray-700">Email</p>
            <p class="whitespace-normal text-gray-500 md:pl-14">
                {{ $user->email }}
            </p>
        </div>
        <div class="mt-4 flex flex-col md:flex-row">
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
        <div class="mt-4 flex flex-col md:flex-row">
            <p class="font-bold text-gray-700">Address</p>
            @if ($user->address == null)
                <p class="text-red-500 md:ml-8">Address is empty.</p>
            @else
                <p class="whitespace-normal text-gray-500 md:pl-8">
                    {{ $user->address }}
                </p>
            @endif
        </div>
        <div class="mt-4 flex flex-col md:flex-row">
            <p class="font-bold text-gray-700">Bachelor</p>
            @if ($user->bachelor_degree === null)
                <p class="text-red-500 md:ml-7">
                    Bachelor degree is empty.
                </p>
            @else
                <p class="whitespace-normal text-gray-500 md:pl-7">
                    {{ $user->bachelor_degree }}
                </p>
            @endif
        </div>
        <div class="mt-4 flex flex-col md:flex-row">
            <p class="font-bold text-gray-700">Bio</p>
            @if ($user->bio == null)
                <p class="text-red-500 md:ml-[4.9rem]">Bio is empty.</p>
            @else
                <p class="whitespace-normal text-gray-500 md:pl-[4.9rem]">
                    {{ $user->bio }}
                </p>
            @endif
        </div>
    </div>
    <div class="flex gap-3 text-primary-color">
        <div class="flex h-fit w-full items-center justify-center rounded-lg bg-white p-4 drop-shadow-lg md:w-1/2">
            <a href="https://{{ $user->facebook_url }}" target="_blank"
                class="flex flex-col items-center justify-center gap-1 duration-300 ease-in-out hover:text-blue-600">
                <svg width="46" height="46" fill="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M22.08 12.539c0-5.335-4.298-9.66-9.6-9.66-5.304.001-9.602 4.325-9.602 9.661 0 4.82 3.511 8.817 8.1 9.541v-6.75H8.542v-2.79h2.438v-2.13c0-2.421 1.434-3.758 3.627-3.758 1.05 0 2.149.188 2.149.188v2.376h-1.21c-1.192 0-1.564.745-1.564 1.51v1.812h2.661l-.425 2.791H13.98v6.75c4.59-.725 8.1-4.72 8.1-9.541Z">
                    </path>
                </svg>
                Facebook
            </a>
        </div>
        <div class="flex h-fit w-1/2 items-center justify-center rounded-lg bg-white p-4 drop-shadow-lg">
            <a href="https://{{ $user->ig_url }}" target="_blank"
                class="flex flex-col items-center justify-center gap-1 duration-300 ease-in-out hover:text-pink-600">
                <svg width="46" height="46" fill="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 8.75a3.25 3.25 0 1 0 0 6.5 3.25 3.25 0 0 0 0-6.5Z"></path>
                    <path fill-rule="evenodd"
                        d="M6.77 3.082a47.472 47.472 0 0 1 10.46 0c1.899.212 3.43 1.707 3.653 3.613a45.67 45.67 0 0 1 0 10.61c-.223 1.906-1.754 3.401-3.653 3.614a47.468 47.468 0 0 1-10.46 0c-1.899-.213-3.43-1.708-3.653-3.613a45.672 45.672 0 0 1 0-10.611C3.34 4.789 4.871 3.294 6.77 3.082ZM17 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2Zm-9.75 6a4.75 4.75 0 1 1 9.5 0 4.75 4.75 0 0 1-9.5 0Z"
                        clip-rule="evenodd"></path>
                </svg>
                Instagram
            </a>
        </div>
    </div>
</section>
