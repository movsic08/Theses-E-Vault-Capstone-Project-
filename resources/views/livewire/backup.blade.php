 <div class="container">
     <x-session_flash />
     <div class= "mx-4 text-gray-800 md:mx-8 lg:mx-10">
         <h1 class="text-lg font-bold md:md:text-xl">Settings</h1>
         <span>Manage account details and customize website preferences </span>
         {{-- <div class="mt-2 border-t border-gray-300 pt-2">
            
                 @include('livewire\admin\components\setting-partials\general-setting-partials')
                 
                
    
         </div> --}}

         <div x-data="{ tab: '{{ $tab }}' }"
             class="mt-2 flex h-fit max-h-[36rem] w-full flex-col rounded-xl bg-white p-2 drop-shadow-md md:h-[30rem] md:flex-row lg:h-[36rem]">
             <div
                 class="custom-scrollbar flex flex-row items-center gap-3 overflow-x-auto whitespace-nowrap border-r-2 border-gray-300 px-4 py-2 font-medium md:w-[20rem] md:flex-col md:items-start">
                 <small class="-mb-2 hidden uppercase text-gray-400 md:block">account</small>
                 <li wire:click="switchTab('profile')" :class="{ 'font-semibold bg-gray-100': tab === 'profile' }"
                     class="flex w-full cursor-pointer list-none items-center gap-2 rounded-xl px-3 py-1 text-gray-800 duration-300 ease-in-out hover:bg-gray-100">
                     <svg class="h-5" fill="none" stroke="currentColor" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                         <path d="M12 2a5 5 0 1 0 0 10 5 5 0 1 0 0-10z"></path>
                         <path
                             d="M17 14h.352a3 3 0 0 1 2.976 2.628l.391 3.124A2 2 0 0 1 18.734 22H5.266a2 2 0 0 1-1.985-2.248l.39-3.124A3 3 0 0 1 6.649 14H7">
                         </path>
                     </svg>Profile
                 </li>
                 <li wire:click="switchTab('password')" :class="{ 'font-semibold bg-gray-100': tab === 'password' }"
                     class="flex w-full cursor-pointer list-none items-center gap-2 rounded-xl px-3 py-1 text-gray-800 duration-300 ease-in-out hover:bg-gray-100">
                     <svg class="h-5" fill="none" stroke="currentColor" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                         <path d="m8 18 2-2h2l1.36-1.36a6.5 6.5 0 1 0-3.997-3.992L2 18v4h4l2-2v-2z"></path>
                         <path d="M17 6a1 1 0 1 0 0 2 1 1 0 1 0 0-2z"></path>
                     </svg>Password
                 </li>
                 <small class="-mb-2 mt-3 hidden uppercase text-gray-400 md:block">System setting</small>
                 <li wire:click="switchTab('general')" :class="{ 'font-semibold bg-gray-100': tab === 'general' }"
                     class="flex w-full cursor-pointer list-none items-center gap-2 rounded-xl px-3 py-1 text-gray-800 duration-300 ease-in-out hover:bg-gray-100">
                     <svg class="h-5" fill="none" stroke="currentColor" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                         <path
                             d="M22 20v-7.826a4 4 0 0 0-1.253-2.908l-7.373-6.968a2 2 0 0 0-2.748 0L3.253 9.266A4 4 0 0 0 2 12.174V20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2z">
                         </path>
                     </svg>General
                 </li>
                 <li wire:click="switchTab('documentTypes')"
                     :class="{ 'font-semibold bg-gray-100': tab === 'documentTypes' }"
                     class="flex w-full cursor-pointer list-none items-center gap-2 rounded-xl px-3 py-1 text-gray-800 duration-300 ease-in-out hover:bg-gray-100">
                     <svg class="h-5" fill="none" stroke="currentColor" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                         <path
                             d="M4 4v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8.342a2 2 0 0 0-.602-1.43l-4.44-4.342A2 2 0 0 0 13.56 2H6a2 2 0 0 0-2 2z">
                         </path>
                         <path d="M9 13h6"></path>
                         <path d="M9 17h3"></path>
                         <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                     </svg>Document types
                 </li>
                 <li wire:click="switchTab('watermark')" :class="{ 'font-semibold bg-gray-100': tab === 'watermark' }"
                     class="flex w-full cursor-pointer list-none items-center gap-2 rounded-xl px-3 py-1 text-gray-800 duration-300 ease-in-out hover:bg-gray-100">
                     <svg class="h-5" fill="none" stroke="currentColor" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                         <path
                             d="M12 22a8 8 0 0 1-8-8c0-3.502 2.71-6.303 5.093-8.87L12 2l2.907 3.13C17.29 7.698 20 10.499 20 14a8 8 0 0 1-8 8z">
                         </path>
                     </svg>Watermark
                 </li>

             </div>
             <div class="custom-scrollbar flex-grow-1 w-full overflow-y-auto px-4 py-2">
                 <div x-show="tab === 'profile'" x-transition:enter.duration.400ms.delay.300ms
                     x-transition:leave.duration.200ms>
                     <h2 class="p-36">profile</h2>
                 </div>
                 {{-- <div x-show="tab === 'profile'" x-transition:enter.duration.400ms.delay.300ms
                     x-transition:leave.duration.200ms>
                     @include('livewire\admin\components\setting-partials\edit-admin-profile-partials')
                 </div>


                 <div x-show="tab === 'documentTypes'" x-transition:enter.duration.400ms.delay.300ms
                     x-transition:leave.duration.200ms>
                     @include('livewire\admin\components\setting-partials\documentTypes-partials')
                 </div>
                 <div x-show="tab === 'watermark'" x-transition:enter.duration.400ms.delay.300ms
                     x-transition:leave.duration.200ms>
                     @include('livewire\admin\components\setting-partials\watermark-partials')
                 </div> --}}
             </div>
         </div>
     </div>

 </div>
