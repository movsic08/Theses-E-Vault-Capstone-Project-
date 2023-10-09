 <section class="relative grid grid-flow-row-dense grid-cols-4 gap-3 text-primary-color">
     {{-- 1st div --}}
     <div class="col-span-4 lg:col-span-3">
         <div class="flex flex-col gap-3 rounded-lg bg-white px-7 py-4 drop-shadow-lg">
             <div>
                 <p class="font-extrabold">TITLE</p>
                 <p class="text-gray-600">{{ $data->title }}
                 </p>
             </div>
             <div class="flex w-full flex-col md:flex-row">
                 <div class="flex w-full flex-col gap-3 md:w-2/5">
                     <div>
                         <p class="font-extrabold">DATE OF PUBLICATION</p>
                         <p class="text-gray-600">
                             {{ \Carbon\Carbon::parse($data->date_of_approval)->format('F d, Y') }}</p>
                     </div>
                     <div>
                         <p class="font-extrabold">DEGREE NAME</p>
                         <p class="text-gray-600">{{ $data->course }} </p>
                     </div>
                     <div>
                         <p class="font-extrabold">DOCUMENT TYPE</p>
                         <p class="text-gray-600">{{ $data->document_type }}</p>
                     </div>
                     <div>
                         <p class="font-extrabold">FORMAT</p>
                         <p class="text-gray-600">{{ $data->format }}
                         </p>
                     </div>
                     <div>
                         <p class="font-extrabold">LANGUAGE</p>
                         <p class="text-gray-600">{{ $data->language }}
                         </p>
                     </div>
                 </div>
                 <div class="w-full md:w-3/5">
                     <div>
                         <p class="font-extrabold">KEYWORDS/ TAGS</p>
                         <p class="text-gray-600">
                             <a class="bg-gray-100 px-1 hover:text-blue-600"
                                 href="{{ route('search-result-page', $data->keyword_1) }}" target="_blank"
                                 rel="noopener noreferrer">{{ $data->keyword_1 }};</a>
                             <a class="bg-gray-100 px-1 hover:text-blue-600"
                                 href="{{ route('search-result-page', $data->keyword_2) }}" target="_blank"
                                 rel="noopener noreferrer">{{ $data->keyword_2 }};</a>
                             <a class="bg-gray-100 px-1 hover:text-blue-600"
                                 href="{{ route('search-result-page', $data->keyword_3) }}" target="_blank"
                                 rel="noopener noreferrer">{{ $data->keyword_3 }};</a>
                             <a class="bg-gray-100 px-1 hover:text-blue-600"
                                 href="{{ route('search-result-page', $data->keyword_4) }}" target="_blank"
                                 rel="noopener noreferrer">{{ $data->keyword_4 }};</a>
                             @if (!empty($data->keyword_5))
                                 <a class="bg-gray-100 px-1 hover:text-blue-600"
                                     href="{{ route('search-result-page', $data->keyword_5) }}" target="_blank"
                                     rel="noopener noreferrer">{{ $data->keyword_5 }};</a>
                             @elseif(!empty($data->keyword_6))
                                 <a class="bg-gray-100 px-1 hover:text-blue-600"
                                     href="{{ route('search-result-page', $data->keyword_6) }}" target="_blank"
                                     rel="noopener noreferrer">{{ $data->keyword_6 }};</a>
                             @endif
                         </p>
                     </div>
                     <div>
                         <p class="font-extrabold">TITLE</p>
                         <p class="break-words text-gray-600">{{ $data->title }}</p>
                     </div>
                 </div>
             </div>
             <div>
                 <p class="font-extrabold">ABSTRACT/ SUMMARY</p>
                 <p class="text-gray-600">{{ $data->abstract_or_summary }}</p>
             </div>
         </div>
     </div>
     {{-- comment form --}}
     <div class="hidden lg:col-span-3 lg:block">
         <div class="col-span-4 rounded-lg bg-white p-6 drop-shadow-lg lg:col-span-3">
             <form action="">
                 <div class="flex w-full items-center justify-center gap-2">
                     <textarea class="w-full rounded-lg border-2 border-primary-color bg-gray-100 p-2" name=""
                         placeholder="What's on your mind?" id="autoresizing"></textarea>
                     <script type="text/javascript">
                         $('#autoresizing').on('input', function() {
                             this.style.height = 'auto';

                             this.style.height =
                                 (this.scrollHeight) + 'px';
                         });
                     </script>
                     <input class="w-fit rounded-lg bg-primary-color p-2 text-white" type="submit" value="Comment">
                 </div>

             </form>
         </div>
     </div>
     {{-- 2nd div --}}
     <div
         class="col-span-4 flex h-fit flex-col-reverse gap-4 lg:sticky lg:left-auto lg:right-14 lg:top-[92px] lg:col-span-1 lg:flex-col">
         <div class="grid grid-cols-4 gap-4">
             {{-- 1st div --}}
             <div class="col-span-2 rounded-lg bg-white p-4 drop-shadow-lg lg:col-span-4">
                 <div>
                     <p class="font-extrabold">File</p>
                     <div class="flex items-center justify-center">
                         <div class="-ml-2 hidden lg:block">
                             <svg class="h-14" viewBox="0 0 107 107" fill="none">
                                 <path
                                     d="M40.2455 77.1689C40.9945 76.7275 41.8149 76.2995 42.7021 75.8938C41.9538 77.0135 41.1503 78.0952 40.2946 79.135C38.7966 80.9407 37.633 81.8992 36.8973 82.1979C36.8365 82.2231 36.7739 82.244 36.7101 82.2603C36.6568 82.186 36.6106 82.1069 36.5719 82.024C36.2732 81.44 36.2821 80.8693 36.7859 80.1025C37.3521 79.2197 38.4934 78.2077 40.2455 77.1689ZM53.3798 68.3593C52.7467 68.493 52.1136 68.6268 51.4761 68.7739C52.4212 66.9281 53.3129 65.0556 54.1511 63.1564C54.9982 64.7257 55.9077 66.2549 56.8796 67.7485C55.7204 67.9179 54.5479 68.123 53.3798 68.3593ZM66.8885 73.3793C66.0575 72.7092 65.2794 71.9758 64.5613 71.1858C65.7829 71.2126 66.8841 71.3062 67.8382 71.4756C69.5323 71.7832 70.3304 72.2648 70.6068 72.5947C70.696 72.6838 70.745 72.8087 70.7495 72.938C70.7306 73.3153 70.6204 73.6825 70.4285 74.008C70.3199 74.2675 70.1464 74.4947 69.9247 74.6678C69.814 74.7359 69.6835 74.7642 69.5546 74.748C69.0731 74.7347 68.1725 74.3958 66.8885 73.3793ZM54.9848 47.9891C54.7708 49.2954 54.4052 50.7934 53.9148 52.4252C53.7346 51.8144 53.577 51.1973 53.4422 50.575C53.032 48.6846 52.9741 47.2045 53.1925 46.1746C53.3976 45.2294 53.781 44.8505 54.2447 44.6588C54.4917 44.5516 54.7531 44.481 55.0205 44.4492C55.1365 44.7893 55.1938 45.1466 55.1899 45.5058C55.2042 46.3398 55.1355 47.1732 54.9848 47.9936V47.9891Z"
                                     fill="#041A32" />
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                     d="M32.1004 10.6992H60.4197C61.8381 10.7005 63.198 11.2649 64.2004 12.2686L84.031 32.0992C84.5285 32.5961 84.9232 33.1861 85.1924 33.8356C85.4617 34.4851 85.6003 35.1813 85.6004 35.8843V85.5992C85.6004 88.437 84.4731 91.1586 82.4664 93.1653C80.4598 95.1719 77.7382 96.2992 74.9004 96.2992H32.1004C29.2626 96.2992 26.541 95.1719 24.5343 93.1653C22.5277 91.1586 21.4004 88.437 21.4004 85.5992V21.3992C21.4004 18.5614 22.5277 15.8398 24.5343 13.8332C26.541 11.8265 29.2626 10.6992 32.1004 10.6992ZM61.5254 18.7242V29.4242C61.5254 30.8431 62.089 32.2039 63.0924 33.2072C64.0957 34.2106 65.4565 34.7742 66.8754 34.7742H77.5754L61.5254 18.7242ZM32.9831 83.8248C33.4646 84.7878 34.2136 85.6616 35.3238 86.0674C36.3411 86.4089 37.4501 86.3515 38.4268 85.9068C40.1298 85.2113 41.824 83.5751 43.3844 81.7026C45.1678 79.5537 47.0403 76.7405 48.8459 73.6197C52.3365 72.5858 55.9108 71.8593 59.528 71.4485C61.133 73.4993 62.7915 75.2648 64.3965 76.531C65.8946 77.708 67.6244 78.6888 69.3943 78.7601C70.3573 78.8092 71.3114 78.5551 72.1228 78.0245C72.9425 77.4663 73.597 76.6979 74.0176 75.7998C74.4991 74.8324 74.7934 73.8203 74.7533 72.786C74.7187 71.7689 74.3417 70.7933 73.6833 70.0173C72.4795 68.5728 70.4955 67.8773 68.5473 67.5296C66.1849 67.1636 63.7881 67.0739 61.405 67.2621C59.3927 64.4175 57.6381 61.3992 56.162 58.2429C57.4995 54.7119 58.5026 51.3726 58.944 48.6441C59.1391 47.5601 59.2257 46.4594 59.2026 45.3583C59.1966 44.3595 58.9649 43.3749 58.5249 42.4782C58.2706 41.9836 57.9094 41.5518 57.4676 41.2141C57.0257 40.8764 56.5143 40.6411 55.9703 40.5255C54.8914 40.2981 53.7768 40.5255 52.7603 40.9401C50.7407 41.7426 49.6751 43.4546 49.2739 45.3405C48.8816 47.1595 49.0599 49.2772 49.5191 51.4216C49.9917 53.5928 50.7942 55.9558 51.8196 58.3499C50.177 62.4355 48.28 66.4142 46.1397 70.2626C43.3815 71.1297 40.7229 72.2864 38.2083 73.7133C36.2288 74.8903 34.4678 76.2813 33.4111 77.922C32.2876 79.6652 31.9399 81.7428 32.9831 83.8248Z"
                                     fill="#041A32" />
                             </svg>
                         </div>
                         <div class="flex w-full flex-col gap-2">
                             <div class="w-full">
                                 <button wire:click="toggleBookmark"
                                     class="block w-full rounded-md bg-amber-800 p-1 text-center text-white duration-200 ease-in-out hover:bg-amber-700"
                                     href="">
                                     @if ($isBookmarked)
                                         Bookmarked
                                     @else
                                         Bookmark
                                     @endif
                                 </button>
                             </div>
                             <div class="w-full">
                                 <a class="block w-full rounded-md bg-orange-500 p-1 text-center text-white duration-200 ease-in-out hover:bg-orange-400"
                                     href="">View</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             {{-- 2nd div --}}
             <div class="col-span-2 rounded-lg bg-white p-4 drop-shadow-lg lg:col-span-4">
                 <h2 class="text-right font-medium text-primary-color">Number of Citation</h2>
                 <div class="flex items-center">
                     <svg class="h-9 w-10 rounded-md bg-blue-600 p-1" viewBox="0 0 46 46" fill="none">
                         <path
                             d="M41.3996 21.4672C41.3996 30.3605 33.1618 37.5672 22.9996 37.5672C21.1788 37.571 19.3637 37.3353 17.6023 36.8657C16.2606 37.5461 13.1748 38.8514 7.98636 39.7024C7.52636 39.7771 7.17561 39.2999 7.35769 38.8705C8.17228 36.9481 8.90828 34.3855 9.12869 32.0472C6.31119 29.222 4.59961 25.519 4.59961 21.4672C4.59961 12.5796 12.8413 5.36719 22.9996 5.36719C33.1618 5.36719 41.3996 12.5777 41.3996 21.4672ZM21.1462 18.6305C20.9948 18.4046 20.82 18.1951 20.6249 18.0057C20.3175 17.6883 19.9509 17.4343 19.5458 17.2582L19.5266 17.2505C18.9821 16.9971 18.3887 16.8663 17.7882 16.8672C15.584 16.8672 13.8015 18.5845 13.8015 20.7024C13.8015 22.8184 15.584 24.5358 17.7882 24.5358C18.5779 24.5358 19.3119 24.3154 19.9291 23.9359C19.6148 24.8309 19.0321 25.7854 18.0661 26.7419C17.9752 26.8308 17.9035 26.9374 17.8553 27.055C17.8072 27.1727 17.7836 27.299 17.7862 27.4262C17.7887 27.5533 17.8172 27.6786 17.87 27.7942C17.9227 27.9099 17.9986 28.0136 18.0929 28.0989C18.2868 28.2754 18.5407 28.3714 18.8028 28.3671C19.065 28.3628 19.3156 28.2586 19.5036 28.0759C22.5722 25.0207 22.6546 21.7317 21.6694 19.5524C21.5241 19.2301 21.3489 18.9202 21.1462 18.6305ZM29.8996 23.9359C29.5872 24.8309 29.0026 25.7854 28.0366 26.7419C27.9456 26.8308 27.8738 26.9374 27.8256 27.0552C27.7775 27.173 27.754 27.2994 27.7567 27.4266C27.7594 27.5538 27.7882 27.6791 27.8413 27.7947C27.8944 27.9104 27.9706 28.0139 28.0654 28.0989C28.2589 28.2753 28.5125 28.3712 28.7743 28.3669C29.0361 28.3626 29.2865 28.2585 29.4741 28.0759C32.5427 25.0207 32.6251 21.7317 31.6399 19.5524C31.4946 19.2301 31.3195 18.9221 31.1167 18.6324C30.9653 18.4059 30.7906 18.1958 30.5954 18.0057C30.2881 17.6882 29.9215 17.4342 29.5163 17.2582L29.4971 17.2505C28.9532 16.9974 28.3605 16.8665 27.7606 16.8672C25.5603 16.8672 23.7739 18.5845 23.7739 20.7024C23.7739 22.8184 25.5603 24.5358 27.7606 24.5358C28.5167 24.5381 29.2585 24.3304 29.9034 23.9359H29.8996Z"
                             fill="white" />
                     </svg>
                     <div class="flex w-full items-center justify-center">
                         <h2 class="mx-2 text-2xl font-bold">{{ $data->citation_count }}</h2>
                     </div>
                 </div>
                 <div>
                     <h2>Generate key</h2>
                 </div>
             </div>
         </div>
         <div class="flex flex-col gap-2 overflow-y-auto rounded-lg bg-white p-4 drop-shadow-lg">
             <div>
                 <p class="font-extrabold">ADVISOR</p>
                 <p class="text-gray-600">{{ $data->advisor }}</p>
             </div>
             <div>
                 <p class="font-extrabold">DEFENSE PANEL CHAIR</p>
                 <p class="text-gray-600">{{ $data->panel_chair }}</p>
             </div>
             <div>
                 <p class="font-extrabold">DEFENSE PANEL MEMBER </p>
                 <p class="text-gray-600">{{ $data->panel_member_1 }}</p>
                 @if (!empty($data->panel_member_2))
                     <p class="text-gray-600">{{ $data->panel_member_2 }}</p>
                 @endif
                 @if (!empty($data->panel_member_3))
                     <p class="text-gray-600">{{ $data->panel_member_3 }}</p>
                 @endif
                 @if (!empty($data->panel_member_4))
                     <p class="text-gray-600">{{ $data->panel_member_4 }}</p>
                 @endif
             </div>
             <div>
                 <p class="font-extrabold">AUTHORS</p>
                 <p class="text-gray-600">{{ $data->author_1 }}</p>
                 @if (!empty($data->author_2))
                     <p class="text-gray-600">{{ $data->author_2 }}</p>
                 @endif
                 @if (!empty($data->author_3))
                     <p class="text-gray-600">{{ $data->author_3 }}</p>
                 @endif
                 @if (!empty($data->author_4))
                     <p class="text-gray-600">{{ $data->author_4 }}</p>
                 @endif
             </div>
         </div>
     </div>
 </section>
 <section class="mt-4 grid grid-cols-4">
     {{-- <div class="col-span-4 rounded-lg bg-white p-6 drop-shadow-lg lg:col-span-3">
                <form action="">
                    <div class="flex w-full items-center justify-center gap-2">
                        <textarea class="w-full rounded-lg border-2 border-primary-color bg-gray-100 p-2" name=""
                            placeholder="What's on your mind?" id="autoresizing"></textarea>
                        <script type="text/javascript">
                            $('#autoresizing').on('input', function() {
                                this.style.height = 'auto';

                                this.style.height =
                                    (this.scrollHeight) + 'px';
                            });
                        </script>
                        <input class="w-fit rounded-lg bg-primary-color p-2 text-white" type="submit"
                            value="Comment">
                    </div>

                </form>
            </div> --}}
 </section>
