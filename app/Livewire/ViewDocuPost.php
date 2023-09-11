<?php

namespace App\Livewire;

use App\Models\BookmarkList;
use App\Models\DocuPost;
use Livewire\Component;

class ViewDocuPost extends Component {
    public $parameter, $data;

    public function mount( $reference ) {
        $this->parameter = $reference;

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

    public function toggleBookmark() {
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

    public function render() {

        if ( auth()->check() ) {
            $idAdmin = auth()->user()->is_admin;
        } else {
            $idAdmin = false;
        }
        $this->checkBookmark();
        $layout = $idAdmin ? 'layout.admin' : 'layout.app';
        return view( 'livewire.view-docu-post' )->layout( $layout );
    }
}