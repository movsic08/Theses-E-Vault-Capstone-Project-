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
    public $selectedPostId, $selectedPostIdTtitle;

    public function showboxDelete( $docuId ) {
        $this->selectedPostId = $docuId;
        $this->showDeleteConfirmation = ! $this->showDeleteConfirmation;
        $itemSelected_data = DocuPost::find( $docuId );
        $this->selectedPostIdTtitle = $itemSelected_data->title;
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
    public $search, $docuTypeQuery, $listOfDucoPost, $documentTypes, $statusType = '5' ;
    public $selectedDocumentType = 'All';

    public $showViewDocuPostBox = false;

    public function toggleViewDocuBox() {
        $this->showViewDocuPostBox = ! $this->showViewDocuPostBox;
        $this->selectedIdToView = null;
    }

    public $dataItem;

    public function viewDocuPost( $id ) {
        $this->showViewDocuPostBox = true;
        $this->dataItem = DocuPost::find( $id );
    }

    public function render() {

        $listOfDocuPost = DocuPost::latest();

        if ( $this->selectedDocumentType !== 'All' ) {
            $listOfDocuPost->where( 'document_type', $this->selectedDocumentType );
        }
        $listOfDocuPost->where( 'title', 'like', '%' . $this->search . '%' );

        if ( $this->statusType !== '5' ) {
            $listOfDocuPost->where( 'status', $this->statusType );
        }

        $listOfDocuPost = $listOfDocuPost->paginate( $this->paginateCount );

        return view( 'livewire.admin.docu-post-panel', [
            'listOfDocuPost'=> $listOfDocuPost
        ] )
        ->layout( 'layout.admin' );
    }

}