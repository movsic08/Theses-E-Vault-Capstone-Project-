  <div
      class="flex min-h-[26.5rem] w-full flex-col gap-0 rounded-b-lg bg-white p-4 px-6 py-4 text-gray-600 drop-shadow-lg md:gap-4 lg:h-[30rem]">
      @php
          $user = auth()->user();
          $areTheyEmpty = empty($user->first_name) || empty($user->last_name) || empty($user->address) || empty($user->phone_no);
      @endphp

      @if ($areTheyEmpty)
          <div class="container flex h-full w-full flex-col items-center justify-center text-center">
              <img class="mt-8 h-[12rem] md:-mt-3" src="{{ asset('assets\svgs\IncompleteInfoIco.svg') }}"
                  alt="incomplete details ico">

              <p class="mt-4">Your account information is incomplete. Please complete the required information <a
                      href="{{ route('edit-profile', 'tab1') }}" wire:navigate
                      class="font-bold text-primary-color underline">here</a> and to proceed with the account
                  verification
                  process. Once verified, you will be able to upload files</p>
          </div>
      @else
          @if ($user->is_verified == false)
              <section class="container flex h-full w-full flex-col items-center justify-center text-center">
                  <img class="mt-8 h-[14rem] md:-mt-3" src="{{ asset('assets\svgs\verifyAccount.svg') }}"
                      alt="incomplete details ico">
                  <p>You have filled in the required information but have not yet been verified. Please proceed to
                      verify your account. You can click <a href="{{ route('edit-profile', 'tab3') }}" wire:navigate
                          class="font-bold text-primary-color underline">here.</a></p>
              </section>
          @else
              @if (count($docu_posts) > 0)
                  <section class="flex h-full flex-col gap-2">
                      <div class="flex w-full items-end justify-between">
                          <div>
                              <div wire:loading wire:target='viewDocuPost, edit, deletePost'
                                  class="inline-block h-6 w-6 animate-spin rounded-full border-4 border-solid border-primary-color border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                                  role="status">
                              </div>
                          </div>
                          <a class="flex w-fit flex-row items-center justify-center gap-1 rounded-md bg-blue-600 px-2 py-1 text-white duration-200 ease-out hover:bg-blue-700"
                              wire:navigate href="{{ route('user-upload-document-form') }}">Add new
                              <svg class="h-5" viewBox="0 0 28 28" fill="none">
                                  <path
                                      d="M14 2.625C7.728 2.625 2.625 7.728 2.625 14C2.625 20.272 7.728 25.375 14 25.375C20.272 25.375 25.375 20.272 25.375 14C25.375 7.728 20.272 2.625 14 2.625ZM18.375 14.875H14.875V18.375C14.875 18.6071 14.7828 18.8296 14.6187 18.9937C14.4546 19.1578 14.2321 19.25 14 19.25C13.7679 19.25 13.5454 19.1578 13.3813 18.9937C13.2172 18.8296 13.125 18.6071 13.125 18.375V14.875H9.625C9.39294 14.875 9.17038 14.7828 9.00628 14.6187C8.84219 14.4546 8.75 14.2321 8.75 14C8.75 13.7679 8.84219 13.5454 9.00628 13.3813C9.17038 13.2172 9.39294 13.125 9.625 13.125H13.125V9.625C13.125 9.39294 13.2172 9.17038 13.3813 9.00628C13.5454 8.84219 13.7679 8.75 14 8.75C14.2321 8.75 14.4546 8.84219 14.6187 9.00628C14.7828 9.17038 14.875 9.39294 14.875 9.625V13.125H18.375C18.6071 13.125 18.8296 13.2172 18.9937 13.3813C19.1578 13.5454 19.25 13.7679 19.25 14C19.25 14.2321 19.1578 14.4546 18.9937 14.6187C18.8296 14.7828 18.6071 14.875 18.375 14.875Z"
                                      fill="white" />
                              </svg>
                          </a>
                      </div>
                      <div class="flex h-full flex-col justify-between">
                          <div class="overflow-x-auto">
                              <table class="min-w-full">
                                  <thead>
                                      <tr class="my-2 font-semibold text-gray-800">
                                          <th scope="col" class="text-start">Title</th>
                                          <th scope="col" class="text-center">Date Uploaded</th>
                                          <th scope="col" class="text-center">Status</th>
                                          <th scope="col" class="">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody class="text-sm">
                                      @foreach ($docu_posts as $docuPost)
                                          <tr class="">
                                              <td scope="col" class="w-2/5 overflow-ellipsis py-2 font-semibold">
                                                  {{ $docuPost->title }}
                                              </td>
                                              <td scope="col" class="py-2 text-center">
                                                  {{ \Carbon\Carbon::parse($docuPost->created_at)->format('d M Y') }}
                                              </td>
                                              <td scope="col" class="whitespace-normal py-2">
                                                  <div
                                                      class="@if ($docuPost->status == 0) bg-yellow-500
                                                      @elseif ($docuPost->status == 1) bg-green-500
                                                      @elseif ($docuPost->status == 2) bg-orange-500
                                                      @elseif ($docuPost->status == 3) bg-red-500
                                                      @elseif ($docuPost->status == 4) bg-gray-500
                                                      @else bg-gray-500 @endif flex w-full items-center justify-center rounded-md px-2 py-1 text-center text-sm font-medium uppercase text-white">
                                                      @if ($docuPost->status == 0)
                                                          pending
                                                      @elseif ($docuPost->status == 1)
                                                          approved
                                                      @elseif ($docuPost->status == 2)
                                                          Disapproved
                                                      @elseif ($docuPost->status == 3)
                                                          For revision
                                                      @elseif ($docuPost->status == 4)
                                                          Out of span
                                                      @endif
                                                  </div>
                                              </td>
                                              <td scope="col" class="py-2 text-center">
                                                  <div
                                                      class="flex flex-col items-center justify-center gap-1 md:flex-row">
                                                      <svg wire:click='viewDocuPost({{ $docuPost->id }})'
                                                          class="h-7 cursor-pointer rounded-md bg-primary-color p-1 text-white duration-200 ease-in-out hover:bg-blue-900"
                                                          fill="currentColor" viewBox="0 0 24 24"
                                                          xmlns="http://www.w3.org/2000/svg">
                                                          <path d="M15 11.64a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                                          <path
                                                              d="M2.4 11.64S6 5.04 12 5.04s9.6 6.6 9.6 6.6-3.6 6.6-9.6 6.6-9.6-6.6-9.6-6.6Zm9.6 4.2a4.2 4.2 0 1 0 0-8.4 4.2 4.2 0 0 0 0 8.4Z">
                                                          </path>
                                                      </svg>
                                                      <div wire:click='edit({{ $docuPost->id }})'
                                                          class="cursor-pointer rounded-md bg-blue-600 p-1 text-white duration-200 ease-in-out hover:bg-blue-800">
                                                          <svg class="h-5" fill="currentColor" viewBox="0 0 24 24"
                                                              xmlns="http://www.w3.org/2000/svg">
                                                              <path
                                                                  d="M18.067 2.182a.625.625 0 0 0-.884 0l-2.058 2.059 4.634 4.634 2.058-2.058a.623.623 0 0 0 0-.885l-3.75-3.75Zm.808 7.576L14.24 5.125 6.116 13.25h.259a.625.625 0 0 1 .625.624v.625h.625a.625.625 0 0 1 .625.625v.625h.625a.625.625 0 0 1 .625.626V17h.625a.625.625 0 0 1 .625.625v.258l8.125-8.125ZM9.54 19.093a.625.625 0 0 1-.04-.218v-.625h-.625a.625.625 0 0 1-.625-.625V17h-.625A.625.625 0 0 1 7 16.375v-.626h-.625a.625.625 0 0 1-.625-.625V14.5h-.625a.624.624 0 0 1-.219-.04l-.224.223a.625.625 0 0 0-.137.21l-2.5 6.25a.625.625 0 0 0 .812.813l6.25-2.5a.625.625 0 0 0 .21-.138l.223-.223Z">
                                                              </path>
                                                          </svg>
                                                      </div>
                                                      <div wire:click="deletePost('{{ $docuPost->id }}',' {{ $docuPost->title }}', '{{ $docuPost->user_id }}' )"
                                                          class="cursor-pointer rounded-md bg-red-600 p-1 duration-100 ease-in-out hover:bg-red-800">
                                                          <svg class="h-5" viewBox="0 0 23 23" fill="none">
                                                              <path
                                                                  d="M20.1049 4.3125H15.0938V2.15625C15.0938 1.96563 15.018 1.78281 14.8832 1.64802C14.7484 1.51323 14.5656 1.4375 14.375 1.4375H8.625C8.43438 1.4375 8.25156 1.51323 8.11677 1.64802C7.98198 1.78281 7.90625 1.96563 7.90625 2.15625V4.3125H2.89512L2.875 6.10938H4.35754L5.26029 20.2151C5.28318 20.5797 5.44403 20.9219 5.71015 21.1722C5.97626 21.4224 6.32769 21.562 6.693 21.5625H16.307C16.6722 21.5623 17.0236 21.4231 17.2898 21.1732C17.5561 20.9233 17.7173 20.5814 17.7407 20.217L18.6425 6.10938H20.125L20.1049 4.3125ZM7.90625 18.6875L7.50183 7.1875H8.98438L9.38879 18.6875H7.90625ZM12.2188 18.6875H10.7812V7.1875H12.2188V18.6875ZM13.2969 4.3125H9.70312V3.05421C9.70338 3.00659 9.72247 2.96101 9.75623 2.92743C9.78999 2.89385 9.83567 2.875 9.88329 2.875H13.1167C13.1645 2.875 13.2103 2.89398 13.2441 2.92777C13.2779 2.96156 13.2969 3.00738 13.2969 3.05517V4.3125ZM15.0938 18.6875H13.6112L14.0156 7.1875H15.4982L15.0938 18.6875Z"
                                                                  fill="white" />
                                                          </svg>
                                                      </div>
                                                  </div>
                                              </td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                          <div class="mt-4 flex items-center justify-center">
                              {{ $docu_posts->links() }}
                          </div>
                      </div>

                  </section>
              @else
                  <div class="container flex h-full w-full flex-col items-center justify-center text-center">
                      <div class="flex h-36 w-36 items-center justify-center rounded-full bg-gray-200">
                          <svg xmlns="http://www.w3.org/2000/svg" height="80" viewBox="0 0 113 113" fill="none">
                              <path
                                  d="M4.30044 42.0087L10.5201 92.8941C10.6953 94.3772 11.4089 95.7444 12.5255 96.736C13.6421 97.7277 15.084 98.2749 16.5774 98.2737H96.4308C97.9249 98.2748 99.3674 97.7269 100.484 96.7343C101.601 95.7417 102.314 94.3734 102.488 92.8895L108.698 42.0087C108.742 41.6427 108.708 41.2716 108.598 40.9198C108.488 40.568 108.305 40.2436 108.06 39.9681C107.815 39.6926 107.514 39.4721 107.178 39.3214C106.842 39.1707 106.477 39.0931 106.108 39.0938H6.89507C6.52614 39.0933 6.16129 39.1709 5.82451 39.3215C5.48774 39.4722 5.18667 39.6924 4.94113 39.9678C4.6956 40.2431 4.51114 40.5673 4.39991 40.9191C4.28869 41.2709 4.25784 41.6422 4.30044 42.0087Z"
                                  fill="#C7C7C7" />
                              <path
                                  d="M101.755 27.7823C101.755 26.166 101.113 24.6158 99.9696 23.4729C98.8267 22.33 97.2766 21.6879 95.6602 21.6879H54.0718L43.6283 14.7256H17.3339C15.7183 14.7268 14.1694 15.3694 13.0275 16.5122C11.8856 17.655 11.2441 19.2044 11.2441 20.82V32.1314H101.755V27.7777V27.7823Z"
                                  fill="#C7C7C7" />
                          </svg>
                      </div>
                      <p class="my-2">Currently, no documents have been uploaded. If you have research works to
                          share, kindly
                          consider uploading a new file below.</p>
                      <a href="{{ route('user-upload-document-form') }}"
                          class="rounded-lg bg-blue-800 px-3 py-2 text-sm text-white duration-200 ease-in-out hover:bg-primary-color">UPLOAD
                          FILE</a>
                  </div>
              @endif
          @endif
      @endif
  </div>
