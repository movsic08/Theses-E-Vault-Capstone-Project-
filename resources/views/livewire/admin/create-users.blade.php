<div class="container">
    <x-session_flash />
    <h2 class="font-black text-primary-color">Accounts</h2>
    <section class="flex flex-col gap-3 md:flex-row md:justify-between md:gap-0">
        <div class="text-light flex gap-6 text-secondary-color">
            <a class="border-b-4 border-primary-color font-bold text-primary-color" href="">All Users</a>
            <a href="">Scholars</a>
            <a href="">Admin</a>
            <a href="">Unverified</a>
        </div>
        <div class="flex gap-2">
            <button class="rounded-md border border-primary-color bg-slate-100 p-1 px-2 text-primary-color"
                href="">New
                Department</button>
            <button id="addNewUser" wire:click="toggleFormVisibility"
                class="rounded-md border border-primary-color bg-slate-100 p-1 px-2 text-primary-color">
                Add user
            </button>

            <div id="formContainer"></div>
        </div>
    </section>
    <section class="-z-10 mt-4 rounded-t-md bg-white p-4 drop-shadow-xl">
        <div class="flex justify-between">
            <h2>FILTER AREA</h2>
            <button>Apply</button>
        </div>
    </section>
    <table class="z-10 mb-8 w-full rounded-b-xl">
        <thead class="bg-slate-200">
            <tr class="uppercase">
                <td scope="col" class="p-1"><input type="checkbox" name="" id=""></td>
                <td scope="col" class="p-1">Name</td>
                <td scope="col" class="p-1">ID</td>
                <td scope="col" class="p-1">Email</td>
                <td scope="col" class="p-1">Student ID</td>
                <td scope="col" class="p-1">Role</td>
                <td scope="col" class="p-1">Program</td>
                <td scope="col" class="p-1">Date Created</td>
                <td scope="col" class="p-1">Status</td>
                <td scope="col" class="p-1">Option</td>
            </tr>
        </thead>
        <tbody class="bg-white drop-shadow-lg">
            @foreach ($users as $user)
                <tr>
                    <td class="p-1" scope="col"><input type="checkbox" name="" id="">
                    </td>
                    <td class="flex gap-1 p-1">
                        <img class="h-5 w-5 rounded-full" src="{{ asset('assets/psu_acc.jpg') }}" alt=""
                            srcset="">
                        <span>{{ $user->first_name ?? 'INCOMPLETE' }}</span>
                    </td>
                    <td class="p-1">{{ $user->id }}</td>
                    <td class="p-1">{{ $user->email }}</td>
                    <td class="p-1">{{ $user->student_id ?? 'INCOMPLETE' }}</td>
                    <td class="p-1 capitalize">{{ $user->account_role->role ?? 'INCOMPLEET' }}</td>
                    <td class="p-1 capitalize">{{ $user->bachelor_degree ?? 'INCOMPLETE' }}</td>
                    <td class="p-1">{{ $user->created_at }}</td>
                    <td class="p-1">Unverified</td>
                    <td class="p-1">Delete</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{-- form area --}}
    <div id="mainContainer" wire:ignore.self class="hidden">
        @if ($showForm)
            <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-20 backdrop-blur-sm">
                <form wire:submit.prevent="createNewUsers" id="addUserForm" autocomplete="off" method="POST">
                    @csrf
                    <div class="flex rounded bg-white p-1 drop-shadow-lg">
                        <div class="flex max-w-screen-md flex-grow flex-col overflow-x-hidden p-3">
                            <h1>Create new user</h1>
                            <div class="flex flex-col">
                                <label class="font-medium" for="username">Username</label>
                                <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                    type="text" wire:model="username" id="username" autocomplete="off"
                                    placeholder="ezname902">
                                @error('username')
                                    <span class="w-full px-1 text-xs text-red-700">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <div id="errorContainer" class="hidden">
                                    <span class="w-full px-1 text-xs text-red-700"></span>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <label class="font-medium" for="email">Email</label>
                                <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                    type="email" wire:model="email" id="email" placeholder="user@psu.edu.ph">
                                @error('email')
                                    <span class="w-full px-1 text-xs text-red-700">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="font-medium" for="password">Password</label>
                                <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                    type="password" wire:model="password" id="password">
                                @error('password')
                                    <span class="w-full px-1 text-xs text-red-700">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="font-medium" for="password_confirmation">Confirm Password</label>
                                <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                    type="password" wire:model="password_confirmation" id="password_confirmation">
                            </div>
                            <div class="flex flex-col">
                                <label class="font-medium" for="confirm_password">Account Level</label>
                                <select wire:model="account_level" id="account-level"
                                    class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('account_level')
                                    <span class="w-full px-1 text-xs text-red-700">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <label for="completeAccount" class="cursor-pointer">
                                Complete the user account?
                                <input type="checkbox" id="completeAccount">
                            </label>
                            <div id="btns" class="flex gap-2">
                                <button class="w-full rounded-md bg-red-500 p-2 text-white" wire:click="closeForm"
                                    id="cancelbtn">
                                    Cancel</button>

                                <button class="w-1/2 rounded-md bg-primary-color p-2 text-white" type="submit">Add
                                    new</button>

                            </div>
                        </div>
                        <div id="leftContainer" class="flex hidden flex-col p-3">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <span class="w-full px-1 text-xs text-red-700">
                                                {{ $error }}
                                            </span>
                                        @endforeach
                                    </ul>

                                </div>
                            @endif
                            {{-- user form --}}
                            <div class="hidden" id="user-form">
                                {{-- account rolwe --}}
                                <div class="flex flex-col">
                                    <label class="font-medium" for="confirm_password">Account role</label>
                                    <select wire:model="role_id" id="account-role"
                                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option value="student">Student</option>
                                        <option value="faculty">Faculty Member</option>
                                    </select>
                                </div>
                                {{-- first name --}}
                                <div class="flex flex-col">
                                    <label class="font-medium" for="first_nameUser">First name</label>
                                    <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                        type="text" wire:model="first_name" id="first_nameUser"
                                        placeholder="John" value="{{ old('first_name') }}">
                                </div>
                                <div class="flex flex-col">
                                    <label class="font-medium" for="last_nameUser">Last name</label>
                                    <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                        type="text" wire:model="last_name" id="last_nameUser" placeholder="John"
                                        value="{{ old('last_name') }}">
                                </div>
                                <div class="flex flex-col">
                                    <label class="font-medium" for="student_idUser">Student ID</label>
                                    <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                        type="text" wire:model="student_id" id="student_idUser"
                                        placeholder="John" value="{{ old('student_id') }}">
                                </div>
                                <div class="flex flex-col">
                                    <label class="font-medium" for="profile_pictureUser">Profile picture</label>
                                    <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                        type="file" wire:model="profile_picture" id="profile_pictureUser"
                                        placeholder="John" value="{{ old('profile_picture') }}">
                                </div>
                                <div class="flex flex-col">
                                    <label class="font-medium" for="bachelor_degree">Bachelor Degree</label>
                                    <select wire:model="bachelor_degree" id="bachelor-degree"
                                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        @foreach ($bachelor_degree as $degree)
                                            <option value="{{ $degree->id }}">{{ $degree->degree_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex flex-col">
                                    <label class="font-medium" for="bio">BIO</label>
                                    <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                        type="text" wire:model="bio" id="bio" placeholder="John"
                                        value="{{ old('bio') }}">
                                </div>
                                <div class="flex gap-2">
                                    <button class="w-1/2 rounded-md bg-red-500 p-2 text-white" wire:click="closeForm"
                                        id="cancelbtnUserForm">
                                        Cancel</button>
                                    <button class="w-1/2 rounded-md bg-primary-color p-2 text-white"
                                        type="submit">Add
                                        new</button>
                                </div>
                            </div>
                            {{-- admin form --}}
                            <div class="hidden" id="admin-form">
                                <div class="flex flex-col">
                                    <label class="font-medium" for="first_name">First name</label>
                                    <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                        type="text" name="first_name" id="first_name" placeholder="John"
                                        value="{{ old('first_name') }}">
                                </div>
                                <div class="flex flex-col">
                                    <label class="font-medium" for="last_name">Last name</label>
                                    <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                        type="text" name="last_name" id="last_name" placeholder="John"
                                        value="{{ old('last_name') }}">
                                </div>
                                <div class="flex flex-col">
                                    <label class="font-medium" for="student_id">Faculty ID</label>
                                    <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                        type="text" name="student_id" id="student_id" placeholder="John"
                                        value="{{ old('student_id') }}">
                                </div>
                                <div class="flex flex-col">
                                    <label class="font-medium" for="profile_picture">Profile picture</label>
                                    <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                        type="file" name="profile_picture" id="profile_picture"
                                        placeholder="John" value="{{ old('profile_picture') }}">
                                </div>
                                <div class="flex gap-2">
                                    <button class="w-1/2 rounded-md bg-red-500 p-2 text-white" wire:click="closeForm"
                                        id="cancelbtnAdminForm">
                                        Cancel</button>
                                    <button class="w-1/2 rounded-md bg-primary-color p-2 text-white"
                                        type="submit">Add
                                        new</button>
                                </div>
                            </div>
                            {{-- end adminf rom --}}
                        </div>
                    </div>
                </form>
            </div>
        @endif
    </div>
</div>
<script>
    Livewire.on('userAdded', () => {
        hideForm(); // Call the JavaScript function to hide the form
    });

    function hideForm() {
        $("#mainContainer").addClass("hidden");
        // You might also want to clear form fields here
    }
</script>
