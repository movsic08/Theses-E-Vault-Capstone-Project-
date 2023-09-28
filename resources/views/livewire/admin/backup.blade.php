 @foreach ($degree_lists as $itemDegree)
     @php
         $itemCount = \App\Models\DocuPost::where('course', $itemDegree)->count();
     @endphp
     {{-- container of boxes grid --}}
     <div class="col-span-2 flex items-center rounded-lg bg-white p-2 shadow-lg md:col-span-1">
         <div
             class="mx-4 flex h-fit w-[3.5rem] items-center justify-center rounded-md bg-blue-500 px-4 py-2 font-semibold text-white drop-shadow-md">
             {{ $itemCount }}
         </div>
         <div>
             <h1 class="text-[1.2rem] font-bold text-blue-500">{{ $itemDegree }}</h1>
             <p class="text-gray-500">Theses submitted to the {{ $itemDegree }}
             </p>
         </div>
     </div>
 @endforeach
