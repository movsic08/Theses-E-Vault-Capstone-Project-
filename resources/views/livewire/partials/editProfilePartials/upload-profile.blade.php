 <div x-data="{ uploadPicture: false, uploadFinish: false }" x-show="uploadPicture" x-on:open-dp.window="uploadPicture = true"
     x-on:close-dp.window="uploadPicture = false" x-on:keydown.escape.window="uploadPicture = false"
     x-transition:enter.duration.400ms x-transition:leave.duration.300ms @click.away="uploadPicture = false"
     class="fixed inset-0 z-50 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm"
     style="display: none">
     <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
         x-on:livewire-upload-finish="uploading = false; progress = 0; uploadFinish = true"
         x-on:livewire-upload-error="uploading = false; progress = 0"
         x-on:livewire-upload-progress="progress = $event.detail.progress"
         class="relative mx-3 mt-14 flex w-fit flex-col items-center justify-center gap-1 rounded-md bg-white px-10 py-5 text-center drop-shadow-xl md:w-[30%]">

         <strong class="flex items-center gap-1 text-primary-color">Upload profile picture </strong>
         <form wire:submit.prevent='changeProfile' class="relative mt-2 flex flex-col items-center justify-center">
             <div class="relative">
                 @if ($user->profile_picture)
                     <img class="h-[10rem] w-[10rem] rounded-full object-cover"
                         src="{{ $profile_picture ? $profile_picture->temporaryUrl() : asset('storage/' . $user->profile_picture) }}"
                         alt="Profile Picture" />
                 @else
                     <img class="h-[10rem] w-[10rem] rounded-full object-cover"
                         src="{{ $profile_picture ? $profile_picture->temporaryUrl() : asset('assets/default_profile.png') }}"
                         alt="Default Profile Picture" />
                 @endif
                 <div
                     class="absolute bottom-[0.6rem] left-[7.5rem] h-8 w-8 rounded-full bg-blue-600 p-1 text-white duration-300 hover:h-9 hover:w-9 hover:bg-blue-800">
                     <label for="dp">
                         <svg class="cursor-pointer" fill="currentColor" viewBox="0 0 24 24">
                             <path d="M9.75 13a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0Z"></path>
                             <path fill-rule="evenodd"
                                 d="M7.474 7.642A3.142 3.142 0 0 1 10.616 4.5h2.768a3.143 3.143 0 0 1 3.142 3.142.03.03 0 0 0 .026.029l2.23.18c.999.082 1.82.82 2.007 1.805a22.07 22.07 0 0 1 .104 7.613l-.097.604a2.505 2.505 0 0 1-2.27 2.099l-1.943.157a56.61 56.61 0 0 1-9.166 0l-1.943-.157a2.505 2.505 0 0 1-2.27-2.1l-.097-.603c-.407-2.525-.371-5.1.104-7.613a2.226 2.226 0 0 1 2.007-1.804l2.23-.181a.028.028 0 0 0 .026-.029ZM12 9.25a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5Z"
                                 clip-rule="evenodd"></path>
                         </svg>
                     </label>
                     <input accept="image/png, image/jpeg" wire:model="profile_picture" type="file" id="dp"
                         hidden />
                 </div>
             </div>
             @error('profile_picture')
                 <small class="my-1 text-red-500">{{ $message }}</small>
             @enderror

         </form>
         <div class="w-full" x-show="uploading" x-cloak>
             <div class="h-4 overflow-hidden rounded-full bg-gray-200">
                 <div class="h-4 rounded-full bg-gradient-to-r from-green-500 to-blue-500"
                     :style="'width: ' + progress + '%'"></div>
             </div>
             <div class="mt-2">Uploading...</div>
         </div>
         <div class="text-green-600" x-show="uploadFinish && progress == 0" x-cloak>
             Upload complete!
         </div>
         <div class="mt-3 flex w-full flex-col items-center justify-center gap-2 lg:flex-row">
             <button
                 class="h-fit w-full rounded-md border border-red-600 px-2 py-1 text-red-600 duration-200 ease-in-out hover:bg-red-600 hover:text-white lg:w-1/2"
                 wire:click='closeProfile'>
                 Close</button>
             <button wire:click='changeProfile' @click='uploadFinish = false'
                 class="w-full rounded-md border border-primary-color bg-primary-color px-2 py-1 text-white duration-200 ease-in-out hover:bg-blue-800 lg:w-1/2"
                 type="submit">Finalize</button>
         </div>
     </div>
 </div>
