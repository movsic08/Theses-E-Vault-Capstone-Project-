<div class="px-4">

    <section class="container">
        <div class="my-2">
            <h2>Dashboard</h2>
        </div>
        <div class="grid grid-cols-10 gap-3">
            {{-- 1st div --}}
            <div class="col-span-10 flex h-full flex-col gap-4 md:col-span-5 lg:col-span-2">
                <div
                    class="z-10 overflow-hidden rounded-2xl bg-primary-color p-4 text-white drop-shadow-lg duration-500 ease-in-out hover:scale-110">
                    <div class="text-[0.9rem]">
                        <h2 class="font-semibold">Uploaded Files</h2>
                        <h3 class="text-[1.3rem] font-bold">{{ $uploadFilesCount }}</h3>
                    </div>
                    <svg class="absolute -right-5 bottom-0 z-10 h-full" viewBox="0 0 141 147" fill="none">
                        <path
                            d="M13.925 175.84C-12.8854 158.557 1.60565 89.8869 38.2577 80.2024C62.5825 73.7751 73.6249 53.9497 77.4502 40.1632C77.7457 38.7662 78.0675 37.4094 78.414 36.0919C88.4894 -2.21708 119.517 -7.34421 136.556 -4.78324C138.394 -4.50691 140.084 -3.59046 141.476 -2.30546L179.324 32.6215C181.444 34.5779 182.688 37.2958 182.75 40.1084L184.834 135.099C184.921 139.07 182.651 142.594 179.049 144.079L96.0548 178.289C77.615 183.234 35.3733 189.666 13.925 175.84Z"
                            fill="#47A992" />
                    </svg>
                    <svg class="absolute -right-5 bottom-0 -z-10 h-full" viewBox="0 0 160 147" fill="none">
                        <path
                            d="M14.1555 159.143C-12.6549 141.86 1.83612 73.1895 38.4881 63.505C62.813 57.0777 73.8553 37.2523 77.6807 23.4658C77.9762 22.0688 78.2979 20.712 78.6444 19.3945C88.7199 -18.9145 119.748 -24.0416 136.786 -21.4806C138.625 -21.2043 140.314 -20.2878 141.707 -19.0028L179.555 15.9241C181.675 17.8805 182.918 20.5984 182.98 23.411L185.064 118.402C185.152 122.373 182.881 125.897 179.28 127.381L96.2852 161.592C77.8455 166.536 35.6038 172.969 14.1555 159.143Z"
                            fill="#47A992" fill-opacity="0.15" />
                    </svg>
                </div>
                <div
                    class="z-10 overflow-hidden rounded-2xl bg-primary-color p-4 text-white drop-shadow-lg duration-500 ease-in-out hover:scale-110">
                    <div class="text-[0.9rem]">
                        <h2 class="font-semibold">Created Users</h2>
                        <h3 class="text-[1.3rem] font-bold">{{ $userCount }}</h3>
                    </div>
                    <svg class="absolute -right-5 bottom-0 z-10 h-full" viewBox="0 0 118 147" fill="none">
                        <path
                            d="M102.182 163.923C77.0547 175.339 28.2997 129.714 36.0324 97.2598C41.1644 75.721 29.9838 57.3921 20.5823 47.5435C19.5907 46.6147 18.6424 45.6867 17.7359 44.7598C-8.29828 18.141 0.162006 -7.47362 9.27599 -19.1949C10.4699 -20.7303 12.2101 -21.7125 14.0987 -22.1769L57.3949 -32.823C59.9704 -33.4562 62.6919 -33.0405 64.9608 -31.6672L141.673 14.7649C144.961 16.7554 146.818 20.4548 146.448 24.281L138.806 103.414C134.974 119.779 122.283 154.791 102.182 163.923Z"
                            fill="#E57C23" />
                    </svg>
                    <svg class="absolute -right-5 bottom-0 -z-10 h-full" viewBox="0 0 136 147" fill="none">
                        <path
                            d="M102.182 169.59C77.0547 181.006 28.2997 135.381 36.0324 102.927C41.1644 81.3877 29.9838 63.0589 20.5823 53.2102C19.5907 52.2815 18.6424 51.3534 17.7359 50.4265C-8.29828 23.8077 0.162006 -1.80688 9.27599 -13.5282C10.4699 -15.0636 12.2101 -16.0458 14.0987 -16.5102L57.3949 -27.1562C59.9704 -27.7895 62.6919 -27.3737 64.9608 -26.0004L141.673 20.4317C144.961 22.4222 146.818 26.1215 146.448 29.9478L138.806 109.081C134.974 125.445 122.283 160.457 102.182 169.59Z"
                            fill="#E57C23" fill-opacity="0.15" />
                    </svg>
                </div>
            </div>
            <div class="col-span-10 flex flex-col gap-4 md:col-span-5 lg:col-span-2">
                <div
                    class="z-10 overflow-hidden rounded-2xl bg-primary-color p-4 text-white drop-shadow-lg duration-500 ease-in-out hover:scale-110">
                    <div class="text-[0.9rem]">
                        <h2 class="font-semibold">Admin</h2>
                        <h3 class="text-[1.3rem] font-bold">{{ $adminUserCount }}</h3>
                    </div>
                    <svg class="absolute -bottom-2 -right-5 z-10 h-full" viewBox="0 0 195 147" fill="none">
                        <path
                            d="M1.36402 150.49C-7.74066 124.285 32.7814 73.5936 64.5507 84.3322C85.635 91.4591 138.553 80.496 149.231 53.068C202.737 -84.3773 261.143 8.33517 281.382 40.7967C284.542 45.8646 283.279 53.1491 278.4 56.5936L217.59 99.5259C216.718 100.142 215.95 100.894 215.315 101.752L159.749 176.956C157.713 179.711 154.409 181.232 150.992 180.987L84.1029 176.202C83.2683 176.142 82.4662 175.977 81.6612 175.749C64.1435 170.784 8.47844 170.967 1.36402 150.49Z"
                            fill="#19A7CE" />
                    </svg>
                    </svg>
                    <svg class="absolute -bottom-1 -right-3 -z-10 h-full" viewBox="0 0 195 147" fill="none">
                        <path
                            d="M1.36402 139.645C-7.74066 113.44 32.7814 62.7485 64.5507 73.4871C85.635 80.6141 138.553 69.6509 149.231 42.2229C202.737 -95.2224 261.143 -2.50992 281.382 29.9516C284.542 35.0195 283.279 42.304 278.4 45.7485L217.59 88.6808C216.718 89.2968 215.95 90.0485 215.315 90.9074L159.749 166.11C157.713 168.865 154.409 170.387 150.992 170.142L84.1029 165.357C83.2683 165.297 82.4662 165.132 81.6612 164.904C64.1435 159.939 8.47844 160.121 1.36402 139.645Z"
                            fill="#19A7CE" fill-opacity="0.15" />
                    </svg>
                </div>
                <div
                    class="z-10 overflow-hidden rounded-2xl bg-primary-color p-4 text-white drop-shadow-lg duration-500 ease-in-out hover:scale-110">
                    <div class="text-[0.9rem]">
                        <h2 class="font-semibold">Verified account</h2>
                        <h3 class="text-[1.3rem] font-bold">{{ $verifiedAccountCount }}</h3>
                    </div>
                    <svg class="absolute -bottom-0 -right-3 z-10 h-full" viewBox="0 0 145 145" fill="none">
                        <path
                            d="M22.8461 162.42C5.06869 142.972 -31.4257 36.9124 63.8643 82.6932C82.8354 91.8076 135.623 103.478 109.79 50.8078C109.573 50.3643 109.358 49.8397 109.207 49.3694C81.8956 -35.5305 144.183 13.1478 161.764 23.7104C163.431 24.712 164.889 26.0091 165.914 27.6619L188.181 63.5602C189.579 65.814 190.025 68.5308 189.42 71.113L169.995 154.003C169.118 157.746 166.173 160.654 162.42 161.485L88.5913 177.827C72.602 179.174 37.068 177.978 22.8461 162.42Z"
                            fill="#B799FF" />
                    </svg>
                    <svg class="absolute -bottom-0 -right-2 -z-10 h-full" viewBox="0 0 160 147" fill="none">
                        <path
                            d="M22.5209 150.002C4.7435 130.554 -31.7509 24.4939 63.5391 70.2747C82.5102 79.3891 135.298 91.0592 109.465 38.3893C109.248 37.9459 109.033 37.4212 108.881 36.951C81.5704 -47.949 143.857 0.729353 161.438 11.2919C163.106 12.2936 164.563 13.5907 165.589 15.2434L187.856 51.1418C189.254 53.3956 189.7 56.1124 189.094 58.6946L169.67 141.585C168.793 145.327 165.848 148.236 162.095 149.067L88.2661 165.408C72.2768 166.755 36.7428 165.56 22.5209 150.002Z"
                            fill="#B799FF" fill-opacity="0.15" />
                    </svg>
                </div>
            </div>
            <!-- 2nd div  -->
            <div class="col-span-10 rounded-lg bg-white px-4 py-2 text-gray-600 drop-shadow-lg lg:col-span-6">
                <div class="flex justify-between">
                    <h2 class="text-[1.1rem] font-semibold">New created accounts</h2>
                    <div class="flex gap-2">
                        <div class="flex items-center gap-1">
                            <div class="h-3 w-3 rounded bg-blue-700"></div>
                            <span class="text-sm">Verified</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <div class="h-3 w-3 rounded bg-orange-500"></div>
                            <span class="text-sm">Unverified</span>
                        </div>
                    </div>
                </div>
                <section class="-z-10 overflow-x-auto whitespace-nowrap">
                    <table class="w-full">
                        <tbody wire:poll.5000ms="loadDashboard">
                            @foreach ($latestAccounts as $latestAccountsItem)
                                <tr class="">
                                    <td>
                                        @if (empty($latestAccountsItem->first_name) && empty($latestAccountsItem->last_name))
                                            <i class="text-red-600">Unfinish</i>
                                        @else
                                            {{ $latestAccountsItem->first_name }} {{ $latestAccountsItem->last_name }}
                                        @endif

                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($latestAccountsItem->created_at)->format('M d, Y') }}
                                    </td>
                                    <td>
                                        @if (empty($latestAccountsItem->student_id))
                                            <i class="text-red-600">Unfinish</i>
                                        @else
                                            {{ $latestAccountsItem->student_id }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($latestAccountsItem->is_verified == 1)
                                            <div class="h-4 w-4 rounded bg-blue-500"></div>
                                        @else
                                            <div class="h-4 w-4 rounded bg-orange-500"></div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </section>
            </div>
            <div class="col-span-10 rounded-lg bg-white p-4 text-gray-600 drop-shadow-lg lg:col-span-8">
                <a wire:navigate href="{{ route('admin-docu-post-panel') }}"
                    class="font-medium duration-100 ease-in-out hover:font-bold hover:text-primary-color">New uploaded
                    files</a>
                <section class="">

                    <table class="w-full">
                        <tbody wire:poll.5000ms="loadDashboard">
                            @foreach ($latestDocuPostData as $latestDocuPostDataItem)
                                <tr class="">
                                    <td class="whitespace-normal px-6 py-2">
                                        <a wire:navigate
                                            href="{{ route('admin-view-document', ['reference' => $latestDocuPostDataItem->reference]) }}">
                                            {{ $latestDocuPostDataItem->title }}
                                        </a>
                                    </td>
                                    <td class="whitespace-normal px-6 py-2">
                                        @if ($latestDocuPostDataItem->status == 0)
                                            <div
                                                class="flex w-fit flex-row-reverse items-center justify-center rounded-md bg-yellow-500 p-2 text-white">
                                                <svg class="h-4" viewBox="0 0 20 20" fill="none">
                                                    <path
                                                        d="M10 0C7.34784 0 4.8043 1.05357 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 15.5221 4.47692 20 10 20C15.5221 20 20 15.5221 20 10C20 4.47692 15.5221 0 10 0ZM14.6154 11.5385H10C9.79599 11.5385 9.60033 11.4574 9.45607 11.3132C9.31181 11.1689 9.23077 10.9732 9.23077 10.7692V3.84615C9.23077 3.64214 9.31181 3.44648 9.45607 3.30223C9.60033 3.15797 9.79599 3.07692 10 3.07692C10.204 3.07692 10.3997 3.15797 10.5439 3.30223C10.6882 3.44648 10.7692 3.64214 10.7692 3.84615V10H14.6154C14.8194 10 15.0151 10.081 15.1593 10.2253C15.3036 10.3696 15.3846 10.5652 15.3846 10.7692C15.3846 10.9732 15.3036 11.1689 15.1593 11.3132C15.0151 11.4574 14.8194 11.5385 14.6154 11.5385Z"
                                                        fill="#FFFBFB" />
                                                </svg>
                                            </div>
                                        @elseif($latestDocuPostDataItem->status == 1)
                                            <div
                                                class="flex w-fit flex-row-reverse items-center justify-center rounded-md bg-green-700 p-2 text-white">
                                                <svg class="h-4" viewBox="0 0 21 21" fill="none">
                                                    <path
                                                        d="M20.0827 10.5003C20.0827 13.042 19.073 15.4795 17.2758 17.2768C15.4786 19.074 13.041 20.0837 10.4993 20.0837C7.95769 20.0837 5.52013 19.074 3.72291 17.2768C1.92569 15.4795 0.916016 13.042 0.916016 10.5003C0.916016 7.95867 1.92569 5.52111 3.72291 3.72389C5.52013 1.92666 7.95769 0.916992 10.4993 0.916992C13.041 0.916992 15.4786 1.92666 17.2758 3.72389C19.073 5.52111 20.0827 7.95867 20.0827 10.5003ZM15.3274 6.87112C15.2419 6.78576 15.1401 6.71853 15.028 6.67346C14.9159 6.62839 14.7958 6.6064 14.6751 6.60882C14.5543 6.61123 14.4352 6.638 14.325 6.68752C14.2148 6.73703 14.1157 6.80828 14.0337 6.89699L9.8726 12.1975L7.3656 9.68958C7.19645 9.52489 6.96926 9.43343 6.73319 9.43501C6.49711 9.43659 6.27116 9.53106 6.10423 9.698C5.9373 9.86493 5.84282 10.0909 5.84124 10.327C5.83967 10.563 5.93112 10.7902 6.09581 10.9594L9.26597 14.1305C9.35151 14.2154 9.45323 14.2822 9.56509 14.327C9.67696 14.3719 9.79668 14.3938 9.91716 14.3914C10.0376 14.3891 10.1564 14.3626 10.2665 14.3135C10.3765 14.2644 10.4756 14.1937 10.5578 14.1056L15.3399 8.12845C15.503 7.95892 15.5932 7.73221 15.591 7.49696C15.5889 7.26171 15.4946 7.03667 15.3284 6.87016H15.3265L15.3274 6.87112Z"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                        @elseif($latestDocuPostDataItem->status == 2)
                                            <div
                                                class="flex w-fit flex-row-reverse items-center justify-center rounded-md bg-red-700 p-2 text-white">
                                                <svg class="h-4" viewBox="0 0 21 21" fill="none">
                                                    <path
                                                        d="M20.0827 10.5003C20.0827 13.042 19.073 15.4795 17.2758 17.2768C15.4786 19.074 13.041 20.0837 10.4993 20.0837C7.95769 20.0837 5.52013 19.074 3.72291 17.2768C1.92569 15.4795 0.916016 13.042 0.916016 10.5003C0.916016 7.95867 1.92569 5.52111 3.72291 3.72389C5.52013 1.92666 7.95769 0.916992 10.4993 0.916992C13.041 0.916992 15.4786 1.92666 17.2758 3.72389C19.073 5.52111 20.0827 7.95867 20.0827 10.5003ZM15.3274 6.87112C15.2419 6.78576 15.1401 6.71853 15.028 6.67346C14.9159 6.62839 14.7958 6.6064 14.6751 6.60882C14.5543 6.61123 14.4352 6.638 14.325 6.68752C14.2148 6.73703 14.1157 6.80828 14.0337 6.89699L9.8726 12.1975L7.3656 9.68958C7.19645 9.52489 6.96926 9.43343 6.73319 9.43501C6.49711 9.43659 6.27116 9.53106 6.10423 9.698C5.9373 9.86493 5.84282 10.0909 5.84124 10.327C5.83967 10.563 5.93112 10.7902 6.09581 10.9594L9.26597 14.1305C9.35151 14.2154 9.45323 14.2822 9.56509 14.327C9.67696 14.3719 9.79668 14.3938 9.91716 14.3914C10.0376 14.3891 10.1564 14.3626 10.2665 14.3135C10.3765 14.2644 10.4756 14.1937 10.5578 14.1056L15.3399 8.12845C15.503 7.95892 15.5932 7.73221 15.591 7.49696C15.5889 7.26171 15.4946 7.03667 15.3284 6.87016H15.3265L15.3274 6.87112Z"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="ml-8 whitespace-normal px-6 py-2">
                                        <span>Approved</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>


            <div class="col-span-10 rounded-lg bg-white p-4 drop-shadow-lg lg:col-span-2">
                <h2>Hello</h2>
            </div>
        </div>

    </section>
</div>
