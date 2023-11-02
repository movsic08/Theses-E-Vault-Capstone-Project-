<?php

namespace App\Livewire\Admin;

use App\Models\BachelorDegree;
use App\Models\DocuPost;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
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

    #[Rule('required', as: 'title')]
    public $updating_title;

    #[Rule('required', as: 'course')]
    public $updating_course;

    #[Rule('required', as: 'language')]
    public $updating_language;

    #[Rule('required', as: 'physical description')]
    public $updating_physical_description;

    #[Rule('required', as: 'document type')]
    public $updating_document_type;

    #[Rule('required', as: 'document type')]
    public $updating_format;

    #[Rule('required', as: 'defense panel chair')]
    public $updating_panel_chair;

    #[Rule('required', as: 'defense panel member')]
    public $updating_panel_member_1;

    #[Rule('required', as: 'defense panel member')]
    public $updating_panel_member_2;

    public $updating_panel_member_3, $updating_panel_member_4;

    #[Rule('required', as: 'keyword')]
    public $updating_keyword_1, $updating_keyword_2, $updating_keyword_3, $updating_keyword_4;

    public $updating_keyword_5, $updating_keyword_6, $updating_keyword_7, $updating_keyword_8;

    #[Rule('required', as: 'author')]
    public $updating_author_1;
    public $updating_author_2, $updating_author_3, $updating_author_4;

    #[Rule('required', as: 'recommend_citation')]
    public $updating_recommended_citation;

    #[Rule('required', as: 'abstract')]
    public $abstract_or_summary;

    public function toggleEdit($postId)
    {
        $currentEditingDocuData = Docupost::where('id', $postId)->first();
        $this->updating_title = $currentEditingDocuData->title;
        $this->updating_course = $currentEditingDocuData->course;
        $this->updating_language = $currentEditingDocuData->language;
        $this->updating_physical_description = $currentEditingDocuData->physical_description;
        $this->updating_document_type = $currentEditingDocuData->document_type;
        $this->updating_format = $currentEditingDocuData->format;
        $this->updating_panel_chair = $currentEditingDocuData->panel_chair;
        $this->updating_panel_member_1 = $currentEditingDocuData->panel_member_1;
        $this->updating_panel_member_2 = $currentEditingDocuData->panel_member_2;
        $this->updating_panel_member_3 = $currentEditingDocuData->panel_member_3;
        $this->updating_panel_member_4 = $currentEditingDocuData->panel_member_4;
        $this->updating_author_1 = $currentEditingDocuData->author_1;
        $this->updating_author_2 = $currentEditingDocuData->author_2;
        $this->updating_author_3 = $currentEditingDocuData->author_3;
        $this->updating_author_4 = $currentEditingDocuData->author_4;
        $this->updating_keyword_1 = $currentEditingDocuData->keyword_1;
        $this->updating_keyword_2 = $currentEditingDocuData->keyword_2;
        $this->updating_keyword_3 = $currentEditingDocuData->keyword_3;
        $this->updating_keyword_4 = $currentEditingDocuData->keyword_4;
        $this->updating_keyword_5 = $currentEditingDocuData->keyword_5;
        $this->updating_keyword_6 = $currentEditingDocuData->keyword_6;
        $this->updating_keyword_7 = $currentEditingDocuData->keyword_7;
        $this->updating_keyword_8 = $currentEditingDocuData->keyword_8;
        $this->updating_recommended_citation = $currentEditingDocuData->recommended_citation;
        $this->abstract_or_summary = $currentEditingDocuData->abstract_or_summary;
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
        $this->toggleEdit($id);
        $this->dispatch('open-docu');

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