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
    <div class="absolute inset-0 -z-10 bg-cover bg-center"
        style="background-image: url('{{ asset('assets/psu_acc.jpg') }}');"></div>
    <div class="absolute inset-0 z-10 bg-blue-800 opacity-60"></div>
    <div class="container absolute inset-0 z-20 flex items-center justify-center">

        <div class="flex rounded-md bg-white drop-shadow-xl">
            <div class="hidden w-1/2 bg-red-500 md:block">
                <h1>Thesis Kiosk</h1>
            </div>
            <div class="p-4">
                <div class="my-3">
                    <h1 class="text-lg font-semibold">Login</h1>
                    <p class="text-gray-500">
                        Don't have an account yet? <a class="text-blue-500" href="{{ route('register') }}">Signup</a>
                    </p>
                </div>

                {{-- FORM --}}
                <form action="{{ route('login-process') }}" method="POST">
                    @csrf
                    @error('email')
                        <span class="w-full px-1 text-xs text-red-700">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="flex flex-col gap-6">
                        <div class="flex flex-col">
                            <label class="font-medium" for="email">Email</label>
                            <input class="h-9 rounded-md border-2 bg-gray-200 px-1 focus:outline-blue-950"
                                type="email" name="email" id="email" placeholder="user@psu.edu.ph"
                                value="{{ old('email') }}">

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
                        <input class="h-9 rounded-md bg-blue-950 font-medium text-white duration-200 hover:bg-blue-800"
                            type="submit" value="Login">
                    </div>

                </form>
            </div>

        </div>
    </div>
</body>




</html>
