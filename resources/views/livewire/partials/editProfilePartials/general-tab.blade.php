 <form wire:submit="editProfile">
     <div class="tab-content flex max-h-fit min-h-[26.5rem] w-full flex-col justify-between gap-3 rounded-b-lg bg-white px-8 py-6 text-gray-600 drop-shadow-lg md:gap-4 lg:min-h-[30rem] lg:gap-5"
         id="tab-1">
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
             <div class="flex w-full flex-col md:w-1/2">
                 <x-label-input for="year">Year</x-label-input>
                 <select wire:model.live="year" id="year"
                     class="w-full rounded-md border border-gray-300 bg-slate-100 px-3 py-2 text-sm text-gray-600">
                     <option value="" selected>Select year</option>
                     <option class="text-sm" value="I">I</option>
                     <option class="text-sm" value="II">II</option>
                     <option class="text-sm" value="III">III</option>
                     <option class="text-sm" value="IV">IV</option>
                     <option class="text-sm" value="V">V</option>
                 </select>
                 @error('year')
                     <small class="text-red-500">{{ $message }}</small>
                 @enderror
             </div>
             <div class="flex w-full flex-col md:w-1/2">
                 <x-label-input for="section">Section</x-label-input>
                 <select wire:model.live="section" id="section"
                     class="w-full rounded-md border border-gray-300 bg-slate-100 px-3 py-2 text-sm text-gray-600">
                     <option value="" selected>Select block</option>
                     <option class="text-sm" value="A">A</option>
                     <option class="text-sm" value="B">B</option>
                     <option class="text-sm" value="C">C</option>
                     <option class="text-sm" value="D">D</option>
                 </select>
                 @error('section')
                     <small class="text-red-500">{{ $message }}</small>
                 @enderror
             </div>
         </div>
         <div class="flex w-full flex-col gap-3 md:flex-row md:gap-4 lg:gap-5">
             <div class="flex w-full flex-col">
                 <x-label-input for="studentID">Student ID</x-label-input>
                 <x-input-field class="w-full" type="text" wire:model.live="student_id" id="studentID" />
                 @error('student_id')
                     <small class="text-red-500">{{ $message }}</small>
                 @enderror
             </div>
         </div>
         <div class="flex w-full flex-col">
             <x-label-input for="bachelor_degree">Bachelor Degree</x-label-input>
             <select wire:model.live="bachelor_degree_input" id="bachelor-degree"
                 class="w-full rounded-md border border-gray-300 bg-slate-100 px-3 py-2 text-sm text-gray-600">
                 <option value="" selected>Select course</option>
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
                 type="text" wire:model.live="bio" rows="4" id="abstract_or_summary" id="bio" placeholder="About you"></textarea>
             @error('bio')
                 <small class="text-red-500">{{ $message }}</small>
             @enderror
         </div>
         <div class="flex w-full flex-row items-center gap-2">
             <div class="mt-2 flex w-full flex-col gap-3 md:flex-row lg:w-1/4 lg:gap-5">
                 <button class="w-full rounded-md bg-blue-600 px-3 py-2 text-white hover:bg-blue-800" type="submit"
                     wire:loading.attr="disabled">
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
