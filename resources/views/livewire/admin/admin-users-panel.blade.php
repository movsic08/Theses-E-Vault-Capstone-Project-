<div class="container">
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
                    <div class="cursor-pointer rounded-lg border border-primary-color p-1 px-3 text-primary-color">New
                        department</div>
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
                                <tr>
                                    <td class="whitespace-nowrap px-2 py-3">
                                        <input type="checkbox" name="" id="">
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <div class="flex items-center gap-2">
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
                                    <td class="whitespace-nowrap px-2 py-3">
                                        @if ($currentListDataValue->is_admin == 1)
                                            <span>Admin</span>
                                        @else
                                            @if ($currentListDataValue->role_id == 1)
                                                <span>Student</span>
                                            @elseif($currentListDataValue->role_id == 2)
                                                <span>Faculty</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-3">
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
                                    <td class="whitespace-nowrap px-2 py-3">
                                        {{ \Carbon\Carbon::parse($currentListDataValue->created_at)->format('M d Y') }}
                                    </td>
                                    <td class="w-fit text-center">
                                        <div class="flex items-center justify-center">
                                            @if ($currentListDataValue->is_verified == 0)
                                                <div
                                                    class="flex w-fit flex-row items-center gap-2 rounded-lg bg-yellow-700 px-2 py-1 text-white">
                                                    <svg class="h-4" viewBox="0 0 23 23" fill="none">
                                                        <path
                                                            d="M21.0827 11.5C21.0827 14.0416 20.073 16.4792 18.2758 18.2764C16.4786 20.0737 14.041 21.0833 11.4993 21.0833C8.95769 21.0833 6.52013 20.0737 4.72291 18.2764C2.92569 16.4792 1.91602 14.0416 1.91602 11.5C1.91602 8.95833 2.92569 6.52077 4.72291 4.72355C6.52013 2.92633 8.95769 1.91666 11.4993 1.91666C14.041 1.91666 16.4786 2.92633 18.2758 4.72355C20.073 6.52077 21.0827 8.95833 21.0827 11.5ZM8.33014 7.48266C8.27499 7.42457 8.20878 7.37812 8.13539 7.34604C8.06201 7.31396 7.98294 7.29689 7.90286 7.29585C7.82277 7.29481 7.74329 7.30982 7.6691 7.33999C7.59491 7.37016 7.52751 7.41488 7.47087 7.47151C7.41424 7.52815 7.36952 7.59555 7.33935 7.66974C7.30918 7.74393 7.29417 7.82341 7.29521 7.9035C7.29625 7.98358 7.31331 8.06265 7.3454 8.13603C7.37748 8.20942 7.42393 8.27564 7.48202 8.33078L10.6522 11.5L7.48202 14.6692C7.42393 14.7243 7.37748 14.7906 7.3454 14.8639C7.31331 14.9373 7.29625 15.0164 7.29521 15.0965C7.29417 15.1766 7.30918 15.256 7.33935 15.3302C7.36952 15.4044 7.41424 15.4718 7.47087 15.5285C7.52751 15.5851 7.59491 15.6298 7.6691 15.66C7.74329 15.6902 7.82277 15.7052 7.90286 15.7041C7.98294 15.7031 8.06201 15.686 8.13539 15.6539C8.20878 15.6219 8.27499 15.5754 8.33014 15.5173L11.4993 12.3472L14.6686 15.5173C14.7832 15.6185 14.9321 15.6722 15.0849 15.6675C15.2377 15.6627 15.383 15.5999 15.4911 15.4918C15.5992 15.3836 15.6621 15.2384 15.6668 15.0855C15.6716 14.9327 15.6179 14.7838 15.5167 14.6692L12.3465 11.5L15.5167 8.33078C15.6179 8.21616 15.6716 8.06727 15.6668 7.91444C15.6621 7.76161 15.5992 7.61634 15.4911 7.50823C15.383 7.40011 15.2377 7.33727 15.0849 7.33252C14.9321 7.32777 14.7832 7.38146 14.6686 7.48266L11.4993 10.6528L8.33014 7.48266Z"
                                                            fill="white" />

                                                    </svg>
                                                    <span class="text-sm">Unverified</span>
                                                </div>
                                            @else
                                                <div
                                                    class="flex w-fit flex-row items-center gap-2 rounded-lg bg-blue-700 px-2 py-1 text-white">
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
                                    <td class="whitespace-nowrap px-2 py-3">
                                        <svg class="h-4 cursor-pointer" viewBox="0 0 28 28" fill="currentColor">
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
