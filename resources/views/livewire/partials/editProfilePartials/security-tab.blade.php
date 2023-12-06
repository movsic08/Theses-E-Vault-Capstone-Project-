 <form wire:submit="changePassword" wire:loading.class="loading">
     <div
         class="flex max-h-fit min-h-[26.5rem] w-full flex-col justify-between gap-3 rounded-b-lg bg-white p-4 px-8 py-6 text-gray-600 drop-shadow-lg dark:bg-slate-800 md:gap-4 lg:gap-5">
         <div class="flex w-full flex-col">
             <x-label-input for="currentPassword">Current
                 password</x-label-input>
             <x-input-field class="w-full" type="password" wire:model.live="current_password" id="currentPassword" />
             @error('current_password')
                 <small class="text-red-500">{{ $message }}</small>
             @enderror
         </div>
         <div class="flex w-full flex-col">
             <x-label-input for="password">New password</x-label-input>
             <x-input-field class="w-full" type="password" wire:model.live="password" id="password" />
             @error('password')
                 <small class="text-red-500">{{ $message }}</small>
             @enderror
         </div>
         <div class="flex w-full flex-col">
             <x-label-input for="password_confirmation">Confirm password</x-label-input>
             <x-input-field class="w-full" type="password" wire:model.live="password_confirmation"
                 id="password_confirmation" />
             @error('password_confirmation')
                 <small class="text-red-500">{{ $message }}</small>
             @enderror
         </div>
         <div class="flex w-full flex-row items-center justify-start gap-2">
             <div class="flex w-full flex-col gap-3 md:w-1/4 md:flex-row">
                 <button wire:loading.attr="disabled"
                     class="w-full rounded-md bg-blue-600 px-2 py-1 text-white hover:bg-blue-800" type="submit"
                     wire:loading.attr="disabled">
                     <div wire:loading wire:target='changePassword'>
                         <div class="my-auto flex h-fit w-fit items-center justify-center rounded-full">
                             <div class="h-4 w-4 animate-spin rounded-full border-t-2 border-white">
                             </div>
                         </div>
                     </div>
                     <span wire:loading.remove wire:target='changePassword'>Save</span>
                 </button>
             </div>
         </div>
         <section class="flex flex-col gap-3 border-t border-gray-200 pt-3 md:gap-4 lg:gap-5">
             <strong class="text-red-800 dark:text-red-500">Delete Account</strong>
             <p class="rounded-md border-red-800 bg-red-50 p-2 text-sm text-red-800 dark:bg-red-950 dark:text-red-500">
                 Once your account is deleted, all of its resources
                 and data will be permanently deleted. Before
                 deleting your account, please download any data or
                 information that you wish to retain.
             </p>
             <div class="my-2 w-full">
                 <span id="deleteButton" wire:click="showdelBox"
                     class="w-full cursor-pointer rounded-md bg-red-600 p-2 font-semi-bold text-white duration-200 ease-in hover:bg-red-800 md:w-1/3 lg:w-1/2">Delete
                     account</span>
             </div>
         </section>
     </div>
 </form>
