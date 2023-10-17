 <div class="sticky hidden gap-3 lg:col-span-3 lg:flex lg:flex-col">
     <div class="col-span-4 rounded-lg bg-white p-6 drop-shadow-lg lg:col-span-3">
         <form wire:submit.prevent='createDocuPostComment'>
             <div class="flex w-full items-center justify-center gap-2">
                 <textarea wire:model.live='comment' wire:keydown.enter="createDocuPostComment"
                     class="w-full rounded-lg border-2 border-primary-color bg-gray-100 p-2" name=""
                     placeholder="What's on your mind?" id="autoresizing"></textarea>
                 <script type="text/javascript">
                     $('#autoresizing').on('input', function() {
                         this.style.height = 'auto';

                         this.style.height =
                             (this.scrollHeight) + 'px';
                     });
                 </script>
                 <input class="w-fit cursor-pointer rounded-lg bg-primary-color p-2 text-white" type="submit"
                     value="Comment">
             </div>
             @error('comment')
                 <small class="my-1 text-red-500">{{ $message }}</small>
             @enderror
         </form>
     </div>
     {{-- comment area --}}
     @foreach ($comments as $commentsItem)
         @php
             $commentAuthorDetails = App\Models\User::where('id', $commentsItem->user_id)->first();
             $fullname = $commentAuthorDetails->first_name . ' ' . $commentAuthorDetails->last_name;

         @endphp
         <div class="container">
             {{-- parent comment --}}
             <div class="rounded-xl bg-white px-4 py-2 drop-shadow-md" wire:poll.10s="$refresh">
                 <div class="flex w-full">
                     <img src="{{ empty($commentAuthorDetails->profile_picture) ? asset('assets/default_profile.png') : asset('storage/' . $commentAuthorDetails->profile_picture) }}"
                         class="mr-2 h-8 w-8 rounded-full object-cover" alt="user profile" srcset="">
                     <div class="w-full">
                         <div class="flex w-full flex-col leading-tight">
                             <div class="flex w-full justify-between">
                                 <strong>{{ $fullname }}</strong>
                                 <section class="flex gap-1">
                                     <div class="flex items-center gap-1">
                                         @if ($commentsItem->created_at != $commentsItem->updated_at)
                                             <small class="text-xs">Edited</small>
                                             <div class="h-1 w-1 rounded-full bg-slate-700"></div>
                                         @endif
                                     </div>
                                     @if ($commentAuthorDetails->role_id == 1)
                                         <span class="font-medium">Student</span>
                                     @elseif($commentAuthorDetails->role_id == 1)
                                         <span class="font-medium">Faculty</span>
                                     @else
                                         <span class="font-medium">ERROR!</span>
                                     @endif
                                 </section>
                             </div>
                             <div class="flex gap-2">
                                 @php
                                     $commentorInfo = \App\Models\User::find($commentsItem->user_id);
                                     $bachelorDegree = \App\Models\BachelorDegree::find($commentorInfo->bachelor_degree);
                                     // $commentDate = Carbon\Carbon::parse($commentAuthorDetails->created_at)->setTimezone('Asia/Manila');
                                     // $timeAgo = $commentDate->diffForHumans();
                                 @endphp
                                 <small>{{ \Carbon\Carbon::parse($commentAuthorDetails->created_at)->diffForHumans() }}</small>
                                 <small>{{ $bachelorDegree->degree_name }}</small>
                             </div>

                         </div>
                         <div class="my-2 w-full rounded-md py-1">
                             @if ($editingCommentId === $commentsItem->id)
                                 <section class="flex w-full flex-row items-start gap-2">
                                     <div class="w-full">
                                         <x-input-field wire:model="editedComment" type="text" class="w-full" />
                                         @error('editedComment')
                                             <small class="text-red-500">{{ $message }}</small>
                                         @enderror
                                     </div>
                                     <button
                                         class="h-9 w-fit rounded-md bg-blue-700 px-2 py-1 font-semibold text-white duration-300 ease-in-out hover:bg-primary-color"
                                         wire:click="updateComment({{ $commentsItem->id }})">Save</button>
                                     <button
                                         class="h-9 w-fit rounded-md bg-blue-700 px-2 py-1 font-semibold text-white duration-300 ease-in-out hover:bg-primary-color"
                                         wire:click="cancelEditing">Cancel</button>
                                 </section>
                             @else
                                 <p class="">{{ $commentsItem->comment_content }}</p>
                             @endif
                         </div>
                         <div class="flex w-full justify-start">
                             <ul class="flex gap-2 text-xs">
                                 @if (auth()->check())
                                     @if ($commentsItem->user_id === auth()->user()->id)
                                         <li wire:click='editComment({{ $commentsItem->id }})'
                                             class="cursor-pointer transition duration-200 ease-in-out hover:font-semibold">
                                             Edit
                                         </li>
                                         <li wire:click='deleteComment({{ $commentsItem->id }})'
                                             class="cursor-pointer transition duration-200 ease-in-out hover:font-semibold">
                                             Delete
                                         </li>
                                     @endif
                                     @if ($commentsItem->user_id !== auth()->user()->id)
                                         <li wire:click='toggleReplyBox({{ $commentsItem->id }}, {{ $commentsItem->user_id }})'
                                             class="cursor-pointer transition duration-200 ease-in-out hover:font-semibold">
                                             Reply
                                         </li>
                                     @endif
                                     <li class="cursor-pointer transition duration-200 ease-in-out hover:font-semibold">
                                         Report</li>
                                 @endif
                             </ul>
                         </div>
                     </div>
                 </div>

             </div>
             {{-- reply comments area --}}
             @foreach ($replyComments as $replyCommentsItem)
                 @if ($replyCommentsItem->parent_id == $commentsItem->id)
                     <div class="ml-12 mt-2 rounded-xl bg-white px-4 py-2 drop-shadow-md" wire:poll.10s="$refresh">
                         @php
                             $commentMainAuthorID = App\Models\User::find($replyCommentsItem->user_id);

                             if ($commentMainAuthorID) {
                                 $fullNameOfMainComment = $commentMainAuthorID->first_name . ' ' . $commentMainAuthorID->last_name;
                             } else {
                                 $fullNameOfMainComment = 'User'; // or any other default value
                             }
                         @endphp

                         <div class="flex w-full">
                             <img src="{{ empty($commentMainAuthorID->profile_picture) ? asset('assets/default_profile.png') : asset('storage/' . $commentMainAuthorID->profile_picture) }}"
                                 class="mr-2 h-8 w-8 rounded-full object-cover" alt="user profile" srcset="">
                             <div class="w-full">
                                 <div class="flex w-full flex-col leading-tight">
                                     <div class="flex w-full justify-between">
                                         <div class="flex items-center gap-1">
                                             @php
                                                 $nameOfReplyingComment = App\Models\User::where('id', $replyCommentsItem->reply_parent_author)->first();
                                                 if ($nameOfReplyingComment) {
                                                     $fullNameOfRepliedComment = $nameOfReplyingComment->first_name . ' ' . $nameOfReplyingComment->last_name;
                                                 } else {
                                                     $fullNameOfRepliedComment = 'user';
                                                 }

                                             @endphp
                                             <strong>{{ $fullNameOfMainComment }}</strong>
                                             <small>replying to {{ $fullNameOfRepliedComment }}</small>
                                         </div>
                                         <section class="flex gap-1">
                                             <div class="flex items-center gap-1">
                                                 @if ($replyCommentsItem->created_at != $replyCommentsItem->updated_at)
                                                     <small class="text-xs">Edited</small>
                                                     <div class="h-1 w-1 rounded-full bg-slate-700"></div>
                                                 @endif
                                             </div>
                                             @if ($commentMainAuthorID)
                                                 @if ($commentMainAuthorID->role_id == 1)
                                                     <span class="font-medium">Student</span>
                                                 @elseif ($commentMainAuthorID->role_id == 2)
                                                     <span class="font-medium">Faculty</span>
                                                 @else
                                                     <span class="font-medium">ERROR!</span>
                                                 @endif
                                             @else
                                                 <span class="font-medium">Deleted user</span>
                                             @endif

                                         </section>
                                     </div>
                                     <div class="flex gap-2">
                                         @php
                                             $commentorInfo = \App\Models\User::find($replyCommentsItem->user_id);

                                             if ($commentorInfo) {
                                                 $bachelorDegree = \App\Models\BachelorDegree::find($commentorInfo->bachelor_degree);

                                                 if ($bachelorDegree) {
                                                     $degreeName = $bachelorDegree->degree_name;
                                                 } else {
                                                     $degreeName = 'Unknown Degree';
                                                 }
                                             } else {
                                                 $degreeName = 'Unknown User';
                                             }
                                         @endphp

                                         <small>{{ \Carbon\Carbon::parse($commentAuthorDetails->created_at)->diffForHumans() }}</small>
                                         <small>{{ $degreeName }}</small>
                                     </div>

                                 </div>
                                 <div class="my-2 w-full rounded-md py-1">
                                     @if ($editingCommentId === $replyCommentsItem->id)
                                         <section class="flex w-full flex-row items-start gap-2">
                                             <div class="w-full">
                                                 <x-input-field wire:model="editedComment" type="text"
                                                     class="w-full" />
                                                 @error('editedComment')
                                                     <small class="text-red-500">{{ $message }}</small>
                                                 @enderror
                                             </div>
                                             <button
                                                 class="h-9 w-fit rounded-md bg-blue-700 px-2 py-1 font-semibold text-white duration-300 ease-in-out hover:bg-primary-color"
                                                 wire:click="updateComment({{ $replyCommentsItem->id }})">Save</button>
                                             <button
                                                 class="h-9 w-fit rounded-md bg-blue-700 px-2 py-1 font-semibold text-white duration-300 ease-in-out hover:bg-primary-color"
                                                 wire:click="cancelEditing">Cancel</button>
                                         </section>
                                     @else
                                         <p class="">{{ $replyCommentsItem->comment_content }}</p>
                                     @endif
                                 </div>
                                 <div class="flex w-full justify-start">
                                     <ul class="flex gap-2 text-xs">
                                         @if (auth()->check())
                                             @if ($replyCommentsItem->user_id === auth()->user()->id)
                                                 <li wire:click='editComment({{ $replyCommentsItem->id }})'
                                                     class="cursor-pointer transition duration-200 ease-in-out hover:font-semibold">
                                                     Edit
                                                 </li>
                                                 <li wire:click='deleteComment({{ $replyCommentsItem->id }})'
                                                     class="cursor-pointer transition duration-200 ease-in-out hover:font-semibold">
                                                     Delete
                                                 </li>
                                             @endif
                                             @if ($replyCommentsItem->user_id !== auth()->user()->id)
                                                 <li wire:click='toggleReplyBoxFromReplies({{ $replyCommentsItem->id }}, {{ $replyCommentsItem->user_id }}, {{ $replyCommentsItem->parent_id }})'
                                                     class="cursor-pointer transition duration-200 ease-in-out hover:font-semibold">
                                                     Reply
                                                 </li>
                                             @endif
                                             <li
                                                 class="cursor-pointer transition duration-200 ease-in-out hover:font-semibold">
                                                 Report</li>
                                         @endif
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     {{-- reply form --}}
                     @if ($replyBoxOfReplies && $replyingIDtarget === $replyCommentsItem->id)
                         <div class="col-span-4 ml-12 mt-3 rounded-lg bg-white p-2 drop-shadow-lg lg:col-span-3">
                             <form wire:submit.prevent='createRepliesOfReply'>
                                 <div class="flex w-full items-center justify-center gap-2">
                                     <textarea wire:model.live='replyOfRepliedCommentContent' wire:keydown.enter="createRepliesOfReply"
                                         class="w-full rounded-lg border-2 border-primary-color bg-gray-100 p-2" name=""
                                         placeholder="Replying to {{ $replyingToReplyName }}" id="autoresizing"></textarea>
                                     <script type="text/javascript">
                                         $('#autoresizing').on('input', function() {
                                             this.style.height = 'auto';

                                             this.style.height =
                                                 (this.scrollHeight) +
                                                 'px';
                                         });
                                     </script>
                                     <input class="w-fit cursor-pointer rounded-lg bg-primary-color p-2 text-white"
                                         type="submit" value="Reply">
                                 </div>
                                 @error('replyOfRepliedCommentContent')
                                     <small class="my-1 text-red-500">{{ $message }}</small>
                                 @enderror
                             </form>
                         </div>
                     @endif
                 @endif
             @endforeach

             {{-- reply form --}}
             @if ($showReplyBox && $targetReply === $commentsItem->id)
                 <div class="col-span-4 ml-12 mt-3 rounded-lg bg-white p-2 drop-shadow-lg lg:col-span-3">
                     <form wire:submit.prevent='createReply'>
                         <div class="flex w-full items-center justify-center gap-2">
                             <textarea wire:model.live='replyCommentContent' wire:keydown.enter="createReply"
                                 class="w-full rounded-lg border-2 border-primary-color bg-gray-100 p-2" name=""
                                 placeholder="Replying to {{ $replyingTo }}" id="autoresizing"></textarea>
                             <script type="text/javascript">
                                 $('#autoresizing').on('input', function() {
                                     this.style.height = 'auto';

                                     this.style.height =
                                         (this.scrollHeight) + 'px';
                                 });
                             </script>
                             <input class="w-fit cursor-pointer rounded-lg bg-primary-color p-2 text-white"
                                 type="submit" value="Reply">
                         </div>
                         @error('replyCommentContent')
                             <small class="my-1 text-red-500">{{ $message }}</small>
                         @enderror
                     </form>
                 </div>
             @endif
         </div>
     @endforeach
 </div>
