 <div x-show="activeTab === 'watermarkConfiguration'" class="mb-6 flex w-full flex-col gap-4 lg:flex-row">

     {{-- add new --}}
     <div class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm lg:items-start"
         x-data="{ add: false, uploading: false, progress: 0, uploaded: false }" x-show="add" x-on:open-wat.window = "add = true"
         x-on:close-wat.window = "add = false; uploaded = false" x-on:keydown.escape.window = "add = false"
         x-transition:enter.duration.400ms x-transition:leave.duration.300ms
         x-on:livewire-upload-start="uploading = true; progress = 0"
         x-on:livewire-upload-finish="uploading = false; uploaded = true" {{-- x-on:livewire-upload-finish="uploading = false; $wire.set('uploaded', true)" --}}
         x-on:livewire-upload-error="uploading = false; progress = 0"
         x-on:livewire-upload-progress="progress = $event.detail.progress" style="display: none">
         <div class="container md:flex md:items-center md:justify-center">
             <section
                 class="mx-auto h-fit w-full rounded-lg bg-white px-6 py-4 drop-shadow-xl md:mt-32 md:w-[40%] md:px-8 md:py-6">
                 <div class="flex w-full items-center justify-center">
                     <strong class="text-center">Upload new watermark</strong>
                 </div>
                 <div
                     class="mt-1 w-fit rounded-xl border border-green-800 bg-green-100 px-2 py-1 text-xs font-medium text-green-900 md:text-sm">
                     <small>When uploading a new image for watermarking, please ensure its transparency. This
                         precautionary
                         measure will help prevent potential errors when viewing PDF files containing watermarks in the
                         future.</small>
                 </div>
                 @if ($image)
                     <div class="flex w-full items-center justify-center">
                         <img class="my-3 h-[10rem]" src="{{ $image->temporaryUrl() }}" alt="img preview">
                     </div>
                 @endif
                 <div class="mt-2 flex w-full flex-col items-center justify-center">
                     <label for="uploadFile"
                         class="mb-2 w-fit rounded-lg bg-primary-color px-4 py-2 text-center text-white hover:cursor-pointer">
                         Upload
                         <input type="file" wire:model.live="image" id="uploadFile" class="" hidden
                             accept="image/png">
                     </label>

                     @error('image')
                         <small class="text-red-500">{{ $message }}</small>
                     @enderror
                 </div>

                 <div class="w-full" x-show="uploading" x-cloak>
                     <div class="h-2.5 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                         <div class="h-2.5 rounded-full bg-blue-600" :style="'width: ' + progress + '%'"></div>
                     </div>
                     <div class="mt-2" x-cloak>Uploading...</div>
                 </div>
                 <div x-show="uploaded" class="my-2 flex w-full items-center justify-center" x-cloak>
                     <strong class="rounded-lg bg-green-100 px-2 py-1 text-green-800">Image upload success!</strong>
                 </div>
                 <div class="mt-3 flex w-full flex-col items-center justify-end gap-2 px-4 lg:flex-row">
                     <button wire:click='closeAddWatermark'
                         class="w-full rounded-md border border-red-800 px-2 py-1 font-medium text-red-800 duration-300 ease-in-out hover:bg-red-800 hover:text-white md:w-20">Close</button>
                     <button wire:click='addNewWatermark'
                         class="w-full rounded-md bg-primary-color px-2 py-1 font-medium text-white md:w-20">Save</button>
                 </div>
             </section>
         </div>
     </div>

     {{-- delete --}}
     <div class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm lg:items-start"
         x-data="{ del: false }" x-show="del" x-on:open-del.window = "del = true"
         x-on:close-del.window = "del = false; uploaded = false" x-on:keydown.escape.window = "del = false"
         x-transition:enter.duration.400ms x-transition:leave.duration.300ms style="display: none">
         <div class="container md:flex md:items-center md:justify-center">
             <section
                 class="mx-auto h-fit w-full rounded-lg bg-white px-6 py-4 drop-shadow-xl md:mt-32 md:w-[40%] md:px-8 md:py-6">
                 <div class="flex w-full flex-col items-center justify-center gap-2">
                     <strong class="text-center text-red-700">Delete this watermark</strong>
                     @if ($selectedData != null)
                         <small
                             class="rounded-lg border border-red-700 bg-red-100 px-2 py-1 text-xs text-red-700 md:text-sm">
                             <p>Deleting the watermark file named <strong>{{ $selectedData->file_name }}</strong> is an
                                 irreversible action.
                                 Kindly ensure that you are fully prepared to proceed with this commitment.</p>
                         </small>
                         <div class="flex w-full items-center justify-center">
                             <img class="h-[14rem]" src="{{ asset('storage/' . $selectedData->file_link) }}"
                                 alt="img preview">
                         </div>
                         <div class="flex w-full flex-col items-center justify-end gap-2 md:flex-row">
                             <button wire:click='closeDel'
                                 class="w-full rounded-md border border-blue-800 px-2 py-1 font-medium text-blue-800 duration-300 ease-in-out hover:bg-blue-800 hover:text-white md:w-20">Cancel</button>
                             <button wire:click='deleteWatermark({{ $selectedData->id }})'
                                 class="w-full rounded-md bg-red-500 px-2 py-1 font-medium text-white duration-500 ease-in-out hover:bg-red-800 md:w-20">Delete</button>
                         </div>
                     @endif
                 </div>
             </section>
         </div>
     </div>

     {{-- preview --}}
     <div class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm lg:items-start"
         x-data="{ preview: false }" x-show="preview" x-on:open-prev.window = "preview = true"
         x-on:close-prev.window = "preview = false; uploaded = false"
         x-on:keydown.escape.window = "preview = false; $wire.closePrev()" x-transition:enter.duration.400ms
         x-transition:leave.duration.300ms style="display: none">
         <div class="container md:flex md:items-center md:justify-center">
             <section
                 class="mx-auto h-fit w-full rounded-lg bg-white px-6 py-4 drop-shadow-xl md:mt-32 md:w-[40%] md:px-8 md:py-6">
                 <div class="flex w-full flex-col items-center justify-center gap-2">
                     <strong class="text-center text-primary-color">Preview of watermark</strong>
                     @if ($previewData != null)
                         <small
                             class="rounded-lg border border-blue-700 bg-blue-100 px-2 py-1 text-center text-xs text-blue-700 md:text-sm">
                             <p>You are currently viewing the watermark
                                 named <strong>{{ $previewData->file_name }}</strong>. </p>
                         </small>
                         <div class="flex w-full items-center justify-center">
                             <img class="h-[18rem]" src="{{ asset('storage/' . $previewData->file_link) }}"
                                 alt="img preview">
                         </div>
                         <div class="flex w-full flex-col items-center justify-end gap-2 md:flex-row">
                             <button wire:click='closePrev'
                                 class="w-full rounded-md border border-blue-800 px-2 py-1 font-medium text-blue-800 duration-300 ease-in-out hover:bg-blue-800 hover:text-white md:w-20">Close</button>
                         </div>
                     @endif
                 </div>
             </section>
         </div>
     </div>

     <div class="flex h-[33rem] max-h-[33rem] w-full flex-col gap-2 rounded-lg bg-white p-4 drop-shadow-md lg:w-2/6">
         <strong>Current Watermark</strong>
         {{-- <small class="rounded-xl border border-blue-800 bg-blue-100 px-2 py-1 text-xs font-medium text-blue-900">
             The image below is currently utilized as the system's watermark.
         </small> --}}
         <div class="h-full w-full rounded border-4 border-primary-color">
             <img class="h-full w-full object-contain" src="{{ asset('storage/' . $currentWatermark->file_link) }}"
                 alt="watermark photo">
         </div>
     </div>



     <div class="flex max-h-[33rem] w-full flex-col gap-1 rounded-lg bg-white p-4 drop-shadow-md md:p-8 md:pt-4">

         <div class="mb-2 flex w-full items-center justify-between">
             <strong>Watermark Configuration</strong>
             <div class="flex items-center justify-center gap-2">
                 <div wire:loading wire:target='addWatermark, showDel'
                     class="inline-block h-4 w-4 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                     role="status">
                     <span
                         class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                 </div>
                 <button wire:click='addWatermark'
                     class="flex items-center gap-1 rounded-md bg-gray-800 px-2 py-1 text-sm font-semibold text-white">
                     <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                         <path
                             d="M22 12a10 10 0 1 1-20 0 10 10 0 0 1 20 0Zm-9.375-4.375a.625.625 0 1 0-1.25 0v3.75h-3.75a.625.625 0 1 0 0 1.25h3.75v3.75a.624.624 0 1 0 1.25 0v-3.75h3.75a.624.624 0 1 0 0-1.25h-3.75v-3.75Z">
                         </path>
                     </svg>Watermark</button>
             </div>
         </div>

         <div class="custom-scrollbar overflow-x-auto">
             <div class="max-w-full lg:max-h-[32rem]">
                 <table class="min-w-full">
                     <thead class="sticky top-0 bg-white bg-opacity-50 backdrop-blur">
                         <tr>
                             <th class="px-6 py-2 text-left font-bold text-gray-700">
                                 Image preview
                             </th>
                             <th class="px-6 py-2 text-left font-bold text-gray-700">
                                 File name
                             </th>
                             <th class="px-1 py-2 text-center font-bold text-gray-700">
                                 Status
                             </th>
                             <th class="flex justify-center px-6 py-2 text-center font-bold text-gray-700">
                                 <svg class="h-4 text-gray-500" viewBox="0 0 31 31" fill="currentColor">
                                     <path
                                         d="M18.0614 2.83145C17.3089 0.279368 13.6922 0.279368 12.9397 2.83145L12.7575 3.44978C12.6449 3.83181 12.4484 4.18381 12.1821 4.47998C11.9159 4.77615 11.5868 5.00899 11.2188 5.16142C10.8509 5.31384 10.4536 5.38199 10.0559 5.36087C9.6582 5.33976 9.27028 5.2299 8.92057 5.03937L8.35474 4.7302C6.01557 3.45708 3.45912 6.01499 4.73224 8.3527L5.04141 8.91854C5.23221 9.2683 5.34229 9.65635 5.36355 10.0542C5.38481 10.4521 5.31672 10.8496 5.16428 11.2177C5.01183 11.5858 4.7789 11.9151 4.48257 12.1815C4.18625 12.4478 3.83405 12.6444 3.45182 12.7569L2.83203 12.9392C0.279948 13.6917 0.279948 17.3083 2.83203 18.0608L3.45036 18.2431C3.83239 18.3556 4.18439 18.5522 4.48056 18.8184C4.77673 19.0847 5.00957 19.4138 5.16199 19.7817C5.31442 20.1496 5.38257 20.547 5.36145 20.9447C5.34034 21.3424 5.23048 21.7303 5.03995 22.08L4.73078 22.6458C3.45766 24.985 6.01557 27.5429 8.35328 26.2683L8.91912 25.9592C9.26888 25.7684 9.65693 25.6583 10.0548 25.637C10.4526 25.6158 10.8502 25.6838 11.2183 25.8363C11.5864 25.9887 11.9157 26.2217 12.1821 26.518C12.4484 26.8143 12.645 27.1665 12.7575 27.5487L12.9397 28.1685C13.6922 30.7206 17.3089 30.7206 18.0614 28.1685L18.2437 27.5487C18.356 27.1666 18.5524 26.8144 18.8186 26.518C19.0848 26.2217 19.414 25.9888 19.782 25.8363C20.15 25.6839 20.5474 25.6158 20.9452 25.637C21.343 25.6583 21.7309 25.7684 22.0806 25.9592L22.6464 26.2698C24.9856 27.5415 27.5435 24.985 26.2689 22.6473L25.9597 22.08C25.7695 21.7303 25.6598 21.3426 25.6389 20.9451C25.6179 20.5475 25.6861 20.1504 25.8385 19.7826C25.9909 19.4149 26.2237 19.0859 26.5197 18.8198C26.8157 18.5537 27.1675 18.3571 27.5493 18.2446L28.1691 18.0608C30.7212 17.3083 30.7212 13.6917 28.1691 12.9392L27.5493 12.7569C27.1673 12.6444 26.8153 12.4478 26.5191 12.1816C26.223 11.9153 25.9901 11.5862 25.8377 11.2183C25.6853 10.8504 25.6171 10.453 25.6382 10.0553C25.6594 9.65762 25.7692 9.2697 25.9597 8.91999L26.2704 8.35416C27.542 6.01499 24.9856 3.45854 22.6479 4.73166L22.0806 5.04083C21.7309 5.23109 21.3431 5.34072 20.9456 5.3617C20.5481 5.38267 20.151 5.31446 19.7832 5.16205C19.4155 5.00965 19.0865 4.77691 18.8204 4.48089C18.5543 4.18487 18.3577 3.83306 18.2452 3.45124L18.0614 2.83145ZM15.5006 20.8404C14.7815 20.8695 14.0639 20.753 13.3909 20.4979C12.7179 20.2428 12.1035 19.8544 11.5844 19.3559C11.0653 18.8573 10.6522 18.2591 10.3701 17.597C10.088 16.9349 9.94255 16.2226 9.94255 15.5029C9.94255 14.7832 10.088 14.0709 10.3701 13.4088C10.6522 12.7467 11.0653 12.1485 11.5844 11.65C12.1035 11.1515 12.7179 10.763 13.3909 10.5079C14.0639 10.2528 14.7815 10.1363 15.5006 10.1654C16.8698 10.2333 18.1605 10.8251 19.1056 11.8182C20.0507 12.8113 20.5777 14.1298 20.5777 15.5007C20.5777 16.8717 20.0507 18.1901 19.1056 19.1832C18.1605 20.1763 16.8698 20.7681 15.5006 20.836V20.8404Z" />
                                 </svg>
                             </th>
                         </tr>
                     </thead>
                     <div class="overflow-y-auto overflow-x-hidden">
                         <tbody class="w-full text-gray-500">
                             @foreach ($watermarkList as $item)
                                 <tr class="h-[4rem] min-h-[4rem] border-b border-slate-100">
                                     <td class="whitespace-normal px-6 py-2">
                                         <div class="">
                                             <img src="{{ asset('storage/' . $item->file_link) }}" alt="Preview"
                                                 class="h-[6rem] w-[6rem] rounded object-cover md:h-[7rem] md:w-[7rem]">
                                         </div>
                                     </td>
                                     <td class="whitespace-normal px-6 py-2">
                                         <span>{{ $item->file_name }} </span>
                                     </td>
                                     <td class="whitespace-normal px-1 py-2">
                                         @if ($item->is_set == 0)
                                             <div
                                                 class="w-full rounded-lg border border-orange-800 bg-orange-100 text-center font-bold uppercase text-orange-800">
                                                 Not selected
                                             </div>
                                         @else
                                             <div
                                                 class="w-full rounded-lg border border-blue-800 bg-blue-100 text-center font-bold uppercase text-blue-800">
                                                 Selected
                                             </div>
                                         @endif

                                     </td>
                                     <td class="whitespace-normal px-6 py-2">
                                         <div class="flex items-center justify-center gap-1">
                                             <span wire:click='showPreview({{ $item->id }})'
                                                 class="cursor-pointer rounded-md bg-sky-600 p-1 duration-500 ease-in-out hover:bg-sky-800">
                                                 <svg class="min-h-[1.1rem] min-w-[1.1rem] text-white"
                                                     fill="currentColor" viewBox="0 0 24 24"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                     <path d="M12 14.4a2.4 2.4 0 1 0 0-4.8 2.4 2.4 0 0 0 0 4.8Z">
                                                     </path>
                                                     <path fill-rule="evenodd"
                                                         d="M.55 12C2.078 7.132 6.626 3.6 12 3.6s9.922 3.532 11.45 8.4c-1.528 4.868-6.076 8.4-11.45 8.4S2.078 16.868.55 12Zm16.25 0a4.8 4.8 0 1 1-9.6 0 4.8 4.8 0 0 1 9.6 0Z"
                                                         clip-rule="evenodd"></path>
                                                 </svg>
                                             </span>
                                             <span wire:click='showDel({{ $item->id }})'
                                                 class="hover: cursor-pointer rounded-md bg-red-600 p-1 duration-500 ease-in-out hover:bg-red-800">
                                                 <svg class="min-h-[1.1rem] min-w-[1.1rem] text-white"
                                                     fill="currentColor" viewBox="0 0 24 24"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                     <path fill-rule="evenodd"
                                                         d="M10.8 2.4a1.2 1.2 0 0 0-1.073.664L8.858 4.8H4.8a1.2 1.2 0 0 0 0 2.4v12a2.4 2.4 0 0 0 2.4 2.4h9.6a2.4 2.4 0 0 0 2.4-2.4v-12a1.2 1.2 0 1 0 0-2.4h-4.058l-.87-1.736A1.2 1.2 0 0 0 13.2 2.4h-2.4ZM8.4 9.6a1.2 1.2 0 0 1 2.4 0v7.2a1.2 1.2 0 1 1-2.4 0V9.6Zm6-1.2a1.2 1.2 0 0 0-1.2 1.2v7.2a1.2 1.2 0 1 0 2.4 0V9.6a1.2 1.2 0 0 0-1.2-1.2Z"
                                                         clip-rule="evenodd"></path>
                                                 </svg>
                                             </span>
                                             <div wire:click='setAsDefault({{ $item->id }})'
                                                 class="hover: cursor-pointer rounded-md bg-blue-600 p-1 text-white duration-500 ease-in-out hover:bg-blue-800">
                                                 Set as default
                                             </div>
                                         </div>
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </div>
                 </table>
                 <div
                     class="sticky bottom-0 right-0 flex w-full items-center justify-center bg-white bg-opacity-50 backdrop-blur">
                     {{ $watermarkList->links() }}
                 </div>
             </div>
         </div>


     </div>
 </div>
