 <div class="container">
     <x-session_flash />
     <div class= "mx-4 text-gray-800 md:mx-8 lg:mx-10">
         <h1 class="text-lg font-bold text-gray-800 md:md:text-xl">Settings</h1>
         <span class="font-medium">Manage account details and customize website preferences </span>



         @include('livewire.partials.editProfilePartials.upload-profile')
         <div x-data="{ openTab: 'profile' }"
             class="mt-2 flex h-fit min-h-[36rem] flex-col rounded-xl bg-white drop-shadow-xl md:h-[30rem] lg:h-[36rem] lg:flex-row">
             <!-- Sidebar -->
             <div class="flex w-full capitalize lg:w-1/5 lg:border-r lg:border-slate-200">
                 <ul
                     class="custom-scrollbar flex flex-row items-center gap-2 overflow-x-auto px-4 py-2 lg:flex-col lg:items-start lg:justify-start lg:gap-1 lg:p-4">
                     <small class="hidden font-medium uppercase text-gray-500 lg:block">account</small>
                     <li>
                         <a @click="openTab = 'profile'" :class="{ 'bg-gray-100 font-bold': openTab === 'profile' }"
                             class="flex cursor-pointer items-center gap-2 whitespace-nowrap rounded-xl px-3 py-2 duration-300 ease-in-out hover:bg-gray-100">
                             <div class="rounded-md bg-blue-200 p-1 text-blue-900">
                                 <svg class="h-4" fill="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                     <path d="M12 3.75a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5Z"></path>
                                     <path
                                         d="M8 13.25A3.75 3.75 0 0 0 4.25 17v1.188c0 .754.546 1.396 1.29 1.517 4.278.699 8.642.699 12.92 0a1.537 1.537 0 0 0 1.29-1.517V17A3.75 3.75 0 0 0 16 13.25h-.34c-.185 0-.369.03-.544.086l-.866.283a7.251 7.251 0 0 1-4.5 0l-.866-.283a1.752 1.752 0 0 0-.543-.086H8Z">
                                     </path>
                                 </svg>
                             </div>
                             profile
                         </a>
                     </li>
                     <li>
                         <a @click="openTab = 'password'" :class="{ 'bg-gray-100 font-bold': openTab === 'password' }"
                             class="flex cursor-pointer items-center gap-2 whitespace-nowrap rounded-xl px-3 py-2 duration-300 ease-in-out hover:bg-gray-100">
                             <div class="rounded-md bg-orange-200 p-1 text-orange-900">
                                 <svg class="h-4" fill="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                     <path fill-rule="evenodd"
                                         d="M1.25 12a5.75 5.75 0 0 1 10.8-2.75H21c.966 0 1.75.784 1.75 1.75v2.5a.75.75 0 0 1-.75.75h-2.25V16a.75.75 0 0 1-.75.75h-2.5a.75.75 0 0 1-.75-.75v-1.75h-3.457A5.751 5.751 0 0 1 1.25 12ZM7 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"
                                         clip-rule="evenodd"></path>
                                 </svg>
                             </div>
                             password
                         </a>
                     </li>
                     <div class="lg:mt-2">
                         <small class="hidden font-medium uppercase text-gray-500 lg:block">System setting</small>
                         <li>
                             <a @click="openTab = 'general'"
                                 :class="{ 'bg-gray-100 font-bold': openTab === 'general' }"
                                 class="flex cursor-pointer items-center gap-2 whitespace-nowrap rounded-xl px-3 py-2 duration-300 ease-in-out hover:bg-gray-100">
                                 <div class="rounded-md bg-gray-200 p-1 text-gray-900">
                                     <svg class="h-4" fill="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                         <path d="M8.75 12a3.25 3.25 0 1 1 6.5 0 3.25 3.25 0 0 1-6.5 0Z"></path>
                                         <path fill-rule="evenodd"
                                             d="M11.46 1.838a.75.75 0 0 1 1.08 0L15.111 4.5h3.638a.75.75 0 0 1 .75.75v3.638l2.662 2.573a.75.75 0 0 1 0 1.078L19.5 15.111v3.639a.75.75 0 0 1-.75.75h-3.638l-2.573 2.661a.75.75 0 0 1-1.078 0L8.889 19.5H5.25a.75.75 0 0 1-.75-.75v-3.64l-2.66-2.57a.75.75 0 0 1 0-1.078L4.5 8.888V5.25a.75.75 0 0 1 .75-.75h3.64l2.572-2.662ZM12 7.25a4.75 4.75 0 1 0 0 9.5 4.75 4.75 0 0 0 0-9.5Z"
                                             clip-rule="evenodd"></path>
                                     </svg>
                                 </div>
                                 general
                             </a>
                         </li>
                     </div>
                     <li>
                         <a @click="openTab = 'documentType'"
                             :class="{ 'bg-gray-100 font-bold': openTab === 'documentType' }"
                             class="flex cursor-pointer items-center gap-2 whitespace-nowrap rounded-xl px-3 py-2 duration-300 ease-in-out hover:bg-gray-100">
                             <div class="rounded-md bg-sky-200 p-1 text-sky-900">
                                 <svg class="h-4" fill="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                     <path
                                         d="M7 2h6.616c.332 0 .65.132.884.366L19.134 7c.234.234.366.552.366.884v5.366h-15V4.5A2.5 2.5 0 0 1 7 2Zm6.875 1.875v2.5a1.25 1.25 0 0 0 1.25 1.25h2.5l-3.75-3.75ZM4.5 17h15v2.5A2.5 2.5 0 0 1 17 22H7a2.5 2.5 0 0 1-2.5-2.5V17Zm-1.875-2.5a.625.625 0 1 0 0 1.25h18.75a.624.624 0 1 0 0-1.25H2.625Z">
                                     </path>
                                 </svg>
                             </div>
                             document type
                         </a>
                     </li>
                     <li>
                         <a @click="openTab = 'watermarkConfig'"
                             :class="{ 'bg-gray-100 font-bold': openTab === 'watermarkConfig' }"
                             class="flex cursor-pointer items-center gap-2 whitespace-nowrap rounded-xl px-3 py-2 duration-300 ease-in-out hover:bg-gray-100">
                             <div class="rounded-md bg-sky-200 p-1 text-sky-900">
                                 <svg class="h-4" fill="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                     <path fill-rule="evenodd"
                                         d="M11.052 3.36c.576-.606.948-.96.948-.96.13.436.28.85.445 1.246.974 2.335 2.488 4.02 3.836 5.52 1.572 1.75 2.919 3.248 2.919 5.234a7.2 7.2 0 0 1-14.4 0c0-3.998 4.296-8.98 6.252-11.04Zm.495 1.226a37.473 37.473 0 0 0-2.194 2.602C8.48 8.328 7.629 9.598 7 10.872c-.635 1.288-1 2.494-1 3.528 0 0 3 1.8 6 .6 3-1.2 6-.6 6-.6 0-1.44-.955-2.588-2.617-4.44l-.036-.038c-1.247-1.39-2.747-3.056-3.8-5.336Z"
                                         clip-rule="evenodd"></path>
                                     <path fill-rule="evenodd"
                                         d="M7.863 11.732c.984-1.97 2.06-3.304 2.512-3.756l.85.85c-.348.347-1.354 1.572-2.289 3.443l-1.073-.537Z"
                                         clip-rule="evenodd"></path>
                                 </svg>
                             </div>
                             watermark Config
                         </a>
                     </li>
                     <li>
                         <a @click="openTab = 'filterWords'"
                             :class="{ 'bg-gray-100 font-bold': openTab === 'filterWords' }"
                             class="flex cursor-pointer items-center gap-2 whitespace-nowrap rounded-xl px-3 py-2 duration-300 ease-in-out hover:bg-gray-100">
                             <div class="rounded-md bg-sky-200 p-1 text-sky-900">
                                 <svg class="h-4" fill="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                     <path fill-rule="evenodd"
                                         d="M11.052 3.36c.576-.606.948-.96.948-.96.13.436.28.85.445 1.246.974 2.335 2.488 4.02 3.836 5.52 1.572 1.75 2.919 3.248 2.919 5.234a7.2 7.2 0 0 1-14.4 0c0-3.998 4.296-8.98 6.252-11.04Zm.495 1.226a37.473 37.473 0 0 0-2.194 2.602C8.48 8.328 7.629 9.598 7 10.872c-.635 1.288-1 2.494-1 3.528 0 0 3 1.8 6 .6 3-1.2 6-.6 6-.6 0-1.44-.955-2.588-2.617-4.44l-.036-.038c-1.247-1.39-2.747-3.056-3.8-5.336Z"
                                         clip-rule="evenodd"></path>
                                     <path fill-rule="evenodd"
                                         d="M7.863 11.732c.984-1.97 2.06-3.304 2.512-3.756l.85.85c-.348.347-1.354 1.572-2.289 3.443l-1.073-.537Z"
                                         clip-rule="evenodd"></path>
                                 </svg>
                             </div>
                             Filter words
                         </a>
                     </li>
                 </ul>
             </div>

             <!-- Content Area -->
             <div class="custom-scrollbar my-2 flex-1 overflow-auto px-4 lg:px-6 lg:py-2">
                 <div x-show="openTab === 'profile'" class="text-primary-color">
                     <!-- profile Settings Content -->
                     <h2 class="mb-4 text-2xl font-bold capitalize">profile Settings</h2>
                     @include('livewire\admin\components\setting-partials\edit-admin-profile-partials')
                 </div>
                 <div x-show="openTab === 'password'" class="text-primary-color">
                     <!-- password Settings Content -->
                     <h2 class="mb-4 text-2xl font-bold capitalize">password Settings</h2>
                     <p>Your password settings content goes here.</p>
                 </div>

                 <div x-show="openTab === 'general'" class="text-primary-color">
                     <!-- general Settings Content -->
                     <h2 class="mb-4 text-2xl font-bold capitalize">general Settings</h2>
                     <p>Your general settings content goes here.</p>
                 </div>

                 <div x-show="openTab === 'documentType'" class="text-primary-color">
                     <!-- documentType Settings Content -->
                     <h2 class="mb-4 text-2xl font-bold capitalize">documentType Settings</h2>
                     @include('livewire\admin\components\setting-partials\documentTypes-partials')
                 </div>
                 <div x-show="openTab === 'watermarkConfig'" class="text-primary-color">
                     <!-- watermarkConfig Settings Content -->
                     <h2 class="mb-4 text-2xl font-bold capitalize">watermarkConfig Settings</h2>
                     @include('livewire\admin\components\setting-partials\watermark-partials')
                 </div>
                 <div x-show="openTab === 'filterWords'" class="text-primary-color">
                     <!-- filterWords Settings Content -->
                     <h2 class="mb-4 text-2xl font-semibold capitalize">filterWords Settings</h2>
                 </div>
             </div>
         </div>



     </div>

 </div>
