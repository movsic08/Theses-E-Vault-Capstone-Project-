<div class="container">
    {{-- modal for adding new department --}}
    @if ($newDepartmentBox)
        <div
            class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm">
            <section class="h-fit w-fit rounded-lg bg-white p-6 drop-shadow-xl">
                @if ($deleteDepartmentBox)
                    <div
                        class="absolute left-0 top-0 h-full w-full rounded-lg bg-gray-900 bg-opacity-40 backdrop-blur-sm">
                        <div class="flex h-full w-full items-center justify-center">
                            <div class="rounded-lg bg-white p-4">
                                <h2>Are you sure you want to delete this?</h2>
                                <h2>{{ $idGathered }}</h2>
                                <div class="flex">
                                    <strong>Acronym:</strong>
                                    <p class="ml-1">{{ $nameGathered }}</p>
                                </div>
                                <div class="flex">
                                    <strong>Name:</strong>
                                    <p class="ml-1">{{ $fullNameGathered }}</p>
                                </div>
                                <div class="flex w-full gap-2">
                                    <div wire:click='deleteDepartment({{ $idGathered }})'
                                        class="cursor-pointer rounded bg-red-600 p-1 text-white">Yes</div>
                                    <div wire:click='closeDeleteDepartmentBox'
                                        class="border-bg-red-600 cursor-pointer rounded border p-1">No</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($editDepartmentBox)
                    <div
                        class="absolute left-0 top-0 h-full w-full rounded-lg bg-gray-900 bg-opacity-40 backdrop-blur-sm">
                        <div class="flex h-full items-center justify-center">
                            <div class="w-[20rem] rounded-lg bg-white p-4">
                                <h2>Edit Department Info</h2>
                                <form wire:submit.prevent='editDepartment' class="flex w-full flex-col gap-2">
                                    <div class="flex flex-col">
                                        <label class="text-sm font-semibold" for="da">Department Acronym</label>
                                        <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                            wire:model.live="course_acronymEdit" id="da" />
                                        @error('course_acronymEdit')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="flex w-full flex-col">
                                        <label class="text-sm font-semibold" for="dn">Department Name</label>
                                        <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                            type="text" wire:model.live="degree_nameEdit" id="dn"
                                            size="{{ strlen($degree_nameEdit) }}" />
                                        @error('degree_nameEdit')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <h2>{{ $idGathered }}</h2>
                                    <div class="flex w-full gap-2">
                                        <button type="submit"
                                            class="cursor-pointer rounded bg-blue-600 p-1 text-white">Confirm</button>
                                        <div wire:click='toggleEditDepartmentBox("{{ $idGathered }}", "{{ $nameGathered }}", "{{ $fullNameGathered }}")'
                                            class="border-bg-red-600 cursor-pointer rounded border p-1">Cancel</div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="flex h-fit items-center justify-between">
                    <h2>Add new department</h2>
                    <svg wire:click='closeNewDepartmentBox'
                        class="h-8 cursor-pointer text-red-600 duration-200 ease-in-out hover:rotate-45"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M22 12a10 10 0 1 1-20 0 10 10 0 0 1 20 0ZM8.693 7.808a.626.626 0 1 0-.885.885L11.116 12l-3.308 3.307a.626.626 0 1 0 .885.885L12 12.884l3.307 3.308a.627.627 0 0 0 .885-.885L12.884 12l3.308-3.307a.627.627 0 0 0-.885-.885L12 11.116 8.693 7.808Z">
                        </path>
                    </svg>
                </div>
                <form wire:submit.prevent='addDepartment' action="" class="my-2 flex flex-col gap-2">
                    <label class="font-semibold text-gray-600" for="courseAcronym">Course acronym</label>
                    <input class="rounded-md border border-gray-400 p-2 text-sm uppercase" type="text"
                        wire:model.live="course_acronym" id="courseAcronym" />
                    @error('course_acronym')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    <label class="font-semibold text-gray-600" for="degreeName">Degree name</label>
                    <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                        wire:model.live="degree_name" id="degreeName" />
                    @error('degree_name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    <div class="flex w-full gap-4">
                        <button
                            class="w-1/2 cursor-pointer rounded-lg bg-blue-600 p-1 text-white duration-200 ease-in-out hover:bg-blue-800"
                            type="submit" value="Submit">Add </button>
                        <input class="w-1/2 cursor-pointer rounded-lg border border-gray-500 p-1" type="reset"
                            value="Clear">
                    </div>
                </form>
                <div class="max-h-60 overflow-y-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-2 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Acronym
                                </th>
                                <th
                                    class="px-6 py-2 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Degree Name
                                </th>
                                <th
                                    class="px-6 py-2 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    <svg class="h-4 text-gray-900" viewBox="0 0 31 31" fill="currentColor">
                                        <path
                                            d="M18.0614 2.83145C17.3089 0.279368 13.6922 0.279368 12.9397 2.83145L12.7575 3.44978C12.6449 3.83181 12.4484 4.18381 12.1821 4.47998C11.9159 4.77615 11.5868 5.00899 11.2188 5.16142C10.8509 5.31384 10.4536 5.38199 10.0559 5.36087C9.6582 5.33976 9.27028 5.2299 8.92057 5.03937L8.35474 4.7302C6.01557 3.45708 3.45912 6.01499 4.73224 8.3527L5.04141 8.91854C5.23221 9.2683 5.34229 9.65635 5.36355 10.0542C5.38481 10.4521 5.31672 10.8496 5.16428 11.2177C5.01183 11.5858 4.7789 11.9151 4.48257 12.1815C4.18625 12.4478 3.83405 12.6444 3.45182 12.7569L2.83203 12.9392C0.279948 13.6917 0.279948 17.3083 2.83203 18.0608L3.45036 18.2431C3.83239 18.3556 4.18439 18.5522 4.48056 18.8184C4.77673 19.0847 5.00957 19.4138 5.16199 19.7817C5.31442 20.1496 5.38257 20.547 5.36145 20.9447C5.34034 21.3424 5.23048 21.7303 5.03995 22.08L4.73078 22.6458C3.45766 24.985 6.01557 27.5429 8.35328 26.2683L8.91912 25.9592C9.26888 25.7684 9.65693 25.6583 10.0548 25.637C10.4526 25.6158 10.8502 25.6838 11.2183 25.8363C11.5864 25.9887 11.9157 26.2217 12.1821 26.518C12.4484 26.8143 12.645 27.1665 12.7575 27.5487L12.9397 28.1685C13.6922 30.7206 17.3089 30.7206 18.0614 28.1685L18.2437 27.5487C18.356 27.1666 18.5524 26.8144 18.8186 26.518C19.0848 26.2217 19.414 25.9888 19.782 25.8363C20.15 25.6839 20.5474 25.6158 20.9452 25.637C21.343 25.6583 21.7309 25.7684 22.0806 25.9592L22.6464 26.2698C24.9856 27.5415 27.5435 24.985 26.2689 22.6473L25.9597 22.08C25.7695 21.7303 25.6598 21.3426 25.6389 20.9451C25.6179 20.5475 25.6861 20.1504 25.8385 19.7826C25.9909 19.4149 26.2237 19.0859 26.5197 18.8198C26.8157 18.5537 27.1675 18.3571 27.5493 18.2446L28.1691 18.0608C30.7212 17.3083 30.7212 13.6917 28.1691 12.9392L27.5493 12.7569C27.1673 12.6444 26.8153 12.4478 26.5191 12.1816C26.223 11.9153 25.9901 11.5862 25.8377 11.2183C25.6853 10.8504 25.6171 10.453 25.6382 10.0553C25.6594 9.65762 25.7692 9.2697 25.9597 8.91999L26.2704 8.35416C27.542 6.01499 24.9856 3.45854 22.6479 4.73166L22.0806 5.04083C21.7309 5.23109 21.3431 5.34072 20.9456 5.3617C20.5481 5.38267 20.151 5.31446 19.7832 5.16205C19.4155 5.00965 19.0865 4.77691 18.8204 4.48089C18.5543 4.18487 18.3577 3.83306 18.2452 3.45124L18.0614 2.83145ZM15.5006 20.8404C14.7815 20.8695 14.0639 20.753 13.3909 20.4979C12.7179 20.2428 12.1035 19.8544 11.5844 19.3559C11.0653 18.8573 10.6522 18.2591 10.3701 17.597C10.088 16.9349 9.94255 16.2226 9.94255 15.5029C9.94255 14.7832 10.088 14.0709 10.3701 13.4088C10.6522 12.7467 11.0653 12.1485 11.5844 11.65C12.1035 11.1515 12.7179 10.763 13.3909 10.5079C14.0639 10.2528 14.7815 10.1363 15.5006 10.1654C16.8698 10.2333 18.1605 10.8251 19.1056 11.8182C20.0507 12.8113 20.5777 14.1298 20.5777 15.5007C20.5777 16.8717 20.0507 18.1901 19.1056 19.1832C18.1605 20.1763 16.8698 20.7681 15.5006 20.836V20.8404Z" />
                                    </svg>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="custom-scrollbar max-h-64 overflow-y-auto overflow-x-hidden">
                    <table class="w-full">
                        <tbody class="text-gray-500">
                            @foreach ($degreeLists as $degreeListsItem)
                                <tr>
                                    <td class="whitespace-normal px-6 py-2">
                                        {{ $degreeListsItem->degree_name }}
                                    </td>
                                    <td class="whitespace-normal px-6 py-2">
                                        {{ $degreeListsItem->name }}
                                    </td>
                                    <td class="whitespace-normal px-6 py-2">
                                        <div class="flex gap-2">
                                            <svg wire:click='toggleEditDepartmentBox("{{ $degreeListsItem->id }}", "{{ $degreeListsItem->degree_name }}", "{{ $degreeListsItem->name }}")'
                                                class="h-6 cursor-pointer rounded-md bg-blue-600 p-1 text-white duration-200 ease-in-out hover:bg-blue-800"
                                                fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18.067 2.182a.625.625 0 0 0-.884 0l-2.058 2.059 4.634 4.634 2.058-2.058a.623.623 0 0 0 0-.885l-3.75-3.75Zm.808 7.576L14.24 5.125 6.116 13.25h.259a.625.625 0 0 1 .625.624v.625h.625a.625.625 0 0 1 .625.625v.625h.625a.625.625 0 0 1 .625.626V17h.625a.625.625 0 0 1 .625.625v.258l8.125-8.125ZM9.54 19.093a.625.625 0 0 1-.04-.218v-.625h-.625a.625.625 0 0 1-.625-.625V17h-.625A.625.625 0 0 1 7 16.375v-.626h-.625a.625.625 0 0 1-.625-.625V14.5h-.625a.624.624 0 0 1-.219-.04l-.224.223a.625.625 0 0 0-.137.21l-2.5 6.25a.625.625 0 0 0 .812.813l6.25-2.5a.625.625 0 0 0 .21-.138l.223-.223Z">
                                                </path>
                                            </svg>
                                            <svg wire:click='openDeleteDepartmentBox("{{ $degreeListsItem->id }}", "{{ $degreeListsItem->degree_name }}", "{{ $degreeListsItem->name }}")'
                                                class="h-6 cursor-pointer rounded-md bg-red-600 p-1 text-white duration-200 ease-in-out hover:bg-red-800"
                                                fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15.36 4.2v1.2h4.2a.6.6 0 0 1 0 1.2h-.645L17.89 19.392a2.4 2.4 0 0 1-2.393 2.208H8.022a2.4 2.4 0 0 1-2.392-2.208L4.606 6.6H3.96a.6.6 0 0 1 0-1.2h4.2V4.2a1.8 1.8 0 0 1 1.8-1.8h3.6a1.8 1.8 0 0 1 1.8 1.8Zm-6 0v1.2h4.8V4.2a.6.6 0 0 0-.6-.6h-3.6a.6.6 0 0 0-.6.6Zm-1.8 4.235.6 10.2a.6.6 0 1 0 1.198-.072l-.6-10.2a.6.6 0 1 0-1.198.072Zm7.836-.633a.6.6 0 0 0-.633.564l-.6 10.2a.6.6 0 0 0 1.197.07l.6-10.2a.6.6 0 0 0-.564-.634ZM11.76 7.8a.6.6 0 0 0-.6.6v10.2a.6.6 0 1 0 1.2 0V8.4a.6.6 0 0 0-.6-.6Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    @endif
    @if ($showDeleteConfirmation)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm">
            <section class="h-fit w-fit rounded-lg bg-white p-6 drop-shadow-xl">
                <h2>Are you sure you want to delete this user?</h2>
                <div class="flex w-full items-center justify-center">
                    <img class="h-14 rounded-full" src="{{ asset('assets/default_profile.png') }}" alt="DP">
                </div>
                <h2>{{ $selectedUserId }}</h2>
                <p>Name: <strong>ELmer TIrao</strong></p>
                <p>Username: <strong>ksdfsk</strong></p>
                <div>
                    <button wire:click='cancelDeleteBoxUser'
                        class="border-bg-red-500 rounded-md border p-2">Cancel</button>
                    <button wire:click='deleteUser'
                        class="rounded-md bg-red-500 p-2 text-white duration-150 ease-out hover:bg-red-700">Delete
                        user</button>
                </div>
            </section>
        </div>
    @endif

    @if (!$addUserButton)
        <div class="fixed inset-0 z-50 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm">
            <section
                class="{{ $completeInfo == false ? 'w-fit' : 'lg:w-[25rem]' }} mt-[5rem] h-fit rounded-lg bg-white p-2 drop-shadow-xl">
                <div class="relative flex items-center justify-center">
                    <h2>Add new users</h2>
                    <svg wire:click='showAddUserBox' class="absolute right-0 top-1 h-4 cursor-pointer text-red-500"
                        fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M22 12a10 10 0 1 1-20 0 10 10 0 0 1 20 0ZM8.693 7.808a.626.626 0 1 0-.885.885L11.116 12l-3.308 3.307a.626.626 0 1 0 .885.885L12 12.884l3.307 3.308a.627.627 0 0 0 .885-.885L12.884 12l3.308-3.307a.627.627 0 0 0-.885-.885L12 11.116 8.693 7.808Z">
                        </path>
                    </svg>
                </div>
                <form action="">
                    <div class="">
                        <label for="userLevel">User level:</label>
                        <select wire:model.live='userLevel' name="" id="">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            <option value="superAdmin">Super admin</option>
                        </select>
                    </div>
                    <div>
                        @if ($userLevel == 'user')
                            <div class="flex flex-col gap-2 md:flex-row">
                                <div class="w-full">
                                    <div class="flex flex-col">
                                        <label class="font-medium" for="username">Username</label>
                                        <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                            type="text" name="username" id="username" placeholder="ezname902"
                                            value="{{ old('username') }}">
                                        @error('username')
                                            <span class="w-full text-xs text-red-700">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="font-medium" for="email">Email</label>
                                        <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                            type="email" name="email" id="email"
                                            placeholder="user@psu.edu.ph" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="w-full text-xs text-red-700">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="font-medium" for="password">Password</label>
                                        <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                            type="password" name="password" id="password">
                                        @error('password')
                                            <span class="w-full text-xs text-red-700">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="font-medium" for="password_confirmation">Confirm
                                            Password</label>
                                        <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                            type="password" name="password_confirmation" id="password_confirmation">
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="font-medium" for="confirm_password">Account role</label>
                                        <select name="role_id" id="account-role"
                                            class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                            <option value="student">Student</option>
                                            <option value="faculty">Faculty Member</option>
                                        </select>
                                        @error('role_id')
                                            <span class="w-full text-xs text-red-700">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="completeInfo">Complete user information</label>
                                        <input type="checkbox" wire:model.live='completeInfo' id="completeInfo">
                                    </div>
                                    @if (!$completeInfo)
                                        <input
                                            class="cursor-pointer rounded-md bg-blue-950 p-2 font-medium text-white duration-200 hover:bg-blue-800"
                                            type="submit" value="Create">
                                    @endif
                                </div>
                                {{-- @if ($completeInfo) --}}
                                <div class="flex w-full flex-col">
                                    <div class="">
                                        <div class="flex flex-col">
                                            <div class="flex flex-row gap-2">
                                                <div>
                                                    <label class="font-medium" for="email">First Name</label>
                                                    <input
                                                        class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                                        type="text" name="email" id="email">
                                                    @error('email')
                                                        <span class="w-full text-xs text-red-700">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div>
                                                    <label class="font-medium" for="email">Last Name</label>
                                                    <input
                                                        class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                                        type="text" name="email" id="email">
                                                    @error('email')
                                                        <span class="w-full text-xs text-red-700">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="flex w-full flex-col">
                                                <label class="font-medium" for="email">Phone number</label>
                                                <input
                                                    class="h-9 w-full rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                                    type="text" name="email" id="email">
                                                @error('email')
                                                    <span class="w-full text-xs text-red-700">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <label for="accountRole">Account Role:
                                                <select wire:model.live='accountRole' name="" id="">
                                                    <option value="student">Student</option>
                                                    <option value="facultyMember">Faculty Member</option>
                                                </select>
                                            </label>
                                            <div class="flex flex-col gap-2">
                                                <label class="font-medium" for="email">Student ID</label>
                                                <input
                                                    class="h-9 w-full rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                                    type="text" name="email" id="email">
                                                @error('email')
                                                    <span class="w-full text-xs text-red-700">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="flex w-full flex-col gap-2">
                                                <label class="font-medium" for="email">Bachelor Degree</label>
                                                <input
                                                    class="h-9 w-full rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                                    type="text" name="email" id="email">
                                                @error('email')
                                                    <span class="w-full text-xs text-red-700">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="flex flex-col">
                                                <label class="font-medium" for="email">Address</label>
                                                <input
                                                    class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                                    type="text" name="email" id="email">
                                                @error('email')
                                                    <span class="w-full text-xs text-red-700">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <input
                                        class="w-fit cursor-pointer rounded-md bg-blue-950 p-2 font-medium text-white duration-200 hover:bg-blue-800"
                                        type="submit" value="Create">
                                </div>
                                {{-- @endif --}}
                            </div>
                        @elseif ($userLevel == 'admin')
                            <div>
                                <h2>admin</h2>
                            </div>
                        @elseif ($userLevel == 'superAdmin')
                            <div>
                                <h2>super admin</h2>
                            </div>
                        @endif
                    </div>
                </form>
            </section>
        </div>
    @endif


    {{-- content of admin user panel --}}
    <x-session_flash />
    <div class="px-4">
        <h1 class="font-black text-primary-color">Accounts</h1>
        <section class="">
            <div class="my-2 flex justify-between">
                <div class="flex gap-6 text-xs text-primary-color lg:text-base">
                    <button wire:click='switchToAllUsersData'
                        class="{{ $currentQuery == 'allUsers' ? 'border-b-2 border-primary-color font-bold' : '' }}">All
                        users</button>
                    <button wire:click='switchToVerifiedUsersData'
                        class="{{ $currentQuery == 'verifiedUsers' ? 'border-b-2 border-primary-color font-bold' : '' }}">Verified</button>
                    <button wire:click='switchToUnverifiedUsers'
                        class="{{ $currentQuery == 'unverifiedUsers' ? 'border-b-2 border-primary-color font-bold' : '' }}">Unverified</button>
                    <button wire:click='switchToAdminUsers'
                        class="{{ $currentQuery == 'adminUsers' ? 'border-b-2 border-primary-color font-bold' : '' }}">Admins</button>
                </div>
                <div class="flex gap-4 text-xs lg:text-base">
                    <div wire:click='openNewDepartmentBox'
                        class="cursor-pointer rounded-lg border border-primary-color p-1 px-3 text-primary-color">
                        Departments</div>
                    <div wire:click='showAddUserBox'
                        class="cursor-pointer rounded-lg bg-primary-color p-1 px-3 text-white">Add user</div>
                </div>
            </div>
            <div class="mb-8 rounded-2xl bg-white px-5 py-2 drop-shadow-md">
                <h1>Sub enu area</h1>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="font-semibold capitalize">
                                <th class="px-2 py-1 text-left text-gray-900">
                                    <input type="checkbox" name="" id="">
                                </th>
                                <th class="px-2 py-1 text-left text-gray-900">
                                    Name
                                </th>
                                <th class="px-2 py-1 text-left text-gray-900">
                                    studend ID
                                </th>
                                <th class="px-2 py-1 text-left text-gray-900">
                                    Role
                                </th>
                                <th class="px-2 py-1 text-left text-gray-900">
                                    Course/ Program
                                </th>
                                <th class="px-2 py-1 text-left text-gray-900">
                                    Date created
                                </th>
                                <th class="w-fit px-2 py-1 text-center text-gray-900">
                                    Status
                                </th>
                                <th class="px-2 py-1 text-left text-gray-900">
                                    <svg class="h-4 text-gray-900" viewBox="0 0 31 31" fill="currentColor">
                                        <path
                                            d="M18.0614 2.83145C17.3089 0.279368 13.6922 0.279368 12.9397 2.83145L12.7575 3.44978C12.6449 3.83181 12.4484 4.18381 12.1821 4.47998C11.9159 4.77615 11.5868 5.00899 11.2188 5.16142C10.8509 5.31384 10.4536 5.38199 10.0559 5.36087C9.6582 5.33976 9.27028 5.2299 8.92057 5.03937L8.35474 4.7302C6.01557 3.45708 3.45912 6.01499 4.73224 8.3527L5.04141 8.91854C5.23221 9.2683 5.34229 9.65635 5.36355 10.0542C5.38481 10.4521 5.31672 10.8496 5.16428 11.2177C5.01183 11.5858 4.7789 11.9151 4.48257 12.1815C4.18625 12.4478 3.83405 12.6444 3.45182 12.7569L2.83203 12.9392C0.279948 13.6917 0.279948 17.3083 2.83203 18.0608L3.45036 18.2431C3.83239 18.3556 4.18439 18.5522 4.48056 18.8184C4.77673 19.0847 5.00957 19.4138 5.16199 19.7817C5.31442 20.1496 5.38257 20.547 5.36145 20.9447C5.34034 21.3424 5.23048 21.7303 5.03995 22.08L4.73078 22.6458C3.45766 24.985 6.01557 27.5429 8.35328 26.2683L8.91912 25.9592C9.26888 25.7684 9.65693 25.6583 10.0548 25.637C10.4526 25.6158 10.8502 25.6838 11.2183 25.8363C11.5864 25.9887 11.9157 26.2217 12.1821 26.518C12.4484 26.8143 12.645 27.1665 12.7575 27.5487L12.9397 28.1685C13.6922 30.7206 17.3089 30.7206 18.0614 28.1685L18.2437 27.5487C18.356 27.1666 18.5524 26.8144 18.8186 26.518C19.0848 26.2217 19.414 25.9888 19.782 25.8363C20.15 25.6839 20.5474 25.6158 20.9452 25.637C21.343 25.6583 21.7309 25.7684 22.0806 25.9592L22.6464 26.2698C24.9856 27.5415 27.5435 24.985 26.2689 22.6473L25.9597 22.08C25.7695 21.7303 25.6598 21.3426 25.6389 20.9451C25.6179 20.5475 25.6861 20.1504 25.8385 19.7826C25.9909 19.4149 26.2237 19.0859 26.5197 18.8198C26.8157 18.5537 27.1675 18.3571 27.5493 18.2446L28.1691 18.0608C30.7212 17.3083 30.7212 13.6917 28.1691 12.9392L27.5493 12.7569C27.1673 12.6444 26.8153 12.4478 26.5191 12.1816C26.223 11.9153 25.9901 11.5862 25.8377 11.2183C25.6853 10.8504 25.6171 10.453 25.6382 10.0553C25.6594 9.65762 25.7692 9.2697 25.9597 8.91999L26.2704 8.35416C27.542 6.01499 24.9856 3.45854 22.6479 4.73166L22.0806 5.04083C21.7309 5.23109 21.3431 5.34072 20.9456 5.3617C20.5481 5.38267 20.151 5.31446 19.7832 5.16205C19.4155 5.00965 19.0865 4.77691 18.8204 4.48089C18.5543 4.18487 18.3577 3.83306 18.2452 3.45124L18.0614 2.83145ZM15.5006 20.8404C14.7815 20.8695 14.0639 20.753 13.3909 20.4979C12.7179 20.2428 12.1035 19.8544 11.5844 19.3559C11.0653 18.8573 10.6522 18.2591 10.3701 17.597C10.088 16.9349 9.94255 16.2226 9.94255 15.5029C9.94255 14.7832 10.088 14.0709 10.3701 13.4088C10.6522 12.7467 11.0653 12.1485 11.5844 11.65C12.1035 11.1515 12.7179 10.763 13.3909 10.5079C14.0639 10.2528 14.7815 10.1363 15.5006 10.1654C16.8698 10.2333 18.1605 10.8251 19.1056 11.8182C20.0507 12.8113 20.5777 14.1298 20.5777 15.5007C20.5777 16.8717 20.0507 18.1901 19.1056 19.1832C18.1605 20.1763 16.8698 20.7681 15.5006 20.836V20.8404Z" />
                                    </svg>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="h-[33rem] max-h-[33rem] font-medium text-gray-600">
                            @foreach ($currentListData as $currentListDataValue)
                                {{-- <livewire:components.user-table-rows :currentListDataValue="$currentListDataValue" :key="$currentListDataValue->id" /> --}}
                                <tr class="">
                                    <td class="whitespace-normal px-2 py-3">
                                        <input type="checkbox" name="" id="">
                                    </td>
                                    <td class="">
                                        <div class="flex items-center gap-2 whitespace-nowrap">
                                            <img class="h-5 w-5 rounded-full object-cover"
                                                src="{{ !empty($currentListDataValue->profile_picture)
                                                    ? asset('storage/' . $currentListDataValue->profile_picture)
                                                    : asset('assets/default_profile.png') }}"
                                                alt="profile" srcset="">
                                            @if (!empty($currentListDataValue->first_name) && !empty($currentListDataValue->last_name))
                                                <span>
                                                    {{ $currentListDataValue->first_name }}
                                                    {{ $currentListDataValue->last_name }}
                                                </span>
                                            @else
                                                <span class="text-red-600"><strong>No Info</strong></span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-3">
                                        @if (!empty($currentListDataValue->student_id))
                                            <span>
                                                {{ $currentListDataValue->student_id }}
                                            </span>
                                        @else
                                            <span class="text-red-600"><strong>No Info</strong></span>
                                        @endif
                                    </td>
                                    <td class="whitespace-normal px-2 py-3">
                                        @if ($currentListDataValue->is_admin == 1)
                                            <span>Admin</span>
                                        @else
                                            @if ($currentListDataValue->role_id == 1)
                                                <span>Student</span>
                                            @elseif($currentListDataValue->role_id == 2)
                                                <span>Faculty user</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="whitespace-normal px-2 py-3">
                                        @php
                                            $bachelorDegree = \App\Models\BachelorDegree::find($currentListDataValue->bachelor_degree);
                                        @endphp
                                        @if ($currentListDataValue->is_admin == 1)
                                            <span>Admin</span>
                                        @else
                                            @if ($currentListDataValue->role_id == 1)
                                                @if (!empty($currentListDataValue->bachelor_degree))
                                                    {{ $bachelorDegree->name }}
                                                @else
                                                    <span class="text-red-700"><strong>No Info</strong></span>
                                                @endif
                                            @elseif($currentListDataValue->role_id == 2)
                                                <span>Faculty</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="whitespace-normal px-2 py-3">
                                        {{ \Carbon\Carbon::parse($currentListDataValue->created_at)->format('M d Y') }}
                                    </td>
                                    <td class="w-fit text-center">
                                        <div class="flex w-full items-center uppercase">
                                            @if ($currentListDataValue->is_verified == 0)
                                                <div
                                                    class="flex w-full flex-row items-center gap-2 rounded-lg bg-yellow-700 px-2 py-1 pl-4 text-white">
                                                    <svg class="h-4" viewBox="0 0 23 23" fill="none">
                                                        <path
                                                            d="M21.0827 11.5C21.0827 14.0416 20.073 16.4792 18.2758 18.2764C16.4786 20.0737 14.041 21.0833 11.4993 21.0833C8.95769 21.0833 6.52013 20.0737 4.72291 18.2764C2.92569 16.4792 1.91602 14.0416 1.91602 11.5C1.91602 8.95833 2.92569 6.52077 4.72291 4.72355C6.52013 2.92633 8.95769 1.91666 11.4993 1.91666C14.041 1.91666 16.4786 2.92633 18.2758 4.72355C20.073 6.52077 21.0827 8.95833 21.0827 11.5ZM8.33014 7.48266C8.27499 7.42457 8.20878 7.37812 8.13539 7.34604C8.06201 7.31396 7.98294 7.29689 7.90286 7.29585C7.82277 7.29481 7.74329 7.30982 7.6691 7.33999C7.59491 7.37016 7.52751 7.41488 7.47087 7.47151C7.41424 7.52815 7.36952 7.59555 7.33935 7.66974C7.30918 7.74393 7.29417 7.82341 7.29521 7.9035C7.29625 7.98358 7.31331 8.06265 7.3454 8.13603C7.37748 8.20942 7.42393 8.27564 7.48202 8.33078L10.6522 11.5L7.48202 14.6692C7.42393 14.7243 7.37748 14.7906 7.3454 14.8639C7.31331 14.9373 7.29625 15.0164 7.29521 15.0965C7.29417 15.1766 7.30918 15.256 7.33935 15.3302C7.36952 15.4044 7.41424 15.4718 7.47087 15.5285C7.52751 15.5851 7.59491 15.6298 7.6691 15.66C7.74329 15.6902 7.82277 15.7052 7.90286 15.7041C7.98294 15.7031 8.06201 15.686 8.13539 15.6539C8.20878 15.6219 8.27499 15.5754 8.33014 15.5173L11.4993 12.3472L14.6686 15.5173C14.7832 15.6185 14.9321 15.6722 15.0849 15.6675C15.2377 15.6627 15.383 15.5999 15.4911 15.4918C15.5992 15.3836 15.6621 15.2384 15.6668 15.0855C15.6716 14.9327 15.6179 14.7838 15.5167 14.6692L12.3465 11.5L15.5167 8.33078C15.6179 8.21616 15.6716 8.06727 15.6668 7.91444C15.6621 7.76161 15.5992 7.61634 15.4911 7.50823C15.383 7.40011 15.2377 7.33727 15.0849 7.33252C14.9321 7.32777 14.7832 7.38146 14.6686 7.48266L11.4993 10.6528L8.33014 7.48266Z"
                                                            fill="white" />

                                                    </svg>
                                                    <span class="text-sm">Unverified</span>
                                                </div>
                                            @else
                                                <div
                                                    class="flex w-full flex-row items-center gap-2 rounded-lg bg-blue-700 px-2 py-1 pl-4 text-white">
                                                    <svg class="h-4" viewBox="0 0 23 23" fill="none">
                                                        <path
                                                            d="M21.0827 11.5C21.0827 14.0417 20.073 16.4792 18.2758 18.2764C16.4786 20.0737 14.041 21.0833 11.4993 21.0833C8.95769 21.0833 6.52013 20.0737 4.72291 18.2764C2.92569 16.4792 1.91602 14.0417 1.91602 11.5C1.91602 8.95834 2.92569 6.52078 4.72291 4.72356C6.52013 2.92633 8.95769 1.91666 11.4993 1.91666C14.041 1.91666 16.4786 2.92633 18.2758 4.72356C20.073 6.52078 21.0827 8.95834 21.0827 11.5ZM16.3274 7.87079C16.2419 7.78543 16.1401 7.7182 16.028 7.67313C15.9159 7.62806 15.7958 7.60607 15.6751 7.60849C15.5543 7.61091 15.4352 7.63767 15.325 7.68719C15.2148 7.73671 15.1157 7.80795 15.0337 7.89666L10.8726 13.1972L8.3656 10.6892C8.19645 10.5246 7.96926 10.4331 7.73319 10.4347C7.49711 10.4363 7.27116 10.5307 7.10423 10.6977C6.9373 10.8646 6.84282 11.0906 6.84124 11.3266C6.83967 11.5627 6.93112 11.7899 7.09581 11.959L10.266 15.1302C10.3515 15.215 10.4532 15.2819 10.5651 15.3267C10.677 15.3715 10.7967 15.3934 10.9172 15.3911C11.0376 15.3888 11.1564 15.3623 11.2665 15.3132C11.3765 15.2641 11.4756 15.1934 11.5578 15.1052L16.3399 9.12812C16.503 8.9586 16.5932 8.73188 16.591 8.49663C16.5889 8.26138 16.4946 8.03635 16.3284 7.86983H16.3265L16.3274 7.87079Z"
                                                            fill="white" />
                                                    </svg>
                                                    <span class="text-sm">Verified</span>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="relative whitespace-normal px-2 py-3">
                                        @if ($rowMenuStates[$currentListDataValue->id] ?? false)
                                            <div
                                                class="absolute -left-[4.7rem] bottom-[0.4rem] space-y-1 rounded-lg border border-gray-300 bg-white bg-opacity-70 p-2 font-semibold text-primary-color drop-shadow-md backdrop-blur-sm">
                                                <div class="flex cursor-pointer items-center gap-1">
                                                    <svg class="h-4" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15 11.64a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                                        <path
                                                            d="M2.4 11.64S6 5.04 12 5.04s9.6 6.6 9.6 6.6-3.6 6.6-9.6 6.6-9.6-6.6-9.6-6.6Zm9.6 4.2a4.2 4.2 0 1 0 0-8.4 4.2 4.2 0 0 0 0 8.4Z">
                                                        </path>
                                                    </svg>
                                                    <span>View</span>
                                                </div>
                                                <div class="flex cursor-pointer items-center gap-1">
                                                    <svg class="h-4" viewBox="0 0 23 24" fill="none">
                                                        <path
                                                            d="M17.3135 2.25711C17.2578 2.20147 17.1918 2.15734 17.1191 2.12723C17.0464 2.09712 16.9685 2.08162 16.8899 2.08162C16.8112 2.08162 16.7333 2.09712 16.6606 2.12723C16.588 2.15734 16.5219 2.20147 16.4663 2.25711L14.494 4.23031L18.935 8.67123L20.9072 6.69898C20.9632 6.64347 21.0077 6.57742 21.038 6.50463C21.0684 6.43185 21.084 6.35377 21.084 6.27492C21.084 6.19606 21.0684 6.11799 21.038 6.0452C21.0077 5.97242 20.9632 5.90636 20.9072 5.85086L17.3135 2.25711ZM18.0878 9.51744L13.6459 5.07748L5.86042 12.8639H6.10863C6.26732 12.8639 6.41952 12.9269 6.53182 13.039C6.64412 13.1512 6.70733 13.3033 6.70759 13.4619V14.0609H7.30655C7.4654 14.0609 7.61775 14.124 7.73007 14.2363C7.8424 14.3487 7.9055 14.501 7.9055 14.6599V15.2588H8.50446C8.5832 15.2588 8.66116 15.2743 8.7339 15.3045C8.80663 15.3347 8.8727 15.3789 8.92833 15.4346C8.98396 15.4903 9.02806 15.5564 9.0581 15.6292C9.08815 15.702 9.10355 15.78 9.10342 15.8587V16.4577H9.70238C9.86123 16.4577 10.0136 16.5208 10.1259 16.6331C10.2382 16.7454 10.3013 16.8978 10.3013 17.0566V17.3039L18.0878 9.51744ZM9.14175 18.4635C9.11663 18.3967 9.10365 18.3259 9.10342 18.2546V17.6556H8.50446C8.34561 17.6556 8.19326 17.5925 8.08093 17.4802C7.96861 17.3678 7.9055 17.2155 7.9055 17.0566V16.4577H7.30655C7.14769 16.4577 6.99534 16.3946 6.88302 16.2823C6.77069 16.1699 6.70759 16.0176 6.70759 15.8587V15.2588H6.10863C5.94978 15.2588 5.79743 15.1957 5.6851 15.0834C5.57277 14.9711 5.50967 14.8187 5.50967 14.6599V14.0619H4.91071C4.83902 14.0618 4.76793 14.0488 4.70084 14.0235L4.48617 14.2372C4.42926 14.2948 4.3846 14.3632 4.35488 14.4385L1.95905 20.4281C1.91541 20.5369 1.90467 20.6561 1.92816 20.771C1.95165 20.8859 2.00833 20.9913 2.09119 21.0743C2.17404 21.1572 2.27942 21.214 2.39425 21.2377C2.50909 21.2613 2.62834 21.2507 2.73721 21.2072L8.7268 18.8114C8.80214 18.7814 8.87061 18.7364 8.92805 18.6791L9.14175 18.4654V18.4635Z"
                                                            fill="#0A2647" />
                                                    </svg>
                                                    <span>Edit</span>
                                                </div>
                                                <div class="flex cursor-pointer items-center gap-1">
                                                    <svg class="h-4" viewBox="0 0 20 20" fill="none">
                                                        <path
                                                            d="M17.7332 3.04102C17.3519 3.04102 16.9863 3.19247 16.7167 3.46205C16.4471 3.73163 16.2957 4.09727 16.2957 4.47852V8.79102H15.3373V2.56185C15.3373 2.1806 15.1859 1.81497 14.9163 1.54538C14.6467 1.2758 14.2811 1.12435 13.8998 1.12435C13.5186 1.12435 13.1529 1.2758 12.8834 1.54538C12.6138 1.81497 12.4623 2.1806 12.4623 2.56185V8.79102H11.504V1.60352C11.504 1.22227 11.3525 0.856633 11.083 0.58705C10.8134 0.317466 10.4477 0.166016 10.0665 0.166016C9.68524 0.166016 9.3196 0.317466 9.05002 0.58705C8.78044 0.856633 8.62899 1.22227 8.62899 1.60352V8.79102H7.67065V3.52018C7.67065 3.13893 7.5192 2.7733 7.24962 2.50372C6.98004 2.23413 6.6144 2.08268 6.23315 2.08268C5.85191 2.08268 5.48627 2.23413 5.21669 2.50372C4.9471 2.7733 4.79565 3.13893 4.79565 3.52018V13.8798L2.66815 10.4298C2.56873 10.2687 2.43856 10.1287 2.28506 10.018C2.13156 9.90719 1.95774 9.82773 1.77353 9.78413C1.58932 9.74052 1.39833 9.73363 1.21146 9.76383C1.02459 9.79404 0.845492 9.86076 0.684404 9.96018C0.523316 10.0596 0.383388 10.1898 0.272609 10.3433C0.16183 10.4968 0.0823693 10.6706 0.0387645 10.8548C-0.00484038 11.039 -0.0117357 11.23 0.0184721 11.4169C0.0486799 11.6038 0.115399 11.7828 0.214821 11.9439L3.3869 17.0614C3.81618 17.7555 4.41563 18.3285 5.12842 18.726C5.8412 19.1234 6.6437 19.3323 7.45982 19.3327H14.379C15.6498 19.3327 16.8686 18.8278 17.7672 17.9292C18.6658 17.0306 19.1707 15.8118 19.1707 14.541V4.47852C19.1707 4.09727 19.0192 3.73163 18.7496 3.46205C18.48 3.19247 18.1144 3.04102 17.7332 3.04102Z"
                                                            fill="#0A2647" />
                                                    </svg>
                                                    <span>Hold</span>
                                                </div>
                                                <div wire:click='showDeleteBoxUser("{{ $currentListDataValue->id }}")'
                                                    class="flex cursor-pointer items-center gap-1">
                                                    <svg class="h-4" viewBox="0 0 18 20" fill="none">
                                                        <path
                                                            d="M2.875 5.12419H1.91667V17.5825C1.91667 18.0909 2.1186 18.5784 2.47805 18.9378C2.83749 19.2973 3.325 19.4992 3.83333 19.4992H13.4167C13.925 19.4992 14.4125 19.2973 14.772 18.9378C15.1314 18.5784 15.3333 18.0909 15.3333 17.5825V5.12419H2.875ZM6.70833 16.6242H4.79167V7.99919H6.70833V16.6242ZM12.4583 16.6242H10.5417V7.99919H12.4583V16.6242ZM13.0506 2.24919L11.5 0.33252H5.75L4.19942 2.24919H0V4.16585H17.25V2.24919H13.0506Z"
                                                            fill="#0A2647" />
                                                    </svg>
                                                    <span>Delete</span>
                                                </div>
                                            </div>
                                        @endif
                                        <svg wire:click="toggleRowMenu('{{ $currentListDataValue->id }}')"
                                            :key="$currentListDataValue - > id" class="h-4 cursor-pointer"
                                            viewBox="0 0 28 28" fill="currentColor">
                                            <path
                                                d="M15.5398 21.56C15.5398 22.117 15.3186 22.6511 14.9248 23.0449C14.5309 23.4388 13.9968 23.66 13.4398 23.66C12.8829 23.66 12.3487 23.4388 11.9549 23.0449C11.5611 22.6511 11.3398 22.117 11.3398 21.56C11.3398 21.003 11.5611 20.4689 11.9549 20.0751C12.3487 19.6812 12.8829 19.46 13.4398 19.46C13.9968 19.46 14.5309 19.6812 14.9248 20.0751C15.3186 20.4689 15.5398 21.003 15.5398 21.56ZM15.5398 14.56C15.5398 15.117 15.3186 15.6511 14.9248 16.0449C14.5309 16.4388 13.9968 16.66 13.4398 16.66C12.8829 16.66 12.3487 16.4388 11.9549 16.0449C11.5611 15.6511 11.3398 15.117 11.3398 14.56C11.3398 14.003 11.5611 13.4689 11.9549 13.0751C12.3487 12.6812 12.8829 12.46 13.4398 12.46C13.9968 12.46 14.5309 12.6812 14.9248 13.0751C15.3186 13.4689 15.5398 14.003 15.5398 14.56ZM15.5398 7.56C15.5398 8.11695 15.3186 8.6511 14.9248 9.04492C14.5309 9.43875 13.9968 9.66 13.4398 9.66C12.8829 9.66 12.3487 9.43875 11.9549 9.04492C11.5611 8.6511 11.3398 8.11695 11.3398 7.56C11.3398 7.00304 11.5611 6.4689 11.9549 6.07507C12.3487 5.68125 12.8829 5.46 13.4398 5.46C13.9968 5.46 14.5309 5.68125 14.9248 6.07507C15.3186 6.4689 15.5398 7.00304 15.5398 7.56Z" />
                                        </svg>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </div>
</div>
