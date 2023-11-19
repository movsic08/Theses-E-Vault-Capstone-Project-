  <div class="flex justify-between">
      <h2 class="text-[1.1rem] font-semibold lg:text-[1.5rem]">New created accounts</h2>
      <div class="flex gap-2">
          <div class="flex items-center gap-1">
              <div class="h-3 w-3 rounded bg-blue-700"></div>
              <span class="text-sm">Verified</span>
          </div>
          <div class="flex items-center gap-1">
              <div class="w-3a<div class= h-3"col-span-10 rounded-2xl bg-white p-4 text-gray-500 drop-shadow-lg
                  xl:col-span-10">
                  <a wire:navigate href="{{ route('admin-docu-post-panel') }}"
                      class="font-medium duration-100 ease-in-out hover:font-bold hover:text-primary-color">New
                      uploaded
                      files</a>
                  <section class="">

                      <table class="w-full">
                          <tbody wire:poll.5000ms>
                              @foreach ($latestDocuPostData as $latestDocuPostDataItem)
                                  <tr class="">
                                      <td class="whitespace-normal px-6 py-2">
                                          <a wire:navigate
                                              href="{{ route('admin-view-document', ['reference' => $latestDocuPostDataItem->reference]) }}">
                                              {{ $latestDocuPostDataItem->title }}
                                          </a>
                                      </td>
                                      <td class="whitespace-normal px-6 py-2">
                                          @if ($latestDocuPostDataItem->status == 0)
                                              <div
                                                  class="flex w-fit flex-row-reverse items-center justify-center rounded-md bg-yellow-500 p-1 text-white">
                                                  <svg class="h-4" viewBox="0 0 20 20" fill="none">
                                                      <path
                                                          d="M10 0C7.34784 0 4.8043 1.05357 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 15.5221 4.47692 20 10 20C15.5221 20 20 15.5221 20 10C20 4.47692 15.5221 0 10 0ZM14.6154 11.5385H10C9.79599 11.5385 9.60033 11.4574 9.45607 11.3132C9.31181 11.1689 9.23077 10.9732 9.23077 10.7692V3.84615C9.23077 3.64214 9.31181 3.44648 9.45607 3.30223C9.60033 3.15797 9.79599 3.07692 10 3.07692C10.204 3.07692 10.3997 3.15797 10.5439 3.30223C10.6882 3.44648 10.7692 3.64214 10.7692 3.84615V10H14.6154C14.8194 10 15.0151 10.081 15.1593 10.2253C15.3036 10.3696 15.3846 10.5652 15.3846 10.7692C15.3846 10.9732 15.3036 11.1689 15.1593 11.3132C15.0151 11.4574 14.8194 11.5385 14.6154 11.5385Z"
                                                          fill="#FFFBFB" />
                                                  </svg>
                                              </div>
                                          @elseif($latestDocuPostDataItem->status == 1)
                                              <div
                                                  class="flex w-fit flex-row-reverse items-center justify-center rounded-md bg-green-700 p-2 text-white">
                                                  <svg class="h-4" viewBox="0 0 21 21" fill="none">
                                                      <path
                                                          d="M20.0827 10.5003C20.0827 13.042 19.073 15.4795 17.2758 17.2768C15.4786 19.074 13.041 20.0837 10.4993 20.0837C7.95769 20.0837 5.52013 19.074 3.72291 17.2768C1.92569 15.4795 0.916016 13.042 0.916016 10.5003C0.916016 7.95867 1.92569 5.52111 3.72291 3.72389C5.52013 1.92666 7.95769 0.916992 10.4993 0.916992C13.041 0.916992 15.4786 1.92666 17.2758 3.72389C19.073 5.52111 20.0827 7.95867 20.0827 10.5003ZM15.3274 6.87112C15.2419 6.78576 15.1401 6.71853 15.028 6.67346C14.9159 6.62839 14.7958 6.6064 14.6751 6.60882C14.5543 6.61123 14.4352 6.638 14.325 6.68752C14.2148 6.73703 14.1157 6.80828 14.0337 6.89699L9.8726 12.1975L7.3656 9.68958C7.19645 9.52489 6.96926 9.43343 6.73319 9.43501C6.49711 9.43659 6.27116 9.53106 6.10423 9.698C5.9373 9.86493 5.84282 10.0909 5.84124 10.327C5.83967 10.563 5.93112 10.7902 6.09581 10.9594L9.26597 14.1305C9.35151 14.2154 9.45323 14.2822 9.56509 14.327C9.67696 14.3719 9.79668 14.3938 9.91716 14.3914C10.0376 14.3891 10.1564 14.3626 10.2665 14.3135C10.3765 14.2644 10.4756 14.1937 10.5578 14.1056L15.3399 8.12845C15.503 7.95892 15.5932 7.73221 15.591 7.49696C15.5889 7.26171 15.4946 7.03667 15.3284 6.87016H15.3265L15.3274 6.87112Z"
                                                          fill="white" />
                                                  </svg>
                                              </div>
                                          @elseif($latestDocuPostDataItem->status == 2)
                                              <div
                                                  class="flex w-fit flex-row-reverse items-center justify-center rounded-md bg-red-700 p-2 text-white">
                                                  <svg class="h-4" viewBox="0 0 21 21" fill="none">
                                                      <path
                                                          d="M20.0827 10.5003C20.0827 13.042 19.073 15.4795 17.2758 17.2768C15.4786 19.074 13.041 20.0837 10.4993 20.0837C7.95769 20.0837 5.52013 19.074 3.72291 17.2768C1.92569 15.4795 0.916016 13.042 0.916016 10.5003C0.916016 7.95867 1.92569 5.52111 3.72291 3.72389C5.52013 1.92666 7.95769 0.916992 10.4993 0.916992C13.041 0.916992 15.4786 1.92666 17.2758 3.72389C19.073 5.52111 20.0827 7.95867 20.0827 10.5003ZM15.3274 6.87112C15.2419 6.78576 15.1401 6.71853 15.028 6.67346C14.9159 6.62839 14.7958 6.6064 14.6751 6.60882C14.5543 6.61123 14.4352 6.638 14.325 6.68752C14.2148 6.73703 14.1157 6.80828 14.0337 6.89699L9.8726 12.1975L7.3656 9.68958C7.19645 9.52489 6.96926 9.43343 6.73319 9.43501C6.49711 9.43659 6.27116 9.53106 6.10423 9.698C5.9373 9.86493 5.84282 10.0909 5.84124 10.327C5.83967 10.563 5.93112 10.7902 6.09581 10.9594L9.26597 14.1305C9.35151 14.2154 9.45323 14.2822 9.56509 14.327C9.67696 14.3719 9.79668 14.3938 9.91716 14.3914C10.0376 14.3891 10.1564 14.3626 10.2665 14.3135C10.3765 14.2644 10.4756 14.1937 10.5578 14.1056L15.3399 8.12845C15.503 7.95892 15.5932 7.73221 15.591 7.49696C15.5889 7.26171 15.4946 7.03667 15.3284 6.87016H15.3265L15.3274 6.87112Z"
                                                          fill="white" />
                                                  </svg>
                                              </div>
                                          @endif
                                      </td>
                                      <td class="ml-8 whitespace-normal px-6 py-2">
                                          <span>Approved</span>
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </section>
              </div> rounded bg-orange-500">
          </div>
          <span class="text-sm">Unverified</span>
      </div>
  </div>
  </div>
  <section class="-z-10 overflow-x-auto whitespace-nowrap">
      <table class="w-full">
          <tbody wire:poll.5000ms>
              @foreach ($latestAccounts as $latestAccountsItem)
                  <tr class="">
                      <td>
                          @if (empty($latestAccountsItem->first_name) && empty($latestAccountsItem->last_name))
                              <i class="text-red-600">Unfinish</i>
                          @else
                              {{ $latestAccountsItem->first_name }}
                              {{ $latestAccountsItem->last_name }}
                          @endif

                      </td>
                      <td>{{ \Carbon\Carbon::parse($latestAccountsItem->created_at)->format('M d, Y') }}
                      </td>
                      <td>
                          @if (empty($latestAccountsItem->student_id))
                              <i class="text-red-600">Unfinish</i>
                          @else
                              {{ $latestAccountsItem->student_id }}
                          @endif
                      </td>
                      <td>
                          @if ($latestAccountsItem->is_verified == 1)
                              <div class="h-4 w-4 rounded bg-blue-500"></div>
                          @else
                              <div class="h-4 w-4 rounded bg-orange-500"></div>
                          @endif
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>

  </section>
