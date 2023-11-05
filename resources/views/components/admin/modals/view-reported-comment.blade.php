  <div class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm lg:items-start"
      x-data="{ show: false }" x-show="show" x-on:open-box.window = "show = true" x-on:close-box.window = "show = false"
      x-on:keydown.window.escape="show = false; $wire.closeBox()" x-transition:enter.duration.400ms
      x-transition:leave.duration.300ms style="display: none">
      <div class="mx-auto md:flex md:items-center lg:justify-center">
          <section
              class="h-fit w-[20rem] rounded-lg bg-slate-50 px-6 py-4 drop-shadow-xl md:w-[35rem] lg:mt-32 2xl:w-big">
              <strong
                  class="flex w-full items-center justify-center text-primary-color">{{ $resolving ? 'Resolving' : 'Viewing' }}
                  reported
                  comment</strong>
              @if (isset($currentData))
                  <div class="my-4">
                      <div class="hehe rounded-xl bg-white px-4 py-2 drop-shadow-md" wire:poll.10s="$refresh">
                          <div class="flex w-full">
                              @php
                                  $currentComment = \App\Models\DocuPostComment::where('id', $currentData->reported_comment_id)->first();
                                  if ($currentComment) {
                                      $currentUser = \App\Models\User::where('id', $currentComment->user_id)->first();
                                      if ($currentUser) {
                                          $profileLink = $currentUser->profile_picture;
                                          $commentorName = $currentUser->first_name . ' ' . $currentUser->last_name;
                                          $role = $currentUser->role_id == 1 ? 'Student' : 'Faculty';
                                          $bachelorDegree = \App\Models\BachelorDegree::where('name', $currentUser->bachelor_degree)->first();
                                          if ($bachelorDegree) {
                                              $course = $bachelorDegree->degree_name;
                                          } else {
                                              $course = '';
                                          }
                                      } else {
                                          $profileLink = null;
                                          $commentorName = 'User';
                                          $role = '';
                                      }
                                  } else {
                                      $profileLink = null;
                                      $commentorName = 'User';
                                      $role = '';
                                  }
                              @endphp
                              <img src="{{ $profileLink == null ? asset('assets/default_profile.png') : asset('storage/' . $profileLink) }}"
                                  class="mr-2 h-8 w-8 rounded-full object-cover" alt="user profile" srcset="">
                              <div class="w-full">
                                  <div class="flex w-full flex-col leading-tight">
                                      <div class="flex w-full justify-between">
                                          <strong>{{ $commentorName }}</strong>
                                          <span class="font-medium">{{ $role }}</span>
                                      </div>
                                      <div class="flex gap-2">
                                          <small>{{ \Carbon\Carbon::parse($currentComment->created_at)->diffForHumans() }}</small>
                                          <small>{{ $course }}</small>
                                      </div>

                                  </div>
                                  <div class="my-2 w-full rounded-md py-1">
                                      <p class="">{{ $currentComment->comment_content }}</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  @if ($resolving)
                      <div class="mb-2 flex items-center">
                          <x-label-input for="status">Status</x-label-input>
                          <select id="status" wire:model.live='updateStatus'
                              class="ml-2 w-fit rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm capitalize text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                              <option value="0" selected>pending</option>
                              <option value="1">Remove comment</option>
                          </select>
                      </div>
                  @endif
              @endif
              <div class="flex w-full flex-col items-center gap-2 font-bold md:flex-row md:justify-end">
                  <div wire:loading wire:target='closeBox, showResolving'
                      class="h-4 w-4 animate-spin rounded-full border-4 border-solid border-primary-color border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                      role="status">
                      <span
                          class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                  </div>
                  <button wire:click='closeBox'
                      class="w-full rounded-md border border-red-500 bg-white p-2 text-red-500 duration-500 ease-in-out hover:bg-red-800 hover:text-white md:w-[6rem]">Close</button>
                  @if ($resolving)
                      <button
                          class="w-full rounded-md bg-blue-500 p-2 text-white duration-500 ease-in-out hover:bg-blue-800 md:w-[6rem]">Save</button>
                  @else
                      <button wire:click='showResolving'
                          class="w-full rounded-md bg-yellow-500 p-2 text-white duration-500 ease-in-out hover:bg-yellow-800 md:w-[6rem]">Resolve</button>
                  @endif
              </div>
          </section>
      </div>
  </div>
