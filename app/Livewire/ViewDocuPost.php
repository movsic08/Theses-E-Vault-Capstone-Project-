<?php

namespace App\Livewire;

use App\Models\BookmarkList;
use App\Models\DocuPost;
use App\Models\DocuPostComment;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ViewDocuPost extends Component {
    public $parameter, $data, $authenticatedUser;

    public function mount( $reference ) {
        $this->parameter = $reference;
        $this->authenticatedUser = auth()->user();
        $this->data = DocuPost::where( 'reference', $this->parameter )->first();
    }

    public $isBookmarked;

    public function checkBookmark() {
        $user = auth()->id();

        // Check if a record with the specified conditions exists
        $checkReference = BookmarkList::where( 'reference', $this->parameter )
        ->where( 'user_id', $user )
        ->where( 'docu_post_id', $this->data->id )
        ->exists();
        // Use exists() with parentheses

        if ( $checkReference ) {
            $this->isBookmarked = true;
        } else {
            $this->isBookmarked = false;
        }
    }

    public function deleteComment( $id ) {
        $isDeleted = DocuPostComment::where( 'id', $id )
        ->where( 'user_id', auth()->user()->id )
        ->delete();
        if ( !$isDeleted ) {
            request()->session()->flash( 'error', 'Deleting comment failed, contact developer!' );
        }
        return;
    }
    public $editingCommentId = null;
    public $editedComment = '';

    public function editComment( $commentId ) {
        $this->editingCommentId = $commentId;
        $this->editedComment = $this->findComment( $commentId )->comment_content;
    }

    public function updateComment( $commentId ) {
        $this->validate( [
            'editedComment' => 'required',
        ], [
            'editedComment.required' => 'You cannot update an empty comment.'
        ] );

        $comment = $this->findComment( $commentId );
        $comment->comment_content = $this->editedComment;
        $comment->save();

        $this->cancelEditing();
    }
    protected function findComment( $commentId ) {
        return DocuPostComment::find( $commentId );

    }

    public function cancelEditing() {
        $this->editingCommentId = null;
        $this->editedComment = '';
    }

    public function toggleBookmark() {
        if ( !auth()->check() ) {
            request()->session()->flash( 'message', 'You need to sign in first' );
        } else {
            $checkInfoData = empty( $this->authenticatedUser->last_name && $this->authenticatedUser->first_name && $this->authenticatedUser->last_name &&
            $this->authenticatedUser->address &&
            $this->authenticatedUser->phone_no &&
            $this->authenticatedUser->student_id &&
            $this->authenticatedUser->bachelor_degree );
            if ( $checkInfoData ) {
                request()->session()->flash( 'message', 'Account information details are incomplete, fill out now here.' );
            } else {
                if ( $this->authenticatedUser->is_verified == 0 ) {
                    request()->session()->flash( 'message', 'Ve rify your account now, to enjoy the full features for free.' );
                } else {
                    $this->isBookmarked = !$this->isBookmarked;
                    if ( $this->isBookmarked ) {
                        BookmarkList::create( [
                            'user_id' => auth()->id(),
                            'docu_post_id' => $this->data->id,
                            'reference' => $this->parameter,
                        ] );
                    } else {
                        BookmarkList::where( 'user_id', auth()->id() )
                        ->where( 'docu_post_id', $this->data->id )
                        ->where( 'reference', $this->parameter )
                        ->delete();
                    }
                }

            }

        }
    }

    #[ Rule( 'required|min:1' ) ]
    public $comment = '';

    public function createDocuPostComment() {
        $this->validateOnly( 'comment' );
        if ( !auth()->check() ) {
            request()->session()->flash( 'message', 'You need to sign in first' );
        } else {
            $checkInfoData = empty( $this->authenticatedUser->last_name && $this->authenticatedUser->first_name && $this->authenticatedUser->last_name &&
            $this->authenticatedUser->address &&
            $this->authenticatedUser->phone_no &&
            $this->authenticatedUser->student_id &&
            $this->authenticatedUser->bachelor_degree );
            if ( $checkInfoData ) {
                request()->session()->flash( 'message', 'Account information details are incomplete, fill out now here.' );
            } else {
                if ( $this->authenticatedUser->is_verified == 0 ) {
                    request()->session()->flash( 'message', 'Ve rify your account now, to enjoy the full features for free.' );
                } else {
                    $checkIfSuccess =  DocuPostComment::create( [
                        'post_id' =>  $this->data->id,
                        'user_id' => $this->authenticatedUser->id,
                        'comment_content' =>  $this->comment
                    ] );
                    if ( $checkIfSuccess ) {
                        request()->session()->flash( 'success', 'Comment created' );

                    } else {
                        request()->session()->flash( 'warning', 'Comment failed' );
                    }
                    $this->dispatch( '$refresh' );
                    return $this->comment = '';
                }
            }
        }
    }

    public $showReplyBox = false, $targetReply = null, $replyingTo, $currentReplyingID;

    public function toggleReplyBox( $commentId, $commentMainAuthor ) {
        $this->showReplyBox = true;
        $this->targetReply = $commentId;
        $mainAuthorDetails = User::where( 'id', $commentMainAuthor )->first();

        if ( $mainAuthorDetails ) {
            $fullName = $mainAuthorDetails->first_name . ' ' . $mainAuthorDetails->last_name;
            $this->replyingTo = $fullName;
            $this->currentReplyingID = $commentMainAuthor;
        } else {
            $this->replyingTo = 'user';
        }

    }

    public $showReplyingBox = false, $targetMainIDForReplyingReply, $mainCOmmentAUthor;

    public function toggleReplyToRepliedBox( $parentCommentID, $mainAuthorCOmment ) {
        $this->showReplyingBox = ! $this->showReplyingBox;
        $this->targetReply = $parentCommentID;
        $this->mainCOmmentAUthor = $mainAuthorCOmment;
        $mainAuthorDetails = User::where( 'id', $mainAuthorCOmment )->first();
        if ( $mainAuthorDetails ) {
            $fullName = $mainAuthorDetails->first_name . ' ' . $mainAuthorDetails->last_name;
            $this->replyingTo = $fullName;
        } else {
            $this->replyingTo = 'user';
        }
    }

    public $targetReplies;

    public function toggleReplyToRepliesOfReplyBox( $targetID,  $parentCommentID, $mainAuthorCOmment ) {
        // dd( $targetID );
        $this->showReplyingBox = ! $this->showReplyingBox;
        $this->targetReplies = $targetID;
        $this->mainCOmmentAUthor = $mainAuthorCOmment;
        $mainAuthorDetails = User::where( 'id', $mainAuthorCOmment )->first();
        if ( $mainAuthorDetails ) {
            $fullName = $mainAuthorDetails->first_name . ' ' . $mainAuthorDetails->last_name;
            $this->replyingTo = $fullName;
        } else {
            $this->replyingTo = 'user';
        }
    }

    #[ Rule( 'required|min:1', message: 'Reply should not be empty.' ) ]
    public $replyCommentContent = '';

    public function createReply() {
        $this->validateOnly( 'replyCommentContent' );
        if ( !auth()->check() ) {
            request()->session()->flash( 'message', 'You need to sign in first' );
        } else {
            $checkInfoData = empty( $this->authenticatedUser->last_name && $this->authenticatedUser->first_name && $this->authenticatedUser->last_name &&
            $this->authenticatedUser->address &&
            $this->authenticatedUser->phone_no &&
            $this->authenticatedUser->student_id &&
            $this->authenticatedUser->bachelor_degree );
            if ( $checkInfoData ) {
                request()->session()->flash( 'message', 'Account information details are incomplete, fill out now here.' );
            } else {
                if ( $this->authenticatedUser->is_verified == 0 ) {
                    request()->session()->flash( 'message', 'Ve rify your account now, to enjoy the full features for free.' );
                } else {
                    // dd( $this->data->id, $this->targetReply, $this->authenticatedUser->id, $this->replyCommentContent );
                    $checkIfSuccess =  DocuPostComment::create( [
                        'post_id' =>  $this->data->id,
                        'parent_id' =>  $this->targetReply,
                        'user_id' => $this->authenticatedUser->id,
                        'comment_content' =>  $this->replyCommentContent
                    ] );
                    if ( $checkIfSuccess ) {
                        request()->session()->flash( 'success', 'Comment created' );

                    } else {
                        request()->session()->flash( 'warning', 'Comment failed' );
                    }
                    $this->dispatch( '$refresh' );
                    $this->showReplyBox = false;
                    return $this->comment = '';
                }
            }
        }
    }

    public function createReplyToReplies() {
        $this->validateOnly( 'replyCommentContent' );
        if ( !auth()->check() ) {
            request()->session()->flash( 'message', 'You need to sign in first' );
        } else {
            $checkInfoData = empty( $this->authenticatedUser->last_name && $this->authenticatedUser->first_name && $this->authenticatedUser->last_name &&
            $this->authenticatedUser->address &&
            $this->authenticatedUser->phone_no &&
            $this->authenticatedUser->student_id &&
            $this->authenticatedUser->bachelor_degree );
            if ( $checkInfoData ) {
                request()->session()->flash( 'message', 'Account information details are incomplete, fill out now here.' );
            } else {
                if ( $this->authenticatedUser->is_verified == 0 ) {
                    request()->session()->flash( 'message', 'Ve rify your account now, to enjoy the full features for free.' );
                } else {
                    // dd( $this->data->id, $this->targetReply, $this->authenticatedUser->id, $this->replyCommentContent );
                    $checkIfSuccess =  DocuPostComment::create( [
                        'post_id' =>  $this->data->id,
                        'parent_id' =>  $this->targetReply,
                        'user_id' => $this->authenticatedUser->id,
                        'reply_parent_author' => $this->mainCOmmentAUthor,
                        'comment_content' => $this->replyCommentContent
                    ] );
                    if ( $checkIfSuccess ) {
                        request()->session()->flash( 'success', 'Comment created' );

                    } else {
                        request()->session()->flash( 'warning', 'Comment failed' );
                    }
                    $this->dispatch( '$refresh' );
                    $this->showReplyingBox = false;
                    return $this->replyCommentContent = '';
                }
            }
        }
        // dd(
        //     'postID- '.$this->data->id,
        //     'userID- '.$this->authenticatedUser->id,
        //     'Parent ID- '.$this->targetReply,
        //     'MainAuthorComment- '.$this->mainCOmmentAUthor
        // );
    }

    public function render() {
        $comments = DocuPostComment::where( 'post_id', $this->data->id )
        ->where( 'parent_id', null )
        ->where( 'reply_parent_author', null )
        ->latest()->get();
        $replyComments = DocuPostComment::where( 'post_id', $this->data->id )
        ->whereNotNull( 'parent_id' )
        ->where( 'reply_parent_author', null )
        ->orderBy( 'created_at', 'desc' )
        ->get();
        $repliesToReplyComments = DocuPostComment::where( 'post_id', $this->data->id )
        ->whereNotNull( 'parent_id' )
        ->whereNotNull( 'reply_parent_author' )
        ->orderBy( 'created_at', 'desc' )
        ->get();
        // dd( $repliesToReplyComments );

        if ( auth()->check() ) {
            $idAdmin = auth()->user()->is_admin;
        } else {
            $idAdmin = false;
        }
        $this->checkBookmark();
        $layout = $idAdmin ? 'layout.admin' : 'layout.app';
        return view( 'livewire.view-docu-post', [
            'comments' => $comments,
            'replyComments' => $replyComments,
            'repliesToReplyComments' => $repliesToReplyComments,
        ] )->layout( $layout );
    }
}