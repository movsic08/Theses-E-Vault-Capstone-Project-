<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-c2DUCm7+wn6G7Gfy+Uq6xxrD0UXtLok7b/3eY0h9WlCzHt5eRiAAiRN76zdBOBoZpL8ZNllFvztd2kdp5e/Lrg=="
        crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="js/jQuery.js"></script>
    <script src="js/sideBar.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>SignUp</title>
    @vite('resources/css/app.css')
</head>

<body class="relative flex h-screen items-center justify-center font-poppins">
    <div class="signup-gradient absolute inset-0 z-10 bg-cover"></div>
    <div class="container absolute inset-0 z-20 h-full w-full">
        <div class="relative flex h-full w-full items-center justify-center">
            {{-- <img class="absolute left-6 top-7 h-28 blur-sm" src="{{ asset('assets\svgs\blob1.svg') }}" alt="">
            <img class="absolute -right-6 bottom-7 h-28" src="{{ asset('assets\svgs\blob1.svg') }}" alt="">
            <img class="absolute -right-6 bottom-7 h-28" src="{{ asset('assets\svgs\blob1.svg') }}" alt="">
            <img class="absolute right-48 top-1 h-48 blur-sm" src="{{ asset('assets\svgs\blob1.svg') }}" alt="">
            <img class="absolute -right-6 bottom-7 h-28" src="{{ asset('assets\svgs\blob1.svg') }}" alt="">
            <img class="absolute -left-6 bottom-5 h-36" src="{{ asset('assets\svgs\blob1.svg') }}" alt=""> --}}
            <div class="drop-shadow-lg">
                <div class="flex">
                    {{-- 1st div --}}
                    <div class="hidden w-[40rem] rounded-l-xl lg:block lg:h-[38rem]">
                        <div class="relative">
                            <img src="{{ asset('assets/psu_acc.jpg') }}"
                                class="z-30 h-[38rem] w-full rounded-l-xl object-cover" alt="psu-bg">
                            <div class="absolute right-0 top-0 z-40 h-[38rem] w-full rounded-l-xl bg-opacity-25"
                                style="background: linear-gradient(145deg, rgba(46, 151, 248, 0.78) 4.34%, #2B97AE 98.05%);">
                            </div>
                            <div class="absolute top-0 z-40 flex h-[38rem] w-full rounded-l-xl px-4 py-4 text-white">
                                <div class="flex w-full flex-col items-center justify-center">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <img class="h-[7rem]" src="{{ asset('icons/logo.svg') }}" alt="">
                                        <strong class="text-5xl font-black uppercase text-primary-color">Theses
                                            <span class="text-secondary-color">Kiosk</span></strong>
                                    </div>
                                    <div class="mt-4 flex w-full flex-col items-center gap-2">
                                        <h1 class="text-center text-2xl font-extrabold leading-tight">Explore research
                                            works
                                            by undergraduates</h1>
                                        <p
                                            class="rounded-lg bg-blue-100 bg-opacity-20 p-4 text-center font-light leading-tight backdrop-blur-md">
                                            "Welcome, you
                                            can
                                            easily
                                            explore a
                                            collection
                                            of research works by
                                            undergraduate scholars! Unlock the doors to a world of knowledge,
                                            inspiration,
                                            and
                                            endless possibilities as you immerse yourself in the remarkable achievements
                                            of
                                            our
                                            next
                                            generation of scholars. “</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- 2nd div --}}
                    <div
                        class="flex rounded-l-xl rounded-r-xl bg-white lg:h-[38rem] lg:max-h-[38rem] lg:w-[40rem] lg:items-center lg:justify-center lg:rounded-l-none">
                        <section class="m-6 w-full">
                            <div class="my-3">
                                <h1 class="text-lg font-semibold text-gray-700 lg:text-2xl">Create an account</h1>
                                <p class="text-gray-500">
                                    Do you have an account? <a class="text-blue-500"
                                        href="{{ route('login') }}">Login</a>
                                </p>
                            </div>
                            <form action="{{ route('user.create') }}" method="POST">
                                @csrf
                                <div class="flex flex-col gap-2">
                                    <div class="flex w-full flex-col gap-2 md:flex-row">
                                        <div class="flex w-full flex-col">
                                            <x-label-input for="first_name">First name</x-label-input>
                                            <x-input-field class="w-full" type="text" name="first_name"
                                                id="first_name" placeholder="Juan " value="{{ old('first_name') }}" />

                                            @error('first_name')
                                                <span class="w-full text-xs text-red-700">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="flex w-full flex-col">
                                            <x-label-input for="last_name">Last name</x-label-input>
                                            <x-input-field class="w-full" type="text" name="last_name" id="last_name"
                                                placeholder="Dela Cruz " value="{{ old('last_name') }}" />

                                            @error('last_name')
                                                <span class="w-full text-xs text-red-700">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <x-label-input for="username">Username</x-label-input>
                                        <x-input-field class="w-full" type="text" name="username" id="username"
                                            placeholder="ezname902" value="{{ old('username') }}" />

                                        @error('username')
                                            <span class="w-full text-xs text-red-700">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col">
                                        <x-label-input for="email">Email</x-label-input>
                                        <x-input-field class="w-full" type="email" name="email" id="email"
                                            placeholder="user@psu.edu.ph" value="{{ old('email') }}" />
                                        @error('email')
                                            <span class="w-full text-xs text-red-700">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col">
                                        <x-label-input for="password">Password</x-label-input>
                                        <div class="relative">
                                            <x-input-field class="w-full" type="password" name="password"
                                                id="password" />
                                            @error('password')
                                                <span class="w-full text-xs text-red-700">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                            <img class="absolute right-2 top-2 h-5"
                                                src="{{ asset('Icons/eye-close.png') }}" id="eyeicon">
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <x-label-input for="password_confirmation">Confirm password</x-label-input>
                                        <div class="relative">
                                            <x-input-field class="w-full" type="password"
                                                name="password_confirmation" id="password_confirmation" />
                                            <img class="absolute right-2 top-2 h-5"
                                                src="{{ asset('Icons/eye-close.png') }}" id="eyeicon2">
                                        </div>
                                    </div>
                                    {{-- show password logic --}}
                                    <script>
                                        let eyeicon = document.getElementById("eyeicon");
                                        let eyeicon2 = document.getElementById("eyeicon2");
                                        let password = document.getElementById("password");
                                        let password2 = document.getElementById("password_confirmation");

                                        eyeicon.onclick = function() {
                                            if (password.type == "password") {
                                                password.type = "text";
                                                eyeicon.src = "{{ asset('Icons/eye-open.png') }}";
                                            } else {
                                                password.type = "password";
                                                eyeicon.src = "{{ asset('Icons/eye-close.png') }}";
                                            }
                                        }
                                        eyeicon2.onclick = function() {
                                            if (password2.type == "password") {
                                                password2.type = "text";
                                                eyeicon2.src = "{{ asset('Icons/eye-open.png') }}";
                                            } else {
                                                password2.type = "password";
                                                eyeicon2.src = "{{ asset('Icons/eye-close.png') }}";
                                            }
                                        }
                                    </script>

                                    {{-- show password end --}}

                                    <div class="flex flex-col">
                                        <x-label-input for="account-role">Account role</x-label-input>
                                        <select name="role_id" id="account-role"
                                            class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                            <option value="student">Student</option>
                                            <option value="faculty">Employee</option>
                                        </select>
                                        @error('role_id')
                                            <span class="w-full text-xs text-red-700">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>


                                    <input
                                        class="my-3 cursor-pointer rounded-md bg-blue-950 p-2 font-medium text-white duration-200 hover:bg-blue-800"
                                        type="submit" value="Sign up">
                                </div>

                            </form>
                        </section>
                    </div>
                </div>
            </div>


        </div>
    </div>
</body>

</html>
