<?php

namespace App\Livewire\Admin;

use App\Models\BachelorDegree;
use App\Models\DocuPost;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use setasign\Fpdi\Fpdi;

class DocuPostPanel extends Component
{
    use WithPagination;
    use WithFileUploads;

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


    #[Rule('required', as: 'language')]
    public $updating_language;

    #[Rule('required', as: 'physical description')]
    public $updating_physical_description;

    #[Rule('required', as: 'document type')]
    public $updating_document_type;

    #[Rule('required', as: 'format')]
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
    public $updating_author_2, $updating_author_3, $updating_author_4, $updating_author_5, $updating_author_6, $updating_author_7;

    #[Rule('required', as: 'recommend_citation')]
    public $updating_recommended_citation;

    #[Rule('required', as: 'abstract')]
    public $updating_abstract_or_summary;

    #[Rule('required', as: 'date of publish')]
    public $updating_date_of_approval;

    #[Rule('required|file', as: 'pdf file')]
    public $user_upload, $updating_reference;

    public $updating_status, $updating_created_at, $updating_course, $userID_updating;
    public $editing_course = 'hii';

    public function toggleEdit($postId)
    {
        $currentEditingDocuData = Docupost::where('id', $postId)->first();
        $this->updating_title = $currentEditingDocuData->title;
        $this->userID_updating = $currentEditingDocuData->user_id;
        $this->updating_status = $currentEditingDocuData->status;
        $this->updating_course = $currentEditingDocuData->course;
        $this->updating_language = $currentEditingDocuData->language;
        $this->updating_physical_description = $currentEditingDocuData->physical_description;
        $this->updating_document_type = $currentEditingDocuData->document_type;
        $this->updating_format = $currentEditingDocuData->format;
        $this->updating_reference = $currentEditingDocuData->reference;
        $this->updating_panel_chair = $currentEditingDocuData->panel_chair;
        $this->updating_panel_member_1 = $currentEditingDocuData->panel_member_1;
        $this->updating_panel_member_2 = $currentEditingDocuData->panel_member_2;
        $this->updating_panel_member_3 = $currentEditingDocuData->panel_member_3;
        $this->updating_panel_member_4 = $currentEditingDocuData->panel_member_4;
        $this->updating_author_1 = $currentEditingDocuData->author_1;
        $this->updating_author_2 = $currentEditingDocuData->author_2;
        $this->updating_author_3 = $currentEditingDocuData->author_3;
        $this->updating_author_4 = $currentEditingDocuData->author_4;
        $this->updating_author_5 = $currentEditingDocuData->author_5;
        $this->updating_author_6 = $currentEditingDocuData->author_6;
        $this->updating_keyword_1 = $currentEditingDocuData->keyword_1;
        $this->updating_keyword_2 = $currentEditingDocuData->keyword_2;
        $this->updating_keyword_3 = $currentEditingDocuData->keyword_3;
        $this->updating_keyword_4 = $currentEditingDocuData->keyword_4;
        $this->updating_keyword_5 = $currentEditingDocuData->keyword_5;
        $this->updating_keyword_6 = $currentEditingDocuData->keyword_6;
        $this->updating_keyword_7 = $currentEditingDocuData->keyword_7;
        $this->updating_keyword_8 = $currentEditingDocuData->keyword_8;
        $this->updating_recommended_citation = $currentEditingDocuData->recommended_citation;
        $this->updating_abstract_or_summary = $currentEditingDocuData->abstract_or_summary;
        $this->updating_date_of_approval = $currentEditingDocuData->date_of_approval;
        $this->updating_created_at = Carbon::parse($currentEditingDocuData->created_at)->format('M d Y');
        $this->editing = true;
    }

