 <div class="text-gray-700">
     <h1 class="flex flex-col text-center text-base font-bold text-primary-color dark:text-slate-100 md:text-xl">
         Enter basic
         information
         about
         your
         work.
         <small class="font-normal text-gray-400 dark:text-slate-200">Please fill in basic information so that
             the
             other
             users
             will know
             what your research
             about is.</small>
     </h1>
 </div>
 <section class="mt-2 flex w-full flex-col gap-3">
     <div class="flex w-full flex-col gap-3 lg:flex-row">
         <div class="w-full lg:w-1/2">
             <div class="flex w-full flex-col">
                 <x-label-input for="abstract_or_summary">
                     Abstract/ Summary</x-label-input>
                 <textarea
                     class="custom-scrollbar rounded-md border border-gray-400 p-2 text-sm outline-primary-color dark:bg-slate-700 dark:text-slate-100"
                     type="text" wire:model.live="abstract_or_summary" rows="25" id="abstract_or_summary"
                     placeholder="Abstract or summary of your work"></textarea>
                 @error('abstract_or_summary')
                     <small class="text-red-500">{{ $message }}</small>
                 @enderror
             </div>
         </div>
         <div class="flex w-full flex-col gap-2 md:gap-4 lg:w-1/2">
             <div class="flex w-full flex-col gap-3">
                 <x-label-input for="authors">
                     Author/s</x-label-input>
                 <div class="flex w-full flex-row gap-3">
                     <div class="w-full">
                         <x-input-field class="w-full" type="text" wire:model.live="author1" id="authors"
                             placeholder="Author 1" :disabled='!auth()->user()->is_admin' />
                         @error('author1')
                             <small class="text-red-500">{{ $message }}</small>
                         @enderror
                     </div>
                     <div class="w-full">
                         <x-input-field class="w-full" type="text" wire:model.live="author2" id="authors"
                             placeholder="Author 2" />
                         @error('author2')
                             <small class="text-red-500">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>
                 <div class="flex w-full flex-row gap-3">
                     <div class="w-full">
                         <x-input-field class="w-full" type="text" wire:model.live="author3" id="authors"
                             placeholder="Author 3" />
                         @error('author3')
                             <small class="text-red-500">{{ $message }}</small>
                         @enderror
                     </div>
                     <div class="w-full">
                         <x-input-field class="w-full" type="text" wire:model.live="author4" id="authors"
                             placeholder="Author 4" />
                         @error('author4')
                             <small class="text-red-500">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>
                 <div class="flex w-full flex-row gap-3">
                     <div class="w-full">
                         <x-input-field class="w-full" type="text" wire:model.live="author5" id="authors"
                             placeholder="Author 5" />
                         @error('author5')
                             <small class="text-red-500">{{ $message }}</small>
                         @enderror
                     </div>
                     <div class="w-full">
                         <x-input-field class="w-full" type="text" wire:model.live="author6" id="authors"
                             placeholder="Author 6" />
                         @error('author6')
                             <small class="text-red-500">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>
                 <div class="flex w-full">
                     <div class="w-full lg:w-1/2">
                         <x-input-field class="w-full" type="text" wire:model.live="author7" id="authors"
                             placeholder="Author 7" />
                         @error('author7')
                             <small class="text-red-500">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>

             </div>
             <div class="flex w-full flex-col gap-2">
                 <x-label-input class="text-sm font-semibold" for="keywords">
                     Keywords/s</x-label-input>
                 <small class="text-gray-500 dark:text-slate-100">Adding keywords or tags is important to help
                     others
                     discover your research easily. 🔍 Keywords act like labels, summarizing
                     what
                     your
                     document is about. 🏷️ They make it simpler for researchers and readers
                     to
                     find
                     content related to specific topics. 📚 Think of them as the key 🔑 to
                     unlocking
                     your
                     research's visibility and making it accessible to a wider
                     audience.</small>
                 <div class="grid grid-cols-1 gap-2 md:grid-cols-2 md:gap-3">
                     <div class="">
                         <x-input-field class="w-full" type="text" wire:model.live="keyword1" id="keywords"
                             placeholder="Keyword 1 Required" />
                         @error('keyword1')
                             <small class="text-red-500">{{ $message }}</small>
                         @enderror
                     </div>
                     <div class="">
                         <x-input-field class="w-full" type="text" wire:model.live="keyword2" id="keywords"
                             placeholder="Keyword 2 Required " />
                         @error('keyword2')
                             <small class="text-red-500">{{ $message }}</small>
                         @enderror
                     </div>
                     <div class="">
                         <x-input-field class="w-full" type="text" wire:model.live="keyword3" id="keywords"
                             placeholder="Keyword 3 Required" />
                         @error('keyword3')
                             <small class="text-red-500">{{ $message }}</small>
                         @enderror
                     </div>
                     <div class="">
                         <x-input-field class="w-full" type="text" wire:model.live="keyword4" id="keywords"
                             placeholder="Keyword 4 Required" />
                         @error('keyword4')
                             <small class="text-red-500">{{ $message }}</small>
                         @enderror
                     </div>

                     <div class="">
                         <x-input-field class="w-full" type="text" wire:model.live="keyword5" id="keywords"
                             placeholder="Keyword 5 (Optional)" />
                         @error('keyword5')
                             <small class="text-red-500">{{ $message }}</small>
                         @enderror
                     </div>
                     <div class="">
                         <x-input-field class="w-full" type="text" wire:model.live="keyword6" id="keywords"
                             placeholder="Keyword 6 (Optional)" />
                         @error('keyword6')
                             <small class="text-red-500">{{ $message }}</small>
                         @enderror
                     </div>
                     <div class="">
                         <x-input-field class="w-full" type="text" wire:model.live="keyword7" id="keywords"
                             placeholder="Keyword 7 (Optional)" />
                         @error('keyword7')
                             <small class="text-red-500">{{ $message }}</small>
                         @enderror
                     </div>
                     <div class="">
                         <x-input-field class="w-full" type="text" wire:model.live="keyword8" id="keywords"
                             placeholder="Keyword 8 (Optional)" />
                         @error('keyword8')
                             <small class="text-red-500">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="flex flex-col gap-2">
         <x-label-input for="recommended_citation">
             Recommended citation</x-label-input>
         <small class="text-gray-600 dark:text-slate-100">This is auto generated based on the collected data
             from
             your
             inputs. You can change it to your desire recommended citation, but highly
             require to
             use
             proper bibliography format.</small>
         <div class="flex w-full gap-2">
             <button wire:click.prevent="citationAPA_generator"
                 class="w-fit rounded-md bg-blue-700 px-3 py-1 text-white duration-300 hover:bg-primary-color">Generate</button>
             <div class="w-[30%] leading-tight text-gray-500 dark:text-slate-100"><small> Click the generate
                     button to
                     generate a APA Citation of your document. </small></div>
         </div>
         <textarea
             class="resize-none rounded-md border border-gray-400 p-2 text-sm dark:bg-slate-700 dark:text-slate-100 md:resize-y lg:resize-none"
             wire:model.live="recommended_citation" rows="6" id="recommended_citation"></textarea>
         @error('recommended_citation')
             <small class="text-red-500">{{ $message }}</small>
         @enderror
     </div>
 </section>
