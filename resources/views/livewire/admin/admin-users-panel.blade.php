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
                    <div class="cursor-pointer rounded-lg bg-primary-color p-1 px-3 text-white">Add user</div>
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
                        <tbody class="font-medium text-gray-600">
                            @foreach ($currentListData as $currentListDataValue)
                                <livewire:components.user-table-rows :currentListDataValue="$currentListDataValue" :key="$currentListDataValue->id" />
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </div>
</div>
