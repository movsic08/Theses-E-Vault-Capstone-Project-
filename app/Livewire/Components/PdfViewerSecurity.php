<?php

namespace App\Livewire\Components;

use App\Models\BorrowersLogbook;
use App\Models\DocuPost;
use App\Models\PdfKey;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PdfViewerSecurity extends Component
{
    public $pdfFile, $docuPostID, $pdfFileDecrpted, $titleOfDocu, $authenticatedUser, $PDFlocked = true;
    public function mount()
    {
        $this->authenticatedUser = auth()->user();
    }

    #[Rule('required|min:18|max:18', as: 'key')]
    public $key_input = '';

    public $unlockPDF = false;

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
                    request()->session()->flash('message', 'Ve rify your account now, to enjoy the full features for free.');
                } else {

                    // part
                    // dd('no probs');
                    $docu_post_id_decrypted = Crypt::decrypt($this->docuPostID);

                    $checkPDFKey = PdfKey::where('keys', $this->key_input)
                        ->where('docu_post_id', $docu_post_id_decrypted)
                        ->first();

                    if ($checkPDFKey) {
                        $this->pdfFileDecrpted = Crypt::decrypt($this->pdfFile);
                        $this->PDFlocked = false;
                        $this->unlockPDF = true;
                        $this->pdfViewerContent = '<section id="pdf_viewer_content">Your dynamic content here</section>';
                        $this->dispatch('refreshSection')->self();
                        $findDocuData = DocuPost::where('id', $docu_post_id_decrypted)->first();
                        if ($findDocuData == null) {
                            return request()->session()->flash('error', 'Document not found, contact admin.');
                        }
                        $borrowerFullName = $this->authenticatedUser->first_name . ' ' . $this->authenticatedUser->last_name;
                        $createBorrowersLog = BorrowersLogbook::create([
                            'name' => $borrowerFullName,
                            'title' => $findDocuData->title,
                            'author' => $findDocuData->author_1,
                            'reference' => $findDocuData->reference,
                            'category' => $findDocuData->document_type
                        ]);
                        if ($createBorrowersLog) {
                            return request()->session()->flash('message', 'logbook created');
                        }
                        return request()->session()->flash('message', 'PDF is unlock.');
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
        return view('livewire.components.pdf-viewer-security');
    }
}