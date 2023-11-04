  <div x-data="{ remark: false }" x-show="remark" x-on:open-rem.window = "remark = true"
      x-on:close-rem.window = "remark = false" x-on:keydown.escape.window = "remark = false"
      x-transition:enter.duration.400ms x-transition:leave.duration.300ms
      class="fixed inset-0 z-40 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm"
      style="display: none">
      <div class="container md:w-[40%]">
          @if (isset($docuData))
              <section x-data="{ selectedStatus: @entangle('updating_remark') }"
                  class="custom-scrollbar i relative mt-[7rem] flex w-full flex-col gap-2 overflow-y-auto rounded-lg bg-white px-6 py-4 drop-shadow-xl">
                  <strong wire:model.live='remarkTitle' class="w-full text-center text-primary-color">Add remark to the
                      document</strong>
                  <p class="mt-3">
                      {{ $remarkTitle }}
                  </p>
                  <div class="flex flex-col gap-1">
                      <x-label-input for="status" class="mr-1">Status</x-label-input>
                      <select id="status" wire:model.live="updating_remark"
                          class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm font-medium text-gray-800 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                          x-on:change="selectedStatus = $event.target.value">
                          <option value="0">Pending</option>
                          <option value="1">Approved</option>
                          <option value="2">Disapproved</option>
                          <option value="3">Revision needed</option>
                          <option value="4">Out of span</option>
                      </select>
                  </div>

                  <div x-show="selectedStatus === '3'" x-transition:enter="transition ease-out duration-300"
                      x-transition:enter-start="opacity-0 transform scale-95"
                      x-transition:enter-end="opacity-100 transform scale-100"
                      x-transition:leave="transition ease-in duration-200"
                      x-transition:leave-start="opacity-100 transform scale-100"
                      x-transition:leave-end="opacity-0 transform scale-95" class="mb-3 flex flex-col gap-1">
                      <x-label-input for="revisionComment" class="mr-1">Add comment about revision</x-label-input>
                      <textarea
                          class="w-full resize-none rounded-md border border-gray-400 p-2 text-sm focus:outline-blue-950 md:resize-y lg:resize-none"
                          wire:model.live="status_comment" rows="4" id="revisionComment"></textarea>
                      @error('status_comment')
                          <small class="text-red-500">{{ $message }}</small>
                      @enderror
                  </div>
                  <div class="flex min-w-full items-end justify-end gap-2">
                      <button wire:click='closeRemarkBox'
                          class="w-20 rounded-md border border-red-500 px-2 py-1 font-semibold text-red-500 duration-500 ease-in-out hover:bg-red-800 hover:text-white">Cancel</button>
                      <button wire:click='saveRemark'
                          class="w-20 rounded-md bg-blue-500 px-2 py-1 font-semibold text-white duration-500 ease-in-out hover:bg-blue-800">Save</button>
                  </div>
              </section>
          @endif
      </div>
  </div>
