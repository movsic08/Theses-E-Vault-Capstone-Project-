<x-app-layout>

    @section('title', 'Help Center')
    <div class="lg:container">
        <div class="container">
            <div class="lg:px-20">
                <div class="mb-5 rounded-xl bg-white pb-4 shadow-md md:px-4">
                    <div class="container">
                        <div class="relative rounded-b-xl bg-gradient-to-t from-blue-400 via-blue-500 to-blue-600 p-4">
                            <div class="relative flex w-full items-center justify-center">
                                <a href="{{ route('help-and-support') }}" wire:navigate
                                    class="absolute left-0 top-0 flex w-fit items-center rounded-lg pr-3 text-white duration-200 ease-in-out hover:text-primary-color">
                                    <svg class="h-7" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M14.03 7.47a.75.75 0 0 1 0 1.06L10.56 12l3.47 3.47a.75.75 0 1 1-1.06 1.06l-4-4a.75.75 0 0 1 0-1.06l4-4a.75.75 0 0 1 1.06 0Z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Back
                                    page</a>
                                <img class="h-[15rem]" src="{{ asset('assets\svgs\account-help-ico.svg') }}"
                                    alt=" svg ico ">
                            </div>
                            <div class="flex w-full items-center justify-between">
                                <strong class="text-base text-white lg:text-3xl">Account management</strong>
                                <button
                                    class="flex items-center gap-1 whitespace-nowrap rounded-lg bg-white px-2 py-1 text-xs text-blue-500 md:px-3 md:py-2 md:text-base">Copy
                                    link
                                    <svg class="h-6" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.25 9A5.75 5.75 0 0 1 9 3.25h7.013a.75.75 0 0 1 0 1.5H9A4.25 4.25 0 0 0 4.75 9v7.107a.75.75 0 0 1-1.5 0V9Z">
                                        </path>
                                        <path
                                            d="M18.403 6.793a44.372 44.372 0 0 0-9.806 0 2.011 2.011 0 0 0-1.774 1.76 42.581 42.581 0 0 0 0 9.893 2.01 2.01 0 0 0 1.774 1.76c3.241.363 6.565.363 9.806 0a2.01 2.01 0 0 0 1.774-1.76 42.579 42.579 0 0 0 0-9.893 2.011 2.011 0 0 0-1.774-1.76Z">
                                        </path>
                                    </svg></button>
                            </div>
                        </div>
                        <div class="px-1 lg:container lg:px-0">
                            <div class="mt-2 font-medium text-gray-800">
                                <p>Manage and learn about name changes and more. Explore essential tips and instructions
                                    for managing
                                    your account on the Theses Kiosk website.</p>
                                <div class="mb-6 mt-4">

                                    <div x-data="{ tab1: true, tab2: true, tab3: true, tab4: true, tab5: true }">
                                        <!-- Accordion Item 1 -->
                                        <div class="mb-4">
                                            <button @click="tab1 = !tab1"
                                                class="flex w-full items-center justify-between rounded-t-lg bg-blue-100 px-4 py-2 text-left font-bold text-primary-color">
                                                How to change my password account?
                                                <span x-show="tab1">
                                                    <svg class="h-9" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.53 14.03a.75.75 0 0 1-1.06 0L12 10.56l-3.47 3.47a.75.75 0 0 1-1.06-1.06l4-4a.75.75 0 0 1 1.06 0l4 4a.75.75 0 0 1 0 1.06Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                                <span x-show="!tab1">
                                                    <svg class="h-9" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.53 8.97a.75.75 0 0 1 0 1.06l-4 4a.75.75 0 0 1-1.06 0l-4-4a.75.75 0 1 1 1.06-1.06L12 12.44l3.47-3.47a.75.75 0 0 1 1.06 0Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                            <div x-show="tab1" class="bg-white p-4 text-gray-800">
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>On the mobile version, toggle the menu
                                                        burger in the top
                                                        right
                                                        corner and click on “User”. On tablets and larger screens,
                                                        click
                                                        the user icon in the left corner.</span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>Click the “Edit Profile” button. Now, click on the
                                                        “Security” tab. You can <a
                                                            href="{{ route('edit-profile', ['activeTab' => 'tab2']) }}"
                                                            wire:navigate class="text-blue-600">click here</a>
                                                        for
                                                        faster way.</span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>- In the Security tab, you can change your password by
                                                        entering your current password and your desired password.</span>
                                                    </ul>
                                                </div>
                                                <div class="mt-2 rounded-lg bg-blue-50 px-3 py-2">
                                                    <strong>Reminder</strong>, please always remember your new password.
                                                    When you create a new password, remember:
                                                    <p class="mt-1">- Your password should be easy for you to remember
                                                        but difficult
                                                        for
                                                        others to guess.
                                                    </p>
                                                    <p class="mt-1">- Your Facebook password should be different to
                                                        the passwords you
                                                        use
                                                        to log in to other accounts, such as your email or bank account.
                                                    </p>
                                                    <p class="mt-1">- Longer passwords are usually more secure.
                                                    </p>
                                                    <p class="mt-1">- Your password should not be your email address,
                                                        phone number or
                                                        date
                                                        of birth.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Accordion Item 2 -->
                                        <div class="mb-4">
                                            <button @click="tab2 = !tab2"
                                                class="flex w-full items-center justify-between rounded-t-lg bg-blue-100 px-4 py-2 text-left font-bold text-primary-color">
                                                2. How to delete my account?
                                                <span x-show="tab2">
                                                    <svg class="h-9" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.53 14.03a.75.75 0 0 1-1.06 0L12 10.56l-3.47 3.47a.75.75 0 0 1-1.06-1.06l4-4a.75.75 0 0 1 1.06 0l4 4a.75.75 0 0 1 0 1.06Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                                <span x-show="!tab2">
                                                    <svg class="h-9" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.53 8.97a.75.75 0 0 1 0 1.06l-4 4a.75.75 0 0 1-1.06 0l-4-4a.75.75 0 1 1 1.06-1.06L12 12.44l3.47-3.47a.75.75 0 0 1 1.06 0Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                            <div x-show="tab2" class="bg-white p-4 text-gray-800">
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>In the mobile version, toggle the menu burger in the top right
                                                        corner and click on “User.” On tablets and larger screens, click
                                                        the user icon in the left corner.</span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span> Click the “Edit Profile” button.Now, click on the “Security”
                                                        tab. You
                                                        can <a
                                                            href="{{ route('edit-profile', ['activeTab' => 'tab2']) }}"
                                                            wire:navigate class="text-blue-600">click here</a>
                                                        for
                                                        faster way.</span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>Click the “Delete Account” button , and it will prompt you for
                                                        confirmation. Once you complete the required input, the “Yes,
                                                        delete it” button will be enabled.</span>
                                                    </ul>
                                                </div>
                                                <div class="mt-2 rounded-lg bg-blue-50 px-3 py-2">
                                                    <strong>Reminder</strong>, Deleting your account will permanently
                                                    remove all the information associated with your account, except the
                                                    approved uploaded documents.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Accordion Item 3 -->
                                        <div class="mb-4">
                                            <button @click="tab3 = !tab3"
                                                class="flex w-full items-center justify-between rounded-t-lg bg-blue-100 px-4 py-2 text-left font-bold text-primary-color">
                                                How to verify my account ?
                                                <span x-show="tab3">
                                                    <svg class="h-9" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.53 14.03a.75.75 0 0 1-1.06 0L12 10.56l-3.47 3.47a.75.75 0 0 1-1.06-1.06l4-4a.75.75 0 0 1 1.06 0l4 4a.75.75 0 0 1 0 1.06Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                                <span x-show="!tab3">
                                                    <svg class="h-9" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.53 8.97a.75.75 0 0 1 0 1.06l-4 4a.75.75 0 0 1-1.06 0l-4-4a.75.75 0 1 1 1.06-1.06L12 12.44l3.47-3.47a.75.75 0 0 1 1.06 0Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                            <div x-show="tab3" class="bg-white p-4 text-gray-800">
                                                <!-- Content for Section 1 -->
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>To verify your account, you can directly click the link in the
                                                        notification tab, or manually navigate to account verification
                                                        by clicking the user icon. The user icon menu can be found in
                                                        the right top corner in mobile versions, while in tablets to
                                                        computers, you can click the user icon in the left side
                                                        corner.</span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>Click on the “Links” tab, where you will find the option to
                                                        verify your account. If you encounter an error and can’t enter
                                                        your email, please ensure that you have already filled out your
                                                        basic information to enable account verification.</span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>For account verification, use your institutional email
                                                        account. An OTP will be send to your email to verify your
                                                        account and identity.</span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>After entering your email and clicking verify, it will prompt
                                                        you to enter the OTP sent to your email. </span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>If the OTP matches the email we sent to you and your input, a
                                                        verification success message will be displayed. </span>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Accordion Item 4 -->
                                        <div class="mb-4">
                                            <button @click="tab4 = !tab4"
                                                class="flex w-full items-center justify-between rounded-t-lg bg-blue-100 px-4 py-2 text-left font-bold text-primary-color">
                                                Error in saving my Student ID.
                                                <span x-show="tab4">
                                                    <svg class="h-9" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.53 14.03a.75.75 0 0 1-1.06 0L12 10.56l-3.47 3.47a.75.75 0 0 1-1.06-1.06l4-4a.75.75 0 0 1 1.06 0l4 4a.75.75 0 0 1 0 1.06Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                                <span x-show="!tab4">
                                                    <svg class="h-9" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.53 8.97a.75.75 0 0 1 0 1.06l-4 4a.75.75 0 0 1-1.06 0l-4-4a.75.75 0 1 1 1.06-1.06L12 12.44l3.47-3.47a.75.75 0 0 1 1.06 0Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                            <div x-show="tab4" class="bg-white p-4 text-gray-800">
                                                <!-- Content for Section 1 -->
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>On the mobile version toggle the menu burger in the right top
                                                        corner and click on “User”. On Tablets and larger screens ,
                                                        click the user icon in the left side corner.</span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>Click the “Edit Profile” button, and it will navigate you to
                                                        Edit profile page. In General tab you can add or edit your
                                                        Student ID.</span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>f you attempt to enter your Student ID and you receive the
                                                        error message <span
                                                            class="rounded-lg bg-red-100 px-2 py-1 text-red-500"> “This
                                                            student ID has
                                                            already been taken, if you think this is mistaken contact
                                                            admin.”</span> It indicates that the student ID is already
                                                        registered. If you think someone is using your student ID.
                                                        Please contact the Administrator. You can also reach out to the
                                                        Librarian. To verify your student ID, you will need to provide
                                                        your School ID. </span>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Accordion Item 5 -->
                                        <div class="mb-4">
                                            <button @click="tab5 = !tab5"
                                                class="flex w-full items-center justify-between rounded-t-lg bg-blue-100 px-4 py-2 text-left font-bold text-primary-color">
                                                How to recover Forgotten password?
                                                <span x-show="tab5">
                                                    <svg class="h-9" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.53 14.03a.75.75 0 0 1-1.06 0L12 10.56l-3.47 3.47a.75.75 0 0 1-1.06-1.06l4-4a.75.75 0 0 1 1.06 0l4 4a.75.75 0 0 1 0 1.06Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                                <span x-show="!tab5">
                                                    <svg class="h-9" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.53 8.97a.75.75 0 0 1 0 1.06l-4 4a.75.75 0 0 1-1.06 0l-4-4a.75.75 0 1 1 1.06-1.06L12 12.44l3.47-3.47a.75.75 0 0 1 1.06 0Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                            <div x-show="tab5" class="bg-white p-4 text-gray-800">
                                                <!-- Content for Section 1 -->
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>- Go to login page and click on “Forgot password” or you can
                                                        directly navigate to forgot password page by <a
                                                            href="{{ route('forgot-pass') }}" wire:navigate
                                                            class="text-blue-600">clicking here</a>.</span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>On the “Forgot password” page, enter your registered email to
                                                        receive the OTP sent by us. If the entered email is not
                                                        registered, an error message will be sent. Otherwise, we will
                                                        send an OTP to your email address. </span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>Enter the OTP received in your email. If the OTP matches the
                                                        one sent to you, and your inputs are correct, you can now change
                                                        your password. </span>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
