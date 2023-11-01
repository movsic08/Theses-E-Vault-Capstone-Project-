<?php

namespace App\Livewire\Admin;

use App\Models\BachelorDegree;
use App\Models\DocuPost;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class DocuPostPanel extends Component
{
    use WithPagination;

    public function mount()
    {
        $this->documentTypes = DocuPost::distinct()->pluck('document_type');
    }

    public $showDeleteConfirmation = false;
    public $selectedPostId, $selectedPostIdTtitle;

    public function showboxDelete($docuId)
    {
        $this->selectedPostId = $docuId;
        $this->showDeleteConfirmation = !$this->showDeleteConfirmation;
        $itemSelected_data = DocuPost::find($docuId);
        $this->selectedPostIdTtitle = $itemSelected_data->title;
    }

    public function deleteDocuPost()
    {

        $docupost = DocuPost::find($this->selectedPostId);
        if (Storage::disk('public')->exists($docupost->document_file_url)) {
            Storage::disk('public')->delete($docupost->document_file_url); // Corrected the variable name
            $docupost->delete();
            request()->session()->flash('success', 'Document deleted successfully.');
        } else {
            if ($docupost->delete()) {
                request()->session()->flash('success', 'Document deleted successfully except the file.');
            }
            request()->session()->flash('invalid', 'Deletion unsuccessful, contact developers.');
        }



        // if ($is_deleted) {
        //     request()->session()->flash('success', 'Document deleted successfully.');
        // } else {
        //     request()->session()->flash('invalid', 'Deletion unsuccess, contact developers.');
        // }
        $this->showDeleteConfirmation = false;
    }

    // public function deleteDocuPostYes()
    // {
    //     if (Storage::disk('public')->exists($filepath)) {
    //         // File exists, so delete it
    //         Storage::disk('public')->delete($filepath);
    //         $docu_post_delete = DocuPost::find($this->docuPostID);
    //         return dd($docu_post_delete);
    //         if ($docu_post_delete != null) {
    //             if (Storage::disk('public')->exists($docu_post_delete->document_file_url)) {
    //                 // File exists, so delete it
    //                 Storage::disk('public')->delete($docu_post_delete->document_file_url);
    //                 $docu_post_delete->delete();
    //                 $isDeleted = Storage::delete($docu_post_delete->document_file_url);
    //             }
    //             if ($isDeleted) {
    //                 session()->flash('message', 'Post deleted successfully.');
    //             }
    //         }
    //         $this->showDeleteDocuPostBox = false;
    //     }
    // }

    public $paginateCount = 10;
    public $search, $docuTypeQuery, $listOfDucoPost, $documentTypes, $statusType = '5', $sortByDate;
    public $selectedDocumentType = 'All';

    public $showViewDocuPostBox = false;

    public function toggleViewDocuBox()
    {
        $this->showViewDocuPostBox = !$this->showViewDocuPostBox;
        $this->selectedIdToView = null;
    }

    public $dataItem;

    public function viewDocuPost($id)
    {
        $this->showViewDocuPostBox = true;
        $checkDocu = $this->dataItem = DocuPost::find($id);
        if ($checkDocu == null) {
            return request()->session()->flash('invalid', 'Document not found, contact developer if you think this is mistaken.');
        } else {
            $this->dispatch('open-docu');
        }
    }
    public $editing = false;
    public function toggleEdit($postId)
    {
        $this->editing = true;
    }

    public function cancelEdit()
    {
        $this->dispatch('close-docu');
        $this->editing = false;

    }

    public function edit($id)
    {
        $this->viewDocuPost($id);
        $this->dispatch('open-docu');
        $this->editing = true;
    }
    public function render()
    {

        $degreeLists = BachelorDegree::get();
        $listOfDocuPost = DocuPost::latest();

        if ($this->selectedDocumentType !== 'All') {
            $listOfDocuPost->where('document_type', $this->selectedDocumentType);
        }
        $listOfDocuPost->where('title', 'like', '%' . $this->search . '%');

        if ($this->statusType !== '5') {
            $listOfDocuPost->where('status', $this->statusType);
        }
        if ($this->sortByDate) {
            $listOfDocuPost->whereDate('created_at', $this->sortByDate);
        }

        $listOfDocuPost = $listOfDocuPost->paginate($this->paginateCount);

        return view('livewire.admin.docu-post-panel', [
            'listOfDocuPost' => $listOfDocuPost,
            'degreeLists' => $degreeLists
        ])
            ->layout('layout.admin');
    }

}