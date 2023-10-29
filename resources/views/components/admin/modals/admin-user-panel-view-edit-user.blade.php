<div class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm lg:items-start"
    x-data="{ viewEditUser: false }" x-show="viewEditUser" x-on:open-usr.window="viewEditUser = true"
    x-on:close-usr.window="viewEditUser = false" x-on:keydown.escape.window="viewEditUser = false"
    x-transition:enter.duration.400ms x-transition:leave.duration.300ms style="display: none">
    <div class="right-0 top-0 mx-auto md:flex md:items-center md:justify-center">
        <section
            class="custom-scrollbar relative mx-3 h-fit w-fit overflow-y-auto rounded-lg bg-white drop-shadow-xl md:mx-0 md:mt-[6rem] lg:max-h-[35rem] lg:min-h-[35rem] lg:min-w-[40rem]">
            @if (isset($currentViewingUser))
                <div
                    class="sticky right-0 top-0 z-40 w-full rounded-t-lg bg-opacity-30 px-6 py-4 text-center text-primary-color backdrop-blur-2xl">
                    <strong>{{ $editUserState ? 'Editing' : 'Viewing' }}
                        {{ $currentViewingUser->first_name == null ? 'User' : $currentViewingUser->first_name }}
                        information</strong>
                </div>
                <section class="h-full pb-2">
                    <div class="px-6 py-4">
                        <div class="flex flex-col items-center justify-center gap-2 md:flex-row md:justify-normal">
                            <div class="flex gap-3 md:mr-3">
                                <img class="h-[7.5rem] w-[7.5rem] rounded-full object-cover"
                                    src="{{ !empty($currentViewingUser->profile_picture)
                                        ? asset('storage/' . $currentViewingUser->profile_picture)
                                        : asset('assets/default_profile.png') }}"
                                    alt="profile" srcset="">
                                @if ($profilePictureOption)
                                    <div class="flex flex-row gap-2 md:flex-col">
                                        <button
                                            class="h-ft rounded-md bg-blue-500 p-1 font-semibold text-white duration-500 ease-in-out hover:bg-blue-800">Change
                                            Profile</button>
                                        <button
                                            class="h-fit rounded-md bg-red-500 p-1 font-semibold text-white duration-500 ease-in-out hover:bg-red-800">Delete
                                            Profiles</button>
                                    </div>
                                @endif
                            </div>
                            <div class="md:ml-6">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="px-2 py-1 text-right font-semibold text-gray-700">Role</td>
                                            <td class="px-2 py-1 font-medium">
                                                @if ($currentViewingUser->is_admin == 1)
                                                    <span class="text-gray-500">Admin</span>
                                                @else
                                                    {{ $currentViewingUser->role_id == 1 ? 'Student' : 'Faculty user' }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-1 text-right font-semibold text-gray-700">Status</td>
                                            <td class="px-2 py-1 font-medium">
                                                @if ($currentViewingUser->is_veried == 1)
                                                    <span class="text-red-900">Not verified</span>
                                                @else
                                                    <span class="text-green-700">Verified</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-1 text-right font-semibold text-gray-700">Course</td>
                                            <td class="px-2 py-1 font-medium text-gray-500">
                                                {{ $currentViewingUser->bachelor_degree }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-1 text-right font-semibold text-gray-700">Created at</td>
                                            <td class="px-2 py-1 font-medium text-gray-500">
                                                {{ \Carbon\Carbon::parse($currentViewingUser->created_at)->format('F j, Y') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <section class="my-2 flex flex-col gap-4 px-6 py-4">
                        <div class="flex flex-col gap-4 md:flex-row">
                            <div class="flex w-full flex-col gap-1 md:w-1/2">
                                <x-label-input for='update_fname'>First name</x-label-input>
                                @if ($editUserState)
                                    <x-input-field id="update_fname" wire:model.live='update_fname' />
                                    @error('update_fname')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                @else
                                    <span class="font-medium text-gray-500">
                                        {{ $currentViewingUser->first_name == null ? 'No info' : $currentViewingUser->first_name }}
                                    </span>
                                @endif
                            </div>
                            <div class="flex w-full flex-col gap-1 md:w-1/2">
                                <x-label-input for='update_lname'>Last name</x-label-input>
                                @if ($editUserState)
                                    <x-input-field id="update_lname" wire:model.live='update_lname' />
                                    @error('update_lname')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                @else
                                    <span class="font-medium text-gray-500">
                                        {{ $currentViewingUser->last_name == null ? 'No info' : $currentViewingUser->last_name }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-col gap-4 md:flex-row">
                            <div class="flex w-full flex-col gap-1 md:w-1/2">
                                <x-label-input for='update_email'>Email</x-label-input>
                                @if ($editUserState)
                                    <x-input-field id="update_email" wire:model.live='update_email' />
                                    @error('update_email')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                @else
                                    <span class="font-medium text-gray-500">
                                        {{ $currentViewingUser->email == null ? 'No info' : $currentViewingUser->email }}
                                    </span>
                                @endif
                            </div>
                            <div class="flex w-full flex-col gap-1 md:w-1/2">
                                <x-label-input for='update_Username'>Username</x-label-input>
                                @if ($editUserState)
                                    <x-input-field id="update_Username" wire:model.live='update_username' />
                                    @error('update_username')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                @else
                                    <span class="font-medium text-gray-500">
                                        {{ $currentViewingUser->username == null ? 'No info' : $currentViewingUser->username }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-col gap-4 md:flex-row">
                            <div class="flex w-full flex-col gap-1 md:w-1/2">
                                <x-label-input for='update_studentID'>Student ID</x-label-input>
                                @if ($editUserState)
                                    <x-input-field id="update_studentID" wire:model.live='update_studentID' />
                                    @error('update_studentID')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                @else
                                    <span class="font-medium text-gray-500">
                                        {{ $currentViewingUser->student_id == null ? 'No info' : $currentViewingUser->student_id }}
                                    </span>
                                @endif
                            </div>
                            <div class="flex w-full flex-col gap-1 md:w-1/2">
                                <x-label-input for='update_phoneNum'>Phone number</x-label-input>
                                @if ($editUserState)
                                    <x-input-field id="update_phoneNum" wire:model.live='update_phoneNum' />
                                    @error('update_phoneNum')
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
                                <x-label-input for='update_address'>Address</x-label-input>
                                @if ($editUserState)
                                    <x-input-field id="update_address" wire:model.live='update_address' />
                                    @error('update_address')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                @else
                                    <span class="font-medium text-gray-500">
                                        {{ $currentViewingUser->address == null ? 'No info' : $currentViewingUser->address }}
                                    </span>
                                @endif
                            </div>
                            <div class="flex w-full flex-col gap-1">
                                <x-label-input for='update_bio'>Bio</x-label-input>
                                @if ($editUserState)
                                    <x-input-field id="update_bio" wire:model.live='update_bio' />
                                    @error('update_bio')
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
                    class="sticky bottom-0 right-0 flex w-full justify-end gap-2 rounded-b-lg bg-white bg-opacity-40 px-6 py-2 backdrop-blur-2xl">
                    <button wire:click='toggleEditClose'
                        class="w-[5rem] rounded-md bg-red-500 p-1 text-white duration-500 ease-in-out hover:bg-red-800"
                        x-on:click=" viewEditUser = false ">Close</button>
                    @if (!$editUserState)
                        <button wire:click='toggleEdit({{ $currentViewingUser->id }})'
                            class="w-[5rem] rounded-md bg-blue-500 p-1 text-white duration-500 ease-in-out hover:bg-blue-800">Edit</button>
                    @else
                        <button wire:click='updateUserInfo({{ $currentViewingUser->id }})'
                            class="w-[5rem] rounded-md bg-blue-500 p-1 text-white duration-500 ease-in-out hover:bg-blue-800">Save</button>
                    @endif

                </div>
            @endif
        </section>
    </div>
</div>
