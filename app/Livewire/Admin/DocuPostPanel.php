<?php

namespace App\Livewire\Admin;

use App\Models\DocuPost;
use Livewire\Component;
use Livewire\WithPagination;

class DocuPostPanel extends Component {
    use WithPagination;

    public function mount () {

    }

    public $showDeleteConfirmation = false;
    public $selectedPostId;

    public function showboxDelete( $docuId ) {
        $this->selectedPostId = $docuId;
        $this->showDeleteConfirmation = ! $this->showDeleteConfirmation;
    }

    public function deleteDocuPost() {
        $is_deleted = DocuPost::find( $this->selectedPostId )->delete();
        if ( $is_deleted ) {
            request()->session()->flash( 'success', 'Document deleted successfully.' );
        } else {
            request()->session()->flash( 'invalid', 'Deletion unsuccess, contact developers.' );
        }
        $this->showDeleteConfirmation = false;
    }

    public function deleteDocuPostYes() {

        $docu_post_delete = DocuPost::find( $this->docuPostID )->delete();
        if ( $docu_post_delete ) {
            session()->flash( 'message', 'Post deleted successfully.' );
        } else {
            session()->flash( 'message', "Post is not found, can't proceed in deletion." );
        }
        $this->showDeleteDocuPostBox = false;
    }

    public function render() {
        $listOfDucoPost = DocuPost::paginate( 10 );

        return view( 'livewire.admin.docu-post-panel' )
        ->with( compact( 'listOfDucoPost' ) )
        ->layout( 'layout.admin' );
    }

}