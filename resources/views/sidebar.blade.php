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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Sidebar</title>
    @vite('resources/css/app.css')
</head>


<body class=" gradient-bg-light  lg:flex lg:flex-row font-poppins">
    <nav id="sidebar-nav"
        class="sticky lg:left-0 left-full hidden top-0 z-50 lg:flex h-screen w-auto  flex-col justify-between lg:rounded-r-xl bg-white dark:bg-red-900 text-gray-700 drop-shadow-xl">
        {{-- LOGO AND NAME AND FEATURE CONTAINER --}}
        <div>
            <div class="flex items-center justify-between p-4 space-x-1">
                <h1>logo</h1>
                <h1 class="hideName">ThesisKIosk</h1>
                <button id="menu-hide-btn" class="lg:hidden">
                    <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" >
                        <path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242-1.414-1.414Z"></path>
                      </svg>
                </button>
                <button id="sidebarBtn" class="hidden lg:block rotate-180 z-40 absolute -right-3">
                    <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2a10 10 0 1 1 0 20 10 10 0 0 1 0-20Zm-4.375 9.375a.625.625 0 1 0 0 1.25h7.241l-2.684 2.682a.627.627 0 0 0 .886.885l3.75-3.75a.625.625 0 0 0 0-.885l-3.75-3.75a.626.626 0 1 0-.886.886l2.684 2.682H7.625Z"></path>
                    </svg>
                </button>
            </div>
            <div class="text-sm font-semibold">
                <div class="rounded-md mx-1 mb-2 p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a href="" class="flex items-center">
                        <div class="relative">
                            <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24" >
                                <path d="M12 22a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22Zm7-7.414V10c0-3.217-2.185-5.927-5.145-6.742A1.99 1.99 0 0 0 12 2a1.99 1.99 0 0 0-1.855 1.258C7.185 4.074 5 6.783 5 10v4.586l-1.707 1.707A.996.996 0 0 0 3 17v1a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-1a.996.996 0 0 0-.293-.707L19 14.586Z"></path>
                              </svg>
                            <div
                                class="absolute -right-1 -top-1 flex h-4 w-4 items-center justify-center rounded-full border-2 border-white bg-gray-700 text-gray-100">
                                <p class="text-[8px]">1</p>
                            </div>
                        </div>
                        <p class="pl-2 hideName">Notification</p>
                    </a>
                </div>
                <div class="mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a href="" class="flex items-center">
                        <div class="relative">
                            <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.276 9.68a10.281 10.281 0 0 0-3.62-5.844A10.66 10.66 0 0 0 11.992 1.5c-2.856 0-5.523 1.1-7.517 3.098C2.548 6.531 1.492 9.083 1.5 11.783c0 1.98.581 3.915 1.671 5.567l.204.283L2.25 22.5l5.381-1.339s.108.036.188.067c.08.03.765.293 1.493.497.604.168 1.863.422 2.848.422 2.796 0 5.407-1.083 7.352-3.05a10.332 10.332 0 0 0 2.988-7.308c0-.709-.075-1.416-.224-2.108Z">
                                </path>
                            </svg>
                            <div
                                class="absolute -right-1 -top-1 flex h-4 w-4 items-center justify-center rounded-full border-2 border-white bg-gray-700 text-gray-100">
                                <p class="text-[8px]">1</p>
                            </div>
                        </div>

                        <p class="pl-2 hideName">Chat</p>
                    </a>
                </div>
                <div class="mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a href="" class="flex items-center">
                        <div class="relative">
                            <svg  width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.848 2.752a1.2 1.2 0 0 0-1.696 0l-8.4 8.4a1.2 1.2 0 0 0 1.696 1.696l.352-.351V20.4A1.2 1.2 0 0 0 6 21.6h2.4a1.2 1.2 0 0 0 1.2-1.2V18a1.2 1.2 0 0 1 1.2-1.2h2.4a1.2 1.2 0 0 1 1.2 1.2v2.4a1.2 1.2 0 0 0 1.2 1.2H18a1.2 1.2 0 0 0 1.2-1.2v-7.903l.352.351a1.2 1.2 0 0 0 1.696-1.696l-8.4-8.4Z">
                                </path>
                            </svg>
                        </div>
                        
                        <p class="pl-2 hideName">Home</p>
                    </a>
                </div>
                <div class="mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a href="" class="flex items-center">
                        <div class="relative">
                            <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M10.8 10.8a2.4 2.4 0 1 1 4.8 0 2.4 2.4 0 0 1-4.8 0Z"></path>
                                <path fill-rule="evenodd"
                                    d="M12 21.6a9.6 9.6 0 1 0 0-19.2 9.6 9.6 0 0 0 0 19.2ZM13.2 6a4.8 4.8 0 0 0-4.135 7.238L6.352 15.95a1.2 1.2 0 0 0 1.696 1.698l2.714-2.713A4.8 4.8 0 1 0 13.2 6Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        
                        <p class="pl-2 hideName">Search</p>
                    </a>
                </div>
                <div class="mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a href="" class="flex items-center">
                        <div class="relative">
                            <svg class="relative" width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M6 21a1 1 0 0 1-.863-.496A1 1 0 0 1 5 20V5.33A2.28 2.28 0 0 1 7.2 3h9.6A2.28 2.28 0 0 1 19 5.33V20a1 1 0 0 1-1.5.86l-5.67-3.21-5.33 3.2A1 1 0 0 1 6 21Z">
                                </path>
                            </svg>
                        </div>
                        <p class="pl-2 hideName">Bookmark</p>
                    </a>
                </div>

                <div class="mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a href="" class="flex items-center">
                        <div class="relative">
                            <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 3.75a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5Z"></path>
                                <path
                                    d="M8 13.25A3.75 3.75 0 0 0 4.25 17v1.188c0 .754.546 1.396 1.29 1.517 4.278.699 8.642.699 12.92 0a1.537 1.537 0 0 0 1.29-1.517V17A3.75 3.75 0 0 0 16 13.25h-.34c-.185 0-.369.03-.544.086l-.866.283a7.251 7.251 0 0 1-4.5 0l-.866-.283a1.752 1.752 0 0 0-.543-.086H8Z">
                                </path>
                            </svg>
                        </div>
                        <p class="pl-2 hideName">User</p>
                    </a>
                </div>
            </div>
        </div>

        {{-- Setting --}}
        <div>
            <div class="text-sm font-semibold">
                <div class="mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a href="" class="flex items-center">
                        <div class="relative">
                            <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 11.807A9.002 9.002 0 0 1 10.049 2a9.942 9.942 0 0 0-5.12 2.735c-3.905 3.905-3.905 10.237 0 14.142 3.906 3.906 10.237 3.905 14.143 0a9.946 9.946 0 0 0 2.735-5.119A9.004 9.004 0 0 1 12 11.807Z"></path>
                              </svg>
                        </div>
                        
                        <p class="pl-2 hideName">Dark</p>
                    </a>
                </div>
                <div class="mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a href="" class="flex items-center">
                        <div class="relative">
                            <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2Zm1 16h-2v-2h2v2Zm.976-4.885c-.196.158-.385.309-.535.459-.408.407-.44.777-.441.793v.133h-2v-.167c0-.118.029-1.177 1.026-2.174.195-.195.437-.393.691-.599.734-.595 1.216-1.029 1.216-1.627a1.934 1.934 0 0 0-3.867.001h-2A3.939 3.939 0 0 1 12 6a3.939 3.939 0 0 1 3.934 3.934c0 1.597-1.179 2.55-1.958 3.181Z"></path>
                              </svg>
                        </div>
                        <p class="pl-2 hideName">Help</p>
                    </a>
                </div>

                <div class="mx-1 my-2 rounded-md p-1 px-3 py-2.5 duration-500 hover:bg-gray-800 hover:text-white">
                    <a href="" class="flex items-center">
                        <div class="relative">
                            <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 5v14a1 1 0 0 0 1 1h3v-2H7V6h2V4H6a1 1 0 0 0-1 1Zm14.242-.97-8-2A1 1 0 0 0 10 3v18a.999.999 0 0 0 1.242.97l8-2A1 1 0 0 0 20 19V5a1 1 0 0 0-.758-.97ZM15 12.188a1 1 0 0 1-2 0v-.377a1 1 0 1 1 2 0v.377Z"></path>
                              </svg>
                        </div>
                        <p class="pl-2 hideName">LogOut</p>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="z-40 w-full">
        <section class="gradient-bg sticky top-0 backdrop-blur">
            <div class="top-0 flex w-full justify-between items-center px-7 py-2 text-base font-semibold text-blue-950">
                <h1 class="">Good Morning, Pogi!</h1>
                <div class=" flex justify-center items-center flex-row">
                    <h1>21-AC-0138</h1>
                    <button id="left-btn" class="lg:hidden">
                        <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6h16v2H4V6Zm4 5h12v2H8v-2Zm5 5h7v2h-7v-2Z"></path>
                          </svg>
                    </button>
                </div>
            </div>
        </section>
        <section class="">
            <div class="top-0 z-20 flex w-full flex-row justify-between px-7 py-2 font-semibold text-blue-950">
                <div>
                    <h1 class="pt-5 text-8xl font-black">THESIS KIOSK</h1>
                    <p class="-mt-4 text-3xl font-light">UNDERGRADUATE WORKS</p>
                    <p class="text-lg font-light">Thesis Kiosk is a dedicated platform designed to showcase the
                        exceptional research and scholarly endeavors of undergraduate students. Be inspired by the
                        groundbreaking discoveries, critical analyses, and creative endeavors presented by talented
                        undergraduate researchers from esteemed institutions. Begin your journey of exploration today.
                        Welcome to Thesis Kiosk, where undergraduate brilliance shines!</p>
                    <button class="rounded-full bg-blue-950 p-2 px-8 text-sm text-white">Explore Now</button>

                </div>
                <div>
                    <h1>SVG BLEND ICON</h1>
                </div>
            </div>

        </section>
        <section>
            <div class="top-0 flex w-full justify-between px-7 py-2 text-base font-semibold text-gray-600">
                <h1 class="">SAMPLE TEXT HEHEH</h1>
                <h1>SAMPLE ULIT PERO SA JUSTFIY BETWEEN</h1>
            </div>
            <h1 class="p-5 text-8xl font-bold">Lorem ipsum dolor sit amet consectetur ad</h1>
        </section>
        <section>
            <div class="top-0 flex w-full justify-between px-7 py-2 text-base font-semibold text-gray-600">
                <h1 class="">SAMPLE TEXT HEHEH</h1>
                <h1>SAMPLE ULIT PERO SA JUSTFIY BETWEEN</h1>
            </div>
            <h1 class="p-5 text-8xl font-bold">Lorem ipsum dolor sit amet consectetur ad</h1>
        </section>
        <section>
            <div class="top-0 flex w-full justify-between px-7 py-2 text-base font-semibold text-gray-600">
                <h1 class="">SAMPLE TEXT HEHEH</h1>
                <h1>SAMPLE ULIT PERO SA JUSTFIY BETWEEN</h1>
            </div>
            <h1 class="p-5 text-8xl font-bold">Lorem ipsum dolor sit amet consectetur ad</h1>
        </section>
    </div>
</body>

</html>