    public function saveEdit($id)
    {

        if (isset($this->user_upload)) {

            $currentDate = now()->format('Y-m-d');
            $customFileName = $this->updating_title . '-' . $this->updating_reference . '-' . $currentDate . '.pdf';
            if ($this->user_upload) {
                $filePathPDF = $this->user_upload->storeAs('PDF_uploads', $customFileName, 'public');

                $filePath = 'storage/' . $filePathPDF;
                $text_image = 'storage/watermark/watermark.png';

                // Set source PDF file
                $pdf = new Fpdi();
                if (file_exists($filePath)) {
                    $pagecount = $pdf->setSourceFile($filePath);
                } else {
                    return;
                    // Handle PDF not found as per your requirement
                }

                // Add watermark image to PDF pages
                for ($i = 1; $i <= $pagecount; $i++) {
                    $tpl = $pdf->importPage($i);
                    $size = $pdf->getTemplateSize($tpl);
                    $pdf->AddPage('P', array($size['width'], $size['height']));
                    // Add a page with the same size

                    // Import the page content before the watermark
                    $pdf->useTemplate($tpl);

                    // Put the watermark
                    $pdf->Image($text_image, 0, 0, $size['width'], $size['height'], 'png');
                }

                $existingFilePath = $filePath;
                // Generate the new PDF content
                $newPdfContent = $pdf->Output('', 'S');
                // 'S' stands for string output
                // Replace the existing PDF file with the new content
                file_put_contents($existingFilePath, $newPdfContent);
            }
        }
        $this->validateOnly($this->updating_title);
        $isUpdated = DocuPost::where('id', $id)
            ->update([

                'title' => $this->updating_title,
                'course' => $this->updating_course,
                'language' => $this->updating_language,
                'physical_description' => $this->updating_physical_description,
                'document_type' => $this->updating_document_type,
                'format' => $this->updating_format,
                'panel_chair' => $this->updating_panel_chair,
                'panel_member_1' => $this->updating_panel_member_1,
                'panel_member_2' => $this->updating_panel_member_2,
                'panel_member_3' => $this->updating_panel_member_3,
                'panel_member_4' => $this->updating_panel_member_4,
                'author_1' => $this->updating_author_1,
                'author_2' => $this->updating_author_2,
                'author_3' => $this->updating_author_3,
                'author_4' => $this->updating_author_4,
                'author_5' => $this->updating_author_5,
                'author_6' => $this->updating_author_6,
                'author_7' => $this->updating_author_7,
                'keyword_1' => $this->updating_keyword_1,
                'keyword_2' => $this->updating_keyword_2,
                'keyword_3' => $this->updating_keyword_3,
                'keyword_4' => $this->updating_keyword_4,
                'keyword_5' => $this->updating_keyword_5,
                'keyword_6' => $this->updating_keyword_6,
                'keyword_7' => $this->updating_keyword_7,
                'keyword_8' => $this->updating_keyword_8,
                'recommended_citation' => $this->updating_recommended_citation,
                'abstract_or_summary' => $this->updating_abstract_or_summary,
                'date_of_approval' => $this->updating_date_of_approval
            ]);
        if (isset($this->user_upload)) {
            $isUpdated = $isUpdated && DocuPost::where('id', $id)->update(['document_file_url' => $filePathPDF]);
        }
        $dataCheck = DocuPost::where('id', $id)->first();
        if ($dataCheck->status != $this->updating_status) {
            $isUpdated = $isUpdated && DocuPost::where('id', $id)->update(['status' => $this->updating_status,]);
            if ($this->updating_status == 1) {
                Notification::create([
                    'user_id' => $this->userID_updating,
                    'header_message' => 'Your document has been approved! ',
                    'content_message' => 'Congratulations! Your document entitled "<strong>' . $this->updating_title . '</strong>" has been approved. 📄👍',
                    'link' => route('view-document', ['reference' => $this->updating_reference]),
                    'category' => 'docu post',
                ]);
            } elseif ($this->updating_status == 2) {
                Notification::create([
                    'user_id' => $this->userID_updating,
                    'header_message' => 'Document Disapproval ',
                    'content_message' => 'We regret to inform you that your document entitled "<strong>' . $this->updating_title . '</strong>" has been disapproved. Contact the librarian for more information. 📄😞',
                    'link' => route('edit-profile', ['activeTab' => 'tab4']),
                    'category' => 'docu post',
                ]);
            } elseif ($this->updating_status == 3) {
                Notification::create([
                    'user_id' => $this->userID_updating,
                    'header_message' => 'Revision Needed',
                    'content_message' => 'Your document entitled "<strong>' . $this->updating_title . '</strong>" requires revision. Please review and make necessary changes before resubmitting. 📄🔍',
                    'link' => route('edit-profile', ['activeTab' => 'tab4']),
                    'category' => 'docu post',
                ]);
            } elseif ($this->updating_status == 4) {
                Notification::create([
                    'user_id' => $this->userID_updating,
                    'header_message' => 'Out of Specified Span',
                    'content_message' => 'We regret to inform you that your document entitled "<strong>' . $this->updating_title . '</strong>" is out of the specified span. Please review and make necessary changes. 📄📆',
                    'link' => route('edit-profile', ['activeTab' => 'tab4']),
                    'category' => 'docu post',
                ]);
            }
        }

        if ($isUpdated > 0) {
            request()->session()->flash('success', 'Editing document success.');
        } else {
            request()->session()->flash('error', 'Editing failed.');
        }
        $this->editing = false;
        return $this->dispatch('close-docu');
    }



