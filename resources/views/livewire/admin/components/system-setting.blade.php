 <div class="container">
     <x-session_flash />
     <div class= "mx-4 text-gray-800">
         <h1 class="text-lg font-bold md:md:text-xl">Settings</h1>
         <span>Manage account details and customize website preferences </span>
         <div class="mt-2 border-t border-gray-300 pt-2">
             <div x-data="{ activeTab: '{{ $activeTab }}' }">
                 <ul class="mb-4 flex w-full gap-2 rounded-lg bg-gray-50 p-2 drop-shadow">
                     <li @click="activeTab = 'profile'"
                         :class="{ 'border-b-2 border-primary-color font-semibold bg-gray-100': activeTab === 'profile', 'hover:bg-gray-100': activeTab !== 'profile' }"
                         class="cursor-pointer px-3 py-2 duration-500 ease-in-out">
                         Your profile
                     </li>
                     <li @click="activeTab = 'watermarkConfiguration'"
                         :class="{ 'border-b-2 border-primary-color font-semibold bg-gray-100': activeTab === 'watermarkConfiguration', 'hover:bg-gray-100': activeTab !== 'watermarkConfiguration' }"
                         class="cursor-pointer px-3 py-2 duration-500 ease-in-out">
                         Watermark
                     </li>
                     <li @click="activeTab = 'tab3'"
                         :class="{ 'border-b-2 border-primary-color font-semibold bg-gray-100': activeTab === 'tab3', 'hover:bg-gray-100': activeTab !== 'tab3' }"
                         class="cursor-pointer px-3 py-2 duration-500 ease-in-out">
                         tab3
                     </li>

                     <li class="ml-auto mr-1 flex items-center justify-center">
                         <div wire:loading wire:target='switchTab'
                             class="inline-block h-6 w-6 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                             role="status">
                             <span
                                 class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                         </div>
                     </li>
                 </ul>


                 @include('livewire\admin\components\setting-partials\edit-admin-profile-partials')
                 @include('livewire\admin\components\setting-partials\watermark-partials')
                 <div x-show="activeTab === 'tab3'">Content for Tab 3</div>
             </div>
         </div>
     </div>
 </div>
