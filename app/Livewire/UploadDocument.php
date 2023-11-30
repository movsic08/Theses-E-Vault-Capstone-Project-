<?php

namespace App\Livewire;

use App\Models\DocuPost;
use App\Models\DocuPostType;
use App\Models\Notification;
use App\Models\SettingWatermark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\BachelorDegree;
use Livewire\WithFileUploads;
use setasign\Fpdi\Fpdi;

class UploadDocument extends Component
{
    use WithFileUploads;
    public $user, $bachelor_degree_value, $author1;

    public function mount()
    {
        $this->user = Auth::user();
        $this->document_type = 'Capstone';

        if ($this->user->is_admin) {
            $this->bachelor_degree_value = '';
        } else {
            $this->bachelor_degree_value = $this->user->bachelor_degree;
            $this->author1 = $this->user->first_name . ' ' . $this->user->last_name;
        }
    }
    public $uploaded = false;

    public $currentTab = 1;

    public $title, $format, $document_type, $date_of_approval, $physical_description, $language, $panel_chair, $advisor, $panel_member1, $panel_member2, $panel_member3, $panel_member4, $abstract_or_summary, $author2, $author3, $author4, $author5, $author6, $author7;
    public $keyword1, $keyword2, $keyword3, $keyword4, $keyword5, $keyword6, $keyword7, $keyword8, $recommended_citation, $user_upload, $pdf_path;

    protected $tab1Rules = [
        'title' => 'required|min:3|unique:docu_posts,title',
        'document_type' => 'required|min:3',
        'date_of_approval' => 'required|date',
        'format' => 'required|min:2',
        'physical_description' => 'required|min:6',
        'language' => 'required|min:3',
        'panel_chair' => 'required|min:3',
        'advisor' => 'required|min:3',
        'bachelor_degree_value' => 'required',
        'panel_member1' => 'required|min:3',
        'panel_member2' => 'required|min:3',


    ];

    protected $tab2Rules = [
        'abstract_or_summary' => 'required',
        'keyword1' => 'required|min:1',
        'keyword2' => 'required|min:1',
        'keyword3' => 'required|min:1',
        'keyword4' => 'required|min:1',
        'recommended_citation' => 'required|min:10',
    ];

    protected $tab3Rules = [
        'user_upload' => 'required|file|max:100000',
    ];

    public function changeTab($tab)
    {
        // Manually validate the fields based on the current tab
        if ($this->currentTab == 1) {
            $this->validate($this->tab1Rules);
        } elseif ($this->currentTab == 2) {
            $this->validate($this->tab2Rules);
        } elseif ($this->currentTab == 3) {
            $this->validate($this->tab3Rules);
        }

        // Change the tab if there are no validation errors
        $this->currentTab = $tab;
    }

    public function updated($propertyName)
    {
        // Determine the tab and validate the current property accordingly
        if ($this->currentTab == 1) {
            $this->validateOnly($propertyName, $this->tab1Rules);
        } elseif ($this->currentTab == 2) {
            $this->validateOnly($propertyName, $this->tab2Rules);
        } elseif ($this->currentTab == 3) {
            $this->validateOnly($propertyName, $this->tab3Rules);
        }
    }



    public $authorAPA;

    public function citationAPA_generator()
    {
        $authors = [];

        if (!empty($this->author1)) {
            $authors[] = $this->convertAuthorName($this->author1);
        }
        if (!empty($this->author2)) {
            $authors[] = $this->convertAuthorName($this->author2);
        }
        if (!empty($this->author3)) {
            $authors[] = $this->convertAuthorName($this->author3);
        }
        if (!empty($this->author4)) {
            $authors[] = $this->convertAuthorName($this->author4);
        }

        $authorAPA = implode(', ', $authors);

        // $publicationLocation = 'Pangasinan State University - AC';
        $retrieveURL = route('view-document', ['reference' => $this->docuReference]);

        $year = date('Y', strtotime($this->date_of_approval));
        $this->recommended_citation = $authorAPA . ' (' . $year . '). ' . $this->title . '. Retrieved from Theses Kiosk website: ' . $retrieveURL;
    }

    public function convertAuthorName($name)
    {
        $fullName = explode(' ', $name);
        if (count($fullName) >= 2) {

            $lastName = ucfirst(array_pop($fullName));
            $firstNameInitial = ucfirst(strtoupper(substr($fullName[0], 0, 1)));

            // Format the name as 'LastName Initial.'

            $formattedName = $lastName . ' ' . $firstNameInitial . '.';
            return $name = $formattedName;
        }
    }



