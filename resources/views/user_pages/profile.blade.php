<x-app-layout>

    @section('title', 'Profile')
    {{-- @dd(auth()->user()) --}}
    <div class="container">
        <x-session_flash />
    </div>


    @auth
        @if (auth()->user()->first_name === null ||
                auth()->user()->last_name === null ||
                auth()->user()->student_id === null ||
                auth()->user()->staff_id === null ||
                auth()->user()->profile_picture === null ||
                auth()->user()->bio === null)
            <div class="container">
                <div class="mb-4 rounded-lg bg-yellow-200 p-4 text-yellow-800">
                    <p class="font-semibold">Please complete your profile information:</p>
                    @if (auth()->user()->last_name === null)
                        <li>Last Name</li>
                    @endif
                    <!-- Repeat for other fields -->
                </div>
            </div>


            <div class="container my-2 flex flex-col space-y-4 md:flex-row md:gap-2 md:space-y-0 lg:space-x-10">
                {{-- parent container --}}
                <div class="space-y-2 md:w-1/2 md:space-y-3 lg:w-full lg:space-y-6">
                    {{-- information --}}
                    <div class="flex flex-col rounded-md bg-white p-2 drop-shadow-lg">
                        <div class="flex flex-col items-center justify-center">
                            <img class="h-40 w-40 rounded-full object-cover" src="{{ asset('assets/psu_acc.jpg') }}"
                                alt="" srcset="">
                            <h1>JOHn JKD</h1>
                        </div>
                        <a href="{{ route('edit-profile') }}"
                            class="w-fit rounded-md bg-blue-700 p-2 text-center text-white">Edit profile</a>
                        <div class="flex flex-col md:gap-3 lg:flex-row">
                            <label class="font-bold text-gray-700" for="username">Username</label>
                            <input type="text" name="username" class="text-gray-500" id="username"
                                value="{{ auth()->user()->username }}" disabled>
                        </div>
                        <div class="flex flex-col md:flex-row md:gap-3">
                            <label class="font-bold text-gray-700" for="student_id">Student ID</label>
                            <input type="text" name="student_id" class="text-gray-500" id="student_id" value="21-ac-0123"
                                disabled>
                        </div>
                        <div class="flex flex-col md:flex-row md:gap-3">
                            <label class="font-bold text-gray-700" for="email">Email</label>
                            <input type="text" name="email" class="text-gray-500" id="email"
                                value="jsdfi@gmail.com" disabled>
                        </div>
                        <div class="flex flex-col md:flex-row md:gap-3">
                            <label class="font-bold text-gray-700" for="phone">Phone number</label>
                            <input type="text" name="phone" class="text-gray-500" id="phone" value="0978-342-2354"
                                disabled>
                        </div>
                        <div class="flex flex-col md:flex-row md:gap-3">
                            <label class="font-bold text-gray-700" for="address">Address</label>
                            <input type="text" name="address" class="text-gray-500" id="address"
                                value="Poblacion, Alaminos City, Pangasinan" disabled>
                        </div>
                        <div class="flex flex-col md:flex-row md:gap-3">
                            <label class="font-bold text-gray-700" for="bachelor">Bachelor</label>
                            <input type="text" name="bachelor" class="text-gray-500" id="bachelor"
                                value="Bachelor of Science in IT" disabled>
                        </div>
                    </div>
                    {{-- contacts --}}
                    <div class="= flex gap-4 rounded-md drop-shadow-lg">
                        <div
                            class="container flex w-1/2 flex-col items-center justify-center rounded-lg bg-white p-4 drop-shadow-lg">
                            <svg class="rounded-lg bg-slate-700 p-2 text-white" width="46" height="46"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M8.002 4.553a50.577 50.577 0 0 1 8.099.04l1.623.138a2.666 2.666 0 0 1 2.409 2.252l.102.669a20.665 20.665 0 0 1-.096 6.835 2.343 2.343 0 0 1-2.305 1.923H8.858c-.207 0-.41.051-.592.149l-3.911 2.102A.75.75 0 0 1 3.25 18V9.483a4.93 4.93 0 0 1 4.559-4.915l.193-.015ZM8 9.5A1.25 1.25 0 1 0 8 12a1.25 1.25 0 0 0 0-2.5Zm4 0a1.25 1.25 0 1 0 0 2.5 1.25 1.25 0 0 0 0-2.5Zm2.75 1.25a1.25 1.25 0 1 1 2.5 0 1.25 1.25 0 0 1-2.5 0Z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                            <span>Message</span>
                        </div>
                        <div
                            class="container flex w-1/2 flex-col items-center justify-center rounded-lg bg-white p-4 drop-shadow-lg">
                            <svg class="rounded-lg bg-slate-700 p-2 text-white" width="46" height="46"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M7.29 4.908a54.397 54.397 0 0 1 9.42 0l1.511.13a2.888 2.888 0 0 1 2.313 1.546.235.235 0 0 1-.091.307l-6.266 3.88a4.25 4.25 0 0 1-4.4.045L3.47 7.088a.236.236 0 0 1-.103-.293A2.889 2.889 0 0 1 5.78 5.039l1.51-.131Z">
                                </path>
                                <path
                                    d="M3.362 8.767a.248.248 0 0 0-.373.187 30.351 30.351 0 0 0 .184 7.56A2.888 2.888 0 0 0 5.78 18.96l1.51.131c3.135.273 6.287.273 9.422 0l1.51-.13a2.888 2.888 0 0 0 2.606-2.449 30.35 30.35 0 0 0 .161-7.779.247.247 0 0 0-.377-.182l-5.645 3.494a5.75 5.75 0 0 1-5.951.061l-5.653-3.34Z">
                                </path>
                            </svg>
                            <span>Email</span>
                        </div>
                    </div>


                </div>

                {{-- UPLAODED FILES --}}
                <div class="md:w-1/2 lg:w-1/3">
                    <div class="space-y-3 md:sticky md:top-10 lg:space-y-3">
                        <div class="mb-6 flex flex-col gap-2">
                            <div class="flex flex-col gap-2 rounded-lg bg-white p-4 shadow-lg">
                                <b>Uploaded Document/s</b>
                                <div class="rounded-lg bg-blue-600 p-2 text-sm text-white">
                                    <p>You haven't uploaded any documents.</p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 rounded-lg bg-white p-4 shadow-lg">
                                <b>Uploaded Post/s</b>
                                <div class="rounded-lg bg-blue-600 p-2 text-sm text-white">
                                    <p>You haven't uploaded any documents.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endauth
</x-app-layout>
