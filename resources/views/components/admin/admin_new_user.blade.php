<div id="mainContainer" class="hidden">
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-20 backdrop-blur-sm">
        <form action="javascript:void(0)" id="addUserForm" name="addUserForm" autocomplete="off" method="POST">
            @csrf
            <div class="flex rounded bg-white p-1 drop-shadow-lg">
                <div class="flex flex-grow flex-col p-3">
                    <h1>Create new user</h1>
                    <input type="hidden" name="id" id="id">
                    <div class="flex flex-col">
                        <label class="font-medium" for="username">Username</label>
                        <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950" type="text"
                            name="username" id="username" placeholder="ezname902" value="{{ old('username') }}">
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
                        <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950" type="email"
                            name="email" id="email" placeholder="user@psu.edu.ph" value="{{ old('email') }}">
                        @error('email')
                            <span class="w-full px-1 text-xs text-red-700">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label class="font-medium" for="password">Password</label>
                        <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950" type="password"
                            name="password" id="password">
                        @error('password')
                            <span class="w-full px-1 text-xs text-red-700">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label class="font-medium" for="password_confirmation">Confirm Password</label>
                        <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950" type="password"
                            name="password_confirmation" id="password_confirmation">
                    </div>
                    <div class="flex flex-col">
                        <label class="font-medium" for="confirm_password">Account Level</label>
                        <select name="account_level" id="account-level"
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
                        <div class="w-full rounded-md bg-red-500 p-2 text-white" id="cancelbtn">
                            Cancel</div>

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
                            <select name="role_id" id="account-role"
                                class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option value="student">Student</option>
                                <option value="faculty">Faculty Member</option>
                            </select>
                        </div>
                        {{-- first name --}}
                        <div class="flex flex-col">
                            <label class="font-medium" for="first_nameUser">First name</label>
                            <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                type="text" name="first_name" id="first_nameUser" placeholder="John"
                                value="{{ old('first_name') }}">
                        </div>
                        <div class="flex flex-col">
                            <label class="font-medium" for="last_nameUser">Last name</label>
                            <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                type="text" name="last_name" id="last_nameUser" placeholder="John"
                                value="{{ old('last_name') }}">
                        </div>
                        <div class="flex flex-col">
                            <label class="font-medium" for="student_idUser">Student ID</label>
                            <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                type="text" name="student_id" id="student_idUser" placeholder="John"
                                value="{{ old('student_id') }}">
                        </div>
                        <div class="flex flex-col">
                            <label class="font-medium" for="profile_pictureUser">Profile picture</label>
                            <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                type="file" name="profile_picture" id="profile_pictureUser" placeholder="John"
                                value="{{ old('profile_picture') }}">
                        </div>
                        <div class="flex flex-col">
                            <label class="font-medium" for="bachelor_degree">Bachelor Degree</label>
                            <select name="bachelor_degree" id="bachelor-degree"
                                class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                @foreach ($bachelor_degree as $degree)
                                    <option value="{{ $degree->id }}">{{ $degree->degree_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-medium" for="bio">BIO</label>
                            <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                type="text" name="bio" id="bio" placeholder="John"
                                value="{{ old('bio') }}">
                        </div>
                        <div class="flex gap-2">
                            <button class="w-1/2 rounded-md bg-red-500 p-2 text-white" id="cancelbtnUserForm">
                                Cancel</button>
                            <button class="w-1/2 rounded-md bg-primary-color p-2 text-white" type="submit">Add
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
                                type="file" name="profile_picture" id="profile_picture" placeholder="John"
                                value="{{ old('profile_picture') }}">
                        </div>
                        <div class="flex gap-2">
                            <button class="w-1/2 rounded-md bg-red-500 p-2 text-white" id="cancelbtnAdminForm">
                                Cancel</button>
                            <button class="w-1/2 rounded-md bg-primary-color p-2 text-white" type="submit">Add
                                new</button>
                        </div>
                    </div>
                    {{-- end adminf rom --}}
                </div>
            </div>
        </form>
    </div>
</div>
@livewireScripts
