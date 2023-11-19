<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" def />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="{{ asset('icons/logo.svg') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="js/jQuery.js"></script>
    <script src="js/sideBar.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="relative h-screen overflow-hidden">
    <div class="absolute inset-0 -z-10 bg-cover bg-center"
        style="background-image: url('{{ asset('assets/psu_acc.jpg') }}');"></div>
    <div class="absolute inset-0 z-10 bg-blue-800 opacity-50"></div>
    <div class="container absolute inset-0 z-20 flex items-center justify-center">
        <div class="flex md:h-[32rem] md:w-[55rem]">
            <div
                class="hidden w-1/2 items-start justify-center rounded-l-lg bg-blue-400 bg-opacity-50 p-8 drop-shadow-lg backdrop-blur-md md:flex md:flex-col">
                <h1 class="whitespace-wrap font-extrabold leading-tight text-yellow-400 md:text-[3rem] lg:text-[4rem]">
                    Pangasinan
                    State
                    Univeristy
                </h1>
                <h2 class="text-[1.7rem] font-bold text-white">Alaminos City Campus</h2>
            </div>
            <div class="flex flex-col rounded-l-lg rounded-r-lg bg-white p-8 drop-shadow-lg md:w-1/2 md:rounded-l-none">
                <div class="mt-4 flex items-center justify-center gap-2">
                    <img src="{{ asset('icons/logo.svg') }}" alt="PSU LOGO" srcset="">
                    <h1 class="text-xl font-bold">ThesisKiosk</h1>
                </div>
                <div class="my-4">
                    <p class="text-gray-500">
                        Explore research works in a faster way. Don’t have an account? <a wire:navigate
                            class="text-blue-500" href="{{ route('register') }}">Signup</a>
                    </p>
                </div>

                {{-- FORM --}}
                <form action="{{ route('login-process') }}" method="POST" class="my-6">
                    @csrf
                    @error('email')
                        <span class="w-full px-1 text-xs text-red-700">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="flex flex-col gap-6">
                        <div class="flex flex-col">
                            <label class="font-medium text-gray-800" for="email">Email</label>
                            <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                type="email" name="email" id="email" placeholder="user@psu.edu.ph" @if(isset($_COOKIE["email"])) value="{{ $_COOKIE["email"]}}" @endif required"">
                        </div>
                        <div class="flex flex-col">
                            <label class="font-medium text-gray-800" for="password">Password</label>
                            <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                type="password" name="password" id="password" @if(isset($_COOKIE["password"])) value="{{ $_COOKIE["password"]}}" @endif required"">
                            @error('password')
                                <span class="w-full px-1 text-xs text-red-700">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between text-gray-500 md:text-sm lg:text-base">
                            <div class="flex flex-row gap-2">
                                <input type="checkbox" name="remember_me" id="remember_me" @if(isset($_COOKIE["email"])) checked="" @endif>
                                <label class="font-normal text-xs" for="remember_me" >Remember me</label>
                            </div>
                            <a href="{{ route('forgot-pass') }}"
                                class="text-blue-500 duration-150 ease-in-out text-xs hover:font-normal hover:text-blue-950">Forgot
                                your password?</a>
                        </div>
                        <input
                            class="h-9 cursor-pointer rounded-md bg-blue-950 font-medium text-white duration-200 hover:bg-blue-800"
                            type="submit" value="Sign in to your account">
                    </div>

                </form>
            </div>

        </div>
    </div>
</body>




</html>
