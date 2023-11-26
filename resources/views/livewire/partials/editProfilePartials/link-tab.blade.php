   <div
       class="flex min-h-[26.5rem] w-full flex-col justify-between gap-0 rounded-b-lg bg-white p-4 px-8 py-6 text-gray-600 drop-shadow-lg md:gap-4 lg:min-h-[30rem]">
       <section>
           <h2 class="mb-2 font-bold uppercase text-gray-800">Link your social media account.</h2>
           <form wire:submit="addUrl" class="flex flex-col gap-3 md:gap-4 lg:gap-5">
               <div class="flex w-full flex-col">
                   <x-label-input for="fb_url">Facebook account URL</x-label-input>
                   <x-input-field type="text" wire:model.live="facebook_url" id="fb_url" />
                   @error('facebook_url')
                       <small class="text-red-500">{{ $message }}</small>
                   @enderror
               </div>
               <div class="flex w-full flex-col">
                   <x-label-input for="ig_url">Instagram account URL</x-label-input>
                   <x-input-field type="text" wire:model.live="ig_url" id="ig_url" />
                   @error('ig_url')
                       <small class="text-red-500">{{ $message }}</small>
                   @enderror
               </div>
               <div class="mt-2 flex w-full flex-col gap-3 md:w-1/4 md:flex-row">
                   <button
                       class="flex h-8 w-full items-center justify-center rounded-md bg-blue-600 px-2 py-1 text-white hover:bg-blue-800"
                       type="submit" wire:loading.attr="disabled">
                       <div wire:loading wire:target='addUrl'
                           class="my-auto flex w-fit items-center justify-center rounded-full">
                           <div class="h-4 w-4 animate-spin rounded-full border-t-2 border-white">
                           </div>
                       </div>
                       <span wire:loading.remove wire:target='addUrl'>Save</span>
                   </button>
               </div>
           </form>

       </section>
       <section class="border-t border-slate-200 pt-4">
           <h2 class="mb-2 font-bold uppercase text-gray-800">Account Verification</h2>
           <form wire:submit="verifyMyEmail">
               <div class="flex h-fit items-center justify-center">
                   @php
                       $user = auth()->user();
                       $areTheyEmpty = empty($user->first_name) || empty($user->last_name) || empty($user->address) || empty($user->phone_no);
                   @endphp
                   @if ($areTheyEmpty)
                       <section
                           class="flex items-center rounded-lg border border-red-700 bg-red-100 px-3 py-2 text-xs text-red-700">
                           <div class="mx-3 flex items-center">
                               <svg fill="currentColor" height="40" viewBox="0 0 24 24"
                                   xmlns="http://www.w3.org/2000/svg">
                                   <path fill-rule="evenodd"
                                       d="M21.6 12a9.6 9.6 0 1 1-19.2 0 9.6 9.6 0 0 1 19.2 0Zm-8.4 4.8a1.2 1.2 0 1 1-2.4 0 1.2 1.2 0 0 1 2.4 0ZM12 6a1.2 1.2 0 0 0-1.2 1.2V12a1.2 1.2 0 1 0 2.4 0V7.2A1.2 1.2 0 0 0 12 6Z"
                                       clip-rule="evenodd"></path>
                               </svg>
                           </div>
                           <p class="rounded-lg text-sm">
                               Your account information is incomplete. Please fill out the required details before
                               proceeding with the account verification process.
                           </p>
                       </section>
                   @else
                       @if (auth()->user()->is_verified == false)
                           <section
                               class="flex items-center rounded-lg border border-yellow-700 bg-yellow-100 px-3 py-2 text-xs text-yellow-700">
                               <div class="mx-3 flex items-center">
                                   <svg fill="currentColor" height="40" viewBox="0 0 24 24"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd"
                                           d="M21.6 12a9.6 9.6 0 1 1-19.2 0 9.6 9.6 0 0 1 19.2 0Zm-8.4 4.8a1.2 1.2 0 1 1-2.4 0 1.2 1.2 0 0 1 2.4 0ZM12 6a1.2 1.2 0 0 0-1.2 1.2V12a1.2 1.2 0 1 0 2.4 0V7.2A1.2 1.2 0 0 0 12 6Z"
                                           clip-rule="evenodd"></path>
                                   </svg>
                               </div>
                               <p class="text-sm">
                                   Your account is currently not verified. To access all features, please complete the
                                   verification process confirming your student status at PSU-ACC. Binding your
                                   institutional email account will facilitate account recovery.
                               </p>
                           </section>
                       @else
                           <section
                               class="flex items-center rounded-lg border border-blue-700 bg-blue-100 px-3 py-2 text-xs text-blue-700">
                               <div class="mx-3 flex items-center">
                                   <svg fill="currentColor" height="40" viewBox="0 0 24 24"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd"
                                           d="M7.52 4.146a3.68 3.68 0 0 0 2.094-.868 3.68 3.68 0 0 1 4.772 0 3.68 3.68 0 0 0 2.094.868 3.68 3.68 0 0 1 3.374 3.374 3.67 3.67 0 0 0 .868 2.094 3.68 3.68 0 0 1 0 4.772 3.679 3.679 0 0 0-.868 2.094 3.68 3.68 0 0 1-3.374 3.374 3.679 3.679 0 0 0-2.094.868 3.68 3.68 0 0 1-4.772 0 3.679 3.679 0 0 0-2.094-.868 3.68 3.68 0 0 1-3.374-3.374 3.68 3.68 0 0 0-.868-2.094 3.68 3.68 0 0 1 0-4.772 3.68 3.68 0 0 0 .868-2.094A3.68 3.68 0 0 1 7.52 4.146Zm8.928 6.302a1.2 1.2 0 0 0-1.696-1.696L10.8 12.703l-1.552-1.551a1.2 1.2 0 0 0-1.696 1.696l2.4 2.4a1.2 1.2 0 0 0 1.696 0l4.8-4.8Z"
                                           clip-rule="evenodd"></path>
                                   </svg>
                               </div>
                               <div class="flex flex-col text-xs">
                                   <p>
                                       Account Verified! Welcome to our Research & Thesis Hub! 🎓
                                   </p>
                                   <p> Your institutional account has been verified. Dive into
                                       a world of research,
                                       thesis, and capstone excellence. Enjoy exploring and learning on our
                                       platform!</p>
                                   <p> Happy researching! 📚🔍</p>
                               </div>
                           </section>
                       @endif
                   @endif
               </div>
               <div class="mt-4 flex w-full flex-col">
                   <label class="text-sm font-semibold" for="verifyEmail">Institutional Email</label>
                   @if (auth()->user()->is_verified == false)
                       <small>To verify your account, you need to use your institutional
                           account.</small>
                   @endif
                   <input
                       class="{{ auth()->user()->is_verified ? 'text-gray-400' : '' }} my-2 rounded-md border border-gray-400 p-2 text-sm"
                       type="email" wire:model.live="verifyEmail" id="email"
                       {{ auth()->user()->is_verified || $areTheyEmpty ? 'disabled' : '' }} />
                   @error('verifyEmail')
                       <small class="text-red-500">{{ $message }}</small>
                   @enderror
               </div>
               <div class="my-2 flex w-full flex-col gap-3 md:flex-row">
                   @if (auth()->user()->is_verified == false)
                       <div class="flex w-full flex-row items-center justify-start gap-2">
                           <div class="flex w-full flex-col gap-3 md:w-1/4 md:flex-row">
                               <button wire:loading.attr="disabled"
                                   class="w-full rounded-md bg-blue-600 px-2 py-1 text-white hover:bg-blue-800"
                                   type="submit" wire:loading.attr="disabled">
                                   <div wire:loading wire:target='verifyMyEmail'>
                                       <div class="my-auto flex h-fit w-fit items-center justify-center rounded-full">
                                           <div class="h-4 w-4 animate-spin rounded-full border-t-2 border-white">
                                           </div>
                                       </div>
                                   </div>
                                   <span wire:loading.remove wire:target='verifyMyEmail'>Verify</span>
                               </button>
                           </div>
                       </div>
                   @endif
               </div>
           </form>
       </section>
   </div>
