<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" def /> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="{{ url('icons/logo.svg') }}" type="image/x-icon">

    @stack('livewire:scripts')

    <script src="{{ asset('js/jQuery.js') }}"></script>
    <script src="{{ asset('js/darkModeChecker.js') }}"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>@yield('title', 'Theses Kiosk PSU')</title>
    @vite('resources/css/app.css')
    @livewireStyles
    @stack('styles')
    <style>
        #nprogress .bar {
            height: 0.2rem;
            width: $glow-width;
            max-width: 100%;
            float: right;

        }

        #nprogress::before,
        #nprogress::after {
            content: '';
            display: block;
            position: relative;
            border-radius: 0px 2px 2px 0px;
        }

        #nprogress::before {
            background: transparent;
            box-shadow: 0px 0px $glow-radius $bar-color, 0px 0px $glow-radius $glow-color;
            z-index: -5;
        }

        #nprogress::after {
            background: linear-gradient(to right, $background-color 0%, transparent 100%);
            height:calc(100% + #{$glow-radius} + #{$glow-radius});
            width:calc(100% + #{$glow-radius});
            top: (-$glow-radius);
            left: (-$glow-radius);
            z-index: -3;
        }
    </style>
</head>

<body id='bodyTag'
    class="custom-scrollbar m-0 flex scroll-smooth p-0 font-poppins light-background dark:dark-background">
    {{-- sidebar --}}
    {{-- <x-sidebar /> --}}
    <livewire:components.appside-bar>

        <div class="flex w-full max-w-full flex-col">
            {{-- navbar --}}
            <x-navbar />

            {{-- contents --}}
            {{-- @yield('content') --}}
            {{ $slot }}
            {{-- <section class="container flex h-screen items-center justify-center">
            <div class="">
                <h2 class="bg-blue-900 p-20 text-white">Content for the first section</h2>
            </div>
        </section> --}}

        </div>
        {{-- Flowbite
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.js" integrity="sha512-Y9Uk9SbwwPXkLHrtpS/aoD0SjErNdsy5EDhW8roeCDg6EBPxmvLbTUGZCvmG2xTyDlGiGLYqGv0953K8+5MgXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}


        @livewireScripts

</body>

</html>
