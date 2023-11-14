  <div x-data="{ showDocu: false }" x-show="showDocu" x-on:open-docu.window = "showDocu = true"
      x-on:close-docu.window = "showDocu = false" x-on:keydown.escape.window = "showDocu = false; $wire.cancelEdit()"
      x-transition:enter.duration.400ms x-transition:leave.duration.300ms
      class="fixed inset-0 z-40 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm"
      style="display: none">
      @if (isset($dataItem))
          <section
              class="custom-scrollbar relative mt-[3rem] h-[90%] w-fit overflow-y-auto rounded-lg bg-white drop-shadow-xl md:w-[50%] lg:w-[40%]">
              <div
                  class="sticky right-0 top-0 z-20 -mt-4 flex w-full items-center justify-center bg-white bg-opacity-50 py-1 backdrop-blur-xl">
                  <div class="flex items-center justify-center">
                      <x-label-input for='' class="mr-1">Status</x-label-input>
                      @if ($editing)
                          <select id="program" wire:model.live='updating_status'
                              class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                              <option value="0">Pending</option>
                              <option value="1">Approved</option>
                              <option value="2">Disapproved</option>
                              <option value="3">Revision needed</option>
                              <option value="4">Out of span</option>
                          </select>
                      @else
                          <h2 class="my-1 w-fit rounded-md border p-1 text-center">
                              @if ($dataItem->status == 0)
                                  Pending
                              @elseif($dataItem->status == 1)
                                  Approved
                              @elseif($dataItem->status == 2)
                                  For revision
                              @elseif($dataItem->status == 3)
                                  Outof span
                              @elseif($dataItem->status == 4)
                                  Deleted by admin
                              @else
                                  Can't define status, Error
                              @endif
                              approved
                          </h2>
                      @endif
                  </div>
              </div>

              <div class="relative w-full px-10 pb-8 pt-5 text-gray-800">
                  <div wire:loading.delay wire:target="saveEdit"
                      class="fixed inset-0 right-0 top-0 z-50 flex h-full w-full items-center justify-center bg-gray-300 bg-opacity-50">
                      <div class="absolute inset-0 flex items-center justify-center">
                          <div class="mx-auto w-fit rounded-lg bg-white text-center text-gray-600 drop-shadow-lg">
                              <div class="rounded-t-xl bg-primary-color p-8 px-10 py-3 font-semibold text-white">
                                  <h1>Processing</h1>
                              </div>
                              <div class="flex flex-col gap-2 px-10 pb-8 pt-3">
                                  <img class="h-10" src="{{ asset('icons/logo.svg') }}" alt="Icon Description">
                                  <h3 class="text-xs md:text-base">Uploading is on the process, please wait.</h3>
                                  <div class="flex flex-col items-center justify-center gap-2">
                                      <div class="h-8 w-8 animate-spin rounded-md border-4 border-t-4 border-blue-500">
                                      </div>
                                      <div class="h-2.5 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                                          <div id="progress-bar"
                                              class="h-2.5 animate-pulse rounded-full bg-primary-color"
                                              style="width: 100%"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <section class="flex flex-col gap-1">
                      @if ($editing)
                          <x-label-input for='tite' class="mr-1">Title</x-label-input>
                          <textarea
                              class="w-full resize-none rounded-md border border-gray-400 p-2 text-sm focus:outline-blue-950 md:resize-y lg:resize-none"
                              wire:model.live='updating_title' rows="3" id="title"></textarea>
                          @error('updating_title')
                              <small class="text-red-500">{{ $message }}</small>
                          @enderror
                      @else
                          <span class="flex-grow text-[1.2rem] font-bold">
                              {{ $dataItem->title }}
                          </span>
                      @endif
                      {{-- {{ $editing_course }} --}}
                      @if ($editing)
                          {{-- <strong>{{ $editing_course }}</strong> --}}
                          <x-label-input for='tite' class="mr-1">Course</x-label-input>
                          <select id="program" wire:model.live='updating_course'
                              class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                              @foreach ($degreeLists as $degreeListsItem)
                                  <option value="{{ $degreeListsItem->name }}" {{-- @if ($updating_course == $degreeListsItem->name) selected @endif --}}>
                                      {{ $degreeListsItem->name }}
                                  </option>
                              @endforeach
                          </select>
                      @else
                          <span class="rounded-md bg-cyan-200 px-2 py-1 font-semibold text-cyan-900">
                              {{ $dataItem->course }}
                          </span>
                      @endif
                  </section>
                  <div class="{{ $editing ? 'mt-6' : 'mt-4' }} grid grid-cols-2 gap-6">
                      <div class="{{ $editing ? 'items-start' : 'items-center' }} col-span-1 flex flex-grow">
                          <div class="w-fit rounded-md bg-slate-200 p-2">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6" viewBox="0 0 36 36" fill="none">
                                  <path
                                      d="M32.9816 29.9682L26.9167 15.2799C26.8048 15.0086 26.6148 14.7767 26.3709 14.6136C26.1271 14.4504 25.8402 14.3633 25.5468 14.3633C25.2534 14.3633 24.9665 14.4504 24.7227 14.6136C24.4788 14.7767 24.2888 15.0086 24.1769 15.2799L18.1121 29.9682C18.0278 30.1498 17.9811 30.3466 17.9748 30.5467C17.9686 30.7468 18.0029 30.946 18.0757 31.1325C18.1486 31.319 18.2584 31.4888 18.3986 31.6317C18.5387 31.7746 18.7064 31.8877 18.8914 31.9641C19.0765 32.0405 19.2751 32.0787 19.4752 32.0763C19.6754 32.0739 19.873 32.031 20.0562 31.9503C20.2394 31.8695 20.4043 31.7525 20.5411 31.6063C20.6778 31.4601 20.7836 31.2877 20.8519 31.0995L22.0882 28.1095H29.0054L30.2417 31.0995C30.316 31.2794 30.4249 31.443 30.5624 31.5807C30.6999 31.7185 30.8632 31.8279 31.0429 31.9026C31.2226 31.9772 31.4153 32.0158 31.61 32.016C31.8046 32.0162 31.9974 31.9781 32.1773 31.9038C32.3572 31.8295 32.5207 31.7205 32.6585 31.5831C32.7962 31.4456 32.9056 31.2823 32.9803 31.1026C33.055 30.9229 33.0935 30.7302 33.0937 30.5355C33.094 30.3409 33.0558 30.1481 32.9816 29.9682ZM23.3115 25.144L25.5468 19.7289L27.7821 25.144H23.3115Z"
                                      fill="#4B3D3D" />
                                  <path
                                      d="M18.7978 23.8578C19.028 23.5396 19.1226 23.143 19.0606 22.7551C18.9986 22.3672 18.7851 22.0198 18.4672 21.7892C18.4542 21.7792 17.458 21.0403 16.009 19.449C18.6813 15.8322 20.195 11.7167 20.8117 9.78038H22.9867C23.3797 9.78038 23.7567 9.62423 24.0346 9.34629C24.3126 9.06835 24.4687 8.69138 24.4687 8.29831C24.4687 7.90524 24.3126 7.52828 24.0346 7.25034C23.7567 6.9724 23.3797 6.81625 22.9867 6.81625H15.1681V5.46644C15.1681 5.27181 15.1298 5.07909 15.0553 4.89928C14.9808 4.71946 14.8716 4.55608 14.734 4.41846C14.5964 4.28084 14.433 4.17167 14.2532 4.09719C14.0734 4.02271 13.8807 3.98437 13.686 3.98438C13.4914 3.98437 13.2987 4.02271 13.1189 4.09719C12.9391 4.17167 12.7757 4.28084 12.6381 4.41846C12.5004 4.55608 12.3913 4.71946 12.3168 4.89928C12.2423 5.07909 12.204 5.27181 12.204 5.46644V6.81481H4.38685C3.99378 6.81481 3.61681 6.97096 3.33887 7.2489C3.06093 7.52684 2.90479 7.90381 2.90479 8.29688C2.90479 8.68994 3.06093 9.06691 3.33887 9.34485C3.61681 9.62279 3.99378 9.77894 4.38685 9.77894H17.678C17.0368 11.5959 15.8552 14.4623 14.054 17.0814C11.938 14.2726 11.1503 12.4556 11.1445 12.4397C10.9926 12.0772 10.7029 11.7898 10.3391 11.6409C9.97527 11.4919 9.5672 11.4936 9.20463 11.6455C8.84206 11.7975 8.5547 12.0872 8.40575 12.451C8.25681 12.8148 8.25848 13.2229 8.41041 13.5854C8.44922 13.6789 9.39079 15.8926 11.9725 19.2406L12.1565 19.4777C9.51297 22.4663 6.91829 24.3192 5.83297 24.9187C5.48794 25.107 5.23186 25.4247 5.12106 25.8019C5.01026 26.179 5.05382 26.5847 5.24216 26.9297C5.4305 27.2748 5.74818 27.5309 6.12533 27.6417C6.50248 27.7525 6.90819 27.7089 7.25322 27.5206C7.39841 27.4415 10.5278 25.7093 14.1015 21.7533C15.618 23.3777 16.6617 24.1424 16.7249 24.187C16.8826 24.3015 17.0613 24.3837 17.2507 24.429C17.4402 24.4744 17.6368 24.4819 17.8292 24.4512C18.0216 24.4205 18.206 24.3521 18.372 24.2501C18.5379 24.148 18.6821 24.0142 18.7963 23.8564L18.7978 23.8578Z"
                                      fill="#4B3D3D" />
                              </svg>
                          </div>
                          <div class="ml-2 flex flex-col gap-1">
                              @if ($editing)
                                  <x-input-field id="title" class="w-full" wire:model.live='updating_language' />
                                  @error('updating_language')
                                      <small class="text-red-500">{{ $message }}</small>
                                  @enderror
                              @else
                                  <span class="-mb-2 text-[1rem] font-medium">
                                      {{ $dataItem->language }}
                                  </span>
                              @endif
                              <span class="text-sm text-slate-700">Language</span>
                          </div>
                      </div>
                      <div class="{{ $editing ? 'items-start' : 'items-center' }} col-span-1 flex flex-grow">
                          <div class="w-fit rounded-md bg-slate-200 p-2">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6" viewBox="0 0 46 46" fill="none">
                                  <path
                                      d="M12.2189 3.83203C12.5366 3.83203 12.8413 3.95824 13.066 4.18289C13.2906 4.40755 13.4168 4.71224 13.4168 5.02995V6.22786H32.5835V5.02995C32.5835 4.71224 32.7097 4.40755 32.9344 4.18289C33.159 3.95824 33.4637 3.83203 33.7814 3.83203C34.0991 3.83203 34.4038 3.95824 34.6285 4.18289C34.8531 4.40755 34.9793 4.71224 34.9793 5.02995V6.22786H37.3752C38.646 6.22786 39.8648 6.7327 40.7634 7.63131C41.662 8.52992 42.1668 9.7487 42.1668 11.0195V37.3737C42.1668 38.6445 41.662 39.8633 40.7634 40.7619C39.8648 41.6605 38.646 42.1654 37.3752 42.1654H8.62516C7.35433 42.1654 6.13555 41.6605 5.23694 40.7619C4.33833 39.8633 3.8335 38.6445 3.8335 37.3737V11.0195C3.8335 9.7487 4.33833 8.52992 5.23694 7.63131C6.13555 6.7327 7.35433 6.22786 8.62516 6.22786H11.021V5.02995C11.021 4.71224 11.1472 4.40755 11.3719 4.18289C11.5965 3.95824 11.9012 3.83203 12.2189 3.83203ZM8.62516 12.2174V14.6133C8.62516 15.2745 9.20975 15.8112 9.93041 15.8112H36.0718C36.7906 15.8112 37.3771 15.2745 37.3771 14.6133V12.2174C37.3771 11.5562 36.7925 11.0195 36.068 11.0195H9.93041C9.21166 11.0195 8.62516 11.5562 8.62516 12.2174ZM24.1981 24.1966C24.1981 23.8789 24.0719 23.5742 23.8472 23.3496C23.6226 23.1249 23.3179 22.9987 23.0002 22.9987C22.6825 22.9987 22.3778 23.1249 22.1531 23.3496C21.9285 23.5742 21.8022 23.8789 21.8022 24.1966V27.7904H18.2085C17.8908 27.7904 17.5861 27.9166 17.3614 28.1412C17.1368 28.3659 17.0106 28.6706 17.0106 28.9883C17.0106 29.306 17.1368 29.6107 17.3614 29.8353C17.5861 30.06 17.8908 30.1862 18.2085 30.1862H21.8022V33.7799C21.8022 34.0977 21.9285 34.4023 22.1531 34.627C22.3778 34.8517 22.6825 34.9779 23.0002 34.9779C23.3179 34.9779 23.6226 34.8517 23.8472 34.627C24.0719 34.4023 24.1981 34.0977 24.1981 33.7799V30.1862H27.7918C28.1095 30.1862 28.4142 30.06 28.6389 29.8353C28.8635 29.6107 28.9897 29.306 28.9897 28.9883C28.9897 28.6706 28.8635 28.3659 28.6389 28.1412C28.4142 27.9166 28.1095 27.7904 27.7918 27.7904H24.1981V24.1966Z"
                                      fill="#4B3D3D" />
                              </svg>
                          </div>
                          <div class="ml-2 flex flex-col gap-1">
                              @if ($editing)
                                  <x-input-field id="title" class="w-full" disabled
                                      wire:model.live='updating_created_at' />
                                  @error('updating_created_at')
                                      <small class="text-red-500">{{ $message }}</small>
                                  @enderror
                              @else
                                  <span class="-mb-2 text-[1rem] font-medium">
                                      {{ \Carbon\Carbon::parse($dataItem->created_at)->format('M  Y') }}
                                  </span>
                              @endif
                              <span class="text-sm text-slate-700">Date created XX</span>
                          </div>
                      </div>
                      <div class="{{ $editing ? 'items-start' : 'items-center' }} col-span-1 flex flex-grow">
                          <div class="w-fit rounded-md bg-slate-200 p-2">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6" viewBox="0 0 46 46" fill="none">
                                  <path
                                      d="M24.1501 11.3509C25.6547 9.76581 28.2498 9.31347 31.3088 9.62014C34.1455 9.90764 37.0646 10.8238 39.1001 11.6748V34.4985C36.9898 33.6935 34.2548 32.9076 31.5408 32.6355C29.0242 32.3786 26.3006 32.5454 24.1501 33.7663V11.3509ZM23.0001 9.27131C20.7346 7.32397 17.4513 7.03264 14.4613 7.33164C10.9788 7.68431 7.46551 8.87839 5.27476 9.87314C5.07371 9.9644 4.90318 10.1116 4.78355 10.2972C4.66391 10.4828 4.60023 10.6988 4.6001 10.9196V36.2196C4.60006 36.4122 4.64838 36.6017 4.74063 36.7707C4.83287 36.9398 4.96609 37.0829 5.12805 37.1871C5.29002 37.2913 5.47554 37.3531 5.66761 37.3669C5.85968 37.3807 6.05215 37.3461 6.22735 37.2661C8.25518 36.3461 11.5231 35.2402 14.6913 34.9201C17.9305 34.5943 20.6483 35.1214 22.1031 36.9384C22.2109 37.0727 22.3474 37.1811 22.5026 37.2556C22.6579 37.3301 22.8279 37.3687 23.0001 37.3687C23.1723 37.3687 23.3423 37.3301 23.4975 37.2556C23.6528 37.1811 23.7893 37.0727 23.8971 36.9384C25.3538 35.1214 28.0697 34.5943 31.3088 34.9201C34.4771 35.2402 37.7488 36.3461 39.7748 37.2661C39.9499 37.3456 40.1421 37.3799 40.3339 37.3659C40.5257 37.3519 40.711 37.29 40.8727 37.1859C41.0344 37.0818 41.1674 36.9388 41.2595 36.77C41.3516 36.6012 41.4 36.412 41.4001 36.2196V10.9196C41.4001 10.6991 41.3367 10.4831 41.2174 10.2976C41.0982 10.112 40.928 9.96468 40.7273 9.87314C38.5366 8.87647 35.0233 7.68431 31.5408 7.33164C28.5508 7.03073 25.2656 7.32397 23.0001 9.27131Z"
                                      fill="#4B3D3D" />
                              </svg>
                          </div>
                          <div class="ml-2 flex flex-col gap-1">
                              @if ($editing)
                                  <x-input-field id="title" class="w-full"
                                      wire:model.live='updating_physical_description' />
                                  @error('updating_physical_description')
                                      <small class="text-red-500">{{ $message }}</small>
                                  @enderror
                              @else
                                  <span class="-mb-2 text-[1rem] font-medium">
                                      {{ $dataItem->physical_description }}
                                  </span>
                              @endif
                              <span class="text-sm text-slate-700">Physical Description</span>
                          </div>
                      </div>
                      <div class="{{ $editing ? 'items-start' : 'items-center' }} col-span-1 flex flex-grow">
                          <div class="w-fit rounded-md bg-slate-200 p-2">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6" viewBox="0 0 46 46"
                                  fill="none">
                                  <path
                                      d="M4.6001 35.8789C4.6001 36.7939 4.96358 37.6714 5.61058 38.3184C6.25758 38.9654 7.1351 39.3289 8.0501 39.3289H37.9501C38.8651 39.3289 39.7426 38.9654 40.3896 38.3184C41.0366 37.6714 41.4001 36.7939 41.4001 35.8789V19.7789C41.4001 18.8639 41.0366 17.9864 40.3896 17.3394C39.7426 16.6924 38.8651 16.3289 37.9501 16.3289H8.0501C7.1351 16.3289 6.25758 16.6924 5.61058 17.3394C4.96358 17.9864 4.6001 18.8639 4.6001 19.7789V35.8789ZM9.2001 12.8789C9.2001 13.1839 9.32126 13.4764 9.53692 13.6921C9.75259 13.9077 10.0451 14.0289 10.3501 14.0289H35.6501C35.9551 14.0289 36.2476 13.9077 36.4633 13.6921C36.6789 13.4764 36.8001 13.1839 36.8001 12.8789C36.8001 12.5739 36.6789 12.2814 36.4633 12.0657C36.2476 11.8501 35.9551 11.7289 35.6501 11.7289H10.3501C10.0451 11.7289 9.75259 11.8501 9.53692 12.0657C9.32126 12.2814 9.2001 12.5739 9.2001 12.8789ZM13.8001 8.27891C13.8001 8.58391 13.9213 8.87641 14.1369 9.09208C14.3526 9.30775 14.6451 9.42891 14.9501 9.42891H31.0501C31.3551 9.42891 31.6476 9.30775 31.8633 9.09208C32.0789 8.87641 32.2001 8.58391 32.2001 8.27891C32.2001 7.97391 32.0789 7.6814 31.8633 7.46573C31.6476 7.25007 31.3551 7.12891 31.0501 7.12891H14.9501C14.6451 7.12891 14.3526 7.25007 14.1369 7.46573C13.9213 7.6814 13.8001 7.97391 13.8001 8.27891Z"
                                      fill="#4B3D3D" />
                              </svg>
                          </div>
                          <div class="ml-2 flex flex-col gap-1">
                              @if ($editing)
                                  <x-input-field id="title" class="w-full"
                                      wire:model.live='updating_document_type' />
                                  @error('updating_document_type')
                                      <small class="text-red-500">{{ $message }}</small>
                                  @enderror
                              @else
                                  <span class="-mb-2 text-[1rem] font-medium">
                                      {{ $dataItem->document_type }}
                                  </span>
                              @endif
                              <span class="text-sm text-slate-700">Document type</span>
                          </div>
                      </div>
                      <div class="{{ $editing ? 'items-start' : 'items-center' }} col-span-1 flex flex-grow">
                          <div class="w-fit rounded-md bg-slate-200 p-2">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6" viewBox="0 0 46 46"
                                  fill="none">
                                  <path
                                      d="M12.2189 3.83203C12.5366 3.83203 12.8413 3.95824 13.066 4.18289C13.2906 4.40755 13.4168 4.71224 13.4168 5.02995V6.22786H32.5835V5.02995C32.5835 4.71224 32.7097 4.40755 32.9344 4.18289C33.159 3.95824 33.4637 3.83203 33.7814 3.83203C34.0991 3.83203 34.4038 3.95824 34.6285 4.18289C34.8531 4.40755 34.9793 4.71224 34.9793 5.02995V6.22786H37.3752C38.646 6.22786 39.8648 6.7327 40.7634 7.63131C41.662 8.52992 42.1668 9.7487 42.1668 11.0195V37.3737C42.1668 38.6445 41.662 39.8633 40.7634 40.7619C39.8648 41.6605 38.646 42.1654 37.3752 42.1654H8.62516C7.35433 42.1654 6.13555 41.6605 5.23694 40.7619C4.33833 39.8633 3.8335 38.6445 3.8335 37.3737V11.0195C3.8335 9.7487 4.33833 8.52992 5.23694 7.63131C6.13555 6.7327 7.35433 6.22786 8.62516 6.22786H11.021V5.02995C11.021 4.71224 11.1472 4.40755 11.3719 4.18289C11.5965 3.95824 11.9012 3.83203 12.2189 3.83203ZM36.0661 11.0195H9.93041C9.21166 11.0195 8.62516 11.5562 8.62516 12.2174V14.6133C8.62516 15.2745 9.20975 15.8112 9.93041 15.8112H36.0718C36.7906 15.8112 37.3771 15.2745 37.3771 14.6133V12.2174C37.3771 11.5562 36.7925 11.0195 36.068 11.0195H36.0661ZM29.8369 25.0457C29.9484 24.9343 30.0369 24.8021 30.0973 24.6565C30.1577 24.5109 30.1888 24.3549 30.1889 24.1973C30.189 24.0397 30.158 23.8836 30.0978 23.738C30.0376 23.5923 29.9492 23.46 29.8379 23.3485C29.7265 23.237 29.5942 23.1485 29.4487 23.0881C29.3031 23.0277 29.1471 22.9966 28.9895 22.9965C28.8319 22.9964 28.6758 23.0274 28.5302 23.0876C28.3845 23.1478 28.2522 23.2362 28.1407 23.3475L21.8022 29.6917L19.0576 26.9413C18.8295 26.7308 18.5288 26.6167 18.2185 26.6229C17.9081 26.6291 17.6123 26.7552 17.3928 26.9746C17.1733 27.1941 17.0473 27.49 17.041 27.8003C17.0348 28.1107 17.1489 28.4114 17.3594 28.6394L20.9532 32.2313C21.0645 32.3431 21.1968 32.4319 21.3425 32.4924C21.4882 32.553 21.6444 32.5842 21.8022 32.5842C21.96 32.5842 22.1163 32.553 22.262 32.4924C22.4077 32.4319 22.54 32.3431 22.6513 32.2313L29.8388 25.0438L29.8369 25.0457Z"
                                      fill="#4B3D3D" />
                              </svg>
                          </div>
                          <div class="ml-2 flex flex-col gap-1">
                              @if ($editing)
                                  <x-input-field id="title" class="w-full"
                                      wire:model.live='updating_date_of_approval' />
                                  @error('updating_date_of_approval')
                                      <small class="text-red-500">{{ $message }}</small>
                                  @enderror
                              @else
                                  <span class="-mb-2 text-[1rem] font-medium">
                                      {{ \Carbon\Carbon::parse($dataItem->date_of_approval)->format('M  Y') }}
                                  </span>
                              @endif
                              <span class="text-sm text-slate-700">Date of publish</span>
                          </div>
                      </div>
                      <div class="{{ $editing ? 'items-start' : 'items-center' }} col-span-1 flex flex-grow">
                          <div class="w-fit rounded-md bg-slate-200 p-2">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6" viewBox="0 0 46 46"
                                  fill="none">
                                  <path
                                      d="M26.8335 4.3125C26.9606 4.3125 27.0825 4.36298 27.1723 4.45284C27.2622 4.54271 27.3127 4.66458 27.3127 4.79167V15.6151C27.3127 16.4086 27.9567 17.0526 28.7502 17.0526H37.3752C37.5022 17.0526 37.6241 17.1031 37.714 17.1929C37.8038 17.2828 37.8543 17.4047 37.8543 17.5318V36.4167C37.8543 37.8146 37.299 39.1552 36.3105 40.1437C35.3221 41.1322 33.9814 41.6875 32.5835 41.6875H13.4168C12.0189 41.6875 10.6783 41.1322 9.68979 40.1437C8.70131 39.1552 8.146 37.8146 8.146 36.4167V9.58333C8.146 8.18542 8.70131 6.84476 9.68979 5.85629C10.6783 4.86782 12.0189 4.3125 13.4168 4.3125H26.8335Z"
                                      fill="#4B3D3D" />
                                  <path
                                      d="M30.8315 5.05629C30.5574 4.83587 30.1875 5.06012 30.1875 5.41279V13.6985C30.1875 13.963 30.4022 14.1777 30.6667 14.1777H36.9878C37.214 14.1777 37.3558 13.94 37.2255 13.756L31.4487 5.71179C31.2734 5.46652 31.0658 5.24602 30.8315 5.05629Z"
                                      fill="#4B3D3D" />
                              </svg>
                          </div>
                          <div class="ml-2 flex flex-col gap-1">
                              @if ($editing)
                                  <x-input-field id="title" class="w-full" wire:model.live='updating_format' />
                                  @error('updating_format')
                                      <small class="text-red-500">{{ $message }}</small>
                                  @enderror
                              @else
                                  <span class="-mb-2 text-[1rem] font-medium">
                                      {{ $dataItem->format }}
                                  </span>
                              @endif
                              <span class="text-sm text-slate-700">Format</span>
                          </div>
                      </div>
                  </div>
                  <div class="mt-6 grid grid-cols-2 gap-4 border-b-2 border-t-2 border-gray-400 py-4">
                      <div class="col-span-1 flex gap-1">
                          <svg class="h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"
                              xmlns="http://www.w3.org/2000/svg">
                              <path d="M12 3.75a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5Z"></path>
                              <path
                                  d="M8 13.25A3.75 3.75 0 0 0 4.25 17v1.188c0 .754.546 1.396 1.29 1.517 4.278.699 8.642.699 12.92 0a1.537 1.537 0 0 0 1.29-1.517V17A3.75 3.75 0 0 0 16 13.25h-.34c-.185 0-.369.03-.544.086l-.866.283a7.251 7.251 0 0 1-4.5 0l-.866-.283a1.752 1.752 0 0 0-.543-.086H8Z">
                              </path>
                          </svg>
                          <h1 class="text-gray-500">Defense Panel Chair</h1>
                      </div>
                      <div class="col-span-1">
                          @if ($editing)
                              <x-input-field id="title" class="w-full" wire:model.live='updating_panel_chair' />
                              @error('updating_panel_chair')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="font-semibold">
                                  {{ $dataItem->panel_chair }}
                              </span>
                          @endif
                      </div>
                      <div class="col-span-1 flex gap-1">
                          <svg class="h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"
                              xmlns="http://www.w3.org/2000/svg">
                              <path d="M12 3.75a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5Z"></path>
                              <path
                                  d="M8 13.25A3.75 3.75 0 0 0 4.25 17v1.188c0 .754.546 1.396 1.29 1.517 4.278.699 8.642.699 12.92 0a1.537 1.537 0 0 0 1.29-1.517V17A3.75 3.75 0 0 0 16 13.25h-.34c-.185 0-.369.03-.544.086l-.866.283a7.251 7.251 0 0 1-4.5 0l-.866-.283a1.752 1.752 0 0 0-.543-.086H8Z">
                              </path>
                          </svg>
                          <h1 class="text-gray-500">Defense Panel Member</h1>
                      </div>
                      <div class="{{ $editing ? 'gap-2' : 'gap-1' }} col-span-1 flex flex-col">
                          @if ($editing)
                              <x-input-field id="title" class="w-full"
                                  wire:model.live='updating_panel_member_1' />
                              @error('updating_panel_member_1')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->panel_member_1 }}
                              </span>
                          @endif
                          @if ($editing)
                              <x-input-field id="title" class="w-full"
                                  wire:model.live='updating_panel_member_2' />
                              @error('updating_panel_member_2')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->panel_member_2 }}
                              </span>
                          @endif
                          @if ($editing)
                              <x-input-field id="title" class="w-full"
                                  wire:model.live='updating_panel_member_3' />
                              @error('updating_panel_member_3')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->panel_member_3 }}
                              </span>
                          @endif
                          @if ($editing)
                              <x-input-field id="title" class="w-full"
                                  wire:model.live='updating_panel_member_4' />
                              @error('updating_panel_member_4')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->panel_member_4 }}
                              </span>
                          @endif
                      </div>
                      <div class="col-span-1 flex gap-1">
                          <svg class="h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"
                              xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                  d="M14.25 2.5a.25.25 0 0 0-.25-.25H7A2.75 2.75 0 0 0 4.25 5v14A2.75 2.75 0 0 0 7 21.75h10A2.75 2.75 0 0 0 19.75 19V9.147a.25.25 0 0 0-.25-.25H15a.75.75 0 0 1-.75-.75V2.5ZM12 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-4 8.5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3 1 1 0 0 1-1 1H9a1 1 0 0 1-1-1Z"
                                  clip-rule="evenodd"></path>
                              <path
                                  d="M15.75 2.824c0-.184.193-.301.336-.186.121.098.23.212.323.342l3.013 4.197c.068.096-.006.22-.124.22H16a.25.25 0 0 1-.25-.25V2.824Z">
                              </path>
                          </svg>
                          <h1 class="text-gray-500">Author/s</h1>
                      </div>
                      <div class="{{ $editing ? 'gap-2' : 'gap-1' }} col-span-1 flex flex-col">
                          @if ($editing)
                              <x-input-field id="title" class="w-full" wire:model.live='updating_author_1' />
                              @error('updating_author_1')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->author_1 }}
                              </span>
                          @endif
                          @if ($editing)
                              <x-input-field id="title" class="w-full" wire:model.live='updating_author_2' />
                              @error('updating_author_2')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->author_2 }}
                              </span>
                          @endif
                          @if ($editing)
                              <x-input-field id="title" class="w-full" wire:model.live='updating_author_3' />
                              @error('updating_author_3')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->author_3 }}
                              </span>
                          @endif
                          @if ($editing)
                              <x-input-field id="title" class="w-full" wire:model.live='updating_author_4' />
                              @error('updating_author_4')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->author_4 }}
                              </span>
                          @endif
                          @if ($editing)
                              <x-input-field id="title" class="w-full" wire:model.live='updating_author_5' />
                              @error('updating_author_5')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->author_5 }}
                              </span>
                          @endif
                          @if ($editing)
                              <x-input-field id="title" class="w-full" wire:model.live='updating_author_6' />
                              @error('updating_author_6')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->author_6 }}
                              </span>
                          @endif
                          @if ($editing)
                              <x-input-field id="title" class="w-full" wire:model.live='updating_author_7' />
                              @error('updating_author_7')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->author_7 }}
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="grid grid-cols-2 gap-4 border-b-2 border-gray-400 py-4">
                      <div class="col-span-1 flex gap-1">
                          <svg class="h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"
                              xmlns="http://www.w3.org/2000/svg">
                              <path
                                  d="M16.13 3.186a25.028 25.028 0 0 0-8.26 0A2.444 2.444 0 0 0 5.876 5.11a36.89 36.89 0 0 0-.147 13.795l.333 1.86a.732.732 0 0 0 1.224.4l4.024-3.822a1 1 0 0 1 1.378 0l4.023 3.822a.732.732 0 0 0 1.224-.4l.334-1.86a36.89 36.89 0 0 0-.148-13.795 2.444 2.444 0 0 0-1.991-1.925Z">
                              </path>
                          </svg>
                          <h1 class="text-gray-500">Keyword/s</h1>
                      </div>
                      <div class="{{ $editing ? 'gap-2' : 'gap-1' }} col-span-1 flex flex-col">
                          @if ($editing)
                              <x-input-field id="title" class="w-full" wire:model.live='updating_keyword_1' />
                              @error('updating_keyword_1')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->keyword_1 }}

                              </span>
                          @endif
                          @if ($editing)
                              <x-input-field id="title" class="w-full" wire:model.live='updating_keyword_2' />
                              @error('updating_keyword_2')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->keyword_2 }}
                              </span>
                          @endif
                          @if ($editing)
                              <x-input-field id="title" class="w-full" wire:model.live='updating_keyword_3' />
                              @error('updating_keyword_3')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->keyword_3 }}
                              </span>
                          @endif
                          @if ($editing)
                              <x-input-field id="title" class="w-full" wire:model.live='updating_keyword_4' />
                              @error('updating_keyword_4')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->keyword_4 }}
                              </span>
                          @endif
                          @if ($editing)
                              <x-input-field id="title" class="w-full" wire:model.live='updating_keyword_5' />
                              @error('updating_keyword_5')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->keyword_5 }}
                              </span>
                          @endif
                          @if ($editing)
                              <x-input-field id="title" class="w-full" wire:model.live='updating_keyword_6' />
                              @error('updating_keyword_6')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->keyword_6 }}
                              </span>
                          @endif
                          @if ($editing)
                              <x-input-field id="title" class="w-full" wire:model.live='updating_keyword_7' />
                              @error('updating_keyword_7')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->keyword_7 }}
                                  keyword
                              </span>
                          @endif
                          @if ($editing)
                              <x-input-field id="title" class="w-full" wire:model.live='updating_keyword_8' />
                              @error('updating_keyword_8')
                                  <small class="text-red-500">{{ $message }}</small>
                              @enderror
                          @else
                              <span class="whitespace-nowrap font-semibold">
                                  {{ $dataItem->keyword_8 }}
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="col-span-2 mt-6 flex w-full flex-col items-start gap-1">
                      <div class="flex w-full flex-row gap-1">
                          <svg class="h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"
                              xmlns="http://www.w3.org/2000/svg">
                              <path
                                  d="M2 4.917a2.5 2.5 0 0 1 2.5-2.5h15a2.5 2.5 0 0 1 2.5 2.5v10a2.5 2.5 0 0 1-2.5 2.5h-3.125a1.25 1.25 0 0 0-1 .5L13 21.083a1.25 1.25 0 0 1-2 0l-2.375-3.166a1.25 1.25 0 0 0-1-.5H4.5a2.5 2.5 0 0 1-2.5-2.5v-10Zm8.992 3.457a2.113 2.113 0 0 0-.283-.34 1.835 1.835 0 0 0-.586-.405l-.01-.005a2.231 2.231 0 0 0-.945-.207C7.97 7.417 7 8.349 7 9.501c0 1.15.97 2.082 2.168 2.082a2.22 2.22 0 0 0 1.163-.325c-.171.487-.487 1.005-1.012 1.525a.507.507 0 0 0 .013.738.56.56 0 0 0 .768-.013c1.668-1.661 1.713-3.447 1.176-4.632a3.077 3.077 0 0 0-.284-.5v-.002Zm4.758 2.884c-.17.487-.488 1.005-1.012 1.525a.507.507 0 0 0 .014.738.56.56 0 0 0 .767-.013c1.667-1.661 1.712-3.447 1.177-4.632a3.08 3.08 0 0 0-.285-.5 2.114 2.114 0 0 0-.284-.342 1.832 1.832 0 0 0-.586-.405l-.01-.005a2.23 2.23 0 0 0-.944-.207c-1.196 0-2.167.932-2.167 2.084 0 1.15.971 2.082 2.168 2.082a2.22 2.22 0 0 0 1.163-.325h-.001Z">
                              </path>
                          </svg>
                          <h1 class="text-gray-500">Recommended Citation</h1>
                      </div>
                      @if ($editing)
                          <textarea
                              class="w-full resize-none rounded-md border border-gray-400 p-2 text-sm focus:outline-blue-950 md:resize-y lg:resize-none"
                              wire:model.live="updating_recommended_citation" rows="6" id="recommended_citation"></textarea>
                          @error('updating_recommended_citation')
                              <small class="text-red-500">{{ $message }}</small>
                          @enderror
                      @else
                          <p class="font-semibold">
                              {!! nl2br(e($dataItem->recommended_citation)) !!}
                          </p>
                      @endif

                  </div>
                  <div class="col-span-2 mt-6 flex flex-col items-start gap-1">
                      <div class="flex flex-row gap-1">
                          <svg class="h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"
                              xmlns="http://www.w3.org/2000/svg">
                              <path
                                  d="M16.8 2.4H7.2a2.4 2.4 0 0 0-2.4 2.4v14.4a2.4 2.4 0 0 0 2.4 2.4h9.6a2.4 2.4 0 0 0 2.4-2.4V4.8a2.4 2.4 0 0 0-2.4-2.4ZM8.4 7.2h7.2a.6.6 0 1 1 0 1.2H8.4a.6.6 0 1 1 0-1.2Zm-.6 3a.6.6 0 0 1 .6-.6h7.2a.6.6 0 1 1 0 1.2H8.4a.6.6 0 0 1-.6-.6Zm.6 1.8h7.2a.6.6 0 1 1 0 1.2H8.4a.6.6 0 1 1 0-1.2Zm0 2.4H12a.6.6 0 1 1 0 1.2H8.4a.6.6 0 1 1 0-1.2Z">
                              </path>
                          </svg>
                          <h1 class="text-gray-500">
                              Abstract
                          </h1>
                      </div>
                      @if ($editing)
                          <textarea
                              class="custom-scrollbar w-full resize-none rounded-md border border-gray-400 p-2 text-sm focus:outline-blue-950 md:resize-y lg:resize-none"
                              wire:model.live="updating_abstract_or_summary" rows="12" id="recommended_citation"></textarea>
                          @error('updating_abstract_or_summary')
                              <small class="text-red-500">{{ $message }}</small>
                          @enderror
                      @else
                          <p class="mx-auto font-semibold">
                              {!! nl2br(e($dataItem->abstract_or_summary)) !!}
                          </p>
                      @endif
                      <div class="col-span-2 mt-6 flex flex-col items-start gap-1">
                          <div class="flex flex-row gap-1">
                              <svg class="h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path
                                      d="M9.027 14.91c.168-.099.352-.195.551-.286-.168.25-.348.493-.54.727-.336.404-.597.62-.762.687a.312.312 0 0 1-.042.014.338.338 0 0 1-.031-.053c-.067-.132-.065-.26.048-.432.127-.198.383-.425.776-.658Zm2.946-1.977c-.142.03-.284.06-.427.094a25.2 25.2 0 0 0 .6-1.26c.19.351.394.695.612 1.03-.26.038-.523.083-.785.136Zm3.03 1.127a4.662 4.662 0 0 1-.522-.492c.274.006.521.026.735.065.38.068.559.176.621.25.02.021.031.049.032.077a.524.524 0 0 1-.072.24.368.368 0 0 1-.113.15.128.128 0 0 1-.083.017c-.108-.003-.31-.08-.598-.307Zm-2.67-5.695c-.048.293-.13.629-.24.995a5.82 5.82 0 0 1-.106-.416c-.092-.423-.105-.756-.056-.986.046-.212.132-.298.236-.34a.621.621 0 0 1 .174-.048.71.71 0 0 1 .038.238c.006.146-.008.332-.046.558v-.001Z">
                                  </path>
                                  <path fill-rule="evenodd"
                                      d="M7.2 2.4h9.6a2.4 2.4 0 0 1 2.4 2.4v14.4a2.4 2.4 0 0 1-2.4 2.4H7.2a2.4 2.4 0 0 1-2.4-2.4V4.8a2.4 2.4 0 0 1 2.4-2.4Zm.198 14.002c.108.216.276.412.525.503a.95.95 0 0 0 .696-.036c.382-.156.762-.523 1.112-.944.4-.48.82-1.112 1.225-1.812a13.979 13.979 0 0 1 2.396-.487c.36.46.732.856 1.092 1.14.336.264.724.484 1.121.5.216.011.43-.046.612-.165a1.24 1.24 0 0 0 .425-.499c.108-.217.174-.444.165-.676a1.013 1.013 0 0 0-.24-.621c-.27-.324-.715-.48-1.152-.558a6.91 6.91 0 0 0-1.602-.06 13.146 13.146 0 0 1-1.176-2.023c.3-.792.525-1.541.624-2.153a3.72 3.72 0 0 0 .058-.737 1.487 1.487 0 0 0-.152-.646.841.841 0 0 0-.573-.438c-.242-.051-.492 0-.72.093-.453.18-.692.564-.782.987-.088.408-.048.884.055 1.364.106.487.286 1.017.516 1.554a23.64 23.64 0 0 1-1.274 2.672 9.189 9.189 0 0 0-1.779.774c-.444.264-.839.576-1.076.944-.252.392-.33.857-.096 1.324Z"
                                      clip-rule="evenodd"></path>
                              </svg>
                              <h1 class="text-gray-500">
                                  Abstract
                              </h1>
                          </div>
                          @if (!empty($dataItem->document_file_url))
                              <a href="{{ route('view-pdf-admin', [
                                  'title' => $dataItem->title,
                                  'pdfFile' => $dataItem->document_file_url,
                                  //   'docuPostID' => $dataItem->id,
                              ]) }}"
                                  target="_blank"
                                  class="block w-full rounded-md bg-orange-500 p-1 text-center text-white duration-200 ease-in-out hover:bg-orange-400">View
                                  Document file</a>
                          @endif
                          @if (!empty($dataItem->document_file_url))
                              <button
                                  wire:click='deleteFile("{{ $dataItem->document_file_url }}", {{ $dataItem->id }})'
                                  class="h-fit w-fit rounded-md bg-red-500 px-4 py-2 font-medium text-white duration-200 ease-in-out hover:bg-red-700">Delete
                              </button>
                          @endif
                          @if ($editing)
                              <section x-data="{ uploading: false, progress: 0 }" x-data="{ uploaded: false }"
                                  x-on:livewire-upload-start="uploading = true; progress = 0"
                                  x-on:livewire-upload-finish="uploading = false; uploaded = true"
                                  x-on:livewire-upload-error="uploading = false; progress = 0"
                                  x-on:livewire-upload-progress="progress = $event.detail.progress">
                                  <div class="flex gap-2">

                                      <label for="uploadFile"
                                          class="mb-2 flex h-fit w-fit items-center justify-center rounded-lg bg-primary-color px-4 py-2 text-center text-white hover:cursor-pointer">Upload
                                          <input type="file" wire:model.live="user_upload" id="uploadFile"
                                              class="" hidden accept="application/pdf">
                                      </label>
                                      <small class="text-gray-600">Please be guided, the required file should be in PDF
                                          format.</small>

                                  </div>
                                  <div class="mt-2 text-green-600" x-cloak x-show="uploaded">File uploaded!</div>
                                  <div class="flex flex-row gap-1">
                                      <div class="w-full" x-show="uploading" x-cloak>
                                          <div class="h-2.5 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                                              <div class="h-2.5 rounded-full bg-blue-600"
                                                  :style="'width: ' + progress + '%'">
                                              </div>
                                          </div>
                                          <div class="mt-2" x-cloak>Uploading...</div>
                                      </div>
                                  </div>
                              </section>
                          @endif
                      </div>
                  </div>
              </div>
              <div class="sticky bottom-0 right-0 flex gap-4 bg-white bg-opacity-50 px-10 py-2 backdrop-blur-xl">
                  @if ($editing)
                      <button wire:click='cancelEdit()'
                          class="w-full rounded-md bg-red-500 p-1 font-medium text-white duration-200 ease-in-out hover:bg-red-700">
                          Close
                      </button>
                  @else
                      <button wire:click='toggleEdit({{ $dataItem->id }})'
                          class="w-full rounded-md bg-blue-500 p-1 font-medium text-white duration-200 ease-in-out hover:bg-blue-700">Edit</button>
                  @endif
                  <button
                      class="w-full rounded-md bg-blue-500 p-1 font-medium text-white duration-200 ease-in-out hover:bg-blue-700">
                      Remark
                  </button>
                  @if ($editing)
                      <button wire:click='saveEdit({{ $dataItem->id }})'
                          class="w-full rounded-md bg-blue-500 p-1 font-medium text-white duration-200 ease-in-out hover:bg-blue-700">Save</button>
                  @else
                      <button x-on:click="showDocu = false"
                          class="w-full rounded-md bg-blue-500 p-1 font-medium text-white duration-200 ease-in-out hover:bg-blue-700">Close</button>
                  @endif

              </div>
          </section>
      @endif
  </div>
