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
    <div class="container absolute inset-0 z-20 flex items-center justify-center">
        <div class="flex rounded-md bg-white drop-shadow-xl">
            <div class="hidden w-1/2 bg-red-500 md:block">
                <h1>Thesis Kiosk</h1>
            </div>
            <div class="p-4">
                <div class="my-3">
                    <h1 class="text-lg font-semibold">Create an account</h1>
                    <p class="text-gray-500">
                        Do you have an account? <a class="text-blue-500" href="{{ route('login') }}">Login</a>
                    </p>
                </div>

                {{-- FORM --}}
                <form action="{{ route('user.create') }}" method="POST">
                    @csrf
                    <div class="flex flex-col gap-6">
                        <div class="flex flex-col">
                            <label class="font-medium" for="username">Username</label>
                            <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                type="text" name="username" id="username" placeholder="ezname902"
                                value="{{ old('username') }}">
                            @error('username')
                                <span class="w-full px-1 text-xs text-red-700">
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
                                <span class="w-full px-1 text-xs text-red-700">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label class="font-medium" for="password">Password</label>
                            <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                type="password" name="password" id="password">
                            @error('password')
                                <span class="w-full px-1 text-xs text-red-700">
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
                                <span class="w-full px-1 text-xs text-red-700">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                        <input class="h-9 rounded-md bg-blue-950 font-medium text-white duration-200 hover:bg-blue-800"
                            type="submit" value="Create account">
                    </div>

                </form>
            </div>

        </div>
    </div>
</body>




</html>
