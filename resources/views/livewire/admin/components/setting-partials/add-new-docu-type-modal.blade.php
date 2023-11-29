  <div x-data="{ newDT: false }" x-show="newDT" x-on:open-ndt.window = "newDT = true" x-on:close-ndt.window = "newDT = false"
      x-on:keydown.escape.window = "newDT = false; $wire.returnDefaultValueDocuType()" x-transition:enter.duration.400ms
      x-transition:leave.duration.300ms
      class="fixed inset-0 z-50 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm"
      style="display: none">
      <section
          class="relative mx-10 mt-[4rem] flex h-fit w-full flex-col gap-2 rounded-lg bg-white p-4 drop-shadow-xl md:w-[35%]">
          <strong
              class="w-full text-center uppercase text-primary-color">{{ $editingDocuType ? 'Editing ' : 'Add new ' }}document
              type</strong>
          <div class="mt-2 flex w-full flex-col items-center justify-center px-4">
              <p class="px-2 text-center">Below is an example illustrating the document type within the system.
              </p>
              <!-- Your Livewire view -->

              <div class="mt-1 w-fit rounded-full px-2 py-1 font-medium text-white"
                  style="background-color: {{ $bgColor }}; color: {{ $textColor }}">
                  {{ $docuType }}
              </div>

              <div class="my-2 flex w-full flex-col px-2">
                  <x-label-input for="docuType" class="">Document type </x-label-input>
                  <x-input-field type="text" for="docuType" class="w-full" wire:model.live="docuType" />
                  @error('docuType')
                      <small class="text-red-500">{{ $message }}</small>
                  @enderror
                  <x-label-input class="mt-2" for="textColor">Text color</x-label-input>
                  <x-input-field type="color" id="textColor" wire:model.live="textColor" class="h-10 w-full" />

                  <x-label-input class="mt-2" for="bgColor">Background color</x-label-input>
                  <x-input-field type="color" id="bgColor" class="h-10 w-full" wire:model.live="bgColor" />
              </div>

              <div class="mt-6 flex w-full flex-col gap-2 md:flex-row">
                  <button wire:click='cancelNewDocumentType'
                      class="w-full rounded-lg border border-red-700 px-2 py-1 text-red-700 duration-300 ease-in-out hover:bg-red-700 hover:text-white">Cancel</button>
                  @if ($editingDocuType)
                      <BUtton wire:click='addDocumentType' wire:loading.attr='disabled'
                          class="w-full rounded-lg bg-primary-color px-2 py-1 text-white duration-300 ease-in-out hover:bg-blue-900">Save</BUtton>
                  @else
                      <BUtton wire:click='addDocumentType' wire:loading.attr='disabled'
                          class="w-full rounded-lg bg-primary-color px-2 py-1 text-white duration-300 ease-in-out hover:bg-blue-900">Add</BUtton>
                  @endif

              </div>
          </div>
      </section>

  </div>
