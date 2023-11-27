<?php

namespace App\Livewire\Components;

use App\Models\BorrowersLogbook;
use App\Models\DocuPost;
use App\Models\PdfKey;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PdfViewerSecurity extends Component
{
    public $pdfFile, $docuPostID, $pdfFileDecrpted, $titleOfDocu, $authenticatedUser, $PDFlocked;
    public function mount()
    {
        $this->authenticatedUser = auth()->user();
    }

    #[Rule('required|min:18|max:18', as: 'key')]
    public $key_input = '';

    public $unlockPDF = false;
    public $fileNotFound = false; // Add this line

    public function boot()
    {
        if (auth()->user()->is_admin == 1) {

            $this->PDFlocked = false;
            $this->unlockPDF = true;
        } else {
            $this->PDFlocked = true;
        }
    }

    public function unlockPDFForm()
    {

        $this->validateOnly('key_input');
        if (!auth()->check()) {
            request()->session()->flash('message', 'You need to sign in first');
        } else {
            $checkInfoData = empty($this->authenticatedUser->last_name && $this->authenticatedUser->first_name && $this->authenticatedUser->last_name &&
                $this->authenticatedUser->address &&
                $this->authenticatedUser->phone_no &&
                $this->authenticatedUser->student_id &&
                $this->authenticatedUser->bachelor_degree);
            if ($checkInfoData) {
                request()->session()->flash('message', 'Account information details are incomplete, fill out now in edit user page.');
            } else {
                if ($this->authenticatedUser->is_verified == 0) {
                    request()->session()->flash('message', 'Verify your account now, to enjoy the full features for free.');
                } else {

                    // part
                    // dd('no probs');
                    $docu_post_id_decrypted = Crypt::decrypt($this->docuPostID);

                    $checkPDFKey = PdfKey::where('keys', $this->key_input)
                        ->where('docu_post_id', $docu_post_id_decrypted)
                        ->first();

                    if ($checkPDFKey) {
                        $this->PDFlocked = false;
                        $this->unlockPDF = true;
                        $this->pdfViewerContent = '<section id="pdf_viewer_content">Your dynamic content here</section>';
                        $this->dispatch('open-pdf');
                        $findDocuData = DocuPost::where('id', $docu_post_id_decrypted)->first();
                        if ($findDocuData == null) {
                            return request()->session()->flash('error', 'Document link not found in database, contact admin.');
                        }

                        // Check if the file exists in public storage
                        $filePath = 'storage/' . $findDocuData->document_file_url; // Adjust the path accordingly
                        if (!file_exists(public_path($filePath))) {
                            $this->fileNotFound = true; // Set the variable to true
                            request()->session()->flash('error', 'File not found in storage, contact developers.');
                            // dd('File not found in public storage');
                        }

                        $borrowerFullName = $this->authenticatedUser->first_name . ' ' . $this->authenticatedUser->last_name;

                        $isLogCreated = BorrowersLogbook::where('reference', $findDocuData->reference)
                            ->where('name', $borrowerFullName)
                            ->whereDate('created_at', now()->toDateString()) // Use now() to get the current date
                            ->first();
                        if ($isLogCreated) {
                            return request()->session()->flash('message', 'PDF is unlock.');
                        } else {
                            $createBorrowersLog = BorrowersLogbook::create([
                                'name' => $borrowerFullName,
                                'title' => $findDocuData->title,
                                'author' => $findDocuData->author_1,
                                'reference' => $findDocuData->reference,
                                'category' => $findDocuData->document_type
                            ]);
                            if ($createBorrowersLog) {
                                request()->session()->flash('message', 'logbook created');
                            }
                        }
                        $this->dispatch('open-lod');
                        return request()->session()->flash('message', 'The PDF is now accessible and ready for use.');
                        // catalog log book

                    } else {
                        return request()->session()->flash('error', 'The key you entered is not matched');
                    }
                }
            }
        }
    }
    public $pdfViewerContent;

    // #[On('refreshSection')]
    // public function narinig()
    // {
    //     dd('ito ay dispatcher hhehe');
    // }

    public function render()
    {
        return view('livewire.components.pdf-viewer-security', [
            'fileNotFound' => $this->fileNotFound, // Pass the variable to the view
        ]);
    }
}
