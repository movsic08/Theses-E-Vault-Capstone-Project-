<div class="">
    <div class="container">
    hello
        {{-- modal for adding new department --}}
        @if ($newDepartmentBox)
            <div
                class="absolute right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm">
                <div class="mx-auto">
                    <section class="h-fit w-fit rounded-lg bg-white p-6 drop-shadow-xl">
                        @if ($deleteDepartmentBox)
                            <div
                                class="fixed left-0 top-0 h-full w-full rounded-lg bg-gray-900 bg-opacity-40 backdrop-blur-sm">
                                <div class="container h-full w-full">
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
                                                <label class="text-sm font-semibold" for="da">Department
                                                    Acronym</label>
                                                <input class="rounded-md border border-gray-400 p-2 text-sm"
                                                    type="text" wire:model.live="course_acronymEdit"
                                                    id="da" />
                                                @error('course_acronymEdit')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="flex w-full flex-col">
                                                <label class="text-sm font-semibold" for="dn">Department
                                                    Name</label>
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
                                                    class="border-bg-red-600 cursor-pointer rounded border p-1">Cancel
                                                </div>
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
                        <div class="max-h-60 overflow-y-hidden">
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
            </div>
        @endif


        @if ($addUserButton)
            <div class="fixed inset-0 z-50 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm">
                <section
                    class="{{ $completeInfo ? 'w-fit' : 'lg:w-[25rem]' }} mt-[5rem] h-fit rounded-lg bg-white p-2 drop-shadow-xl">
                    <div class="relative flex items-center justify-center">
                        <h2 class="text-sm font-semibold text-gray-800 md:text-lg">Add new user</h2>
                        <svg wire:click='showAddUserBox'
                            class="absolute right-0 top-1 h-4 cursor-pointer text-red-500 md:h-6" fill="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22 12a10 10 0 1 1-20 0 10 10 0 0 1 20 0ZM8.693 7.808a.626.626 0 1 0-.885.885L11.116 12l-3.308 3.307a.626.626 0 1 0 .885.885L12 12.884l3.307 3.308a.627.627 0 0 0 .885-.885L12.884 12l3.308-3.307a.627.627 0 0 0-.885-.885L12 11.116 8.693 7.808Z">
                            </path>
                        </svg>
                    </div>
                    <form wire:submit.prevent='addNewUser'>
                        <div class="px-2">
                            <x-label-input for='useLevel'>User level:</x-label-input>
                            <select wire:model.live='userLevel'
                                class="block h-9 w-full rounded-md border border-gray-300 bg-white px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                id="userLevel">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                                <option value="superAdmin">Super admin</option>
                            </select>
                        </div>
                        <div>
                            <div class="flex flex-col gap-2 md:flex-row">
                                <div class="w-full p-2">
                                    <div class="flex flex-col gap-1">
                                        <x-label-input for='username'>Username</x-label-input>
                                        <x-input-field class="w-full" id="username" wire:model.live='usernameInput'
                                            type='text' />
                                        @error('usernameInput')
                                            <span class="w-full text-xs text-red-700">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 flex flex-col gap-1">
                                        <x-label-input for='emailInp'>Email</x-label-input>
                                        <x-input-field class="w-full" id="emailInp" type='email'
                                            wire:model.live='emailInput' />
                                        @error('emailInput')
                                            <span class="w-full text-xs text-red-700">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 flex flex-col gap-1">
                                        <x-label-input for='password'>Password</x-label-input>
                                        <x-input-field class="w-full" id="password" type='password'
                                            wire:model.live='password' name='password' />
                                        @error('password')
                                            <span class="w-full text-xs text-red-700">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 flex flex-col gap-1">
                                        <x-label-input for='password_confirmation'>Confirm password</x-label-input>
                                        <x-input-field class="w-full" id="password_confirmation" type='password'
                                            wire:model.live='password_confirmation' />
                                        @error('password_confirmation')
                                            <span class="w-full text-xs text-red-700">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    @if ($userLevel == 'user')
                                        <div class="mt-2 flex flex-col gap-1">
                                            <x-label-input for='accRole'>Account role</x-label-input>
                                            <select wire:model.live='accRole' id="account-role"
                                                class="block h-9 w-full rounded-md border border-gray-300 bg-white px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                                <option value="1">Student</option>
                                                <option value="2">Faculty Member</option>
                                            </select>
                                            @error('role_id')
                                                <span class="w-full text-xs text-red-700">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    @endif
                                    <div class="mt-2">
                                        <x-label-input for='completeInfo'>Complete user information </x-label-input>
                                        <input type="checkbox" wire:model.live='completeInfo' id="completeInfo">
                                    </div>
                                    @if (!$completeInfo)
                                        <div class="flex w-full items-center justify-end">
                                            <input
                                                class="cursor-pointer rounded-md bg-blue-950 p-2 font-medium text-white duration-200 hover:bg-blue-800"
                                                type="submit" value="Create">
                                        </div>
                                    @endif
                                </div>
                                @if ($completeInfo)
                                    <div class="flex w-full flex-col p-2">
                                        <div class="flex flex-row gap-2">
                                            <div class="flex flex-col gap-1">
                                                <x-label-input for='firstName'>First name</x-label-input>
                                                <x-input-field class="w-full" id="firstName"
                                                    wire:model.live='fnameInput' type='text' />
                                                @error('fnameInput')
                                                    <span class="w-full text-xs text-red-700">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="flex flex-col gap-1">
                                                <x-label-input for='lastName'>Last name</x-label-input>
                                                <x-input-field class="w-full" id="lastName"
                                                    wire:model.live='lnameInput' type='text' />
                                                @error('lnameInput')
                                                    <span class="w-full text-xs text-red-700">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-2 flex w-full flex-col gap-1">
                                            <x-label-input for='phoneNumber'>Phone number</x-label-input>
                                            <x-input-field class="w-full" id="phoneNumber" wire:model.live='phoneNum'
                                                type='text' />
                                            @error('phoneNum')
                                                <span class="w-full text-xs text-red-700">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mt-2 flex flex-col gap-1">
                                            <x-label-input
                                                for='id-user'>{{ $accRole == '1' ? 'Student' : 'Faculty' }}
                                                ID</x-label-input>
                                            <x-input-field class="w-full" id="id-user" wire:model.live='idNumber'
                                                type='text' />
                                            @error('idNumber')
                                                <span class="w-full text-xs text-red-700">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mt-2 flex w-full flex-col gap-1">
                                            <x-label-input for='degreeCourse'>Bachelor Degree</x-label-input>
                                            <select wire:model.live='degreeName'
                                                class="block h-9 w-full rounded-md border border-gray-300 bg-white px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                                id="userLevel">
                                                <option selected value="a">Select degree course</option>
                                                @foreach ($degreeLists as $degreeListsItem)
                                                    <option class="w-full" value="{{ $degreeListsItem->id }}">
                                                        {{ $degreeListsItem->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('degreeName')
                                                <span class="w-full text-xs text-red-700">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mt-2 flex flex-col gap-1">
                                            <x-label-input for='address'>Address</x-label-input>
                                            <x-input-field class="w-full" id="address"
                                                wire:model.live='addressInput' type='text' />
                                            @error('addressInput')
                                                <span class="w-full text-xs text-red-700">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mt-2 flex w-full items-center justify-end">
                                            <x-submit-button type='submit' value='Create' class="" />
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </form>
                </section>
            </div>
        @endif


        {{-- <x-admin.modals.admin-add-new-user :userLevel='$userLevel' :completeInfo='$completeInfo'>
        </x-admin.modals.admin-add-new-user> --}}

        <x-admin.modals.admin-user-panel-delete-user :selectedUser='$selectedUser'>
        </x-admin.modals.admin-user-panel-delete-user>

        <x-admin.modals.admin-user-panel-view-edit-user :editUserState="$editUserState" :currentViewingUser='$currentViewingUser' :profilePictureOption='$profilePictureOption'>
        </x-admin.modals.admin-user-panel-view-edit-user>

        <x-modals.admin-view-user>
        </x-modals.admin-view-user>

        {{-- content of admin user panel --}}
        <x-session_flash />
        <div class="px-4">
            <h1 class="font-black text-primary-color">Accounts</h1>
            <div class="my-2 flex flex-col justify-between gap-2 md:flex-row">
                <div class="my-1 mt-2 flex gap-6 text-xs text-primary-color md:mt-3 lg:text-base">
                    <button
                        class="{{ $currentQuery == 'allUsers' ? 'border-b-2 border-primary-color font-bold' : '' }}">All
                        users</button>
                    <button
                        class="{{ $currentQuery == 'verifiedUsers' ? 'border-b-2 border-primary-color font-bold' : '' }}">Verified</button>
                    <button
                        class="{{ $currentQuery == 'unverifiedUsers' ? 'border-b-2 border-primary-color font-bold' : '' }}">Unverified</button>
                </div>
                <div class="flex gap-4 text-xs lg:text-base">
                    <div wire:click='openNewDepartmentBox'
                        class="h-fit cursor-pointer rounded-lg border border-primary-color p-1 px-3 text-primary-color">
                        Departments</div>
                    <div wire:click='showAddUserBox'
                        class="h-fit cursor-pointer rounded-lg bg-primary-color p-1 px-3 text-white">Add
                        user</div>
                </div>
            </div>

        </div>
        <div class="mb-8 max-w-[85rem] rounded-2xl bg-white px-5 py-2 drop-shadow-md">
            <div class="relative flex w-full flex-col items-center justify-between px-4 py-2 md:flex-row">
                <div wire:loading
                    wire:target='search,program,accountRole, paginate, viewUser, toggleEditUser, deleteUserConfirmation  '
                    class="absolute -left-[0.5rem] top-[1rem] inline-block h-4 w-4 animate-spin rounded-full border-4 border-solid border-primary-color border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                    role="status">
                    <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                </div>
                <section class="flex gap-2 lg:gap-4">
                    <div>
                        <label for="default-search"
                            class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white">Search</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input wire:model.live.debounce.300ms='search' type="search" id="default-search"
                                placeholder="Search name"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        </div>
                    </div>
                    <div class="flex items-center">
                        {{-- {{ $accountRole }} --}}
                        <x-label-input for="role">Role</x-label-input>
                        <select id="role" wire:model.live='accountRole'
                            class="ml-2 w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                            <option value="all">All</option>
                            <option value="1">Student</option>
                            <option value="2">Faculty</option>
                        </select>
                    </div>
                </section>
                <div class="flex items-center">
                    <x-label-input for="Date">Date</x-label-input>
                    <x-input-field class="ml-2" wire:model.live='selectedDate' type="date" name=""
                        id="Date" />
                </div>
                <div class="flex items-center">
                    <x-label-input for="program">Program</x-label-input>
                    <select id="program" wire:model.live='program'
                        class="ml-2 w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option selected value="all">All</option>
                        @foreach ($degreeLists as $degreeListsItem)
                            <option value="{{ $degreeListsItem->name }}">{{ $degreeListsItem->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="flex items-center">
                    <x-label-input for="countpage">Items</x-label-input>
                    <select id="countpage" wire:model.live='paginate'
                        class="ml-2 w-full rounded-lg border border-gray-300 bg-gray-50 bg-opacity-20 p-2 text-sm text-gray-900 backdrop-blur-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>
                </div>
            </div>
            <div class="custom-scrollbar overflow-x-auto">
                <div class="max-w-full lg:max-h-[32rem]">
                    <table class="min-w-full">
                        <thead class="sticky top-0 bg-white bg-opacity-50 backdrop-blur">
                            <tr>
                                <th class="px-6 py-2 text-left font-bold text-gray-700">
                                    Name
                                </th>
                                <th class="px-6 py-2 text-left font-bold text-gray-700">
                                    Student ID
                                </th>
                                <th class="px-4 py-2 text-left font-bold text-gray-700">
                                    Role
                                </th>
                                <th class="px-3 py-2 text-left font-bold text-gray-700">
                                    Course/ Program
                                </th>
                                <th class="px-6 py-2 text-left font-bold text-gray-700">
                                    Date Created
                                </th>
                                <th class="px-1 py-2 text-center font-bold text-gray-700">
                                    Status
                                </th>
                                <th class="px-6 py-2 text-left font-bold text-gray-700">
                                    <svg class="h-4 text-gray-500" viewBox="0 0 31 31" fill="currentColor">
                                        <path
                                            d="M18.0614 2.83145C17.3089 0.279368 13.6922 0.279368 12.9397 2.83145L12.7575 3.44978C12.6449 3.83181 12.4484 4.18381 12.1821 4.47998C11.9159 4.77615 11.5868 5.00899 11.2188 5.16142C10.8509 5.31384 10.4536 5.38199 10.0559 5.36087C9.6582 5.33976 9.27028 5.2299 8.92057 5.03937L8.35474 4.7302C6.01557 3.45708 3.45912 6.01499 4.73224 8.3527L5.04141 8.91854C5.23221 9.2683 5.34229 9.65635 5.36355 10.0542C5.38481 10.4521 5.31672 10.8496 5.16428 11.2177C5.01183 11.5858 4.7789 11.9151 4.48257 12.1815C4.18625 12.4478 3.83405 12.6444 3.45182 12.7569L2.83203 12.9392C0.279948 13.6917 0.279948 17.3083 2.83203 18.0608L3.45036 18.2431C3.83239 18.3556 4.18439 18.5522 4.48056 18.8184C4.77673 19.0847 5.00957 19.4138 5.16199 19.7817C5.31442 20.1496 5.38257 20.547 5.36145 20.9447C5.34034 21.3424 5.23048 21.7303 5.03995 22.08L4.73078 22.6458C3.45766 24.985 6.01557 27.5429 8.35328 26.2683L8.91912 25.9592C9.26888 25.7684 9.65693 25.6583 10.0548 25.637C10.4526 25.6158 10.8502 25.6838 11.2183 25.8363C11.5864 25.9887 11.9157 26.2217 12.1821 26.518C12.4484 26.8143 12.645 27.1665 12.7575 27.5487L12.9397 28.1685C13.6922 30.7206 17.3089 30.7206 18.0614 28.1685L18.2437 27.5487C18.356 27.1666 18.5524 26.8144 18.8186 26.518C19.0848 26.2217 19.414 25.9888 19.782 25.8363C20.15 25.6839 20.5474 25.6158 20.9452 25.637C21.343 25.6583 21.7309 25.7684 22.0806 25.9592L22.6464 26.2698C24.9856 27.5415 27.5435 24.985 26.2689 22.6473L25.9597 22.08C25.7695 21.7303 25.6598 21.3426 25.6389 20.9451C25.6179 20.5475 25.6861 20.1504 25.8385 19.7826C25.9909 19.4149 26.2237 19.0859 26.5197 18.8198C26.8157 18.5537 27.1675 18.3571 27.5493 18.2446L28.1691 18.0608C30.7212 17.3083 30.7212 13.6917 28.1691 12.9392L27.5493 12.7569C27.1673 12.6444 26.8153 12.4478 26.5191 12.1816C26.223 11.9153 25.9901 11.5862 25.8377 11.2183C25.6853 10.8504 25.6171 10.453 25.6382 10.0553C25.6594 9.65762 25.7692 9.2697 25.9597 8.91999L26.2704 8.35416C27.542 6.01499 24.9856 3.45854 22.6479 4.73166L22.0806 5.04083C21.7309 5.23109 21.3431 5.34072 20.9456 5.3617C20.5481 5.38267 20.151 5.31446 19.7832 5.16205C19.4155 5.00965 19.0865 4.77691 18.8204 4.48089C18.5543 4.18487 18.3577 3.83306 18.2452 3.45124L18.0614 2.83145ZM15.5006 20.8404C14.7815 20.8695 14.0639 20.753 13.3909 20.4979C12.7179 20.2428 12.1035 19.8544 11.5844 19.3559C11.0653 18.8573 10.6522 18.2591 10.3701 17.597C10.088 16.9349 9.94255 16.2226 9.94255 15.5029C9.94255 14.7832 10.088 14.0709 10.3701 13.4088C10.6522 12.7467 11.0653 12.1485 11.5844 11.65C12.1035 11.1515 12.7179 10.763 13.3909 10.5079C14.0639 10.2528 14.7815 10.1363 15.5006 10.1654C16.8698 10.2333 18.1605 10.8251 19.1056 11.8182C20.0507 12.8113 20.5777 14.1298 20.5777 15.5007C20.5777 16.8717 20.0507 18.1901 19.1056 19.1832C18.1605 20.1763 16.8698 20.7681 15.5006 20.836V20.8404Z" />
                                    </svg>
                                </th>
                            </tr>
                        </thead>
                        <div class="overflow-y-auto overflow-x-hidden">
                            <tbody class="w-full text-gray-500">
                                @foreach ($currentListData as $currentListDataValue)
                                    <tr class="h-[4rem] min-h-[4rem] border-b border-slate-100">
                                        <td class="whitespace-normal px-6 py-2">
                                            <div class="flex items-center gap-2 whitespace-nowrap">
                                                <img class="h-5 w-5 rounded-full object-cover"
                                                    src="{{ !empty($currentListDataValue->profile_picture)
                                                        ? asset('storage/' . $currentListDataValue->profile_picture)
                                                        : asset('assets/default_profile.png') }}"
                                                    alt="profile" srcset="">
                                                @if (!empty($currentListDataValue->first_name) && !empty($currentListDataValue->last_name))
                                                    <span class="text-sm md:text-base">
                                                        {{ $currentListDataValue->first_name }}
                                                        {{ $currentListDataValue->last_name }}
                                                    </span>
                                                @else
                                                    <span class="text-sm text-red-600 md:text-base"><strong>No
                                                            Info</strong></span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-2">
                                            @if (!empty($currentListDataValue->student_id))
                                                <span class="text-sm md:text-base">
                                                    {{ $currentListDataValue->student_id }}
                                                </span>
                                            @else
                                                <span class="text-sm text-red-600 md:text-base"><strong>No
                                                        Info</strong></span>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2">
                                            @if ($currentListDataValue->is_admin == 1)
                                                <strong class="text-primary-color">Admin</strong>
                                            @else
                                                @if ($currentListDataValue->role_id == 1)
                                                    <strong class="text-sky-950">Student</strong>
                                                @elseif($currentListDataValue->role_id == 2)
                                                    <strong class="text-slate-900">Faculty user</strong>
                                                @endif
                                            @endif
                                        </td>
                                        <td class="whitespace-normal px-3 py-2">
                                            {{ $currentListDataValue->bachelor_degree }}
                                        </td>
                                        <td class="whitespace-normal px-6 py-2 lg:whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($currentListDataValue->created_at)->format('M d Y') }}
                                        </td>
                                        <td class="whitespace-normal px-1 py-2">
                                            @if ($currentListDataValue->is_verified == 0)
                                                <div
                                                    class="flex w-fit min-w-[6.6rem] flex-row items-center justify-center gap-1 rounded-xl bg-yellow-700 p-1 text-white">
                                                    <svg class="h-4" viewBox="0 0 23 23" fill="none">
                                                        <path
                                                            d="M21.0827 11.5C21.0827 14.0416 20.073 16.4792 18.2758 18.2764C16.4786 20.0737 14.041 21.0833 11.4993 21.0833C8.95769 21.0833 6.52013 20.0737 4.72291 18.2764C2.92569 16.4792 1.91602 14.0416 1.91602 11.5C1.91602 8.95833 2.92569 6.52077 4.72291 4.72355C6.52013 2.92633 8.95769 1.91666 11.4993 1.91666C14.041 1.91666 16.4786 2.92633 18.2758 4.72355C20.073 6.52077 21.0827 8.95833 21.0827 11.5ZM8.33014 7.48266C8.27499 7.42457 8.20878 7.37812 8.13539 7.34604C8.06201 7.31396 7.98294 7.29689 7.90286 7.29585C7.82277 7.29481 7.74329 7.30982 7.6691 7.33999C7.59491 7.37016 7.52751 7.41488 7.47087 7.47151C7.41424 7.52815 7.36952 7.59555 7.33935 7.66974C7.30918 7.74393 7.29417 7.82341 7.29521 7.9035C7.29625 7.98358 7.31331 8.06265 7.3454 8.13603C7.37748 8.20942 7.42393 8.27564 7.48202 8.33078L10.6522 11.5L7.48202 14.6692C7.42393 14.7243 7.37748 14.7906 7.3454 14.8639C7.31331 14.9373 7.29625 15.0164 7.29521 15.0965C7.29417 15.1766 7.30918 15.256 7.33935 15.3302C7.36952 15.4044 7.41424 15.4718 7.47087 15.5285C7.52751 15.5851 7.59491 15.6298 7.6691 15.66C7.74329 15.6902 7.82277 15.7052 7.90286 15.7041C7.98294 15.7031 8.06201 15.686 8.13539 15.6539C8.20878 15.6219 8.27499 15.5754 8.33014 15.5173L11.4993 12.3472L14.6686 15.5173C14.7832 15.6185 14.9321 15.6722 15.0849 15.6675C15.2377 15.6627 15.383 15.5999 15.4911 15.4918C15.5992 15.3836 15.6621 15.2384 15.6668 15.0855C15.6716 14.9327 15.6179 14.7838 15.5167 14.6692L12.3465 11.5L15.5167 8.33078C15.6179 8.21616 15.6716 8.06727 15.6668 7.91444C15.6621 7.76161 15.5992 7.61634 15.4911 7.50823C15.383 7.40011 15.2377 7.33727 15.0849 7.33252C14.9321 7.32777 14.7832 7.38146 14.6686 7.48266L11.4993 10.6528L8.33014 7.48266Z"
                                                            fill="white" />

                                                    </svg>
                                                    <span class="text-sm">Unverified</span>
                                                </div>
                                            @else
                                                <div
                                                    class="flex w-fit min-w-[6.6rem] flex-row items-center justify-center gap-1 rounded-xl bg-blue-700 p-1 text-white">
                                                    <svg class="h-4" viewBox="0 0 23 23" fill="none">
                                                        <path
                                                            d="M21.0827 11.5C21.0827 14.0417 20.073 16.4792 18.2758 18.2764C16.4786 20.0737 14.041 21.0833 11.4993 21.0833C8.95769 21.0833 6.52013 20.0737 4.72291 18.2764C2.92569 16.4792 1.91602 14.0417 1.91602 11.5C1.91602 8.95834 2.92569 6.52078 4.72291 4.72356C6.52013 2.92633 8.95769 1.91666 11.4993 1.91666C14.041 1.91666 16.4786 2.92633 18.2758 4.72356C20.073 6.52078 21.0827 8.95834 21.0827 11.5ZM16.3274 7.87079C16.2419 7.78543 16.1401 7.7182 16.028 7.67313C15.9159 7.62806 15.7958 7.60607 15.6751 7.60849C15.5543 7.61091 15.4352 7.63767 15.325 7.68719C15.2148 7.73671 15.1157 7.80795 15.0337 7.89666L10.8726 13.1972L8.3656 10.6892C8.19645 10.5246 7.96926 10.4331 7.73319 10.4347C7.49711 10.4363 7.27116 10.5307 7.10423 10.6977C6.9373 10.8646 6.84282 11.0906 6.84124 11.3266C6.83967 11.5627 6.93112 11.7899 7.09581 11.959L10.266 15.1302C10.3515 15.215 10.4532 15.2819 10.5651 15.3267C10.677 15.3715 10.7967 15.3934 10.9172 15.3911C11.0376 15.3888 11.1564 15.3623 11.2665 15.3132C11.3765 15.2641 11.4756 15.1934 11.5578 15.1052L16.3399 9.12812C16.503 8.9586 16.5932 8.73188 16.591 8.49663C16.5889 8.26138 16.4946 8.03635 16.3284 7.86983H16.3265L16.3274 7.87079Z"
                                                            fill="white" />
                                                    </svg>
                                                    <span class="text-sm">Verified</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="whitespace-normal px-4 py-2">
                                            <div class="flex items-center justify-center gap-1">
                                                <span wire:click='viewUser({{ $currentListDataValue->id }})'
                                                    class="cursor-pointer rounded-md bg-sky-600 p-1 duration-500 ease-in-out hover:bg-sky-800">
                                                    <svg class="min-h-[1.1rem] min-w-[1.1rem] text-white"
                                                        fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 14.4a2.4 2.4 0 1 0 0-4.8 2.4 2.4 0 0 0 0 4.8Z">
                                                        </path>
                                                        <path fill-rule="evenodd"
                                                            d="M.55 12C2.078 7.132 6.626 3.6 12 3.6s9.922 3.532 11.45 8.4c-1.528 4.868-6.076 8.4-11.45 8.4S2.078 16.868.55 12Zm16.25 0a4.8 4.8 0 1 1-9.6 0 4.8 4.8 0 0 1 9.6 0Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                                <span wire:click='toggleEditUser({{ $currentListDataValue->id }})'
                                                    class="hover: cursor-pointer rounded-md bg-yellow-600 p-1 duration-500 ease-in-out hover:bg-yellow-800">
                                                    <svg class="min-h-[1.1rem] min-w-[1.1rem] text-white"
                                                        fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.303 4.303a2.4 2.4 0 1 1 3.394 3.394l-.952.951-3.393-3.393.951-.952Zm-2.648 2.649L3.6 17.006V20.4h3.394L17.05 10.345l-3.396-3.393Z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                {{-- {{ $currentListDataValue->id }} --}}
                                                <span
                                                    wire:click='deleteUserConfirmation({{ $currentListDataValue->id }})'
                                                    class="hover: cursor-pointer rounded-md bg-red-600 p-1 duration-500 ease-in-out hover:bg-red-800">
                                                    <svg class="min-h-[1.1rem] min-w-[1.1rem] text-white"
                                                        fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M10.8 2.4a1.2 1.2 0 0 0-1.073.664L8.858 4.8H4.8a1.2 1.2 0 0 0 0 2.4v12a2.4 2.4 0 0 0 2.4 2.4h9.6a2.4 2.4 0 0 0 2.4-2.4v-12a1.2 1.2 0 1 0 0-2.4h-4.058l-.87-1.736A1.2 1.2 0 0 0 13.2 2.4h-2.4ZM8.4 9.6a1.2 1.2 0 0 1 2.4 0v7.2a1.2 1.2 0 1 1-2.4 0V9.6Zm6-1.2a1.2 1.2 0 0 0-1.2 1.2v7.2a1.2 1.2 0 1 0 2.4 0V9.6a1.2 1.2 0 0 0-1.2-1.2Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </div>
                    </table>
                    <div
                        class="sticky bottom-0 right-0 flex w-full items-center justify-center bg-white bg-opacity-50 backdrop-blur">
                        {{ $currentListData->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
