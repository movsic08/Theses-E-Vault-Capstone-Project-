   <div class="mb-12 mt-6 rounded-2xl bg-slate-50 p-4 py-8 drop-shadow-md md:mx-2 md:px-[3rem] lg:mx-24">
       <div
           class="flex h-full w-full flex-col justify-between rounded-sm border border-slate-200 bg-white drop-shadow-sm md:flex-row">
           <div class="flex flex-grow items-center justify-center pt-4 md:w-[45%] md:pt-0">
               <img class="h-[10rem] w-[10rem] rounded-full object-cover md:h-full md:w-full md:rounded-none"
                   src="{{ $checkedAccount->profile_picture ? asset('storage/' . $checkedAccount->profile_picture) : asset('assets/default_profile.png') }}"
                   alt="UserProfile">
           </div>
           <div class="h-fit px-6 pb-4 md:w-[80%] md:px-12 md:py-8">
               <div class="leading-tight">
                   <h1 class="text-center text-[2rem] font-black text-gray-800 md:text-left md:text-[4rem]">
                       {{ $fullName }}</h1>
                   <h2 class="text-center font-semibold md:text-left">
                       {{ '@' . $checkedAccount->username }}</h2>
               </div>
               <div class="flex w-full justify-center md:justify-normal">
                   @php
                       if (empty($checkedAccount->bachelor_degree)) {
                           $yourCourse = 'User doesn\'t have completed his/her profile. ';
                       } else {
                           $yourCourse = $checkedAccount->bachelor_degree;
                       }
                   @endphp
                   <h1
                       class="mt-4 w-fit rounded-md bg-blue-300 px-3 py-1 text-center text-xs font-semibold text-blue-800 md:text-base">
                       {{ $yourCourse }}</h1>
               </div>
               <h2 class="mt-1 text-center font-semibold md:text-left">3rd year - Block B</h2>
               <div class="mt-2 flex w-full items-center justify-end">
                   @if (auth()->check())
                       @if (auth()->user()->id === $currentUserId)
                           <a wire:navigate href="{{ route('edit-profile', ['activeTab' => 'tab1']) }}"
                               class="w-fit rounded-md bg-blue-700 p-2 text-center text-white duration-150 hover:bg-primary-color">Edit
                               profile</a>
                       @endif
                   @endif
               </div>
           </div>
       </div>

       <div class="mt-4">
           <div x-data="{ activeTab: 'about' }">
               <!-- Tab buttons -->
               <ul class="flex space-x-4">
                   <li>
                       <button @click="activeTab = 'about'" class="p-2"
                           :class="{
                               'border-b-2 border-primary-color  font-bold': activeTab === 'about',
                               'duration-400font-medium ease-in-out hover:rounded-md hover:bg-primary-color hover:text-white': activeTab ===
                                   !'about'
                           }">
                           About
                       </button>
                   </li>
                   {{-- <li>
                                <button @click="activeTab = 'post'" class="p-2"
                                    :class="{
                                        'border-b-2 border-primary-color  font-bold': activeTab === 'post',
                                        'duration-400font-medium ease-in-out hover:rounded-md hover:bg-primary-color hover:text-white': activeTab ===
                                            !'post'
                                    }">
                                    Posts
                                </button>
                            </li> --}}
                   <li>
                       <button @click="activeTab = 'document'" class="p-2"
                           :class="{
                               'border-b-2 border-primary-color  font-bold': activeTab === 'document',
                               'duration-400font-medium ease-in-out hover:rounded-md hover:bg-primary-color hover:text-white': activeTab ===
                                   !'document'
                           }">
                           Document
                       </button>
                   </li>
               </ul>

               <!-- Tab content -->
               <div class="mt-3" x-show="activeTab === 'about'">
                   <div class="w-full">
                       <div class="overflow-x-auto">
                           <table class="min-w-full">
                               <tbody>
                                   <tr>
                                       <td class="whitespace-nowrap py-2 text-lg font-bold text-gray-800">
                                           BASIC
                                           INFORMATION</td>
                                   </tr>
                                   <tr class="flex flex-col lg:table-row">
                                       <td class="whitespace-nowrap py-2 font-semibold text-gray-700">Student
                                           Id</td>
                                       <td class="px-6 py-2 font-medium text-gray-600">
                                           {{ $checkedAccount->student_id }}</td>
                                   </tr>
                                   <tr class="flex flex-col lg:table-row">
                                       <td class="py-2 align-top font-semibold text-gray-700">Bio</td>
                                       <td class="px-6 py-2 font-medium text-gray-600">
                                           {{ $checkedAccount->bio }}</td>
                                   </tr>
                                   <tr>
                                       <td class="whitespace-nowrap py-2 text-lg font-bold text-gray-800">
                                           CONTACT
                                           INFORMATION</td>
                                   </tr>
                                   <tr class="flex flex-col lg:table-row">
                                       <td class="whitespace-nowrap py-2 font-semibold text-gray-700">Email
                                       </td>
                                       <td class="px-6 py-2 font-medium text-gray-600">
                                           {{ $checkedAccount->email }}</td>
                                   </tr>
                                   <tr class="flex flex-col lg:table-row">
                                       <td class="whitespace-nowrap py-2 font-semibold text-gray-700">Phone
                                       </td>
                                       <td class="px-6 py-2 font-medium text-gray-600">09678-1231-1323</td>
                                   </tr>
                                   <tr class="flex flex-col lg:table-row">
                                       <td class="whitespace-nowrap py-2 font-semibold text-gray-700">Address
                                       </td>
                                       <td class="px-6 py-2 font-medium text-gray-600">
                                           {{ $checkedAccount->address }}</td>
                                   </tr>
                                   <tr class="flex flex-col lg:table-row">
                                       <td class="whitespace-nowrap py-2 font-semibold text-gray-700">Facebook
                                           Link</td>
                                       <td class="px-6 py-2 font-medium text-gray-600">
                                           Web.facebook.com/elmer.tiraoar</td>
                                   </tr>
                                   <tr class="flex flex-col lg:table-row">
                                       <td class="whitespace-nowrap py-2 font-semibold text-gray-700">
                                           Instargarm Link</td>
                                       <td class="px-6 py-2 font-medium text-gray-600">instagram.com</td>
                                   </tr>
                               </tbody>
                           </table>
                       </div>

                   </div>
               </div>
               <div class="mt-3" x-show="activeTab === 'document'">
                   <table class="min-w-full">
                       <thead>
                           <tr class="my-2 font-semibold text-gray-800">
                               <th scope="col" class="text-start">Title</th>
                               <th scope="col" class="whitespace-nowrap text-center">Date Uploaded</th>
                               <th scope="col" class="text-center">Status</th>
                           </tr>
                       </thead>
                       <tbody class="text-sm">
                           @foreach ($docuPostOfUser as $item)
                               <tr class="">
                                   <td scope="col" class="overflow-ellipsis py-2">
                                       {{ $item->title }}
                                   </td>
                                   <td scope="col" class="whitespace-nowrap px-6 py-2 text-center">
                                       {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                   </td>
                                   <td scope="col" class="py-2">
                                       @if ($item->status == 0)
                                           <div
                                               class="flex w-full flex-row-reverse items-center justify-center rounded-md bg-yellow-500 px-2 py-1 text-white">
                                               <span class="px-1"> Pending </span>
                                               <svg class="h-4" viewBox="0 0 20 20" fill="none">
                                                   <path
                                                       d="M10 0C7.34784 0 4.8043 1.05357 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 15.5221 4.47692 20 10 20C15.5221 20 20 15.5221 20 10C20 4.47692 15.5221 0 10 0ZM14.6154 11.5385H10C9.79599 11.5385 9.60033 11.4574 9.45607 11.3132C9.31181 11.1689 9.23077 10.9732 9.23077 10.7692V3.84615C9.23077 3.64214 9.31181 3.44648 9.45607 3.30223C9.60033 3.15797 9.79599 3.07692 10 3.07692C10.204 3.07692 10.3997 3.15797 10.5439 3.30223C10.6882 3.44648 10.7692 3.64214 10.7692 3.84615V10H14.6154C14.8194 10 15.0151 10.081 15.1593 10.2253C15.3036 10.3696 15.3846 10.5652 15.3846 10.7692C15.3846 10.9732 15.3036 11.1689 15.1593 11.3132C15.0151 11.4574 14.8194 11.5385 14.6154 11.5385Z"
                                                       fill="#FFFBFB" />
                                               </svg>
                                           </div>
                                       @elseif($item->status == 1)
                                           <div
                                               class="flex w-full flex-row-reverse items-center justify-center rounded-md bg-green-700 px-2 py-1 text-white">
                                               <span class="hidden px-1 lg:block"> Approved </span>
                                               <svg class="h-4" viewBox="0 0 21 21" fill="none">
                                                   <path
                                                       d="M20.0827 10.5003C20.0827 13.042 19.073 15.4795 17.2758 17.2768C15.4786 19.074 13.041 20.0837 10.4993 20.0837C7.95769 20.0837 5.52013 19.074 3.72291 17.2768C1.92569 15.4795 0.916016 13.042 0.916016 10.5003C0.916016 7.95867 1.92569 5.52111 3.72291 3.72389C5.52013 1.92666 7.95769 0.916992 10.4993 0.916992C13.041 0.916992 15.4786 1.92666 17.2758 3.72389C19.073 5.52111 20.0827 7.95867 20.0827 10.5003ZM15.3274 6.87112C15.2419 6.78576 15.1401 6.71853 15.028 6.67346C14.9159 6.62839 14.7958 6.6064 14.6751 6.60882C14.5543 6.61123 14.4352 6.638 14.325 6.68752C14.2148 6.73703 14.1157 6.80828 14.0337 6.89699L9.8726 12.1975L7.3656 9.68958C7.19645 9.52489 6.96926 9.43343 6.73319 9.43501C6.49711 9.43659 6.27116 9.53106 6.10423 9.698C5.9373 9.86493 5.84282 10.0909 5.84124 10.327C5.83967 10.563 5.93112 10.7902 6.09581 10.9594L9.26597 14.1305C9.35151 14.2154 9.45323 14.2822 9.56509 14.327C9.67696 14.3719 9.79668 14.3938 9.91716 14.3914C10.0376 14.3891 10.1564 14.3626 10.2665 14.3135C10.3765 14.2644 10.4756 14.1937 10.5578 14.1056L15.3399 8.12845C15.503 7.95892 15.5932 7.73221 15.591 7.49696C15.5889 7.26171 15.4946 7.03667 15.3284 6.87016H15.3265L15.3274 6.87112Z"
                                                       fill="white" />
                                               </svg>
                                           </div>
                                       @else
                                           <div
                                               class="flex w-full flex-row-reverse items-center justify-center rounded-md bg-red-500 px-2 py-1 text-white">
                                               <span class="px-1"> Deleted </span>
                                               <svg class="h-4" fill="currentColor" viewBox="0 0 24 24">
                                                   <path fill-rule="evenodd"
                                                       d="M7.2 2.4a2.4 2.4 0 0 0-2.4 2.4v14.4a2.4 2.4 0 0 0 2.4 2.4h9.6a2.4 2.4 0 0 0 2.4-2.4V8.897a2.4 2.4 0 0 0-.703-1.697L14.4 3.103a2.4 2.4 0 0 0-1.697-.703H7.2ZM8.4 12a1.2 1.2 0 0 0 0 2.4h7.2a1.2 1.2 0 1 0 0-2.4H8.4Z"
                                                       clip-rule="evenodd"></path>
                                               </svg>
                                           </div>
                                       @endif

                                   </td>
                               </tr>
                           @endforeach
                       </tbody>
                   </table>
               </div>
               {{-- <div class="mt-3" x-show="activeTab === 'post'">
                            Post content dito.</div> --}}
           </div>

       </div>
   </div>
