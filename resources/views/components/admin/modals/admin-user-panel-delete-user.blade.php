  <div class="absolute right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm lg:items-start"
      x-data="{ deleteUserBox: false }" x-show="deleteUserBox" x-on:open-del.window = "deleteUserBox = true"
      x-on:close-del.window = "deleteUserBox = false" x-on:keydown.escape.window = "deleteUserBox = false"
      x-transition:enter.duration.400ms x-transition:leave.duration.300ms style="display: none">
      <div class="mx-auto">
          <section class="mt-32 h-fit w-fit rounded-lg bg-white px-6 py-4 drop-shadow-xl">
              @if (!empty($selectedUser))
                  <strong class="text-red-500">Are you sure you want to delete this account?</strong>
                  <div>
                      <div class="my-2 flex items-center justify-center gap-2 whitespace-nowrap">
                          <img class="min-h-[3rem] w-[3rem] rounded-full object-cover"
                              src="{{ !empty($selectedUser->profile_picture)
                                  ? asset('storage/' . $selectedUser->profile_picture)
                                  : asset('assets/default_profile.png') }}"
                              alt="profile_pciture">
                      </div>
                  </div>
                  <div class="mx-3">
                      <strong>Full name</strong>
                      @if ($selectedUser->first_name == null && $selectedUser->last_name == null)
                          <span>No info</span>
                      @else
                          <span>{{ $selectedUser->first_name . ' ' . $selectedUser->last_name }}</span>
                      @endif
                  </div>
                  <div class="mx-3">
                      <strong>Usernme</strong>
                      <span>{{ $selectedUser->username }}</span>
                  </div>
                  <div class="mx-3">
                      <strong>Email</strong>
                      <span>{{ $selectedUser->email }}</span>
                  </div>
                  <div class="-pb-4 mt-2 flex w-full flex-col gap-2 md:flex-row">
                      <button
                          class="w-full cursor-pointer rounded-lg border-2 border-red-500 p-1 font-semibold text-red-500 duration-500 ease-in-out hover:border-red-800"
                          x-on:click='deleteUserBox = false'>Close</button>
                      <button wire:click='deleteUser({{ $selectedUser->id }})'
                          class="w-full cursor-pointer rounded-lg bg-red-500 p-1 font-semibold text-white duration-500 ease-in-out hover:bg-red-800">Delete</button>
                  </div>
              @endif
          </section>
      </div>
  </div>
