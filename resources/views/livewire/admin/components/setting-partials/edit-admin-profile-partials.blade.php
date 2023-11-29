 <div class="flex w-full flex-col gap-4 lg:flex-row lg:justify-between">
     <div class="flex min-h-[25.5rem] flex-col justify-between border-slate-300 p-4 lg:w-2/5 lg:border-r">
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
                 <p class="text-red-500">
                     Please complete editing your profile. <br />
                     <span>First and last name missing</span>
                 </p>
             @else
                 <h3 class="text-xl font-bold text-gray-800 md:text-2xl">
                     {{ $user->first_name }} {{ $user->last_name }}
                 </h3>
             @endif
         </div>
         <div class="mt-2 flex flex-col">
             <p class="font-bold text-gray-700">Username</p>
             @if ($user->username == null)
                 <p class="text-red-500">Username is empty.</p>
             @else
                 <p class="whitespace-normal text-gray-500">
                     {{ $user->username }}
                 </p>
             @endif
         </div>
         <div class="mt-2 flex flex-col">
             <p class="font-bold text-gray-700">Employee ID</p>
             @if ($user->staff_id == null)
                 <p class="text-red-500">Emplyoee ID is empty.</p>
             @else
                 <p class="whitespace-normal text-gray-500">
                     {{ $user->staff_id }}
                 </p>
             @endif
         </div>
         <div class="mt-2 flex flex-col">
             <p class="font-bold text-gray-700">Email</p>
             <p class="whitespace-normal text-gray-500">
                 {{ $user->email }}
             </p>
         </div>
         <div class="mt-2 flex flex-col">
             <p class="font-bold text-gray-700">Phone</p>
             @if ($user->phone_no == null)
                 <div class="text-red-500">
                     Phone number is empty.
                 </div>
             @else
                 <p class="whitespace-normal text-gray-500">
                     {{ $user->phone_no }}
                 </p>
             @endif
         </div>
         <div class="mt-2 flex flex-col">
             <p class="font-bold text-gray-700">Address</p>
             @if ($user->address == null)
                 <p class="text-red-500">Address is empty.</p>
             @else
                 <p class="whitespace-normal text-gray-500">
                     {{ $user->address }}
                 </p>
             @endif
         </div>
         <div class="mt-2 flex flex-col">
             <p class="font-bold text-gray-700">Department</p>
             @if ($user->bachelor_degree === null)
                 <p class="text-red-500">
                     Department is empty.
                 </p>
             @else
                 <p class="whitespace-normal text-gray-500">
                     {{ $user->bachelor_degree }}
                 </p>
             @endif
         </div>
         <div class="mt-2 flex flex-col">
             <p class="font-bold text-gray-700">Bio</p>
             @if ($user->bio == null)
                 <p class="text-red-500">Bio is empty.</p>
             @else
                 <p class="whitespace-normal text-gray-500">
                     {{ $user->bio }}
                 </p>
             @endif
         </div>
     </div>

     <form wire:submit="editProfile" class="w-full">
         <div class="tab-content flex max-h-fit min-h-[26.5rem] w-full flex-col justify-between gap-3 text-gray-600 md:gap-4 lg:min-h-[30rem] lg:gap-5"
             id="tab-1">
             <strong>Edit your profile information.</strong>
             <div class="flex w-full flex-col gap-3 md:flex-row md:gap-4 lg:gap-5">
                 <div class="flex w-full flex-col md:mb-0 md:w-1/2">
                     <x-label-input for="fname">First name</x-label-input>
                     <x-input-field class="w-full" type="text" wire:model.live="first_name" id="fname" />
                     @error('first_name')
                         <small class="text-red-500">{{ $message }}</small>
                     @enderror
                 </div>
                 <div class="flex w-full flex-col md:mb-0 md:w-1/2">
                     <x-label-input for="lname">Last name</x-label-input>
                     <x-input-field class="w-full" type="text" wire:model.live="last_name" id="lname" />
                     @error('last_name')
                         <small class="text-red-500">{{ $message }}</small>
                     @enderror
                 </div>
             </div>
             <div class="flex w-full flex-col gap-3 md:flex-row md:gap-4 lg:gap-5">
                 <div class="flex w-full flex-col md:w-1/2">
                     <x-label-input for="usernames">Username</x-label-input>
                     <x-input-field class="w-full" type="text" wire:model.live="username" id="usernames" />
                     @error('username')
                         <small class="text-red-500">{{ $message }}</small>
                     @enderror
                 </div>
                 <div class="flex w-full flex-col md:w-1/2">
                     <x-label-input for="pnumber">Phone number</x-label-input>
                     <x-input-field class="w-full" type="text" wire:model.live="phone_no" id="pnumber" />
                     @error('phone_no')
                         <small class="text-red-500">{{ $message }}</small>
                     @enderror
                 </div>
             </div>

             <div class="flex w-full flex-col gap-3 md:flex-row md:gap-4 lg:gap-5">
                 <div class="flex w-full flex-col">
                     <x-label-input for="email">Email</x-label-input>
                     <x-input-field class="w-full" type="email" wire:model.live="email" id="email" />
                     @error('email')
                         <small class="text-red-500">{{ $message }}</small>
                     @enderror
                 </div>
                 <div class="flex w-full flex-col">
                     <x-label-input for="staffID">Employee ID</x-label-input>
                     <x-input-field class="w-full" type="text" wire:model.live="staff_id" id="staffID" />
                     @error('staff_id')
                         <small class="text-red-500">{{ $message }}</small>
                     @enderror
                 </div>
             </div>
             <div class="flex w-full flex-col">
                 <x-label-input for="bachelor_degree">Department</x-label-input>
                 <select wire:model.live="bachelor_degree_input" id="bachelor-degree"
                     class="w-full rounded-md border border-gray-300 bg-slate-100 px-3 py-2 text-sm text-gray-600">
                     <option value="" selected>Select department</option>
                     @foreach ($bachelor_degree_data as $degree)
                         <option class="text-sm" value="{{ $degree->name }}">
                             {{ $degree->name }}
                         </option>
                     @endforeach
                 </select>
                 @error('bachelor_degree_input')
                     <small class="text-red-500">{{ $message }}</small>
                 @enderror

             </div>
             <div class="flex w-full flex-col">
                 <x-label-input for="address">Address</x-label-input>
                 <x-input-field class="w-full" type="text" wire:model.live="address" id="address" />
                 @error('address')
                     <small class="text-red-500">{{ $message }}</small>
                 @enderror
             </div>
             <div class="flex w-full flex-col">
                 <x-label-input for='bio'>Bio</x-label-input>
                 <textarea class="rounded-md border border-gray-400 bg-slate-100 px-3 py-2 text-sm focus:outline-primary-color"
                     type="text" wire:model.live="bio" rows="4" id="abstract_or_summary" id="bio"
                     placeholder="About you"></textarea>
                 @error('bio')
                     <small class="text-red-500">{{ $message }}</small>
                 @enderror
             </div>
             <div class="flex w-full flex-row items-center gap-2">
                 <div class="mt-2 flex w-full flex-col gap-3 md:flex-row lg:w-1/4 lg:gap-5">
                     <button class="w-full rounded-md bg-blue-600 px-3 py-2 text-white hover:bg-blue-800"
                         type="submit" wire:loading.attr="disabled">
                         <div wire:loading wire:target='editProfile'>
                             <div class="my-auto flex h-fit w-fit items-center justify-center rounded-full">
                                 <div class="h-4 w-4 animate-spin rounded-full border-t-2 border-white">
                                 </div>
                             </div>
                         </div>
                         <span wire:loading.remove wire:target='editProfile'>Save</span>
                     </button>
                 </div>
             </div>
         </div>
     </form>

 </div>
