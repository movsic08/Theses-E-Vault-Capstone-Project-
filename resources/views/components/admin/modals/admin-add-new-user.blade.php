  <div x-data="{ showDocu: true }" x-show="showDocu" x-on:open-docu.window = "showDocu = true"
      x-on:close-docu.window = "showDocu = false" x-on:keydown.escape.window = "showDocu = false; $wire.cancelEdit()"
      x-transition:enter.duration.400ms x-transition:leave.duration.300ms style="display: none"
      class="absolute z-40 flex h-screen w-screen items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm">
      <section class="mt-[5rem] h-fit w-fit rounded-lg bg-white p-2 drop-shadow-xl" {{-- class="{{ $completeInfo ? 'w-fit' : 'lg:w-[25rem]' }} mt-[5rem] h-fit rounded-lg bg-white p-2 drop-shadow-xl" --}}>
          <div class="relative flex items-center justify-center">
              <h2 class="text-sm font-semibold text-gray-800 md:text-lg">Add new user</h2>
              <svg wire:click='showAddUserBox' class="absolute right-0 top-1 h-4 cursor-pointer text-red-500 md:h-6"
                  fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path
                      d="M22 12a10 10 0 1 1-20 0 10 10 0 0 1 20 0ZM8.693 7.808a.626.626 0 1 0-.885.885L11.116 12l-3.308 3.307a.626.626 0 1 0 .885.885L12 12.884l3.307 3.308a.627.627 0 0 0 .885-.885L12.884 12l3.308-3.307a.627.627 0 0 0-.885-.885L12 11.116 8.693 7.808Z">
                  </path>
              </svg>
          </div>
          <form wire:submit.prevent='addNewUser'>
              <div class="px-2">
                  <x-label-input for='useLevel'>User level:</x-label-input>
                  <select wire:model.live='userLevel'
                      class="block h-9 w-full rounded-md border border-gray-300 bg-white px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                      id="userLevel">
                      <option value="user">User</option>
                      <option value="admin">Admin</option>
                      <option value="superAdmin">Super admin</option>
                  </select>
              </div>
              <div>
                  <div class="flex flex-col gap-2 md:flex-row">
                      <div class="w-full p-2">
                          <div class="flex flex-col gap-1">
                              <x-label-input for='username'>Username</x-label-input>
                              <x-input-field class="w-full" id="username" wire:model.live='usernameInput'
                                  type='text' />
                              @error('usernameInput')
                                  <span class="w-full text-xs text-red-700">
                                      {{ $message }}
                                  </span>
                              @enderror
                          </div>
                          <div class="mt-2 flex flex-col gap-1">
                              <x-label-input for='emailInp'>Email</x-label-input>
                              <x-input-field class="w-full" id="emailInp" type='email'
                                  wire:model.live='emailInput' />
                              @error('emailInput')
                                  <span class="w-full text-xs text-red-700">
                                      {{ $message }}
                                  </span>
                              @enderror
                          </div>
                          <div class="mt-2 flex flex-col gap-1">
                              <x-label-input for='password'>Password</x-label-input>
                              <x-input-field class="w-full" id="password" type='password' wire:model.live='password'
                                  name='password' />
                              @error('password')
                                  <span class="w-full text-xs text-red-700">
                                      {{ $message }}
                                  </span>
                              @enderror
                          </div>
                          <div class="mt-2 flex flex-col gap-1">
                              <x-label-input for='password_confirmation'>Confirm password</x-label-input>
                              <x-input-field class="w-full" id="password_confirmation" type='password'
                                  wire:model.live='password_confirmation' />
                              @error('password_confirmation')
                                  <span class="w-full text-xs text-red-700">
                                      {{ $message }}
                                  </span>
                              @enderror
                          </div>
                          @if ($userLevel == 'user')
                              <div class="mt-2 flex flex-col gap-1">
                                  <x-label-input for='accRole'>Account role</x-label-input>
                                  <select wire:model.live='accRole' id="account-role"
                                      class="block h-9 w-full rounded-md border border-gray-300 bg-white px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                      <option value="1">Student</option>
                                      <option value="2">Faculty Member</option>
                                  </select>
                                  @error('role_id')
                                      <span class="w-full text-xs text-red-700">
                                          {{ $message }}
                                      </span>
                                  @enderror
                              </div>
                          @endif
                          <div class="mt-2">
                              <x-label-input for='completeInfo'>Complete user information </x-label-input>
                              <input type="checkbox" wire:model.live='completeInfo' id="completeInfo">
                          </div>
                          @if (!$completeInfo)
                              <div class="flex w-full items-center justify-end">
                                  <input
                                      class="cursor-pointer rounded-md bg-blue-950 p-2 font-medium text-white duration-200 hover:bg-blue-800"
                                      type="submit" value="Create">
                              </div>
                          @endif
                      </div>
                      @if ($completeInfo)
                          <div class="flex w-full flex-col p-2">
                              <div class="flex flex-row gap-2">
                                  <div class="flex flex-col gap-1">
                                      <x-label-input for='firstName'>First name</x-label-input>
                                      <x-input-field class="w-full" id="firstName" wire:model.live='fnameInput'
                                          type='text' />
                                      @error('fnameInput')
                                          <span class="w-full text-xs text-red-700">
                                              {{ $message }}
                                          </span>
                                      @enderror
                                  </div>
                                  <div class="flex flex-col gap-1">
                                      <x-label-input for='lastName'>Last name</x-label-input>
                                      <x-input-field class="w-full" id="lastName" wire:model.live='lnameInput'
                                          type='text' />
                                      @error('lnameInput')
                                          <span class="w-full text-xs text-red-700">
                                              {{ $message }}
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="mt-2 flex w-full flex-col gap-1">
                                  <x-label-input for='phoneNumber'>Phone number</x-label-input>
                                  <x-input-field class="w-full" id="phoneNumber" wire:model.live='phoneNum'
                                      type='text' />
                                  @error('phoneNum')
                                      <span class="w-full text-xs text-red-700">
                                          {{ $message }}
                                      </span>
                                  @enderror
                              </div>
                              <div class="mt-2 flex flex-col gap-1">
                                  <x-label-input for='id-user'>{{ $accRole == '1' ? 'Student' : 'Faculty' }}
                                      ID</x-label-input>
                                  <x-input-field class="w-full" id="id-user" wire:model.live='idNumber'
                                      type='text' />
                                  @error('idNumber')
                                      <span class="w-full text-xs text-red-700">
                                          {{ $message }}
                                      </span>
                                  @enderror
                              </div>
                              <div class="mt-2 flex w-full flex-col gap-1">
                                  <x-label-input for='degreeCourse'>Bachelor Degree</x-label-input>
                                  <select wire:model.live='degreeName'
                                      class="block h-9 w-full rounded-md border border-gray-300 bg-white px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                      id="userLevel">
                                      <option selected value="a">Select degree course</option>
                                      @foreach ($degreeLists as $degreeListsItem)
                                          <option class="w-full" value="{{ $degreeListsItem->id }}">
                                              {{ $degreeListsItem->name }}</option>
                                      @endforeach
                                  </select>
                                  @error('degreeName')
                                      <span class="w-full text-xs text-red-700">
                                          {{ $message }}
                                      </span>
                                  @enderror
                              </div>
                              <div class="mt-2 flex flex-col gap-1">
                                  <x-label-input for='address'>Address</x-label-input>
                                  <x-input-field class="w-full" id="address" wire:model.live='addressInput'
                                      type='text' />
                                  @error('addressInput')
                                      <span class="w-full text-xs text-red-700">
                                          {{ $message }}
                                      </span>
                                  @enderror
                              </div>

                              <div class="mt-2 flex w-full items-center justify-end">
                                  <x-submit-button type='submit' value='Create' class="" />
                              </div>
                          </div>
                      @endif
                  </div>

              </div>
          </form>
      </section>
  </div>
