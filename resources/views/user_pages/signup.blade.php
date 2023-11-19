<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" def />
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

<body class="relative h-screen overflow-hidden">
    <div class="signup-gradient absolute inset-0 z-10 bg-cover"></div>
    <div class="container absolute inset-0 z-20 h-screen w-screen">
        <div class="flex h-full w-full items-center justify-center">
            {{-- 1st div --}}
            <div class="hidden h-full w-[45%] overflow-hidden rounded-l-lg p-4 drop-shadow-lg md:block">
                <div class="absolute inset-0 z-10 transform transition-transform duration-700 hover:scale-125">
                    <img src="{{ asset('assets/psu_acc.jpg') }}" class="absolute z-10 h-full w-full object-cover"
                        alt="psu-bg">
                    <div class="absolute z-20 h-full w-full bg-blue-600 bg-opacity-50"></div>
                </div>
                <div class="absolute z-40 flex h-full w-full items-center px-4 py-4 text-white">
                    <div class="flex flex-col">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('icons/logo.svg') }}" alt="">
                            <h1 class="text-[1.9rem] font-semibold uppercase">Thesis Kiosk</h1>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <h1 class="text-[2rem] font-black leading-tight">Explore research works
                                by undergraduates</h1>
                            <p class="mr-4 font-thin leading-tight">"Welcome to Thesis Kiosk! Here, you can easily
                                explore a
                                collection
                                of research works by
                                undergraduate scholars!Unlock the doors to a world of knowledge, inspiration, and
                                endless possibilities as you immerse yourself in the remarkable achievements of our next
                                generation of scholars. “</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- 2nd div --}}
            <div
                class="h-[43rem] max-h-[-43rem] w-fit rounded-lg bg-white px-10 py-4 drop-shadow-lg md:w-[45%] md:rounded-l-none md:rounded-r-lg">
                <div class="my-3">
                    <h1 class="text-lg font-semibold">Create an account</h1>
                    <p class="text-gray-500">
                        Do you have an account? <a class="text-blue-500" href="{{ route('login') }}">Login</a>
                    </p>
                </div>
                <form action="{{ route('user.create') }}" method="POST">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <div class="flex w-full flex-row gap-2">
                            <div class="flex w-full flex-col">
                                <label class="font-medium" for="fname">First name</label>
                                <input class="h-9 w-full rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                    type="text" name="first_name" id="fname" placeholder="Juan "
                                    value="{{ old('fname') }}">
                                @error('fname')
                                    <span class="w-full text-xs text-red-700">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="flex w-full flex-col">
                                <label class="font-medium" for="lname">Last name</label>
                                <input class="h-9 w-full rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                    type="text" name="last_name" id="lname" placeholder="Dela Cruz "
                                    value="{{ old('lname') }}">
                                @error('lname')
                                    <span class="w-full text-xs text-red-700">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
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
                                type="email" name="email" id="email" placeholder="user@psu.edu.ph"
                                value="{{ old('email') }}">
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
                            <label class="font-medium" for="password_confirmation">Confirm Password</label>
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


                        <input
                            class="cursor-pointer rounded-md bg-blue-950 p-2 font-medium text-white duration-200 hover:bg-blue-800"
                            type="submit" value="Sign up">
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>




</html>
