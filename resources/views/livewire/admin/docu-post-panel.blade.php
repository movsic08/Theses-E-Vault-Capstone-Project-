<div class="container">
    <x-session_flash />

    @if ($showDeleteConfirmation)
        <div
            class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-600 bg-opacity-25 backdrop-blur-sm">
            <div
                class="mx-3 flex w-fit flex-col gap-1 rounded-xl bg-white px-10 py-8 text-center text-gray-600 drop-shadow-lg md:w-3/5 lg:w-4/12">
                <h2><strong>Are you sure you want to delete your uploaded document?</strong></h2>
                <form action="" wire:submit="deleteDocuPostYes">
                    {{ $selectedPostId }}
                    <div class="flex w-full flex-col items-center justify-center gap-2 md:flex-row">
                        <div class="w-full cursor-pointer rounded-md border border-red-700 bg-white p-2 text-center duration-200 hover:bg-red-100"
                            wire:click="showboxDelete({{ $selectedPostId }})">Close</div>
                        <div wire:click='deleteDocuPost'
                            class="w-full rounded-md bg-red-700 p-2 text-white duration-300 ease-in-out hover:bg-red-900">
                            Yes</div>
                    </div>
                </form>
            </div>
        </div>
    @endif

    @if ($showViewDocuPostBox)
        <div wire:click='toggleViewDocuBox'
            class="fixed inset-0 z-50 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm">
            <section
                class="custom-scrollbar relative mt-[3rem] h-[90%] w-fit overflow-y-auto rounded-lg bg-white drop-shadow-xl md:w-[50%] lg:w-[40%]">
                <div class="sticky right-0 top-0 -mt-4 flex w-full bg-white bg-opacity-50 backdrop-blur-xl">
                    <h2 class="my-1 flex-grow p-1 text-center">{{ $dataItem->status }}</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" wire:click='toggleViewDocuBox' class="h-10 cursor-pointer"
                        viewBox="0 0 46 46" fill="none">
                        <path
                            d="M26.0474 23.0038L34.5842 14.4689C34.9744 14.0617 35.1898 13.518 35.1841 12.954C35.1785 12.3901 34.9523 11.8507 34.554 11.4515C34.1558 11.0522 33.617 10.8247 33.0531 10.8176C32.4891 10.8105 31.9449 11.0245 31.5367 11.4137L22.9999 19.9486L14.465 11.4137C14.2642 11.2131 14.0259 11.054 13.7637 10.9455C13.5015 10.837 13.2205 10.7812 12.9367 10.7813C12.6529 10.7813 12.3719 10.8373 12.1098 10.946C11.8476 11.0547 11.6094 11.2139 11.4088 11.4147C11.0037 11.8201 10.7762 12.3698 10.7764 12.9429C10.7765 13.5161 11.0044 14.0657 11.4098 14.4708L19.9447 23.0057L11.4098 31.5406C11.2092 31.7412 11.0501 31.9794 10.9415 32.2415C10.8329 32.5036 10.777 32.7845 10.777 33.0682C10.777 33.3519 10.8329 33.6328 10.9415 33.8949C11.0501 34.157 11.2092 34.3952 11.4098 34.5958C11.6104 34.7964 11.8485 34.9555 12.1107 35.0641C12.3728 35.1727 12.6537 35.2285 12.9374 35.2285C13.2211 35.2285 13.502 35.1727 13.7641 35.0641C14.0262 34.9555 14.2644 34.7964 14.465 34.5958L22.9999 26.059L31.5348 34.5939C31.7354 34.7945 31.9735 34.9536 32.2357 35.0622C32.4978 35.1707 32.7787 35.2266 33.0624 35.2266C33.3461 35.2266 33.627 35.1707 33.8891 35.0622C34.1512 34.9536 34.3894 34.7945 34.59 34.5939C34.7906 34.3933 34.9497 34.1551 35.0583 33.893C35.1668 33.6309 35.2227 33.35 35.2227 33.0663C35.2227 32.7826 35.1668 32.5017 35.0583 32.2396C34.9497 31.9775 34.7906 31.7393 34.59 31.5387L26.0474 23.0038Z"
                            fill="#B0A6A6" />
                    </svg>
                </div>

                <div class="px-10 pb-8 pt-5">
                    <div class="flex items-center">
                        <h2 class="flex-grow text-[1.2rem] font-bold">
                            {{ $dataItem->title }}
                        </h2>
                    </div>
                    <span class="rounded-md bg-cyan-200 px-2 py-1 font-semibold text-cyan-900">
                        {{ $dataItem->course }}
                    </span>
                    <div class="mt-4 grid grid-cols-2 gap-6">
                        <div class="col-span-1 flex flex-grow items-center">
                            <div class="w-fit rounded-md bg-slate-200 p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6" viewBox="0 0 36 36"
                                    fill="none">
                                    <path
                                        d="M32.9816 29.9682L26.9167 15.2799C26.8048 15.0086 26.6148 14.7767 26.3709 14.6136C26.1271 14.4504 25.8402 14.3633 25.5468 14.3633C25.2534 14.3633 24.9665 14.4504 24.7227 14.6136C24.4788 14.7767 24.2888 15.0086 24.1769 15.2799L18.1121 29.9682C18.0278 30.1498 17.9811 30.3466 17.9748 30.5467C17.9686 30.7468 18.0029 30.946 18.0757 31.1325C18.1486 31.319 18.2584 31.4888 18.3986 31.6317C18.5387 31.7746 18.7064 31.8877 18.8914 31.9641C19.0765 32.0405 19.2751 32.0787 19.4752 32.0763C19.6754 32.0739 19.873 32.031 20.0562 31.9503C20.2394 31.8695 20.4043 31.7525 20.5411 31.6063C20.6778 31.4601 20.7836 31.2877 20.8519 31.0995L22.0882 28.1095H29.0054L30.2417 31.0995C30.316 31.2794 30.4249 31.443 30.5624 31.5807C30.6999 31.7185 30.8632 31.8279 31.0429 31.9026C31.2226 31.9772 31.4153 32.0158 31.61 32.016C31.8046 32.0162 31.9974 31.9781 32.1773 31.9038C32.3572 31.8295 32.5207 31.7205 32.6585 31.5831C32.7962 31.4456 32.9056 31.2823 32.9803 31.1026C33.055 30.9229 33.0935 30.7302 33.0937 30.5355C33.094 30.3409 33.0558 30.1481 32.9816 29.9682ZM23.3115 25.144L25.5468 19.7289L27.7821 25.144H23.3115Z"
                                        fill="#4B3D3D" />
                                    <path
                                        d="M18.7978 23.8578C19.028 23.5396 19.1226 23.143 19.0606 22.7551C18.9986 22.3672 18.7851 22.0198 18.4672 21.7892C18.4542 21.7792 17.458 21.0403 16.009 19.449C18.6813 15.8322 20.195 11.7167 20.8117 9.78038H22.9867C23.3797 9.78038 23.7567 9.62423 24.0346 9.34629C24.3126 9.06835 24.4687 8.69138 24.4687 8.29831C24.4687 7.90524 24.3126 7.52828 24.0346 7.25034C23.7567 6.9724 23.3797 6.81625 22.9867 6.81625H15.1681V5.46644C15.1681 5.27181 15.1298 5.07909 15.0553 4.89928C14.9808 4.71946 14.8716 4.55608 14.734 4.41846C14.5964 4.28084 14.433 4.17167 14.2532 4.09719C14.0734 4.02271 13.8807 3.98437 13.686 3.98438C13.4914 3.98437 13.2987 4.02271 13.1189 4.09719C12.9391 4.17167 12.7757 4.28084 12.6381 4.41846C12.5004 4.55608 12.3913 4.71946 12.3168 4.89928C12.2423 5.07909 12.204 5.27181 12.204 5.46644V6.81481H4.38685C3.99378 6.81481 3.61681 6.97096 3.33887 7.2489C3.06093 7.52684 2.90479 7.90381 2.90479 8.29688C2.90479 8.68994 3.06093 9.06691 3.33887 9.34485C3.61681 9.62279 3.99378 9.77894 4.38685 9.77894H17.678C17.0368 11.5959 15.8552 14.4623 14.054 17.0814C11.938 14.2726 11.1503 12.4556 11.1445 12.4397C10.9926 12.0772 10.7029 11.7898 10.3391 11.6409C9.97527 11.4919 9.5672 11.4936 9.20463 11.6455C8.84206 11.7975 8.5547 12.0872 8.40575 12.451C8.25681 12.8148 8.25848 13.2229 8.41041 13.5854C8.44922 13.6789 9.39079 15.8926 11.9725 19.2406L12.1565 19.4777C9.51297 22.4663 6.91829 24.3192 5.83297 24.9187C5.48794 25.107 5.23186 25.4247 5.12106 25.8019C5.01026 26.179 5.05382 26.5847 5.24216 26.9297C5.4305 27.2748 5.74818 27.5309 6.12533 27.6417C6.50248 27.7525 6.90819 27.7089 7.25322 27.5206C7.39841 27.4415 10.5278 25.7093 14.1015 21.7533C15.618 23.3777 16.6617 24.1424 16.7249 24.187C16.8826 24.3015 17.0613 24.3837 17.2507 24.429C17.4402 24.4744 17.6368 24.4819 17.8292 24.4512C18.0216 24.4205 18.206 24.3521 18.372 24.2501C18.5379 24.148 18.6821 24.0142 18.7963 23.8564L18.7978 23.8578Z"
                                        fill="#4B3D3D" />
                                </svg>
                            </div>
                            <div class="ml-2">
                                <h2 class="-mb-2 text-[1rem] font-medium">{{ $dataItem->language }}</h2>
                                <span class="text-sm font-light text-slate-700">Language</span>
                            </div>
                        </div>
                        <div class="col-span-1 flex flex-grow items-center">
                            <div class="w-fit rounded-md bg-slate-200 p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6" viewBox="0 0 46 46"
                                    fill="none">
                                    <path
                                        d="M12.2189 3.83203C12.5366 3.83203 12.8413 3.95824 13.066 4.18289C13.2906 4.40755 13.4168 4.71224 13.4168 5.02995V6.22786H32.5835V5.02995C32.5835 4.71224 32.7097 4.40755 32.9344 4.18289C33.159 3.95824 33.4637 3.83203 33.7814 3.83203C34.0991 3.83203 34.4038 3.95824 34.6285 4.18289C34.8531 4.40755 34.9793 4.71224 34.9793 5.02995V6.22786H37.3752C38.646 6.22786 39.8648 6.7327 40.7634 7.63131C41.662 8.52992 42.1668 9.7487 42.1668 11.0195V37.3737C42.1668 38.6445 41.662 39.8633 40.7634 40.7619C39.8648 41.6605 38.646 42.1654 37.3752 42.1654H8.62516C7.35433 42.1654 6.13555 41.6605 5.23694 40.7619C4.33833 39.8633 3.8335 38.6445 3.8335 37.3737V11.0195C3.8335 9.7487 4.33833 8.52992 5.23694 7.63131C6.13555 6.7327 7.35433 6.22786 8.62516 6.22786H11.021V5.02995C11.021 4.71224 11.1472 4.40755 11.3719 4.18289C11.5965 3.95824 11.9012 3.83203 12.2189 3.83203ZM8.62516 12.2174V14.6133C8.62516 15.2745 9.20975 15.8112 9.93041 15.8112H36.0718C36.7906 15.8112 37.3771 15.2745 37.3771 14.6133V12.2174C37.3771 11.5562 36.7925 11.0195 36.068 11.0195H9.93041C9.21166 11.0195 8.62516 11.5562 8.62516 12.2174ZM24.1981 24.1966C24.1981 23.8789 24.0719 23.5742 23.8472 23.3496C23.6226 23.1249 23.3179 22.9987 23.0002 22.9987C22.6825 22.9987 22.3778 23.1249 22.1531 23.3496C21.9285 23.5742 21.8022 23.8789 21.8022 24.1966V27.7904H18.2085C17.8908 27.7904 17.5861 27.9166 17.3614 28.1412C17.1368 28.3659 17.0106 28.6706 17.0106 28.9883C17.0106 29.306 17.1368 29.6107 17.3614 29.8353C17.5861 30.06 17.8908 30.1862 18.2085 30.1862H21.8022V33.7799C21.8022 34.0977 21.9285 34.4023 22.1531 34.627C22.3778 34.8517 22.6825 34.9779 23.0002 34.9779C23.3179 34.9779 23.6226 34.8517 23.8472 34.627C24.0719 34.4023 24.1981 34.0977 24.1981 33.7799V30.1862H27.7918C28.1095 30.1862 28.4142 30.06 28.6389 29.8353C28.8635 29.6107 28.9897 29.306 28.9897 28.9883C28.9897 28.6706 28.8635 28.3659 28.6389 28.1412C28.4142 27.9166 28.1095 27.7904 27.7918 27.7904H24.1981V24.1966Z"
                                        fill="#4B3D3D" />
                                </svg>
                            </div>
                            <div class="ml-2">
                                <h2 class="-mb-2 text-[1rem] font-medium">
                                    {{ \Carbon\Carbon::parse($dataItem->created_at)->format('M d Y') }}
                                </h2>
                                <span class="text-sm font-light text-slate-700">Date created</span>
                            </div>
                        </div>
                        <div class="col-span-1 flex flex-grow items-center">
                            <div class="w-fit rounded-md bg-slate-200 p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6" viewBox="0 0 46 46"
                                    fill="none">
                                    <path
                                        d="M24.1501 11.3509C25.6547 9.76581 28.2498 9.31347 31.3088 9.62014C34.1455 9.90764 37.0646 10.8238 39.1001 11.6748V34.4985C36.9898 33.6935 34.2548 32.9076 31.5408 32.6355C29.0242 32.3786 26.3006 32.5454 24.1501 33.7663V11.3509ZM23.0001 9.27131C20.7346 7.32397 17.4513 7.03264 14.4613 7.33164C10.9788 7.68431 7.46551 8.87839 5.27476 9.87314C5.07371 9.9644 4.90318 10.1116 4.78355 10.2972C4.66391 10.4828 4.60023 10.6988 4.6001 10.9196V36.2196C4.60006 36.4122 4.64838 36.6017 4.74063 36.7707C4.83287 36.9398 4.96609 37.0829 5.12805 37.1871C5.29002 37.2913 5.47554 37.3531 5.66761 37.3669C5.85968 37.3807 6.05215 37.3461 6.22735 37.2661C8.25518 36.3461 11.5231 35.2402 14.6913 34.9201C17.9305 34.5943 20.6483 35.1214 22.1031 36.9384C22.2109 37.0727 22.3474 37.1811 22.5026 37.2556C22.6579 37.3301 22.8279 37.3687 23.0001 37.3687C23.1723 37.3687 23.3423 37.3301 23.4975 37.2556C23.6528 37.1811 23.7893 37.0727 23.8971 36.9384C25.3538 35.1214 28.0697 34.5943 31.3088 34.9201C34.4771 35.2402 37.7488 36.3461 39.7748 37.2661C39.9499 37.3456 40.1421 37.3799 40.3339 37.3659C40.5257 37.3519 40.711 37.29 40.8727 37.1859C41.0344 37.0818 41.1674 36.9388 41.2595 36.77C41.3516 36.6012 41.4 36.412 41.4001 36.2196V10.9196C41.4001 10.6991 41.3367 10.4831 41.2174 10.2976C41.0982 10.112 40.928 9.96468 40.7273 9.87314C38.5366 8.87647 35.0233 7.68431 31.5408 7.33164C28.5508 7.03073 25.2656 7.32397 23.0001 9.27131Z"
                                        fill="#4B3D3D" />
                                </svg>
                            </div>
                            <div class="ml-2">
                                <h2 class="-mb-2 text-[1rem] font-medium">{{ $dataItem->physical_description }}</h2>
                                <span class="text-sm font-light text-slate-700">Physical Description</span>
                            </div>
                        </div>
                        <div class="col-span-1 flex flex-grow items-center">
                            <div class="w-fit rounded-md bg-slate-200 p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6" viewBox="0 0 46 46"
                                    fill="none">
                                    <path
                                        d="M4.6001 35.8789C4.6001 36.7939 4.96358 37.6714 5.61058 38.3184C6.25758 38.9654 7.1351 39.3289 8.0501 39.3289H37.9501C38.8651 39.3289 39.7426 38.9654 40.3896 38.3184C41.0366 37.6714 41.4001 36.7939 41.4001 35.8789V19.7789C41.4001 18.8639 41.0366 17.9864 40.3896 17.3394C39.7426 16.6924 38.8651 16.3289 37.9501 16.3289H8.0501C7.1351 16.3289 6.25758 16.6924 5.61058 17.3394C4.96358 17.9864 4.6001 18.8639 4.6001 19.7789V35.8789ZM9.2001 12.8789C9.2001 13.1839 9.32126 13.4764 9.53692 13.6921C9.75259 13.9077 10.0451 14.0289 10.3501 14.0289H35.6501C35.9551 14.0289 36.2476 13.9077 36.4633 13.6921C36.6789 13.4764 36.8001 13.1839 36.8001 12.8789C36.8001 12.5739 36.6789 12.2814 36.4633 12.0657C36.2476 11.8501 35.9551 11.7289 35.6501 11.7289H10.3501C10.0451 11.7289 9.75259 11.8501 9.53692 12.0657C9.32126 12.2814 9.2001 12.5739 9.2001 12.8789ZM13.8001 8.27891C13.8001 8.58391 13.9213 8.87641 14.1369 9.09208C14.3526 9.30775 14.6451 9.42891 14.9501 9.42891H31.0501C31.3551 9.42891 31.6476 9.30775 31.8633 9.09208C32.0789 8.87641 32.2001 8.58391 32.2001 8.27891C32.2001 7.97391 32.0789 7.6814 31.8633 7.46573C31.6476 7.25007 31.3551 7.12891 31.0501 7.12891H14.9501C14.6451 7.12891 14.3526 7.25007 14.1369 7.46573C13.9213 7.6814 13.8001 7.97391 13.8001 8.27891Z"
                                        fill="#4B3D3D" />
                                </svg>
                            </div>
                            <div class="ml-2">
                                <h2 class="-mb-2 text-[1rem] font-medium">{{ $dataItem->document_type }}</h2>
                                <span class="text-sm font-light text-slate-700">Document type</span>
                            </div>
                        </div>
                        <div class="col-span-1 flex flex-grow items-center">
                            <div class="w-fit rounded-md bg-slate-200 p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6" viewBox="0 0 46 46"
                                    fill="none">
                                    <path
                                        d="M12.2189 3.83203C12.5366 3.83203 12.8413 3.95824 13.066 4.18289C13.2906 4.40755 13.4168 4.71224 13.4168 5.02995V6.22786H32.5835V5.02995C32.5835 4.71224 32.7097 4.40755 32.9344 4.18289C33.159 3.95824 33.4637 3.83203 33.7814 3.83203C34.0991 3.83203 34.4038 3.95824 34.6285 4.18289C34.8531 4.40755 34.9793 4.71224 34.9793 5.02995V6.22786H37.3752C38.646 6.22786 39.8648 6.7327 40.7634 7.63131C41.662 8.52992 42.1668 9.7487 42.1668 11.0195V37.3737C42.1668 38.6445 41.662 39.8633 40.7634 40.7619C39.8648 41.6605 38.646 42.1654 37.3752 42.1654H8.62516C7.35433 42.1654 6.13555 41.6605 5.23694 40.7619C4.33833 39.8633 3.8335 38.6445 3.8335 37.3737V11.0195C3.8335 9.7487 4.33833 8.52992 5.23694 7.63131C6.13555 6.7327 7.35433 6.22786 8.62516 6.22786H11.021V5.02995C11.021 4.71224 11.1472 4.40755 11.3719 4.18289C11.5965 3.95824 11.9012 3.83203 12.2189 3.83203ZM36.0661 11.0195H9.93041C9.21166 11.0195 8.62516 11.5562 8.62516 12.2174V14.6133C8.62516 15.2745 9.20975 15.8112 9.93041 15.8112H36.0718C36.7906 15.8112 37.3771 15.2745 37.3771 14.6133V12.2174C37.3771 11.5562 36.7925 11.0195 36.068 11.0195H36.0661ZM29.8369 25.0457C29.9484 24.9343 30.0369 24.8021 30.0973 24.6565C30.1577 24.5109 30.1888 24.3549 30.1889 24.1973C30.189 24.0397 30.158 23.8836 30.0978 23.738C30.0376 23.5923 29.9492 23.46 29.8379 23.3485C29.7265 23.237 29.5942 23.1485 29.4487 23.0881C29.3031 23.0277 29.1471 22.9966 28.9895 22.9965C28.8319 22.9964 28.6758 23.0274 28.5302 23.0876C28.3845 23.1478 28.2522 23.2362 28.1407 23.3475L21.8022 29.6917L19.0576 26.9413C18.8295 26.7308 18.5288 26.6167 18.2185 26.6229C17.9081 26.6291 17.6123 26.7552 17.3928 26.9746C17.1733 27.1941 17.0473 27.49 17.041 27.8003C17.0348 28.1107 17.1489 28.4114 17.3594 28.6394L20.9532 32.2313C21.0645 32.3431 21.1968 32.4319 21.3425 32.4924C21.4882 32.553 21.6444 32.5842 21.8022 32.5842C21.96 32.5842 22.1163 32.553 22.262 32.4924C22.4077 32.4319 22.54 32.3431 22.6513 32.2313L29.8388 25.0438L29.8369 25.0457Z"
                                        fill="#4B3D3D" />
                                </svg>
                            </div>
                            <div class="ml-2">
                                <h2 class="-mb-2 text-[1rem] font-medium">{{ $dataItem->date_of_approval }}</h2>
                                <span class="text-sm font-light text-slate-700">Date of publish</span>
                            </div>
                        </div>
                        <div class="col-span-1 flex flex-grow items-center">
                            <div class="w-fit rounded-md bg-slate-200 p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6" viewBox="0 0 46 46"
                                    fill="none">
                                    <path
                                        d="M26.8335 4.3125C26.9606 4.3125 27.0825 4.36298 27.1723 4.45284C27.2622 4.54271 27.3127 4.66458 27.3127 4.79167V15.6151C27.3127 16.4086 27.9567 17.0526 28.7502 17.0526H37.3752C37.5022 17.0526 37.6241 17.1031 37.714 17.1929C37.8038 17.2828 37.8543 17.4047 37.8543 17.5318V36.4167C37.8543 37.8146 37.299 39.1552 36.3105 40.1437C35.3221 41.1322 33.9814 41.6875 32.5835 41.6875H13.4168C12.0189 41.6875 10.6783 41.1322 9.68979 40.1437C8.70131 39.1552 8.146 37.8146 8.146 36.4167V9.58333C8.146 8.18542 8.70131 6.84476 9.68979 5.85629C10.6783 4.86782 12.0189 4.3125 13.4168 4.3125H26.8335Z"
                                        fill="#4B3D3D" />
                                    <path
                                        d="M30.8315 5.05629C30.5574 4.83587 30.1875 5.06012 30.1875 5.41279V13.6985C30.1875 13.963 30.4022 14.1777 30.6667 14.1777H36.9878C37.214 14.1777 37.3558 13.94 37.2255 13.756L31.4487 5.71179C31.2734 5.46652 31.0658 5.24602 30.8315 5.05629Z"
                                        fill="#4B3D3D" />
                                </svg>
                            </div>
                            <div class="ml-2">
                                <h2 class="-mb-2 text-[1rem] font-medium">{{ $dataItem->format }}</h2>
                                <span class="text-sm font-light text-slate-700">Format</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 grid grid-cols-2 gap-4 border-b-2 border-t-2 border-gray-400 py-4">
                        <div class="col-span-1 flex gap-1">
                            <svg class="h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 3.75a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5Z"></path>
                                <path
                                    d="M8 13.25A3.75 3.75 0 0 0 4.25 17v1.188c0 .754.546 1.396 1.29 1.517 4.278.699 8.642.699 12.92 0a1.537 1.537 0 0 0 1.29-1.517V17A3.75 3.75 0 0 0 16 13.25h-.34c-.185 0-.369.03-.544.086l-.866.283a7.251 7.251 0 0 1-4.5 0l-.866-.283a1.752 1.752 0 0 0-.543-.086H8Z">
                                </path>
                            </svg>
                            <h1 class="font-light text-gray-500">Defense Panel Chair</h1>
                        </div>
                        <div class="col-span-1">
                            <span class="font-semibold">{{ $dataItem->panel_chair }}</span>
                        </div>
                        <div class="col-span-1 flex gap-1">
                            <svg class="h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 3.75a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5Z"></path>
                                <path
                                    d="M8 13.25A3.75 3.75 0 0 0 4.25 17v1.188c0 .754.546 1.396 1.29 1.517 4.278.699 8.642.699 12.92 0a1.537 1.537 0 0 0 1.29-1.517V17A3.75 3.75 0 0 0 16 13.25h-.34c-.185 0-.369.03-.544.086l-.866.283a7.251 7.251 0 0 1-4.5 0l-.866-.283a1.752 1.752 0 0 0-.543-.086H8Z">
                                </path>
                            </svg>
                            <h1 class="font-light text-gray-500">Defense Panel Member</h1>
                        </div>
                        <div class="col-span-1 flex flex-col gap-1">
                            <span class="whitespace-nowrap font-semibold">{{ $dataItem->panel_member_1 }}</span>
                            <span class="whitespace-nowrap font-semibold">{{ $dataItem->panel_member_2 }}</span>
                            <span class="whitespace-nowrap font-semibold">{{ $dataItem->panel_member_3 }}</span>
                            <span class="whitespace-nowrap font-semibold">{{ $dataItem->panel_member_4 }}</span>
                        </div>
                        <div class="col-span-1 flex gap-1">
                            <svg class="h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M14.25 2.5a.25.25 0 0 0-.25-.25H7A2.75 2.75 0 0 0 4.25 5v14A2.75 2.75 0 0 0 7 21.75h10A2.75 2.75 0 0 0 19.75 19V9.147a.25.25 0 0 0-.25-.25H15a.75.75 0 0 1-.75-.75V2.5ZM12 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-4 8.5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3 1 1 0 0 1-1 1H9a1 1 0 0 1-1-1Z"
                                    clip-rule="evenodd"></path>
                                <path
                                    d="M15.75 2.824c0-.184.193-.301.336-.186.121.098.23.212.323.342l3.013 4.197c.068.096-.006.22-.124.22H16a.25.25 0 0 1-.25-.25V2.824Z">
                                </path>
                            </svg>
                            <h1 class="font-light text-gray-500">Author/s</h1>
                        </div>
                        <div class="col-span-1 flex flex-col gap-1">
                            <span class="whitespace-nowrap font-semibold">{{ $dataItem->author_1 }}</span>
                            <span class="whitespace-nowrap font-semibold">{{ $dataItem->author_2 }}</span>
                            <span class="whitespace-nowrap font-semibold">{{ $dataItem->author_3 }}</span>
                            <span class="whitespace-nowrap font-semibold">{{ $dataItem->author_4 }}</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 border-b-2 border-gray-400 py-4">
                        <div class="col-span-1 flex gap-1">
                            <svg class="h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.13 3.186a25.028 25.028 0 0 0-8.26 0A2.444 2.444 0 0 0 5.876 5.11a36.89 36.89 0 0 0-.147 13.795l.333 1.86a.732.732 0 0 0 1.224.4l4.024-3.822a1 1 0 0 1 1.378 0l4.023 3.822a.732.732 0 0 0 1.224-.4l.334-1.86a36.89 36.89 0 0 0-.148-13.795 2.444 2.444 0 0 0-1.991-1.925Z">
                                </path>
                            </svg>
                            <h1 class="font-light text-gray-500">Keyword/s</h1>
                        </div>
                        <div class="col-span-1 flex flex-col gap-1">
                            <span class="whitespace-nowrap font-semibold">{{ $dataItem->keyword_1 }}</span>
                            <span class="whitespace-nowrap font-semibold">{{ $dataItem->keyword_2 }}</span>
                            <span class="whitespace-nowrap font-semibold">{{ $dataItem->keyword_3 }}</span>
                            <span class="whitespace-nowrap font-semibold">{{ $dataItem->keyword_4 }}</span>
                            <span class="whitespace-nowrap font-semibold">{{ $dataItem->keyword_5 }}</span>
                            <span class="whitespace-nowrap font-semibold">{{ $dataItem->keyword_6 }}</span>
                            <span class="whitespace-nowrap font-semibold">{{ $dataItem->keyword_7 }}</span>
                            <span class="whitespace-nowrap font-semibold">{{ $dataItem->keyword_8 }}</span>
                        </div>
                    </div>
                    <div class="col-span-2 mt-6 flex flex-col items-start gap-1">
                        <div class="flex flex-row gap-1">
                            <svg class="h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2 4.917a2.5 2.5 0 0 1 2.5-2.5h15a2.5 2.5 0 0 1 2.5 2.5v10a2.5 2.5 0 0 1-2.5 2.5h-3.125a1.25 1.25 0 0 0-1 .5L13 21.083a1.25 1.25 0 0 1-2 0l-2.375-3.166a1.25 1.25 0 0 0-1-.5H4.5a2.5 2.5 0 0 1-2.5-2.5v-10Zm8.992 3.457a2.113 2.113 0 0 0-.283-.34 1.835 1.835 0 0 0-.586-.405l-.01-.005a2.231 2.231 0 0 0-.945-.207C7.97 7.417 7 8.349 7 9.501c0 1.15.97 2.082 2.168 2.082a2.22 2.22 0 0 0 1.163-.325c-.171.487-.487 1.005-1.012 1.525a.507.507 0 0 0 .013.738.56.56 0 0 0 .768-.013c1.668-1.661 1.713-3.447 1.176-4.632a3.077 3.077 0 0 0-.284-.5v-.002Zm4.758 2.884c-.17.487-.488 1.005-1.012 1.525a.507.507 0 0 0 .014.738.56.56 0 0 0 .767-.013c1.667-1.661 1.712-3.447 1.177-4.632a3.08 3.08 0 0 0-.285-.5 2.114 2.114 0 0 0-.284-.342 1.832 1.832 0 0 0-.586-.405l-.01-.005a2.23 2.23 0 0 0-.944-.207c-1.196 0-2.167.932-2.167 2.084 0 1.15.971 2.082 2.168 2.082a2.22 2.22 0 0 0 1.163-.325h-.001Z">
                                </path>
                            </svg>
                            <h1 class="font-light text-gray-500">Recommended Citation</h1>
                        </div>
                        <p class="font-semibold">
                            {{ $dataItem->recommended_citation }}
                        </p>
                    </div>
                    <div class="col-span-2 mt-6 flex flex-col items-start gap-1">
                        <div class="flex flex-row gap-1">
                            <svg class="h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.8 2.4H7.2a2.4 2.4 0 0 0-2.4 2.4v14.4a2.4 2.4 0 0 0 2.4 2.4h9.6a2.4 2.4 0 0 0 2.4-2.4V4.8a2.4 2.4 0 0 0-2.4-2.4ZM8.4 7.2h7.2a.6.6 0 1 1 0 1.2H8.4a.6.6 0 1 1 0-1.2Zm-.6 3a.6.6 0 0 1 .6-.6h7.2a.6.6 0 1 1 0 1.2H8.4a.6.6 0 0 1-.6-.6Zm.6 1.8h7.2a.6.6 0 1 1 0 1.2H8.4a.6.6 0 1 1 0-1.2Zm0 2.4H12a.6.6 0 1 1 0 1.2H8.4a.6.6 0 1 1 0-1.2Z">
                                </path>
                            </svg>
                            <h1 class="font-light text-gray-500">Abstract</h1>
                        </div>
                        <p class="mx-auto font-semibold">
                            {{ $dataItem->abstract_or_summary }}
                        </p>
                        <a href="?notf?" target="_blank" class="rounded-md bg-primary-color p-2 text-white">View
                            File(I NEED UI HERE
                            HEHE)</a>
                    </div>
                </div>
                <div class="sticky bottom-0 right-0 flex gap-4 bg-white bg-opacity-50 px-10 py-2 backdrop-blur-xl">
                    <button
                        class="w-full rounded-md bg-blue-500 p-1 font-medium text-white duration-200 ease-in-out hover:bg-blue-700">Edit</button>
                    <button
                        class="w-full rounded-md bg-blue-500 p-1 font-medium text-white duration-200 ease-in-out hover:bg-blue-700">
                        Remark
                    </button>
                    <button
                        class="w-full rounded-md bg-blue-500 p-1 font-medium text-white duration-200 ease-in-out hover:bg-blue-700">Save</button>
                </div>
            </section>
        </div>
    @endif

    <div class="md:px-4">
        <div class="my-3 flex justify-between">
            <h2>List of Uploaded Documents</h2>
            <a wire:navigate href="{{ route('upload-document-form') }}"
                class="rounded-lg bg-primary-color p-2 text-sm font-bold text-white">Add new document</a>
        </div>
        <div class="mb-8 rounded-2xl bg-white px-5 py-2 drop-shadow-md">
            <div class="mb-2 flex w-full flex-col items-center justify-between md:flex-row">
                <div>
                    <label for="default-search"
                        class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white">Search</label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input wire:model.live.debounce.500ms='search' type="search" id="default-search"
                            placeholder="Search title"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                    </div>
                </div>
                <div class="flex items-center">
                    <label for="">Status</label>
                    <select id="countries"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option value="5">All</option>
                        <option value="0">Pending</option>
                        <option value="1">Approved</option>
                        <option value="2">Deleted</option>
                        <option value="3">Discarded</option>
                    </select>
                </div>
                <div>
                    <label for="">Date</label>
                    <input class="rounded-lg border border-gray-500" type="date" name="" id="">
                </div>
                <div class="flex items-center">
                    <label for="">Type</label>
                    <select id="countries" wire:model.live='selectedDocumentType'
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option value="All">All</option>
                        @foreach ($documentTypes as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center">
                    <label for="countpage">Items</label>
                    <select id="countpage" wire:model.live='paginateCount'
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>
                </div>
            </div>
            <div class="custom-scrollbar overflow-x-auto">
                <div class="max-h-[35rem]">
                    <table class="min-w-full">
                        <thead class="sticky top-0 bg-white bg-opacity-50 backdrop-blur">
                            <tr>
                                <th class="px-6 py-2 text-left font-bold text-gray-700">
                                    Title
                                </th>
                                <th class="px-6 py-2 text-left font-bold text-gray-700">
                                    Date
                                </th>
                                <th class="px-6 py-2 text-left font-bold text-gray-700">
                                    Uploader
                                </th>
                                <th class="px-6 py-2 text-left font-bold text-gray-700">
                                    Type
                                </th>
                                <th class="px-6 py-2 text-left font-bold text-gray-700">
                                    Status
                                </th>
                                <th
                                    class="flex items-center justify-center px-6 py-2 text-left font-bold text-gray-700">
                                    <svg class="h-4 text-gray-500" viewBox="0 0 31 31" fill="currentColor">
                                        <path
                                            d="M18.0614 2.83145C17.3089 0.279368 13.6922 0.279368 12.9397 2.83145L12.7575 3.44978C12.6449 3.83181 12.4484 4.18381 12.1821 4.47998C11.9159 4.77615 11.5868 5.00899 11.2188 5.16142C10.8509 5.31384 10.4536 5.38199 10.0559 5.36087C9.6582 5.33976 9.27028 5.2299 8.92057 5.03937L8.35474 4.7302C6.01557 3.45708 3.45912 6.01499 4.73224 8.3527L5.04141 8.91854C5.23221 9.2683 5.34229 9.65635 5.36355 10.0542C5.38481 10.4521 5.31672 10.8496 5.16428 11.2177C5.01183 11.5858 4.7789 11.9151 4.48257 12.1815C4.18625 12.4478 3.83405 12.6444 3.45182 12.7569L2.83203 12.9392C0.279948 13.6917 0.279948 17.3083 2.83203 18.0608L3.45036 18.2431C3.83239 18.3556 4.18439 18.5522 4.48056 18.8184C4.77673 19.0847 5.00957 19.4138 5.16199 19.7817C5.31442 20.1496 5.38257 20.547 5.36145 20.9447C5.34034 21.3424 5.23048 21.7303 5.03995 22.08L4.73078 22.6458C3.45766 24.985 6.01557 27.5429 8.35328 26.2683L8.91912 25.9592C9.26888 25.7684 9.65693 25.6583 10.0548 25.637C10.4526 25.6158 10.8502 25.6838 11.2183 25.8363C11.5864 25.9887 11.9157 26.2217 12.1821 26.518C12.4484 26.8143 12.645 27.1665 12.7575 27.5487L12.9397 28.1685C13.6922 30.7206 17.3089 30.7206 18.0614 28.1685L18.2437 27.5487C18.356 27.1666 18.5524 26.8144 18.8186 26.518C19.0848 26.2217 19.414 25.9888 19.782 25.8363C20.15 25.6839 20.5474 25.6158 20.9452 25.637C21.343 25.6583 21.7309 25.7684 22.0806 25.9592L22.6464 26.2698C24.9856 27.5415 27.5435 24.985 26.2689 22.6473L25.9597 22.08C25.7695 21.7303 25.6598 21.3426 25.6389 20.9451C25.6179 20.5475 25.6861 20.1504 25.8385 19.7826C25.9909 19.4149 26.2237 19.0859 26.5197 18.8198C26.8157 18.5537 27.1675 18.3571 27.5493 18.2446L28.1691 18.0608C30.7212 17.3083 30.7212 13.6917 28.1691 12.9392L27.5493 12.7569C27.1673 12.6444 26.8153 12.4478 26.5191 12.1816C26.223 11.9153 25.9901 11.5862 25.8377 11.2183C25.6853 10.8504 25.6171 10.453 25.6382 10.0553C25.6594 9.65762 25.7692 9.2697 25.9597 8.91999L26.2704 8.35416C27.542 6.01499 24.9856 3.45854 22.6479 4.73166L22.0806 5.04083C21.7309 5.23109 21.3431 5.34072 20.9456 5.3617C20.5481 5.38267 20.151 5.31446 19.7832 5.16205C19.4155 5.00965 19.0865 4.77691 18.8204 4.48089C18.5543 4.18487 18.3577 3.83306 18.2452 3.45124L18.0614 2.83145ZM15.5006 20.8404C14.7815 20.8695 14.0639 20.753 13.3909 20.4979C12.7179 20.2428 12.1035 19.8544 11.5844 19.3559C11.0653 18.8573 10.6522 18.2591 10.3701 17.597C10.088 16.9349 9.94255 16.2226 9.94255 15.5029C9.94255 14.7832 10.088 14.0709 10.3701 13.4088C10.6522 12.7467 11.0653 12.1485 11.5844 11.65C12.1035 11.1515 12.7179 10.763 13.3909 10.5079C14.0639 10.2528 14.7815 10.1363 15.5006 10.1654C16.8698 10.2333 18.1605 10.8251 19.1056 11.8182C20.0507 12.8113 20.5777 14.1298 20.5777 15.5007C20.5777 16.8717 20.0507 18.1901 19.1056 19.1832C18.1605 20.1763 16.8698 20.7681 15.5006 20.836V20.8404Z" />
                                    </svg>
                                </th>
                            </tr>
                        </thead>
                        <div class="overflow-y-auto overflow-x-hidden">
                            <tbody class="w-full text-gray-500">
                                @foreach ($listOfDocuPost as $itemPost)
                                    <tr>
                                        <td class="whitespace-normal px-6 py-2">
                                            <a
                                                href="{{ route('view-document', [$itemPost->reference]) }}"><strong>{{ $itemPost->title }}</strong></a>
                                        </td>
                                        <td class="w-fit whitespace-nowrap px-6 py-2">
                                            {{ \Carbon\Carbon::parse($itemPost->created_at)->format('M d Y') }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-2">
                                            {{ $itemPost->author_1 }}
                                        </td>
                                        <td class="whitespace-normal px-6 py-2">
                                            {{ $itemPost->document_type }}
                                        </td>
                                        <td class="whitespace-normal px-6 py-2">
                                            @if ($itemPost->status == 0)
                                                <div
                                                    class="w-full rounded-md bg-orange-500 px-2 py-1 text-center text-sm font-medium uppercase text-white">
                                                    pending
                                                </div>
                                            @elseif ($itemPost->status == 1)
                                                <div
                                                    class="w-full rounded-md bg-green-500 px-2 py-1 text-center text-sm font-medium uppercase text-white">
                                                    approved
                                                </div>
                                            @elseif ($itemPost->status == 2)
                                                <div
                                                    class="w-full rounded-md bg-red-500 px-2 py-1 text-center text-sm font-medium uppercase text-white">
                                                    deleted
                                                </div>
                                            @elseif ($itemPost->status == 3)
                                                <div
                                                    class="w-full rounded-md bg-green-500 px-2 py-1 text-center text-sm font-medium uppercase text-white">
                                                    revision
                                                </div>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-2">
                                            <div class="flex gap-1">
                                                <svg class="h-7 cursor-pointer rounded-md bg-blue-600 p-1 text-white duration-200 ease-in-out hover:bg-blue-800"
                                                    fill="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18.067 2.182a.625.625 0 0 0-.884 0l-2.058 2.059 4.634 4.634 2.058-2.058a.623.623 0 0 0 0-.885l-3.75-3.75Zm.808 7.576L14.24 5.125 6.116 13.25h.259a.625.625 0 0 1 .625.624v.625h.625a.625.625 0 0 1 .625.625v.625h.625a.625.625 0 0 1 .625.626V17h.625a.625.625 0 0 1 .625.625v.258l8.125-8.125ZM9.54 19.093a.625.625 0 0 1-.04-.218v-.625h-.625a.625.625 0 0 1-.625-.625V17h-.625A.625.625 0 0 1 7 16.375v-.626h-.625a.625.625 0 0 1-.625-.625V14.5h-.625a.624.624 0 0 1-.219-.04l-.224.223a.625.625 0 0 0-.137.21l-2.5 6.25a.625.625 0 0 0 .812.813l6.25-2.5a.625.625 0 0 0 .21-.138l.223-.223Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-7 cursor-pointer rounded-md bg-primary-color p-1 text-white duration-200 ease-in-out hover:bg-blue-900"
                                                    fill="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15 11.64a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                                    <path
                                                        d="M2.4 11.64S6 5.04 12 5.04s9.6 6.6 9.6 6.6-3.6 6.6-9.6 6.6-9.6-6.6-9.6-6.6Zm9.6 4.2a4.2 4.2 0 1 0 0-8.4 4.2 4.2 0 0 0 0 8.4Z">
                                                    </path>
                                                </svg>
                                                <svg wire:click='showboxDelete({{ $itemPost->id }})'
                                                    class="h-7 cursor-pointer rounded-md bg-red-600 p-1 text-white duration-200 ease-in-out hover:bg-red-800"
                                                    fill="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.36 4.2v1.2h4.2a.6.6 0 0 1 0 1.2h-.645L17.89 19.392a2.4 2.4 0 0 1-2.393 2.208H8.022a2.4 2.4 0 0 1-2.392-2.208L4.606 6.6H3.96a.6.6 0 0 1 0-1.2h4.2V4.2a1.8 1.8 0 0 1 1.8-1.8h3.6a1.8 1.8 0 0 1 1.8 1.8Zm-6 0v1.2h4.8V4.2a.6.6 0 0 0-.6-.6h-3.6a.6.6 0 0 0-.6.6Zm-1.8 4.235.6 10.2a.6.6 0 1 0 1.198-.072l-.6-10.2a.6.6 0 1 0-1.198.072Zm7.836-.633a.6.6 0 0 0-.633.564l-.6 10.2a.6.6 0 0 0 1.197.07l.6-10.2a.6.6 0 0 0-.564-.634ZM11.76 7.8a.6.6 0 0 0-.6.6v10.2a.6.6 0 1 0 1.2 0V8.4a.6.6 0 0 0-.6-.6Z">
                                                    </path>
                                                </svg>
                                                <svg wire:click='viewDocuPost({{ $itemPost->id }})'
                                                    class="h-7 cursor-pointer rounded-md bg-yellow-600 p-1 text-white duration-200 ease-in-out hover:bg-yellow-800"
                                                    fill="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.225 2.576A.6.6 0 0 1 14.4 3a.6.6 0 0 0 .6.6.6.6 0 0 1 .6.6v.6a.6.6 0 0 1-.6.6H9a.6.6 0 0 1-.6-.6v-.6a.6.6 0 0 1 .6-.6.6.6 0 0 0 .6-.6.6.6 0 0 1 .6-.6h3.6a.6.6 0 0 1 .425.176Z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M6.6 3.6h.702c-.066.188-.102.39-.102.6v.6A1.8 1.8 0 0 0 9 6.6h6a1.8 1.8 0 0 0 1.8-1.8v-.6c0-.21-.036-.412-.102-.6h.702a1.8 1.8 0 0 1 1.8 1.8v14.4a1.8 1.8 0 0 1-1.8 1.8H6.6a1.8 1.8 0 0 1-1.8-1.8V5.4a1.8 1.8 0 0 1 1.8-1.8Zm8.151 6.352a1.2 1.2 0 0 0-.351.849v6a1.2 1.2 0 1 0 2.4 0v-6a1.2 1.2 0 0 0-2.049-.849Zm-7.2 4.8a1.2 1.2 0 0 0-.351.849v1.2a1.2 1.2 0 0 0 2.4 0v-1.2a1.2 1.2 0 0 0-2.049-.849Zm5.297-2.4a1.2 1.2 0 0 0-2.048.849v3.6a1.2 1.2 0 1 0 2.4 0v-3.6a1.2 1.2 0 0 0-.352-.849Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                    </table>
                    <div
                        class="sticky bottom-0 right-0 flex w-full items-center justify-center bg-white bg-opacity-50 backdrop-blur">
                        {{ $listOfDocuPost->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
