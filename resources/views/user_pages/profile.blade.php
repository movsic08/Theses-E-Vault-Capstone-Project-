<x-app-layout>
    @section('title', $fullName)
    {{-- @dd(auth()->user()) --}}
    <div class="container">
        <x-session_flash />
    </div>
    <div class="container h-full w-full">

        @if ($checkedAccount !== null)
            <div class="mt-2 lg:container">
                <div class="relative mb-6 h-full w-full">
                    <div class="fixed right-0 top-0 -z-10 h-fit w-full">
                        <div class="absolute h-full w-full bg-slate-400 bg-opacity-30 backdrop-blur-2xl"></div>
                        <img class="h-[20rem] w-full object-cover md:h-[15rem]"
                            src="{{ $checkedAccount->profile_picture ? asset('storage/' . $checkedAccount->profile_picture) : asset('assets/svgs/no-pic-gradient-wallapeper.svg') }}"
                            alt="UserProfile">
                    </div>
                    <div class="z-10 flex w-full flex-col gap-2 md:gap-4 lg:flex-row lg:gap-8">
                        <div class="h-fit w-full rounded-lg bg-white drop-shadow-lg lg:w-2/5">
                            <div class="relative h-full w-full">
                                <img class="h-[20rem] w-full rounded-t-lg object-cover"
                                    src="{{ $checkedAccount->profile_picture ? asset('storage/' . $checkedAccount->profile_picture) : asset('assets/default_profile.png') }}"
                                    alt="UserProfile">
                                <div class="absolute bottom-4 right-4 flex items-end justify-end lg:hidden">
                                    @if (auth()->check())
                                        @if (auth()->user()->id === $currentUserId)
                                            <a wire:navigate href="{{ route('edit-profile', ['activeTab' => 'tab1']) }}"
                                                class="w-fit rounded-md bg-primary-color p-2 text-center text-white duration-150 hover:bg-blue-900">Edit
                                                profile</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="px-10 py-6 lg:px-8 lg:py-4">
                                <section class="flex w-full flex-col lg:hidden">
                                    <h1 class="text-[1.8rem] font-black text-gray-900 md:text-left md:text-[3rem]">
                                        {{ $fullName }}</h1>
                                    <div class="mt-4">
                                        <strong class="uppercase text-primary-color">username</strong>
                                        <h2
                                            class="w-full rounded-md bg-blue-50 px-3 py-1 text-left text-sm font-semibold text-blue-900 md:text-base">
                                            {{ '@' . $checkedAccount->username }}</h2>
                                    </div>
                                </section>
                                <div class="mt-4 flex flex-col justify-between lg:mt-0">
                                    <strong class="uppercase text-primary-color">Status</strong>
                                    @if ($checkedAccount->is_verified == 1)
                                        <div
                                            class="flex w-full items-center justify-center gap-1.5 rounded-lg border border-blue-900 bg-blue-100 px-2 py-1 text-sm font-semibold capitalize text-blue-900">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.584 3.088a3.613 3.613 0 0 0-5.168 0l-.777.797-1.113-.014a3.613 3.613 0 0 0-3.655 3.655l.013 1.113-.795.777a3.612 3.612 0 0 0 0 5.168l.796.777-.014 1.113a3.613 3.613 0 0 0 3.655 3.655l1.113-.013.777.795a3.612 3.612 0 0 0 5.168 0l.777-.796 1.113.014a3.612 3.612 0 0 0 3.655-3.655l-.013-1.113.795-.777a3.612 3.612 0 0 0 0-5.168l-.796-.777.014-1.113a3.612 3.612 0 0 0-3.655-3.655l-1.113.013-.777-.795v-.001Zm.359 7.48-3.75 3.75a.625.625 0 0 1-.886 0l-1.875-1.875a.626.626 0 0 1 .885-.885l1.433 1.433 3.307-3.308a.626.626 0 0 1 .886.885Z">
                                                </path>
                                            </svg> verified
                                        </div>
                                    @else
                                        <div
                                            class="flex w-full items-center justify-center gap-1.5 rounded-lg border border-orange-500 bg-orange-100 px-2 py-1 text-sm font-semibold capitalize text-orange-500">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.178 3.8a1.356 1.356 0 0 0-2.352 0l-8.228 14c-.548.933.11 2.12 1.176 2.12H20.23c1.066 0 1.725-1.188 1.176-2.12l-8.228-14ZM12 7.92c.642 0 1.145.554 1.08 1.194l-.42 4.208a.662.662 0 0 1-1.32 0l-.42-4.208a1.09 1.09 0 0 1 .64-1.1c.138-.062.288-.094.44-.094Zm.002 7.2a1.2 1.2 0 1 1 0 2.4 1.2 1.2 0 0 1 0-2.4Z">
                                                </path>
                                            </svg> unverified
                                        </div>
                                    @endif
                                </div>
                                <div class="mt-4">
                                    <strong class="uppercase text-primary-color">Department</strong>
                                    <div class="mt-1">
                                        @php
                                            if (empty($checkedAccount->bachelor_degree)) {
                                                $yourCourse = 'User doesn\'t have completed their profile. ';
                                            } else {
                                                $yourCourse = $checkedAccount->bachelor_degree;
                                            }
                                        @endphp
                                        <h1
                                            class="w-full rounded-md bg-blue-50 px-3 py-1 text-left text-sm font-semibold text-blue-900 md:text-base lg:text-center">
                                            {{ $yourCourse }}</h1>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    @if ($checkedAccount->role_id == 1)
                                        <strong class="uppercase text-primary-color">year and level</strong>
                                        <div class="mt-1">
                                            @php
                                                if (empty($checkedAccount->year)) {
                                                    $yAndL = 'User doesn\'t have completed their profile. ';
                                                } else {
                                                    $yAndL = $checkedAccount->year . ' - ' . $checkedAccount->section;
                                                }
                                            @endphp
                                            <h1
                                                class="w-full rounded-md bg-blue-50 px-3 py-1 text-left text-sm font-semibold text-blue-900 md:text-base">
                                                {{ $yAndL }}</h1>
                                        </div>
                                    @else
                                        <strong class="uppercase text-primary-color">Account role</strong>
                                        <div class="mt-1">
                                            <h1
                                                class="w-full rounded-md bg-blue-50 px-3 py-1 text-left text-xs font-semibold text-blue-900 md:text-base">
                                                Employee</h1>
                                        </div>
                                    @endif
                                </div>
                                <div class="mt-4 flex w-full items-center justify-between">
                                    <strong class="uppercase text-primary-color">Social Media</strong>
                                    <div class="flex items-center gap-1 text-primary-color">
                                        <a class="duration-200 ease-in-out hover:text-blue-800"
                                            href="https://{{ $checkedAccount->facebook_url }}"target="_blank"
                                            rel="noopener noreferrer">
                                            <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.2 2.875A4.625 4.625 0 0 0 9.575 7.5v2.575H7.1c-.124 0-.225.1-.225.225v3.4c0 .124.1.225.225.225h2.475V20.9c0 .124.1.225.225.225h3.4c.124 0 .225-.1.225-.225v-6.975h2.497c.103 0 .193-.07.218-.17l.85-3.4a.225.225 0 0 0-.218-.28h-3.347V7.5a.775.775 0 0 1 .775-.775h2.6c.124 0 .225-.1.225-.225V3.1c0-.124-.1-.225-.225-.225h-2.6Z">
                                                </path>
                                            </svg></a>
                                        <a class="duration-200 ease-in-out hover:text-pink-600"
                                            href="https://{{ $checkedAccount->ig_url }}" target="_blank"
                                            rel="noopener noreferrer">
                                            <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 8.75a3.25 3.25 0 1 0 0 6.5 3.25 3.25 0 0 0 0-6.5Z"></path>
                                                <path fill-rule="evenodd"
                                                    d="M6.77 3.082a47.472 47.472 0 0 1 10.46 0c1.899.212 3.43 1.707 3.653 3.613a45.67 45.67 0 0 1 0 10.61c-.223 1.906-1.754 3.401-3.653 3.614a47.468 47.468 0 0 1-10.46 0c-1.899-.213-3.43-1.708-3.653-3.613a45.672 45.672 0 0 1 0-10.611C3.34 4.789 4.871 3.294 6.77 3.082ZM17 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2Zm-9.75 6a4.75 4.75 0 1 1 9.5 0 4.75 4.75 0 0 1-9.5 0Z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:mt-[5em]">
                            <div class="hidden lg:block">
                                <section class="flex w-full justify-between p-4">
                                    <div class="leading-tight">
                                        <h1
                                            class="text-center text-[2rem] font-black text-gray-900 md:text-left md:text-[3rem]">
                                            {{ $fullName }}</h1>
                                        <h2 class="text-center font-semibold text-primary-color md:text-left">
                                            {{ '@' . $checkedAccount->username }}</h2>
                                    </div>
                                    <div class="flex items-end justify-end">
                                        @if (auth()->check())
                                            @if (auth()->user()->id === $currentUserId)
                                                <a wire:navigate
                                                    href="{{ route('edit-profile', ['activeTab' => 'tab1']) }}"
                                                    class="w-fit rounded-md bg-primary-color p-2 text-center text-white duration-150 hover:bg-blue-900">Edit
                                                    profile</a>
                                            @endif
                                        @endif
                                    </div>
                                </section>
                            </div>
                            <div class="mt-4 rounded-lg bg-white p-4 px-6 drop-shadow-lg">
                                <div x-data="{ activeTab: 'about' }">
                                    <!-- Tab buttons -->
                                    <ul class="flex space-x-4 text-primary-color">
                                        <li>
                                            <button @click="activeTab = 'about'" class="p-2"
                                                :class="{
                                                    'border-b-2 border-primary-color  font-bold': activeTab === 'about',
                                                    'duration-400 font-medium ease-in-out hover:rounded-md hover:bg-primary-color hover:text-white': activeTab ===
                                                        !'about'
                                                }">
                                                About
                                            </button>
                                        </li>
                                        <li>
                                            <button @click="activeTab = 'document'" class="p-2"
                                                :class="{
                                                    'border-b-2 border-primary-color  font-bold': activeTab === 'document',
                                                    'duration-400 font-medium ease-in-out hover:rounded-md hover:bg-primary-color hover:text-white': activeTab ===
                                                        !'document'
                                                }">
                                                Document
                                            </button>
                                        </li>
                                    </ul>
                                    <!-- info Tab  -->
                                    <div class="mt-3" x-show="activeTab === 'about'">
                                        <div class="w-full">
                                            <div class="overflow-x-auto">
                                                <table class="min-w-full">
                                                    <tbody>
                                                        <tr>
                                                            <td
                                                                class="whitespace-nowrap py-2 text-lg font-bold text-gray-800">
                                                                BASIC
                                                                INFORMATION</td>
                                                        </tr>
                                                        <tr class="flex flex-col lg:table-row">
                                                            <td
                                                                class="whitespace-nowrap py-2 font-semibold text-gray-700">
                                                                Student
                                                                Id</td>
                                                            <td class="px-6 py-2 font-medium text-gray-600">
                                                                {{ $checkedAccount->student_id }}</td>
                                                        </tr>
                                                        <tr class="flex flex-col lg:table-row">
                                                            <td class="py-2 align-top font-semibold text-gray-700">Bio
                                                            </td>
                                                            <td class="px-6 py-2 font-medium text-gray-600">
                                                                {{ $checkedAccount->bio }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                class="whitespace-nowrap py-2 text-lg font-bold text-gray-800">
                                                                CONTACT
                                                                INFORMATION</td>
                                                        </tr>
                                                        <tr class="flex flex-col lg:table-row">
                                                            <td
                                                                class="whitespace-nowrap py-2 font-semibold text-gray-700">
                                                                Email
                                                            </td>
                                                            <td class="px-6 py-2 font-medium text-gray-600">
                                                                {{ $checkedAccount->email }}</td>
                                                        </tr>
                                                        <tr class="flex flex-col lg:table-row">
                                                            <td
                                                                class="whitespace-nowrap py-2 font-semibold text-gray-700">
                                                                Phone
                                                            </td>
                                                            <td class="px-6 py-2 font-medium text-gray-600">
                                                                09678-1231-1323</td>
                                                        </tr>
                                                        <tr class="flex flex-col lg:table-row">
                                                            <td
                                                                class="whitespace-nowrap py-2 font-semibold text-gray-700">
                                                                Address
                                                            </td>
                                                            <td class="px-6 py-2 font-medium text-gray-600">
                                                                {{ $checkedAccount->address }}</td>
                                                        </tr>
                                                        <tr class="flex flex-col lg:table-row">
                                                            <td
                                                                class="whitespace-nowrap py-2 font-semibold text-gray-700">
                                                                Facebook
                                                                link</td>
                                                            <td class="px-6 py-2 font-medium text-gray-600">
                                                                @if ($checkedAccount->facebook_url != null)
                                                                    <a class="duration-300 ease-in-out hover:text-primary-color hover:underline"
                                                                        href="https://{{ $checkedAccount->facebook_url }}"
                                                                        target="_blank">{{ $checkedAccount->facebook_url }}</a>
                                                                @else
                                                                    <div
                                                                        class="rounded-md bg-red-50 px-2 py-1 text-sm text-red-500">
                                                                        The Facebook link
                                                                        @if (auth()->check())
                                                                            is currently unavailable. Please consider
                                                                            incorporating it by updating your profile
                                                                            information.
                                                                        @else
                                                                            for the user is not
                                                                            accessible.
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr class="flex flex-col lg:table-row">
                                                            <td
                                                                class="whitespace-nowrap py-2 font-semibold text-gray-700">
                                                                Instargarm link</td>
                                                            <td class="px-6 py-2 font-medium text-gray-600">
                                                                @if ($checkedAccount->ig_url != null)
                                                                    <a class="duration-300 ease-in-out hover:text-primary-color hover:underline"
                                                                        href="https://{{ $checkedAccount->ig_url }}"
                                                                        target="_blank">{{ $checkedAccount->ig_url }}</a>
                                                                @else
                                                                    <div
                                                                        class="rounded-md bg-red-50 px-2 py-1 text-sm text-red-500">
                                                                        The Instagram link
                                                                        @if (auth()->check())
                                                                            is currently unavailable. Please consider
                                                                            incorporating it by updating your profile
                                                                            information.
                                                                        @else
                                                                            for the user is not
                                                                            accessible.
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- document tab --}}
                                    <div class="mt-3 p-4 text-primary-color" x-show="activeTab === 'document'">
                                        @if (count($docuPostOfUser) <= 0)
                                            <div class="flex w-full flex-col items-center justify-center gap-1">
                                                <a href="{{ route('edit-profile', ['activeTab' => 'tab4']) }}">
                                                    <img class="h-[10rem] md:h-[12rem] lg:h-[15rem]"
                                                        src="{{ asset('assets/svgs/noUploadedDocumentError.svg') }}"
                                                        alt="no docu found ico"></a>
                                                @if (auth()->check() && auth()->user()->id == $checkedAccount->id)
                                                    <a href="{{ route('edit-profile', ['activeTab' => 'tab4']) }}"
                                                        class="rounded-lg bg-blue-700 px-2 py-1 font-medium text-white duration-200 ease-in-out hover:bg-primary-color">Upload</a>
                                                    <h2 class="text-center text-[1.3rem] font-bold">
                                                        Currently, no documents have been uploaded. If you wish to share
                                                        your research works, kindly click on the 'Upload' button or the
                                                        corresponding icon located at the top."
                                                    </h2>
                                                @else
                                                    <h2 class="text-center text-[1.5rem] font-bold">
                                                        User
                                                        has
                                                        not uploaded any
                                                        documents
                                                        yet.
                                                    </h2>
                                                @endif
                                            </div>
                                        @else
                                            <table class="min-w-full">
                                                <thead>
                                                    <tr class="my-2 font-semibold text-gray-800">
                                                        <th scope="col" class="text-start">Title</th>
                                                        <th scope="col" class="whitespace-nowrap text-center">Date
                                                            Uploaded</th>
                                                        @auth
                                                            <th scope="col" class="text-center">Status</th>
                                                        @endauth
                                                    </tr>
                                                </thead>
                                                <tbody class="text-sm">
                                                    @foreach ($docuPostOfUser as $item)
                                                        <tr class="">
                                                            <td scope="col" class="overflow-ellipsis py-2">
                                                                {{ $item->title }}
                                                            </td>
                                                            <td scope="col"
                                                                class="whitespace-nowrap px-6 py-2 text-center">
                                                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                                            </td>
                                                            @auth
                                                                <td scope="col" class="py-2">
                                                                    @if ($item->status == 0)
                                                                        <div
                                                                            class="flex w-full flex-row-reverse items-center justify-center rounded-md bg-yellow-500 px-2 py-1 text-white">
                                                                            <span class="px-1"> Pending </span>
                                                                            <svg class="h-4" viewBox="0 0 20 20"
                                                                                fill="none">
                                                                                <path
                                                                                    d="M10 0C7.34784 0 4.8043 1.05357 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 15.5221 4.47692 20 10 20C15.5221 20 20 15.5221 20 10C20 4.47692 15.5221 0 10 0ZM14.6154 11.5385H10C9.79599 11.5385 9.60033 11.4574 9.45607 11.3132C9.31181 11.1689 9.23077 10.9732 9.23077 10.7692V3.84615C9.23077 3.64214 9.31181 3.44648 9.45607 3.30223C9.60033 3.15797 9.79599 3.07692 10 3.07692C10.204 3.07692 10.3997 3.15797 10.5439 3.30223C10.6882 3.44648 10.7692 3.64214 10.7692 3.84615V10H14.6154C14.8194 10 15.0151 10.081 15.1593 10.2253C15.3036 10.3696 15.3846 10.5652 15.3846 10.7692C15.3846 10.9732 15.3036 11.1689 15.1593 11.3132C15.0151 11.4574 14.8194 11.5385 14.6154 11.5385Z"
                                                                                    fill="#FFFBFB" />
                                                                            </svg>
                                                                        </div>
                                                                    @elseif($item->status == 1)
                                                                        <div
                                                                            class="flex w-full flex-row-reverse items-center justify-center rounded-md bg-green-700 px-2 py-1 text-white">
                                                                            <span class="hidden px-1 lg:block"> Approved
                                                                            </span>
                                                                            <svg class="h-4" viewBox="0 0 21 21"
                                                                                fill="none">
                                                                                <path
                                                                                    d="M20.0827 10.5003C20.0827 13.042 19.073 15.4795 17.2758 17.2768C15.4786 19.074 13.041 20.0837 10.4993 20.0837C7.95769 20.0837 5.52013 19.074 3.72291 17.2768C1.92569 15.4795 0.916016 13.042 0.916016 10.5003C0.916016 7.95867 1.92569 5.52111 3.72291 3.72389C5.52013 1.92666 7.95769 0.916992 10.4993 0.916992C13.041 0.916992 15.4786 1.92666 17.2758 3.72389C19.073 5.52111 20.0827 7.95867 20.0827 10.5003ZM15.3274 6.87112C15.2419 6.78576 15.1401 6.71853 15.028 6.67346C14.9159 6.62839 14.7958 6.6064 14.6751 6.60882C14.5543 6.61123 14.4352 6.638 14.325 6.68752C14.2148 6.73703 14.1157 6.80828 14.0337 6.89699L9.8726 12.1975L7.3656 9.68958C7.19645 9.52489 6.96926 9.43343 6.73319 9.43501C6.49711 9.43659 6.27116 9.53106 6.10423 9.698C5.9373 9.86493 5.84282 10.0909 5.84124 10.327C5.83967 10.563 5.93112 10.7902 6.09581 10.9594L9.26597 14.1305C9.35151 14.2154 9.45323 14.2822 9.56509 14.327C9.67696 14.3719 9.79668 14.3938 9.91716 14.3914C10.0376 14.3891 10.1564 14.3626 10.2665 14.3135C10.3765 14.2644 10.4756 14.1937 10.5578 14.1056L15.3399 8.12845C15.503 7.95892 15.5932 7.73221 15.591 7.49696C15.5889 7.26171 15.4946 7.03667 15.3284 6.87016H15.3265L15.3274 6.87112Z"
                                                                                    fill="white" />
                                                                            </svg>
                                                                        </div>
                                                                    @else
                                                                        <div
                                                                            class="flex w-full flex-row-reverse items-center justify-center rounded-md bg-red-500 px-2 py-1 text-white">
                                                                            <span class="px-1"> Deleted </span>
                                                                            <svg class="h-4" fill="currentColor"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M7.2 2.4a2.4 2.4 0 0 0-2.4 2.4v14.4a2.4 2.4 0 0 0 2.4 2.4h9.6a2.4 2.4 0 0 0 2.4-2.4V8.897a2.4 2.4 0 0 0-.703-1.697L14.4 3.103a2.4 2.4 0 0 0-1.697-.703H7.2ZM8.4 12a1.2 1.2 0 0 0 0 2.4h7.2a1.2 1.2 0 1 0 0-2.4H8.4Z"
                                                                                    clip-rule="evenodd"></path>
                                                                            </svg>
                                                                        </div>
                                                                    @endif

                                                            </td>@endauth
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                    {{-- <div class="mt-3" x-show="activeTab === 'post'">
                            Post content dito.</div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="mt-12 flex h-fit w-full justify-center overflow-hidden">
                <div
                    class="flex h-fit flex-col items-center justify-center rounded-lg bg-white p-20 text-gray-600 drop-shadow-lg">
                    <img class="h-[10rem] md:h-[12rem] lg:h-[15rem]"
                        src="{{ asset('assets/svgs/userNotFoundError.svg') }}" alt="user not found ico">
                    <h2 class="text-[2rem] font-bold">This content isn't available at the moment</h2>
                    <p>When this happens, it's usually because the user is not available , or it's been
                        deleted.</p>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
