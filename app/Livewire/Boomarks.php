<?php

namespace App\Livewire;

use App\Models\BookmarkList;
use App\Models\DocuPost;
use Livewire\Component;

class Boomarks extends Component
{

    public $bookmarkLists, $documentLists;
    public $deletingItemId;
    public $confirmationBox = false;

    public function showConfirmation($title, $id)
    {
        $this->title = $title;
        $this->confirmationBox = true;
        $this->deletingItemId = $id;
        $this->dispatch('open-del');
    }

    public $title;
    public function removeFromList()
    {
        $doneDeleting = BookmarkList::where('user_id', auth()->id())
            ->where('id', $this->deletingItemId)
            ->delete();

        if ($doneDeleting) {
            $this->confirmationBox = false;
            session()->flash('message', 'Removed success');
        } else {
            session()->flash('message', 'Something went wrong.');
        }

    }
    public $shareLink;
    public function toggleShare($reference)
    {
        $this->shareLink = route('view-document', ['reference' => $reference]);
        $this->dispatch('open-shr');
    }

    public function closeConfirmationBox()
    {
        $this->dispatch('close-del', function () {
            $this->title = '';
        });

    }

    public function deleteAllBookmark()
    {
        return request()->session()->flash('success', 'Bookmarks deleted!');
    }
    public function render()
    {
        $this->bookmarkLists = BookmarkList::where('user_id', auth()->id())->get();
        $bookmarkItemCount = $this->bookmarkLists->count();
        // $this->documentLists = DocuPost::where( 'reference', $this->bookmarkLists->reference )
        // ->where( 'docu_post_id', $this->bookmarkLists->docu_post_id );
        // dd( $this->bookmarkLists );
        $references = $this->bookmarkLists->pluck('reference')->toArray();

        // Retrieve DocuPost data where the 'reference' matches any value in the $references array
        $this->documentLists = DocuPost::whereIn('reference', $references)->get();
        return view('livewire.boomarks', [
            'bookmarkItemCount' => $bookmarkItemCount,
        ])
            ->layout('layout.app');
    }
}