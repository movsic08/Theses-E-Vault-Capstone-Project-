 <div x-data="{ delAccount: false }" x-show="delAccount" x-on:open-dla.window="delAccount = true"
     x-on:close-dla.window="delAccount = false" x-on:keydown.escape.window="delAccount = false"
     x-transition:enter.duration.400ms x-transition:leave.duration.300ms @click.away="delAccount = false"
     class="fixed inset-0 z-50 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm"
     style="display: none">
     <div id="deleteConfirmationBox"
         class="mx-3 mt-16 flex w-fit flex-col gap-1 rounded-md bg-white px-10 py-6 text-center md:w-2/5 lg:w-[30%]">
         <h1 class="text-lg font-bold text-red-900">Woah, there!</h1>
         <p class="mt-1 rounded-md border border-red-400 bg-red-100 px-2 py-1 text-xs text-red-400">
             This action is irreversible and will permanently delete
             all your information associated with this account. If you
             proceed, you will lose access to your account and all
             its contents. Please take a moment to consider this
             decision. If you're certain about deleting your account,
             click the "Delete Account" button below.
         </p>
         <div class="mt-4 flex w-full items-center justify-center">
             <x-input-field type="text" wire:model.live="confirmationInput" id="confirmInput" class="w-full"
                 placeholder="Confirm, by typing DELETE" />
             <div wire:loading.remove
                 class="{{ $confirmationInput ? '' : 'hidden' }} my-auto ml-2 flex h-8 w-8 items-center justify-center rounded-full bg-gray-200">
                 @if (!$confirmationInput)
                     <span class="hidden">Hidden content</span>
                 @elseif ($confirmationInput === 'DELETE')
                     ✅ <!-- Checkmark indicator -->
                 @else
                     ❌ <!-- X indicator -->
                 @endif
             </div>
             <div wire:loading wire:target='confirmationInput'>
                 <div class="my-auto ml-2 flex h-8 w-8 items-center justify-center rounded-full bg-gray-200">
                     <div class="h-4 w-4 animate-spin rounded-full border-t-2 border-primary-color"></div>
                 </div>
             </div>
         </div>
         <div class="mt-4 flex w-full flex-col gap-2 md:flex-row">
             <button wire:click="closeDelBox"
                 class="w-full rounded-md border border-gray-700 p-1 text-gray-700 duration-200 ease-in hover:bg-gray-600 hover:text-white">
                 Cancel
             </button>
             <button
                 @if ($confirmationInput !== 'DELETE') @else
                         wire:click="deletemyAccount" @endif
                 id="confirmBTN"
                 class="{{ $confirmationInput === 'DELETE' ? 'bg-red-700 hover:bg-red-900' : 'bg-red-400' }} w-full rounded-md p-1 text-white"
                 @if ($confirmationInput !== 'DELETE' || !$confirmationInput) disabled @endif>
                 Yes, Delete it
             </button>
         </div>
     </div>
 </div>
