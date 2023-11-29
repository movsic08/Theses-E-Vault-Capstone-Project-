  <div x-data="{ filterWords: false }" x-show="filterWords" x-on:open-fw.window = "filterWords = true"
      x-on:close-fw.window = " filterWords = false" x-on:keydown.escape.window = "$wire.closeAddNewSensitiveWord()"
      x-transition:enter.duration.400ms x-transition:leave.duration.300ms
      class="fixed inset-0 z-50 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm"
      style="display: none">
      <section
          class="relative mx-10 mt-[4rem] flex h-fit w-full flex-col gap-2 rounded-lg bg-white p-4 drop-shadow-xl md:w-[35%]">
          <strong
              class="w-full text-center text-lg uppercase text-primary-color">{{ $editingFilterWords ? 'Editing ' : 'Add new ' }}senstive
              word</strong>
          <div class="mt-2 flex w-full flex-col items-center justify-center px-4">
              <div class="rounded-lg bg-red-50 px-2 py-1 text-center font-semibold text-red-600">
                  Reminder: These words cannot be used in the comment section. Please make sure to double-check them.
              </div>
              <div class="my-2 flex w-full flex-col px-2">
                  <x-label-input for="sensitiveWord">Sensitive words</x-label-input>
                  <x-input-field type="texts" id="sensitiveWord" wire:model.live='sensitiveWord' class="w-full" />
                  @error('sensitiveWord')
                      <small class="text-red-500">{{ $message }}</small>
                  @enderror
              </div>
              <div class="mt-6 flex w-full flex-col gap-2 md:flex-row">
                  <button wire:click='closeAddNewSensitiveWord'
                      class="w-full rounded-lg border border-red-700 px-2 py-1 text-red-700 duration-300 ease-in-out hover:bg-red-700 hover:text-white">Cancel</button>
                  @if ($editingFilterWords)
                      <BUtton wire:click='addNewSensitiveWord' wire:loading.attr='disabled'
                          class="w-full rounded-lg bg-primary-color px-2 py-1 text-white duration-300 ease-in-out hover:bg-blue-900">Save</BUtton>
                  @else
                      <BUtton wire:click='addNewSensitiveWord' wire:loading.attr='disabled'
                          class="w-full rounded-lg bg-primary-color px-2 py-1 text-white duration-300 ease-in-out hover:bg-blue-900">Add</BUtton>
                  @endif

              </div>
          </div>
      </section>

  </div>
