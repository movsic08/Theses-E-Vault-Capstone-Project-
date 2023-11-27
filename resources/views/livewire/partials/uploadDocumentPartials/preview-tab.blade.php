  <div class="text-gray-700">
      <p class="text-center text-xs text-gray-600">Please verify the entered information for
          accuracy. If any
          errors are
          found, please use the
          'Back' button to make corrections. If the information is correct, you may proceed by
          clicking
          'Submit'. Thank you.</p>
  </div>
  <section class="grid grid-cols-4 gap-3 text-primary-color">
      <div class="col-span-4">
          <h2 class="font-extrabold uppercase">Title</h2>
          <p class="break-words text-sm font-semibold text-gray-600">{{ $title }}</p>
      </div>
      <div class="col-span-4 flex w-full flex-col gap-2 lg:col-span-3">
          <div class="grid grid-cols-2 gap-2">
              <div class="col-span-1">
                  <h2 class="font-extrabold uppercase">Document type</h2>
                  <p class="text-sm font-semibold text-gray-600">{{ $document_type }}</p>
              </div>
              <div class="col-span-1">
                  <h2 class="font-extrabold uppercase">Format</h2>
                  <p class="text-sm font-semibold text-gray-600">{{ $format }}</p>
              </div>
              <div class="col-span-1">
                  <h2 class="font-extrabold uppercase">Langauge</h2>
                  <p class="text-sm font-semibold text-gray-600">{{ $language }}</p>
              </div>
              <div class="col-span-1">
                  <h2 class="font-extrabold uppercase">Date of publication</h2>
                  <p class="text-sm font-semibold text-gray-600">{{ $date_of_approval }}</p>
              </div>
          </div>
          <div class="grid grid-cols-2 gap-2">
              <div class="col-span-2 md:col-span-1">
                  <h2 class="font-extrabold uppercase">Keywords/ Tags</h2>
                  <div class="grid grid-cols-2 gap-2 lg:gap-0">
                      <div class="col-span-1 gap-1 lg:col-span-2">
                          <span class="font-semibold text-gray-600">{{ $keyword1 }}</span>
                      </div>
                      <div class="col-span-1 gap-1 lg:col-span-2">
                          <span class="font-semibold text-gray-600">{{ $keyword2 }}</span>
                      </div>
                  </div>
                  <div class="grid grid-cols-2 gap-2 lg:gap-0">
                      <div class="col-span-1 gap-1 lg:col-span-2">
                          <span class="font-semibold text-gray-600">{{ $keyword3 }}</span>
                      </div>
                      <div class="col-span-1 gap-1 lg:col-span-2">
                          <span class="font-semibold text-gray-600">{{ $keyword4 }}</span>
                      </div>
                  </div>
                  <div class="grid grid-cols-2 gap-2 lg:gap-0">
                      <div class="col-span-1 gap-1 lg:col-span-2">
                          <span class="font-semibold text-gray-600">{{ $keyword5 }}</span>
                      </div>
                      <div class="col-span-1 gap-1 lg:col-span-2">
                          <span class="font-semibold text-gray-600">{{ $keyword6 }}</span>
                      </div>
                  </div>
                  <div class="grid grid-cols-2 gap-2 lg:gap-0">
                      <div class="col-span-1 gap-1 lg:col-span-2">
                          <span class="font-semibold text-gray-600">{{ $keyword7 }}</span>
                      </div>
                      <div class="col-span-1 gap-1 lg:col-span-2">
                          <span class="font-semibold text-gray-600">{{ $keyword8 }}</span>
                      </div>
                  </div>
              </div>
              <div class="col-span-2 md:col-span-1">
                  <h2 class="font-extrabold uppercase">Degree name</h2>
                  <p class="text-sm font-semibold text-gray-600">
                      {{ $bachelor_degree_value }}
                  </p>
              </div>
              <div class="col-span-2">
                  <h2 class="font-extrabold uppercase">Recommended citation</h2>
                  <p class="break-words text-sm font-semibold text-gray-600">
                      {{ $recommended_citation }}</p>
              </div>
          </div>
          <div>
              <h2 class="font-extrabold uppercase">Abstract/ summary</h2>
              <p class="break-words text-sm font-semibold text-gray-600">
                  {!! nl2br(e($abstract_or_summary)) !!}
              </p>
          </div>
      </div>
      <div class="col-span-4 text-primary-color lg:col-span-1">
          <div class="grid grid-cols-2 gap-2">
              <div class="col-span-2">
                  <h2 class="font-extrabold uppercase">Author/ s</h2>
                  <div class="grid grid-cols-2 gap-2 lg:gap-0">
                      <div class="col-span-1 gap-1 lg:col-span-2">
                          <span class="font-semibold text-gray-600">{{ $author1 }}</span>
                      </div>
                      <div class="col-span-1 gap-1 lg:col-span-2">
                          <span class="font-semibold text-gray-600">{{ $author2 }}</span>
                      </div>
                  </div>
                  <div class="grid grid-cols-2 gap-2 lg:gap-0">
                      <div class="col-span-1 gap-1 lg:col-span-2">
                          <span class="font-semibold text-gray-600">{{ $author3 }}</span>
                      </div>
                      <div class="col-span-1 gap-1 lg:col-span-2">
                          <span class="font-semibold text-gray-600">{{ $author4 }}</span>
                      </div>
                  </div>
              </div>
              <div class="col-span-1 md:col-span-2">
                  <h2 class="font-extrabold uppercase">Advisor</h2>
                  <p class="text-sm font-semibold text-gray-600">{{ $advisor }}</p>
              </div>
              <div class="col-span-1 md:col-span-2">
                  <h2 class="font-extrabold uppercase">Defense panel chair</h2>
                  <p class="text-sm font-semibold text-gray-600">{{ $panel_chair }}</p>
              </div>
              <div class="col-span-2">
                  <h2 class="font-extrabold uppercase">Defense panel member</h2>
                  <div class="grid grid-cols-2 gap-2 lg:gap-0">
                      <div class="col-span-1 gap-1 lg:col-span-2">
                          <span class="font-semibold text-gray-600">{{ $panel_member1 }}</span>
                      </div>
                      <div class="col-span-1 gap-1 lg:col-span-2">
                          <span class="font-semibold text-gray-600">{{ $panel_member2 }}</span>
                      </div>
                  </div>
                  <div class="grid grid-cols-2 gap-2 lg:gap-0">
                      <div class="col-span-1 gap-1 lg:col-span-2">
                          <span class="font-semibold text-gray-600">{{ $panel_member3 }}</span>
                      </div>
                      <div class="col-span-1 gap-1 lg:col-span-2">
                          <span class="font-semibold text-gray-600">{{ $panel_member4 }}</span>
                      </div>
                  </div>
              </div>
              <div class="col-span-2 flex flex-col gap-1">
                  <h2 class="font-extrabold uppercase">Upload your file
                      here</h2>
                  <div wire:click='uploadPdfFileBox'
                      class="w-full rounded-lg bg-primary-color px-1 py-2 text-center text-white hover:cursor-pointer">
                      Upload
                  </div>
                  @error('user_upload')
                      <small class="text-red-500">{{ $message }}</small>
                  @enderror
                  {{-- <label for="uploadFile"
                                            class="w-full rounded-lg bg-primary-color px-1 py-2 text-center text-white hover:cursor-pointer">Upload
                                            <input type="file" wire:model.live="user_upload" id="uploadFile"
                                                class="" hidden accept="application/pdf">
                                        </label>
                                        <small class="text-gray-600">Please be guided, the required file should be in
                                            PDF format.</small>
                                        <div>
                                            @error('user_upload')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div> --}}
              </div>
          </div>
      </div>
  </section>
