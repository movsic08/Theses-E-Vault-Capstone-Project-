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
                                <img class="mt-1 h-[14rem]"
                                    src="{{ asset('assets\svgs\using-theses-kiosk-help-ico.svg') }}" alt=" svg ico ">
                            </div>
                            <div class="flex w-full items-center justify-between">
                                <strong class="text-base text-white lg:text-3xl">Using Theses Kiosk</strong>
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
                                <p>This resource provides invaluable tips and detailed
                                    instructions to enhance your proficiency when navigating theses kiosk
                                    website.</p>
                                <div class="mb-6 mt-4">

                                    <div x-data="{ tab1: true, tab2: true, tab3: true, tab4: true, tab5: true, tab6: true }">
                                        <!-- Accordion Item 1 -->
                                        <div class="mb-4">
                                            <button @click="tab1 = !tab1"
                                                class="flex w-full items-center justify-between rounded-t-lg bg-blue-100 px-4 py-2 text-left font-bold text-primary-color">
                                                I cant bookmark document
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
                                                    <span>In bookmarking the documents, ensure that you are have logged
                                                        into your account and your account is verified. </span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>If your account is not verified, please refer to the guide on
                                                        “How to verify my account”. <a
                                                            href="{{ route('account-help-center') }}"
                                                            class="text-blue-600" wire:navigate>Click here</a> to see
                                                        more about verifying
                                                        your account. </span>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Accordion Item 2 -->
                                        <div class="mb-4">
                                            <button @click="tab2 = !tab2"
                                                class="flex w-full items-center justify-between rounded-t-lg bg-blue-100 px-4 py-2 text-left font-bold text-primary-color">
                                                How can I contribute to Theses Kiosk
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
                                                    <span>In contributing to theses kiosk ensure that your account is
                                                        verified, if your account is not verified, please refer to the
                                                        guide “How to verify my account”. <a
                                                            href="{{ route('account-help-center') }}"
                                                            class="text-blue-600" wire:navigate>Click here</a> to see
                                                        more about verifying
                                                        your account.</span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>To access the form for sharing your research work, you can
                                                        click the upload button on the home page. Alternatively, you can
                                                        access the form in the document tab on user page or in edit
                                                        profile Files tab.</span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>You need to fill out all the required data in the form. After
                                                        filling out the form and uploading your PDF file, your document
                                                        will be pending, and admin will review your document. </span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>Once the admin reviewed your document, you will receive a
                                                        notification of confirmation of approval from admin. </span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>If the document is approved, your document can be available to
                                                        the community. </span>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Accordion Item 3 -->
                                        <div class="mb-4">
                                            <button @click="tab3 = !tab3"
                                                class="flex w-full items-center justify-between rounded-t-lg bg-blue-100 px-4 py-2 text-left font-bold text-primary-color">
                                                Why my upload document can’t be search?
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
                                                    <span>Please ensure the status of your document is approved. You can
                                                        check the status of your document by visiting this <a
                                                            href="{{ route('edit-profile', ['activeTab' => 'tab4']) }}"
                                                            class="text-blue-600" wire:navigate>link</a>. </span>
                                                    </ul>
                                                </div>
                                                <div class="mt-2 rounded-lg bg-blue-50 px-3 py-2">
                                                    <strong>Reminder: </strong> Only approved documents can be
                                                    accessible to the community.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Accordion Item 4 -->
                                        <div class="mb-4">
                                            <button @click="tab4 = !tab4"
                                                class="flex w-full items-center justify-between rounded-t-lg bg-blue-100 px-4 py-2 text-left font-bold text-primary-color">
                                                Why can’t I add comment?
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
                                                    <span>The comment section is accessible only to verified accounts.
                                                        If your account is not verified, please refer to the guide on
                                                        "How to Activate My Account."</span>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Accordion Item 5 -->
                                        <div class="mb-4">
                                            <button @click="tab5 = !tab5"
                                                class="flex w-full items-center justify-between rounded-t-lg bg-blue-100 px-4 py-2 text-left font-bold text-primary-color">
                                                Why can’t I generate key for viewing a PDF file?
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
                                                    <span>Please ensure that your account is verified, as only verified
                                                        students can generate a key and access the PDF files of
                                                        documents.</span>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Accordion Item 6 -->
                                        <div class="mb-4">
                                            <button @click="tab6 = !tab6"
                                                class="flex w-full items-center justify-between rounded-t-lg bg-blue-100 px-4 py-2 text-left font-bold text-primary-color">
                                                Why can’t I view the PDF file of document?
                                                <span x-show="tab6">
                                                    <svg class="h-9" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.53 14.03a.75.75 0 0 1-1.06 0L12 10.56l-3.47 3.47a.75.75 0 0 1-1.06-1.06l4-4a.75.75 0 0 1 1.06 0l4 4a.75.75 0 0 1 0 1.06Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                                <span x-show="!tab6">
                                                    <svg class="h-9" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.53 8.97a.75.75 0 0 1 0 1.06l-4 4a.75.75 0 0 1-1.06 0l-4-4a.75.75 0 1 1 1.06-1.06L12 12.44l3.47-3.47a.75.75 0 0 1 1.06 0Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                            <div x-show="tab6" class="bg-white p-4 text-gray-800">
                                                <!-- Content for Section 1 -->
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>In viewing a PDF file, you need to enter a key to unlock it.
                                                    </span>
                                                    </ul>
                                                </div>
                                                <div class="mt-1 flex">
                                                    <li class=>
                                                    </li>
                                                    <span>The key can be generated below the citation count. Please note
                                                        that only verified accounts can generate keys. If, your account
                                                        is not verified, please refer to the guide on “How to verify my
                                                        account”.</span>
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
