  <div x-data="{ uploadPDF: false }" x-show="uploadPDF" x-on:open-pdf.window="uploadPDF = true"
      x-on:close-pdf.window="uploadPDF = false" x-on:keydown.escape.window="uploadPDF = false"
      x-transition:enter.duration.400ms x-transition:leave.duration.300ms @click.away="uploadPDF = false"
      class="fixed inset-0 z-50 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm dark:bg-opacity-0"
      style="display: none">
      <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true; progress = 0"
          x-on:livewire-upload-finish="uploading = false; $wire.set('uploaded', true)"
          x-on:livewire-upload-error="uploading = false; progress = 0"
          x-on:livewire-upload-progress="progress = $event.detail.progress"
          class="mx-3 mt-16 w-5/6 rounded-xl bg-white text-center text-gray-600 drop-shadow-lg md:w-3/6 lg:w-[35%]">
          <div class="relative rounded-t-xl bg-primary-color px-10 py-3 font-semibold uppercase text-white">
              <h1>Upload your file here </h1>
          </div>
          <div class="flex h-fit w-full flex-col items-center rounded-b-xl bg-white px-2 py-4 dark:bg-slate-800">
              <div class="container">
                  <div class="mt-5 rounded-md bg-gray-100 p-2 text-gray-600 dark:bg-slate-600 dark:text-slate-100">
                      Please be advised
                      that the required file must be in PDF format. Additionally, kindly note that the PDF file size
                      should not exceed <strong class="text-red-500 dark:text-red-400">100MB.</strong> Thank you for
                      your cooperation.
                  </div>
                  <div>
                      @error('user_upload')
                          <small class="text-red-500">{{ $message }}</small>
                      @enderror
                  </div>
                  <div class="mt-4 w-full" x-show="uploading" x-cloak>
                      <div class="h-2.5 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                          <div class="h-2.5 rounded-full bg-blue-600" :style="'width: ' + progress + '%'"></div>
                      </div>
                      <div class="mt-2 dark:text-slate-100" x-cloak>Uploading...</div>
                  </div>

                  @if ($uploaded)
                      <div class="mt-2 font-medium text-green-700">
                          File upload completed!
                      </div>
                  @endif
                  <div class="mt-7 flex w-full flex-col items-center justify-center gap-2 font-semibold md:flex-row">
                      <div @click="uploadPDF = false"
                          class="w-full cursor-pointer rounded-lg border border-blue-800 bg-blue-100 px-3 py-2 align-middle text-blue-800 duration-300 hover:bg-blue-800 hover:text-white dark:border-slate-700 dark:bg-slate-700 dark:text-slate-100">
                          Close</div>
                      <label for="uploadFile"
                          class="w-full rounded-lg border-primary-color bg-primary-color px-3 py-2 text-center text-white duration-300 hover:cursor-pointer hover:border-blue-900 hover:bg-blue-900 dark:bg-blue-700 dark:hover:bg-blue-900">Upload
                          <input type="file" wire:model.live="user_upload" id="uploadFile" class="" hidden
                              accept="application/pdf">
                      </label>
                  </div>
              </div>
          </div>
      </div>

  </div>
