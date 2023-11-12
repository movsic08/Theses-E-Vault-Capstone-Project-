 <div x-show="activeTab === 'profile'" class="flex w-full flex-col gap-4 lg:flex-row">
     <div
         class="flex w-full flex-col justify-between rounded-xl bg-white p-4 drop-shadow-lg lg:max-h-[30.5rem] lg:min-h-[30.5rem] lg:w-5/12">
         <div class="flex flex-col items-center justify-center gap-2">
             <div class="relative">
                 @if ($user->profile_picture)
                     <img class="h-40 w-40 rounded-full object-cover"
                         src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" />
                 @else
                     <img class="h-40 w-40 rounded-full object-cover" src="{{ asset('assets/default_profile.png') }}"
                         alt="Default Profile Picture" />
                 @endif

                 <div
                     class="absolute bottom-0 right-3 h-8 w-8 rounded-full bg-blue-600 p-1 text-white duration-300 hover:h-9 hover:w-9 hover:bg-blue-800">
                     <svg wire:click='showProfileUpload' class="cursor-pointer" fill="currentColor" viewBox="0 0 24 24">
                         <path d="M9.75 13a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0Z"></path>
                         <path fill-rule="evenodd"
                             d="M7.474 7.642A3.142 3.142 0 0 1 10.616 4.5h2.768a3.143 3.143 0 0 1 3.142 3.142.03.03 0 0 0 .026.029l2.23.18c.999.082 1.82.82 2.007 1.805a22.07 22.07 0 0 1 .104 7.613l-.097.604a2.505 2.505 0 0 1-2.27 2.099l-1.943.157a56.61 56.61 0 0 1-9.166 0l-1.943-.157a2.505 2.505 0 0 1-2.27-2.1l-.097-.603c-.407-2.525-.371-5.1.104-7.613a2.226 2.226 0 0 1 2.007-1.804l2.23-.181a.028.028 0 0 0 .026-.029ZM12 9.25a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5Z"
                             clip-rule="evenodd"></path>
                     </svg>
                 </div>
             </div>
             @if ($user->first_name == null || $user->last_name == null)
                 <p class="text-red-500 md:ml-4">
                     Please complete editing your profile. <br />
                     <span>First and last name missing</span>
                 </p>
             @else
                 <h3 class="text-lg font-bold text-gray-800 md:text-xl lg:text-3xl">
                     {{ $user->first_name }} {{ $user->last_name }}
                 </h3>
             @endif
         </div>
         <div class="flex flex-col md:flex-row">
             <p class="font-bold text-gray-700">Username</p>
             @if ($user->username == null)
                 <p class="text-red-500 md:ml-4">Username is empty.</p>
             @else
                 <p class="whitespace-normal text-gray-500 md:pl-4">
                     {{ $user->username }}
                 </p>
             @endif
         </div>
         <div class="flex flex-col md:flex-row">
             <p class="font-bold text-gray-700">Staff ID</p>
             @if ($user->staff_id == null)
                 <p class="text-red-500 md:ml-4">Staff ID is empty.</p>
             @else
                 <p class="whitespace-normal text-gray-500 md:pl-4">
                     {{ $user->staff_id }}
                 </p>
             @endif
         </div>

         <div class="flex flex-col md:flex-row">
             <p class="font-bold text-gray-700">Email</p>
             <p class="whitespace-normal text-gray-500 md:pl-14">
                 {{ $user->email }}
             </p>
         </div>
         <div class="flex flex-col md:flex-row">
             <p class="font-bold text-gray-700">Phone</p>
             @if ($user->phone_no == null)
                 <div class="text-red-500 md:ml-12">
                     Phone number is empty.
                 </div>
             @else
                 <p class="whitespace-normal text-gray-500 md:pl-12">
                     {{ $user->phone_no }}
                 </p>
             @endif
         </div>
         <div class="flex flex-col md:flex-row">
             <p class="font-bold text-gray-700">Address</p>
             @if ($user->address == null)
                 <p class="text-red-500 md:ml-8">Address is empty.</p>
             @else
                 <p class="whitespace-normal text-gray-500 md:pl-8">
                     {{ $user->address }}
                 </p>
             @endif
         </div>
         <div class="flex flex-col md:flex-row">
             <p class="font-bold text-gray-700">Bio</p>
             @if ($user->bio == null)
                 <p class="text-red-500 md:ml-[4.9rem]">Bio is empty.</p>
             @else
                 <p class="whitespace-normal text-gray-500 md:pl-[4.9rem]">
                     {{ $user->bio }}
                 </p>
             @endif
         </div>
     </div>

     <form wire:submit="editProfile"
         class="tab-content mb-4 flex max-h-fit w-full flex-col justify-between gap-0 rounded-lg bg-white px-6 py-4 text-gray-600 drop-shadow-lg md:gap-1">

         <div class="flex w-full flex-col gap-0 md:flex-row md:gap-4">
             <div class="flex w-full flex-col md:mb-0 md:w-1/2">
                 <label class="text-sm font-semibold" for="fname">First name</label>
                 <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                     wire:model.live="first_name" id="fname" />
                 @error('first_name')
                     <small class="text-red-500">{{ $message }}</small>
                 @enderror
             </div>
             <div class="flex w-full flex-col md:mb-0 md:w-1/2">
                 <label for="fname" class="text-sm font-semibold">Last name</label>
                 <input class="rounded-md border border-gray-400 p-2 text-sm" type="text" wire:model.live="last_name"
                     id="fname" value="{{ $user->last_name }}" />
                 @error('last_name')
                     <small class="text-red-500">{{ $message }}</small>
                 @enderror
             </div>
         </div>
         <div class="flex w-full flex-col gap-0 md:flex-row md:gap-4">
             <div class="flex w-full flex-col md:w-1/2">
                 <label class="text-sm font-semibold" for="usernames">Username</label>
                 <input class="rounded-md border border-gray-400 p-2 text-sm" type="text" wire:model.live="username"
                     id="usernames" value="{{ $user->username }}" />
                 @error('username')
                     <small class="text-red-500">{{ $message }}</small>
                 @enderror
             </div>
             <div class="flex w-full flex-col md:w-1/2">
                 <label for="pnumber" class="text-sm font-semibold">Phone number</label>
                 <input class="rounded-md border border-gray-400 p-2 text-sm" type="text" wire:model.live="phone_no"
                     id="pnumber" value="{{ $user->phone_no }}" />
                 @error('phone_no')
                     <small class="text-red-500">{{ $message }}</small>
                 @enderror
             </div>
         </div>
         <div class="flex w-full flex-col gap-0 md:flex-row md:gap-4">
             <div class="flex w-full flex-col">
                 <label class="text-sm font-semibold" for="staffID">Staff ID</label>
                 <input class="rounded-md border border-gray-400 p-2 text-sm" type="text" wire:model.live="staff_id"
                     id="staffID" value="{{ $user->staff_id }}" />
                 @error('staff_id')
                     <small class="text-red-500">{{ $message }}</small>
                 @enderror
             </div>
         </div>

         <div class="flex w-full flex-col">
             <label class="text-sm font-semibold" for="address">Address</label>
             <input class="rounded-md border border-gray-400 p-2 text-sm" type="text" wire:model.live="address"
                 id="address" value="{{ $user->address }}" />
             @error('address')
                 <small class="text-red-500">{{ $message }}</small>
             @enderror
         </div>
         <div class="flex w-full flex-col">
             <x-label-input for='bio'>Bio</x-label-input>
             <textarea class="rounded-md border border-gray-400 p-2 text-sm" type="text" wire:model.live="bio" rows="4"
                 id="abstract_or_summary" id="bio" placeholder="About you"></textarea>
             @error('bio')
                 <small class="text-red-500">{{ $message }}</small>
             @enderror
         </div>
         <div class="flex w-full flex-row items-center justify-end gap-2">
             <div wire:loading wire:target='editProfile'>
                 <div class="my-auto ml-2 flex h-8 w-8 items-center justify-center rounded-full bg-gray-200">
                     <div class="h-4 w-4 animate-spin rounded-full border-t-2 border-primary-color">
                     </div>
                 </div>
             </div>
             <div class="mt-2 flex w-full flex-col gap-3 md:flex-row lg:w-1/2">
                 <button class="w-full rounded-md bg-blue-600 p-1 text-white hover:bg-blue-800" type="submit"
                     wire:loading.attr="disabled">
                     Save
                 </button>
                 <button
                     class="w-full rounded-md border border-gray-400 p-1 text-gray-600 hover:bg-gray-600 hover:text-white">
                     Cancel
                 </button>
             </div>
         </div>

     </form>
 </div>
