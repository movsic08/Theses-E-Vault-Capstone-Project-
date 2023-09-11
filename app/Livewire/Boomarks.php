<?php

namespace App\Livewire;

use App\Models\BookmarkList;
use App\Models\DocuPost;
use Livewire\Component;

class Boomarks extends Component {

    public $bookmarkLists, $documentLists;
    public $deletingItemId;
    public $deletingReferId;
    public $confirmationBox = false;

    public function showConfirmation( $id, $referId ) {
        $this->confirmationBox = true;
        $this->deletingItemId = $id;
        $this->deletingReferId = $referId;
    }

    public function removeFromList() {

        $doneDeleting = BookmarkList::where( 'user_id', auth()->id() )
        ->where( 'id', $this->deletingItemId )
        ->delete();

        if ( $doneDeleting ) {
            $this->confirmationBox = false;
            session()->flash( 'message', 'ssuceess' );
        } else {
            session()->flash( 'message', 'soemthign wrong' );
        }

    }

    public function closeConfirmationBox() {
        $this->confirmationBox = false;

    }

    public function render() {
        $this->bookmarkLists = BookmarkList::where( 'user_id', auth()->id() )->get();
        // $this->documentLists = DocuPost::where( 'reference', $this->bookmarkLists->reference )
        // ->where( 'docu_post_id', $this->bookmarkLists->docu_post_id );
        // dd( $this->documentLists );
        return view( 'livewire.boomarks' )
        ->layout( 'layout.app' );
    }
}