    #[Rule('required', as: 'status comment')]
    public $status_comment;
    public $docuData, $remarkTitle, $updating_remark;
    public function showRemarkBox($docuId)
    {
        $this->docuData = DocuPost::where('id', $docuId)
            ->first();
        $this->remarkTitle = $this->docuData->title;
        $this->updating_remark = $this->docuData->status;
        return $this->dispatch('open-rem');
    }
    public function closeRemarkBox()
    {
        $this->dispatch('close-rem');
        $this->remarkTitle = '';
        $this->updating_remark = '';
    }

    public function saveRemark()
    {
        // return dd($this->docuData->user_id);
        if ($this->updating_remark === 3) {
            $this->validateOnly('status_comment');
        }
        $updateStatus = DocuPost::where('id', $this->docuData->id)
            ->update(['status' => $this->updating_remark]);
        if ($updateStatus) {
            if ($this->updating_remark == 1) {
                Notification::create([
                    'user_id' => $this->docuData->user_id,
                    'header_message' => 'Your document has been approved! ',
                    'content_message' => 'Congratulations! Your document entitled "<strong>' . $this->remarkTitle . '</strong>" has been approved. 📄👍',
                    'link' => route('view-document', ['reference' => $this->updating_reference]),
                    'category' => 'docu post',
                ]);
            } elseif ($this->updating_remark == 2) {
                Notification::create([
                    'user_id' => $this->docuData->user_id,
                    'header_message' => 'Document Disapproval ',
                    'content_message' => 'We regret to inform you that your document entitled "<strong>' . $this->remarkTitle . '</strong>" has been disapproved. Contact the librarian for more information. 📄😞',
                    'link' => route('edit-profile', ['activeTab' => 'tab4']),
                    'category' => 'docu post',
                ]);
            } elseif ($this->updating_remark == 3) {
                Notification::create([
                    'user_id' => $this->docuData->user_id,
                    'header_message' => 'Revision Needed',
                    'content_message' => 'Your document entitled "<strong>' . $this->remarkTitle . '</strong>" requires revision. Please review and make necessary changes before resubmitting. The following is/are needed to change by admin\'s suggestion: <strong>' . $this->status_comment . '</strong> 📄🔍',
                    'link' => route('edit-profile', ['activeTab' => 'tab4']),
                    'category' => 'docu post',
                ]);
            } elseif ($this->updating_remark == 4) {
                Notification::create([
                    'user_id' => $this->docuData->user_id,
                    'header_message' => 'Out of Specified Span',
                    'content_message' => 'We regret to inform you that your document entitled "<strong>' . $this->remarkTitle . '</strong>" is out of the specified span. Please review and make necessary changes. 📄📆',
                    'link' => route('edit-profile', ['activeTab' => 'tab4']),
                    'category' => 'docu post',
                ]);
            }

            request()->session()->flash('success', 'Changing status of document is success.');
        } else {
            return request()->session()->flash('error', 'Changing status of document failed, contact developer.');
        }
        $this->remarkTitle = '';
        $this->updating_remark = '';
        $this->docuData = '';
        $this->dispatch('close-rem');
    }



    public function deleteFile($link, $id)
    {
        if (Storage::disk('public')->exists($link)) {
            // File exists, so delete it
            Storage::disk('public')->delete($link);
            // request()->session()->flash('success', 'Profile deleted successfully.');
            $docuPost = DocuPost::where('id', $id)->first();
            if ($docuPost) {
                $docuPost->update(['document_file_url' => null]);
                request()->session()->flash('success', 'File successfully removed');
            } else {
                request()->session()->flash('error', 'Error removing the file URL');
            }
        } else {
            $docuPost = DocuPost::where('id', $id)->first();
            $deleteURL = $docuPost->update(['document_file_url' => null]);
            if ($deleteURL) {
                request()->session()->flash('success', 'Removing FIle URL success');
            } else {
                request()->session()->flash('error', 'Cannot found the file, contact devs.');
            }
        }
        return;
    }

    public function cancelEdit()
    {
        $this->dispatch('close-docu');
        $this->editing = false;

    }

    public function edit($id)
    {
        $this->toggleEdit($id);
        $this->viewDocuPost($id);
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
        ]);

    }

    public function placeholder()
    {
        return view('livewire.placeholder.admin-docu-panel-skeleton');
    }


}