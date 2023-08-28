<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" def />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/jQuery.js') }}"></script>
    <script src="{{ asset('js/sideBar.js') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.3/dist/cdn.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>@yield('title', 'Thesis Kiosk')</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="gradient-bg-light m-0 flex p-0 font-poppins">
    {{-- sidebar --}}
    <x-sidebar />

    <div class="flex w-full max-w-full flex-col">
        {{-- navbar --}}
        <x-navbar />

        {{-- contents --}}
        {{ $slot }}
        {{-- <section class="container flex h-screen items-center justify-center">
            <div class="">
                <h2 class="bg-blue-900 p-20 text-white">Content for the first section</h2>
            </div>
        </section> --}}

    </div>
    @livewireScripts

</body>

</html>
