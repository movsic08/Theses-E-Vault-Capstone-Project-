<?php

namespace App\Livewire;

use App\Models\BookmarkList;
use Illuminate\Support\Str;
use App\Models\DocuPost;
use App\Models\DocuPostComment;
use App\Models\PdfKey;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ViewDocuPost extends Component
{
    public $parameter, $data, $authenticatedUser;

    public function mount($reference)
    {
        $this->parameter = $reference;
        $this->authenticatedUser = auth()->user();
        $this->data = DocuPost::where('reference', $this->parameter)->first();
    }

    public $isBookmarked;

    public function checkBookmark()
    {
        $user = auth()->id();

        // Check if a record with the specified conditions exists
        $checkReference = BookmarkList::where('reference', $this->parameter)
            ->where('user_id', $user)
            ->where('docu_post_id', $this->data->id)
            ->exists();
        // Use exists() with parentheses

        if ($checkReference) {
            $this->isBookmarked = true;
        } else {
            $this->isBookmarked = false;
        }
    }

    public function deleteComment($id)
    {
        $isDeleted = DocuPostComment::where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->delete();
        if (!$isDeleted) {
            request()->session()->flash('error', 'Deleting comment failed, contact developer!');
        }
        return;
    }
    public $editingCommentId = null;
    public $editedComment = '';

    public function editComment($commentId)
    {
        $this->editingCommentId = $commentId;
        $this->editedComment = $this->findComment($commentId)->comment_content;
    }

    public function updateComment($commentId)
    {
        $this->validate([
            'editedComment' => 'required',
        ], [
            'editedComment.required' => 'You cannot update an empty comment.'
        ]);

        $comment = $this->findComment($commentId);
        $comment->comment_content = $this->editedComment;
        $comment->save();

        $this->cancelEditing();
    }
    protected function findComment($commentId)
    {
        return DocuPostComment::find($commentId);

    }

    public function cancelEditing()
    {
        $this->editingCommentId = null;
        $this->editedComment = '';
    }

    public function toggleBookmark()
    {
        if (!auth()->check()) {
            request()->session()->flash('message', 'You need to sign in first');
        } else {
            $checkInfoData = empty($this->authenticatedUser->last_name && $this->authenticatedUser->first_name && $this->authenticatedUser->last_name &&
                $this->authenticatedUser->address &&
                $this->authenticatedUser->phone_no &&
                $this->authenticatedUser->student_id &&
                $this->authenticatedUser->bachelor_degree);
            if ($checkInfoData) {
                request()->session()->flash('message', 'Account information details are incomplete, fill out now here.');
            } else {
                if ($this->authenticatedUser->is_verified == 0) {
                    request()->session()->flash('message', 'Ve rify your account now, to enjoy the full features for free.');
                } else {
                    $this->isBookmarked = !$this->isBookmarked;
                    if ($this->isBookmarked) {
                        BookmarkList::create([
                            'user_id' => auth()->id(),
                            'docu_post_id' => $this->data->id,
                            'reference' => $this->parameter,
                        ]);
                    } else {
                        BookmarkList::where('user_id', auth()->id())
                            ->where('docu_post_id', $this->data->id)
                            ->where('reference', $this->parameter)
                            ->delete();
                    }
                }

            }

        }
    }

    #[Rule('required|min:1')]
    public $comment = '';

    public function createDocuPostComment()
    {
        $this->validateOnly('comment');
        if (!auth()->check()) {
            request()->session()->flash('message', 'You need to sign in first');
        } else {
            $checkInfoData = empty($this->authenticatedUser->last_name && $this->authenticatedUser->first_name && $this->authenticatedUser->last_name &&
                $this->authenticatedUser->address &&
                $this->authenticatedUser->phone_no &&
                $this->authenticatedUser->student_id &&
                $this->authenticatedUser->bachelor_degree);
            if ($checkInfoData) {
                request()->session()->flash('message', 'Account information details are incomplete, fill out now here.');
            } else {
                if ($this->authenticatedUser->is_verified == 0) {
                    request()->session()->flash('message', 'Ve rify your account now, to enjoy the full features for free.');
                } else {
                    $checkIfSuccess = DocuPostComment::create([
                        'post_id' => $this->data->id,
                        'user_id' => $this->authenticatedUser->id,
                        'comment_content' => $this->comment
                    ]);
                    if ($checkIfSuccess) {
                        request()->session()->flash('success', 'Comment created');

                    } else {
                        request()->session()->flash('warning', 'Comment failed');
                    }
                    $this->dispatch('$refresh');
                    return $this->comment = '';
                }
            }
        }
    }

    public $showReplyBox = false, $targetReply = null, $replyingTo, $currentReplyingID;

    public function toggleReplyBox($commentId, $commentMainAuthor)
    {
        // dd( $commentMainAuthor );
        $this->showReplyBox = true;
        $this->targetReply = $commentId;
        $mainAuthorDetails = User::where('id', $commentMainAuthor)->first();

        if ($mainAuthorDetails) {
            $fullName = $mainAuthorDetails->first_name . ' ' . $mainAuthorDetails->last_name;
            $this->replyingTo = $fullName;
            $this->currentReplyingID = $commentMainAuthor;
        } else {
            $this->replyingTo = 'user';
        }

    }

    #[Rule('required|min:1', message: 'Reply should not be empty.')]
    public $replyCommentContent = '';
    #[Rule('required|min:1', message: 'You\'re about to reply a replied comment. It should not be empty.')]
    public $replyOfRepliedCommentContent = '';

    public function createReply()
    {
        $this->validateOnly('replyCommentContent');
        if (!auth()->check()) {
            request()->session()->flash('message', 'You need to sign in first');
        } else {
            $checkInfoData = empty($this->authenticatedUser->last_name && $this->authenticatedUser->first_name && $this->authenticatedUser->last_name &&
                $this->authenticatedUser->address &&
                $this->authenticatedUser->phone_no &&
                $this->authenticatedUser->student_id &&
                $this->authenticatedUser->bachelor_degree);
            if ($checkInfoData) {
                request()->session()->flash('message', 'Account information details are incomplete, fill out now here.');
            } else {
                if ($this->authenticatedUser->is_verified == 0) {
                    request()->session()->flash('message', 'Ve rify your account now, to enjoy the full features for free.');
                } else {
                    // dd( $this->data->id, $this->targetReply, $this->authenticatedUser->id, $this->replyCommentContent );
                    $checkIfSuccess = DocuPostComment::create([
                        'post_id' => $this->data->id,
                        'parent_id' => $this->targetReply,
                        'user_id' => $this->authenticatedUser->id,
                        'comment_content' => $this->replyCommentContent,
                        'reply_parent_author' => $this->currentReplyingID,
                    ]);
                    if ($checkIfSuccess) {
                        request()->session()->flash('success', 'Comment created');

                    } else {
                        request()->session()->flash('warning', 'Comment failed');
                    }
                    $this->dispatch('$refresh');
                    $this->showReplyBox = false;
                    return $this->comment = '';
                }
            }
        }
    }

    public function createRepliesOfReply()
    {
        $this->validateOnly('replyOfRepliedCommentContent');
        $checkIfSuccess = DocuPostComment::create([
            'post_id' => $this->data->id,
            'parent_id' => $this->parentIDCommentValue,
            'user_id' => $this->authenticatedUser->id,
            'comment_content' => $this->replyOfRepliedCommentContent,
            'reply_parent_author' => $this->parentCommentUserId,
        ]);
        if ($checkIfSuccess) {
            request()->session()->flash('success', 'Comment created');

        } else {
            request()->session()->flash('warning', 'Comment failed');
        }
        $this->dispatch('$refresh');
        $this->replyBoxOfReplies = false;
        return $this->replyOfRepliedCommentContent = '';
    }

    public $replyBoxOfReplies = false, $replyingIDtarget, $replyingToReplyName, $parentCommentUserId, $parentIDCommentValue;

    public function toggleReplyBoxFromReplies($replyingIdOfComment, $UserIdOfComment, $parenIDOfComment)
    {
        $this->parentIDCommentValue = $parenIDOfComment;
        $this->parentCommentUserId = $UserIdOfComment;
        $this->replyingIDtarget = $replyingIdOfComment;
        $this->replyBoxOfReplies = true;

        $findUserID = DocuPostComment::where('id', $replyingIdOfComment)->first();

        if ($findUserID) {
            $nameOfComment = $findUserID->user_id;

            $namingTheAuthor = User::where('id', $nameOfComment)->first();

            if ($namingTheAuthor) {
                $this->replyingToReplyName = $namingTheAuthor->first_name . ' ' . $namingTheAuthor->last_name;
            } else {
                $this->replyingToReplyName = 'Unknown User';
            }
        } else {
            $this->replyingToReplyName = 'Unknown Comment';
        }

    }

    public $InputPDFKey = 'Generate key';

    public function generatePDFKey($id)
    {
        $isKeyIsGEnerated = PdfKey::where('docu_post_id', $id)->exists();
        if ($isKeyIsGEnerated) {
            PdfKey::where('docu_post_id', $id)->delete();
            $this->keyGenerator($id);
        } else {
            $this->keyGenerator($id);
        }
        // dd('end of code');
    }

    protected function keyGenerator($id)
    {
        do {
            $secureKey = Str::random(18);
        } while (PdfKey::where('keys', $secureKey)->exists());

        $createKey = PdfKey::create([
            'docu_post_id' => $id,
            'keys' => $secureKey,
        ]);

        if ($createKey) {
            $this->InputPDFKey = $secureKey;
            return request()->session()->flash('success', 'Key generated success, you can use it now');
        } else {
            return request()->session()->flash('warning', 'Error generating Keys, contact IT Administrator.');
        }
    }

    public $reportingCommentData;

    public function showReportBox($commentID)
    {
        dd($commentID);
        $this->reportingCommentData = 'hello';
        $this->dispatch('open-rep');
    }
    public function closeReportBox()
    {
        $this->dispatch('close-rep');
        $this->reportReason = '';
        return $this->report_other_context = '';
    }

    public $reportReason, $report_other_context;


    public function createReportComment()
    {
        if ($this->reportReason === 'other') {
            $this->validateOnly($this->reportReason);
        }
        dd($this->reportReason);

    }


    public function render()
    {
        $comments = DocuPostComment::where('post_id', $this->data->id)
            ->where('parent_id', null)
            ->where('reply_parent_author', null)
            ->latest()->get();
        $replyComments = DocuPostComment::where('post_id', $this->data->id)
            ->whereNotNull('parent_id')
            ->orderBy('created_at')
            ->get();

        if (auth()->check()) {
            $idAdmin = auth()->user()->is_admin;
        } else {
            $idAdmin = false;
        }
        $this->checkBookmark();
        $layout = $idAdmin ? 'layout.admin' : 'layout.app';
        return view('livewire.view-docu-post', [
            'comments' => $comments,
            'replyComments' => $replyComments,
            // 'repliesToReplyComments' => $repliesToReplyComments,
        ])->layout($layout);
    }
}