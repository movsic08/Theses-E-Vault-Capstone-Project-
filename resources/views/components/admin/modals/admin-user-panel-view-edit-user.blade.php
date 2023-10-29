<div class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm lg:items-start"
    x-data="{ viewEditUser: false }" x-show="viewEditUser" x-on:open-usr.window="viewEditUser = true"
    x-on:close-usr.window="viewEditUser = false" x-on:keydown.escape.window="viewEditUser = false"
    x-transition:enter.duration.400ms x-transition:leave.duration.300ms style="display: none">
    <div class="right-0 top-0 mx-auto md:flex md:items-center md:justify-center">
        <section
            class="h-fit w-fit rounded-lg bg-white drop-shadow-xl md:mt-[6rem] md:max-h-[35rem] md:min-h-[35rem] md:min-w-[40rem]">
            @if (isset($currentViewingUser))
                <div
                    class="fixed right-0 top-0 z-40 w-full rounded-t-lg bg-white bg-opacity-30 px-6 py-4 text-center text-primary-color backdrop-blur-md">
                    <strong>Viewing
                        {{ $currentViewingUser->first_name == null ? 'User' : $currentViewingUser->first_name }}
                        information</strong>
                </div>
                <section class="custom-scrollbar mt-14 max-h-[28rem] overflow-y-auto pb-2">
                    <div class="px-6 py-4">
                        <div class="flex flex-col items-center justify-center gap-2 md:flex-row md:justify-normal">
                            <div class="flex gap-3 md:mr-3">
                                <img class="h-[7.5rem] w-[7.5rem] rounded-full object-cover"
                                    src="{{ !empty($currentViewingUser->profile_picture)
                                        ? asset('storage/' . $currentViewingUser->profile_picture)
                                        : asset('assets/default_profile.png') }}"
                                    alt="profile" srcset="">
                                @if (false)
                                    <div class="flex flex-row gap-2 md:flex-col">
                                        <button
                                            class="rounded-md bg-blue-500 p-1 font-semibold text-white duration-500 ease-in-out hover:bg-blue-800">Change
                                            Profile</button>
                                        <button
                                            class="rounded-md bg-red-500 p-1 font-semibold text-white duration-500 ease-in-out hover:bg-red-800">Delete
                                            Profiles</button>
                                    </div>
                                @endif
                            </div>
                            <div class="md:ml-6">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="px-2 py-1 text-right font-semibold">Role</td>
                                            <td class="px-2 py-1 font-medium">
                                                @if ($currentViewingUser->is_admin == 1)
                                                    <span class="text-gray-900">Admin</span>
                                                @else
                                                    {{ $currentViewingUser->role_id == 1 ? 'Student' : 'Faculty user' }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-1 text-right font-semibold">Status</td>
                                            <td class="px-2 py-1 font-medium">
                                                @if ($currentViewingUser->is_veried == 1)
                                                    <span class="text-gray-900">Not verified</span>
                                                @else
                                                    <span class="text-green-700">Verified</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-1 text-right font-semibold">Course</td>
                                            <td class="px-2 py-1">{{ $currentViewingUser->bachelor_degree }}</td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-1 text-right font-semibold">Created at</td>
                                            <td class="px-2 py-1">
                                                {{ \Carbon\Carbon::parse($currentViewingUser->created_at)->format('F j, Y') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <section class="my-2 flex flex-col gap-4 px-6 py-4">
                        <div class="flex gap-4">
                            <div class="flex w-1/2 flex-col gap-1">
                                <x-label-input for='date_of_approval'>First name</x-label-input>
                                @if ($editUserState)
                                    <x-input-field id="date_of_approval" />
                                    @error('date_of_approval')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                @else
                                    <span class="font-medium text-gray-500">
                                        {{ $currentViewingUser->first_name == null ? 'No info' : $currentViewingUser->first_name }}
                                    </span>
                                @endif
                            </div>
                            <div class="flex w-1/2 flex-col gap-1">
                                <x-label-input for='date_of_approval'>Last name</x-label-input>
                                @if ($editUserState)
                                    <x-input-field id="date_of_approval" />
                                    @error('date_of_approval')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                @else
                                    <span class="font-medium text-gray-500">
                                        {{ $currentViewingUser->last_name == null ? 'No info' : $currentViewingUser->last_name }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex w-1/2 flex-col gap-1">
                                <x-label-input for='date_of_approval'>Email</x-label-input>
                                @if ($editUserState)
                                    <x-input-field id="date_of_approval" />
                                    @error('date_of_approval')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                @else
                                    <span class="font-medium text-gray-500">
                                        {{ $currentViewingUser->email == null ? 'No info' : $currentViewingUser->email }}
                                    </span>
                                @endif
                            </div>
                            <div class="flex w-1/2 flex-col gap-1">
                                <x-label-input for='date_of_approval'>Username</x-label-input>
                                @if ($editUserState)
                                    <x-input-field id="date_of_approval" />
                                    @error('date_of_approval')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                @else
                                    <span class="font-medium text-gray-500">
                                        {{ $currentViewingUser->username == null ? 'No info' : $currentViewingUser->username }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex w-1/2 flex-col gap-1">
                                <x-label-input for='date_of_approval'>Student ID</x-label-input>
                                @if ($editUserState)
                                    <x-input-field id="date_of_approval" />
                                    @error('date_of_approval')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                @else
                                    <span class="font-medium text-gray-500">
                                        {{ $currentViewingUser->student_id == null ? 'No info' : $currentViewingUser->student_id }}
                                    </span>
                                @endif
                            </div>
                            <div class="flex w-1/2 flex-col gap-1">
                                <x-label-input for='date_of_approval'>Phone number</x-label-input>
                                @if ($editUserState)
                                    <x-input-field id="date_of_approval" />
                                    @error('date_of_approval')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                @else
                                    <span class="font-medium text-gray-500">
                                        {{ $currentViewingUser->phone_no == null ? 'No info' : $currentViewingUser->phone_no }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex w-full flex-col gap-1">
                                <x-label-input for='date_of_approval'>Address</x-label-input>
                                @if ($editUserState)
                                    <x-input-field id="date_of_approval" />
                                    @error('date_of_approval')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                @else
                                    <span class="font-medium text-gray-500">
                                        {{ $currentViewingUser->address == null ? 'No info' : $currentViewingUser->address }}
                                    </span>
                                @endif
                            </div>
                            <div class="flex w-full flex-col gap-1">
                                <x-label-input for='date_of_approval'>Bio</x-label-input>
                                @if ($editUserState)
                                    <x-input-field id="date_of_approval" />
                                    @error('date_of_approval')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                @else
                                    <span class="font-medium text-gray-500">
                                        {{ $currentViewingUser->bio == null ? 'No info' : $currentViewingUser->bio }}
                                    </span>
                                @endif
                            </div>
                        </div>

                    </section>
                </section>
                <div
                    class="fixed bottom-0 right-0 flex w-full justify-end gap-2 rounded-b-lg bg-white bg-opacity-40 px-6 py-2 backdrop-blur-md">
                    <button
                        class="w-[5rem] rounded-md bg-red-500 p-1 text-white duration-500 ease-in-out hover:bg-red-800"
                        x-on:click=" viewEditUser = false ">Close</button>
                    <button wire:click='toggleEdit'
                        class="w-[5rem] rounded-md bg-blue-500 p-1 text-white duration-500 ease-in-out hover:bg-blue-800">Edit</button>
                </div>
            @endif
        </section>
    </div>
</div>
