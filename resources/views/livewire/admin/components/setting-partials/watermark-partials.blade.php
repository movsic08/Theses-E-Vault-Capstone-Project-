 <div x-show="activeTab === 'watermarkConfiguration'" class="flex w-full gap-4">
     <div class="w-2/5 rounded-lg bg-white p-4 drop-shadow-md">
         <strong>Current Watermark</strong>
         <img class="h-56" src="{{ asset('storage/watermark/watermark.png') }}" alt="watermark photo" srcset="">
     </div>
     <div class="w-3/5 rounded-lg bg-white p-4 drop-shadow-md">
         <x-label-input>Change watermark</x-label-input>

     </div>
 </div>
