<?php

namespace App\Livewire\Admin;

use App\Models\DocuPost;
use Livewire\Component;
use Livewire\WithPagination;

class DocuPostPanel extends Component {
    use WithPagination;

    public function mount () {
        $this->documentTypes = DocuPost::distinct()->pluck( 'document_type' );
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

    public $paginateCount = 10;
    public $search, $docuTypeQuery, $listOfDucoPost, $documentTypes ;
    public $selectedDocumentType = 'All';

    public function render() {

        $listOfDocuPost = DocuPost::latest();

        if ( $this->selectedDocumentType !== 'All' ) {
            $listOfDocuPost->where( 'document_type', $this->selectedDocumentType );
        }
        $listOfDocuPost->where( 'title', 'like', '%' . $this->search . '%' );

        $listOfDocuPost = $listOfDocuPost->paginate( $this->paginateCount );

        return view( 'livewire.admin.docu-post-panel' )
        ->with( compact( 'listOfDocuPost' ) )
        ->layout( 'layout.admin' );
    }

    // public function render() {

    //     // $listOfDucoPost = DocuPost::latest()
    //     // // ->where( 'title', 'like', '%' . $this->search . '%' )
    //     // // ->orWhere( 'document_type', 'like', '%' . $this->docuTypeQuery . '%' )
    //     // ->paginate( $this->paginateCount );

    //     // return view( 'livewire.admin.docu-post-panel' )
    //     // ->with( compact( 'listOfDucoPost' ) )
    //     // ->layout( 'layout.admin' );
    // }

}