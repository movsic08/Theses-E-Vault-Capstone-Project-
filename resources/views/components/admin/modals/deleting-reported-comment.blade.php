  <div class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm lg:items-start"
      x-data="{ del: false }" x-show="del" x-on:open-rem.window = "del = true" x-on:close-rem.window = "del = false"
      x-on:keydown.window.escape="del = false; $wire.closeDel()" x-transition:enter.duration.400ms
      x-transition:leave.duration.300ms style="display: none">
      <div class="mx-auto md:flex md:items-center lg:justify-center">
          <section class="h-fit w-[20rem] rounded-lg bg-white drop-shadow-xl md:w-[28rem] lg:mt-32">
              <strong class="flex w-full items-center justify-center rounded-t-lg bg-red-700 p-2 text-white md:p-3">Are
                  you
                  sure you
                  want to
                  delete this report?</strong>
              @if ($delData != null)
                  @php
                      $showFullCommentData = \App\Models\DocuPostComment::find($delData->reported_comment_id);
                      $getUserData = \App\Models\User::find($delData->reporter_user_id);

                      $fullCommentIs = $showFullCommentData->comment_content ?? 'Not found, try contacting devs.';
                      $reportProfilePictureLink = $getUserData->profile_picture ?? 'null';
                      $reporterFullName = $getUserData->first_name . ' ' . $getUserData->last_name ?? 'User';

                  @endphp
                  <div class="px-6 py-4">
                      <div class="mb-3">
                          <x-label-input>Reported Comment:</x-label-input>
                          <p
                              class="mb-2 mt-1 rounded-lg bg-slate-50 p-2 text-sm font-medium text-primary-color drop-shadow-lg">
                              {{ $fullCommentIs }}
                          </p>
                      </div>
                      <div class="mb-3">
                          <x-label-input>Reported by:</x-label-input>
                          <span class="mb-2 mt-1 flex gap-2">
                              <img class="h-5 w-5 rounded-full object-cover"
                                  src="{{ $reportProfilePictureLink == null ? asset('assets/default_profile.png') : asset('storage/' . $reportProfilePictureLink) }}"
                                  alt="profile" srcset="">
                              <span class="text-sm md:text-base">{{ $reporterFullName }}</span>
                          </span>
                      </div>
                      <div class="mb-2">
                          <x-label-input>Report cetegory:</x-label-input>
                          <p class="mb-2 mt-1 rounded-lg bg-orange-100 p-2 font-bold capitalize text-orange-600">
                              {{ $delData->report_title }}
                          </p>
                      </div>
                      @if ($delData->report_title == 'other')
                          <div class="mb-2">
                              <x-label-input>Other details by reporter:</x-label-input>
                              <p class="mb-2 mt-1 rounded-lg bg-blue-100 p-2 text-sm text-blue-600">
                                  {{ $delData->report_other_context }}
                              </p>
                          </div>
                      @endif
                      <div class="flex w-full flex-col items-center gap-2 font-bold md:flex-row md:justify-end">
                          <div wire:loading wire:target='closeDel, confirmDelete'
                              class="h-4 w-4 animate-spin rounded-full border-4 border-solid border-primary-color border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                              role="status">
                              <span
                                  class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                          </div>
                          <button wire:click=''
                              class="w-full rounded-md border border-blue-500 bg-white p-2 text-blue-500 duration-500 ease-in-out hover:bg-blue-800 hover:text-white md:w-[6rem]">Close</button>
                          <button wire:click='confirmDelete({{ $delData->id }})'
                              class="w-full rounded-md bg-red-500 p-2 text-white duration-500 ease-in-out hover:bg-red-800 md:w-[6rem]">Delete</button>
                      </div>
                  </div>
              @endif
          </section>
      </div>
  </div>