    public function boot()
    {
        do {
            $this->docuReference = Str::random(12);
        }
        while (DocuPost::where('reference', $this->docuReference)->exists());
    }
    public function uploadDocument()
    {
        if (auth()->user()->is_verified == 0) {
            return session()->flash('error', 'Your account is not verified, can\'t procceed. Verify you account first.');
        }

        $rules = array_merge(
            $this->tab1Rules,
            $this->tab2Rules,
            $this->tab3Rules
        );

        $checkMe = $this->validate($rules);
        if ($checkMe) {
            $this->createNewDocuPostEntry();
        } else {
            session()->flash('message', 'missing entry');
        }

    }
    public $rulesDone, $validationDone, $creatingDone, $successUploading;
    public $docuReference;

    public function createNewDocuPostEntry()
    {
        $findWatermark = SettingWatermark::where('is_set', 1)->count();
        if ($findWatermark != 1) {
            return session()->flash('error', 'Watermark missing, contact admin.');
        } else {
            $findWatermark = SettingWatermark::where('is_set', 1)->first();
            $getWatermarkData = SettingWatermark::where('id', $findWatermark->id)->first();
        }


        $this->showProgressBox = true;


        $currentDate = now()->format('Y-m-d');
        $customFileName = $this->title . '-' . $this->docuReference . '-' . $currentDate . '.pdf';
        if ($this->user_upload) {
            $this->pdf_path = $this->user_upload->storeAs('PDF_uploads', $customFileName, 'public');

            $filePath = 'storage/' . $this->pdf_path;

            $text_image = 'storage/' . $getWatermarkData->file_link;

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

        $inputsOfDocu = [
            'user_id' => $this->user->id,
            'reference' => $this->docuReference,
            'title' => $this->title,
            'format' => $this->format,
            'course' => $this->bachelor_degree_value,
            'document_type' => $this->document_type,
            'date_of_approval' => $this->date_of_approval,
            'physical_description' => $this->physical_description,
            'language' => $this->language,
            'panel_chair' => $this->panel_chair,
            'advisor' => $this->advisor,
            'panel_member_1' => $this->panel_member1,
            'panel_member_2' => $this->panel_member2,
            'panel_member_3' => $this->panel_member3,
            'panel_member_4' => $this->panel_member4,
            'abstract_or_summary' => $this->abstract_or_summary,
            'author_1' => $this->author1,
            'author_2' => $this->author2,
            'author_3' => $this->author3,
            'author_4' => $this->author4,
            'author_5' => $this->author5,
            'author_6' => $this->author6,
            'author_7' => $this->author7,
            'keyword_1' => $this->keyword1,
            'keyword_2' => $this->keyword2,
            'keyword_3' => $this->keyword3,
            'keyword_4' => $this->keyword4,
            'keyword_5' => $this->keyword5,
            'keyword_6' => $this->keyword6,
            'keyword_7' => $this->keyword7,
            'keyword_8' => $this->keyword8,
            'recommended_citation' => $this->recommended_citation,
            'document_file_url' => $this->pdf_path,
        ];

        DocuPost::create($inputsOfDocu);
        Notification::create([
            'user_id' => $this->user->id,
            'header_message' => 'Document Pending Admin Review',
            'content_message' => 'Dear user, your document with the title "' . $this->title . '" has been successfully uploaded and is now pending admin review. It will be made available to the community once approved. Thank you for your contribution📄🔍.',
            'link' => route('edit-profile', ['activeTab' => 'tab4']),
            'category' => 'docu post',
        ]);


        if (auth()->user()->is_admin) {
            return redirect()->route('admin-docu-post-panel');
        } else {
            $this->dispatch('open-suc');
        }


    }

    public $showUploadPdfBox = false;

    public function uploadPdfFileBox()
    {
        $this->dispatch('open-pdf');
    }

    public function render()
    {
        if (auth()->check()) {
            $idAdmin = auth()->user()->is_admin;
        } else {
            $idAdmin = false;
        }

        $documentTypes = DocuPostType::all();

        $layout = $idAdmin ? 'layout.admin' : 'layout.app';
        return view('livewire.upload-document', [
            'documentTypes' => $documentTypes,
        ])->layout($layout);
    }
}