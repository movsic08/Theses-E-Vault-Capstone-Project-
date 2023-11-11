 <div class="container">
     <div class= "mx-4 text-gray-800">
         <h1 class="text-lg font-bold md:md:text-xl">Settings</h1>
         <span>Manage account details and customize website preferences </span>
         <div class="mt-2 border-t border-gray-300 pt-2">
             <div x-data="{ activeTab: '{{ $activeTab }}' }">
                 <ul class="drop-shadow-smrounded-md mb-4 flex w-full gap-2 rounded-lg bg-gray-50 p-2 drop-shadow-sm">
                     <li wire:click.prevent='switchTab("tab1")'
                         class="cursor-pointer border-b border-gray-300 bg-gray-100 px-3 py-2 duration-500 ease-in-out"
                         @click="activeTab = 'tab1'">
                         Your profile</li>
                     <li wire:click.prevent='switchTab("tab2")'
                         class="cursor-pointer border-b border-gray-300 bg-gray-100 px-3 py-2 duration-500 ease-in-out"
                         @click="activeTab = 'tab2'">
                         Watermark</li>
                     <li wire:click.prevent='switchTab("tab3")'
                         class="cursor-pointer border-b border-gray-300 bg-gray-100 px-3 py-2 duration-500 ease-in-out"
                         @click="activeTab = 'tab3'">
                         Tab 3</li>
                 </ul>


                 <div x-show="activeTab === 'tab1'">profile</div>
                 <div x-show="activeTab === 'tab2'" class="flex w-full gap-4">
                     <div class="w-2/5 rounded-lg bg-white p-4 drop-shadow-md">
                         <strong>Current Watermark</strong>
                         <img class="h-56" src="{{ asset('storage/watermark/watermark.png') }}" alt="watermark photo"
                             srcset="">
                     </div>
                     <div class="w-3/5 rounded-lg bg-white p-4 drop-shadow-md">
                         <x-label-input>Change watermark</x-label-input>

                     </div>
                 </div>
                 <div x-show="activeTab === 'tab3'">Content for Tab 3</div>
             </div>
         </div>
     </div>
 </div>
