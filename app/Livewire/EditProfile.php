<?php

namespace App\Livewire;

use App\Mail\OtpEmail;
use App\Models\BachelorDegree;
use App\Models\DocuPost;
use App\Models\Notification;
use App\Models\OtpRequestHistory;
use App\Models\SettingWatermark;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use setasign\Fpdi\Fpdi;

class EditProfile extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $bachelor_degree_data, $user;
    public $facebook_url, $ig_url, $verifyEmail;
    public $first_name, $last_name, $bio, $email, $phone_no, $year, $section, $student_id, $username, $bachelorDegreeName, $bachelor_degree_input = '', $bachelor_degree, $address, $profile_picture;

    public function mount()
    {
        $this->user = Auth::user();
        $this->first_name = $this->user->first_name;
        $this->bio = $this->user->bio;
        $this->last_name = $this->user->last_name;
        $this->email = $this->user->email;
        $this->phone_no = $this->user->phone_no;
        $this->student_id = $this->user->student_id;
        $this->username = $this->user->username;
        $this->address = $this->user->address;
        $this->facebook_url = $this->user->facebook_url;
        $this->ig_url = $this->user->ig_url;
        $this->verifyEmail = $this->user->email;
        $this->year = $this->user->year;
        $this->section = $this->user->section;
        $bachelorDegree = BachelorDegree::find($this->user->bachelor_degree);
        $this->bachelorDegreeName = $bachelorDegree ? $bachelorDegree->name : null;
        $this->bachelor_degree_data = BachelorDegree::all();
    }

    public $uploadProfileBox = false;

    public function showProfileUpload()
    {
        $this->dispatch('open-dp');
    }

    public function closeProfile()
    {
        $this->dispatch('close-dp', function () {
            $this->reset($this->profile_picture);
            // }
        });
    }


    public function changeProfile()
    {
        if ($this->profile_picture) {
            $this->validate([
                'profile_picture' => 'image|max:4024',
            ]);
            $extension = $this->profile_picture->getClientOriginalExtension();
            $currentDate = date('MjY');
            $customFileName = $this->user->last_name . '-' . $this->user->first_name . $currentDate . '.' . $extension;
            // $imagePath = $this->profile_picture->storeAs( 'profile_pictures', $customFileName, 'public' );
            $imagePath = $this->profile_picture->storeAs('profile_pictures', $customFileName, 'public');
            Auth::user()->update(['profile_picture' => $imagePath]);

            // $this->dispatch('profilePictureUpdated');
            $this->user->refresh();
            request()->session()->flash('message', 'Profile picture changed successfully.');
        } else {
            request()->session()->flash('message', 'There is problem uploading your image, try again.');
        }

        return $this->dispatch('close-dp');
    }


    public function editProfile()
    {
        // dd($this->year);
        $this->validate([
            'first_name' => ['required', 'min:2'],
            'last_name' => ['required', 'min:2'],
            'phone_no' => ['required', 'min:11', 'max:11', 'regex:/^09\d{9}$/', ($this->phone_no == $this->user->phone_no) ? '' : 'unique:users,phone_no'],
            'student_id' => ['required', 'min:2', 'regex:/^\d{2}-AC-\d{4}$/', ($this->student_id == $this->user->student_id) ? '' : 'unique:users,student_id'],
            'username' => ['required', 'min:2'],
            'bio' => ['required', 'min:2'],
            'year' => ['required'],
            'section' => ['required'],
            'address' => ['required', 'min:5'],
            'bachelor_degree_input' => ['required'],
        ], [
            'bachelor_degree_input.required' => 'Please select your bachelor degree',
            'year.required' => 'Please select your year',
            'section.required' => 'Please select your section',
            'student_id.regex' => 'The student ID must be in the format "XX-AC-XXXX".',
            'phone_no.regex' => 'This phone number must start with "09" and have 11 digits.',
            'phone_no.unique' => 'This phone number has already been taken.',
            'student_id.unique' => 'This student ID has already been taken, if you think this is mistaken contact admin.',
        ]);

        Auth::user()->update([
            'first_name' => ucfirst($this->first_name),
            'last_name' => ucfirst($this->last_name),
            'bio' => $this->bio,
            'phone_no' => $this->phone_no,
            'student_id' => $this->student_id,
            'username' => $this->username,
            'address' => $this->address,
            'year' => $this->year,
            'section' => $this->section,
            'bachelor_degree' => $this->bachelor_degree_input,
        ]);

        session()->flash('message', 'Edit profile success!');

        $this->user->refresh();

    }

    public $activeTab = 'tab1';

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public $showDeleteBox = false;
    public $confirmationInput = '';

    public function showdelBox()
    {
        $this->dispatch('open-dla');
    }

    public function closeDelBox()
    {
        $this->dispatch('close-dla', function () {
            $this->reset('confirmationInput');
        });
    }
    public $current_password, $password, $password_confirmation;

    public function changePassword()
    {
        $this->validate(
            [
                'current_password' => 'required',
                'password' => ['required', 'min:8', 'confirmed', 'different:current_password'],
            ],
            [
                'password.confirmed' => 'Password is not match!',
            ]
        );

        $user = Auth::user();
        if (Hash::check($this->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($this->password),
            ]);
            session()->flash('message', 'Password changed successfully.');
        } else {
            session()->flash('message', 'Incorrect old password.');
        }
        $this->reset(['current_password', 'password', 'password_confirmation']);

    }

    public function deletemyAccount()
    {
        Auth::user()->delete();
        return redirect()->route('home')->with('message', 'Your account deleted successfully.');
    }

    public function addUrl()
    {
        $this->validate([
            'facebook_url' => 'url',
            'ig_url' => 'url',
        ], [
            'facebook_url.url' => 'The Facebook URL is not valid',
            'ig_url.url' => 'The Instagram URL is not valid',
        ]);


        if ((empty(auth()->user()->facebook_url) || empty(auth()->user()->ig_url))) {
            Auth::user()->update([
                'facebook_url' => $this->facebook_url,
                'ig_url' => $this->ig_url,
            ]);
            session()->flash('message', 'Adding social media success');
        } else {
            Auth::user()->update([
                'facebook_url' => $this->facebook_url,
                'ig_url' => $this->ig_url,
            ]);

            session()->flash('message', 'Edit Social media links success!');
        }
    }

    public $enterOtpBox = false;

    public function verifyMyEmail()
    {
        $this->validate([
            'verifyEmail' => ['required', 'email', 'regex:/^[A-Za-z0-9._%+-]+@psu\.edu\.ph$/i'],
        ], [
            'verifyEmail.regex' => 'Use your institutional account to verify your account.',
        ]);

        $email = $this->verifyEmail;
        $user = auth()->user();

        $todayRequests = OtpRequestHistory::where('user_id', $user->id)
            ->whereDate('request_date', now())
            ->first();

        if (!$todayRequests) {
            OtpRequestHistory::create([
                'user_id' => $user->id,
                'request_date' => now(),
                'request_count' => 1,
            ]);
        } else {
            // Increment the request count if history exists
            $todayRequests->increment('request_count');
            if ($todayRequests->request_count >= 3) {
                return $this->addError('verifyEmail', 'You have reached the OTP request limit for today. Try again tomorrow.');
            }
        }

        $existingOTP = VerificationCode::where('email', $email)
            ->where('expire_at', '>', now())
            ->first();

        if (!$existingOTP) {
            $generatedOTP = strtoupper(Str::random(6));

            VerificationCode::create([
                'user_id' => auth()->id(),
                'email' => $email,
                'otp' => $generatedOTP,
                'expire_at' => now()->addMinutes(2),
            ]);

            Mail::to($email)->send(new OtpEmail($generatedOTP));
            $this->dispatch('open-va');
            // return dd( $test );
        } else {
            $this->dispatch('open-va');
            $this->addError('alreadySent', ' The OTP is already sent to you, check your inbox now.');
        }

    }

    public function closeOtpBox()
    {
        $this->dispatch('close-va');
    }
    public $input1, $input2, $input3, $input4, $input5, $input6;

    public function checkOtpInput()
    {
        $this->validate([
            'input1' => 'required',
            'input2' => 'required',
            'input3' => 'required',
            'input4' => 'required',
            'input5' => 'required',
            'input6' => 'required',
        ]);

        $compiledInput = $this->input1 . $this->input2 . $this->input3 . $this->input4 . $this->input5 . $this->input6;
        $email = $this->verifyEmail;
        $is_existingOtp = VerificationCode::where('email', $email)
            ->where('otp', $compiledInput)
            ->first();

        if ($is_existingOtp) {
            if ($is_existingOtp->expire_at < now()) {
                $this->addError('validateOtp', 'The OTP is already expired, request a new one.');
            } else {
                Auth::user()->update([
                    'email' => $email,
                    'is_verified' => true,
                ]);

                Notification::create([
                    'user_id' => auth()->user()->id,
                    'header_message' => 'Account Verified',
                    'content_message' => 'Thank you for verifying your account. 🎉 You are now granted full access to all the features of the system. 🚀',
                    'link' => route('home'),
                    'category' => 'system',
                ]);

                // $this->enterOtpBox = false;
                // $this->verifiedBox = true;
                $this->dispatch('close-me');
                $this->dispatch('entOtp');
                // session()->flash('message', 'Account verified successfully.');
            }
        } else {
            $this->addError('validateOtp', 'The OTP you entered is invalid.');
        }
        //end of nested else if
    }

    public $verifiedBox = false;

    public function closeVerifiedBox()
    {
        $this->dispatch('close-va');
    }

    public $showDeleteDocuPostBox = false;
    public $docuPostID, $postitle, $userPostID;

    public function deletePost($id, $postTitle, $userPostID)
    {

        $this->docuPostID = $id;
        $this->postitle = $postTitle;
        $this->userPostID = $userPostID;
        $this->dispatch('open-df');
    }

    public $deletedPostTitle, $deletedPostID;

    public function deleteDocuPostYes()
    {
        if ($this->userPostID == auth()->user()->id) {
            $docu_post_delete = DocuPost::find($this->docuPostID)->delete();
            if ($docu_post_delete) {
                session()->flash('message', 'Post deleted successfully.');
            } else {
                session()->flash('message', "Post is not found, can't proceed in deletion.");
            }
        } else {
            session()->flash('message', 'You are not authorized for this, contact administrator.');
        }
        $this->showDeleteDocuPostBox = false;
    }

    public function closeDeletePostBox()
    {
        $this->showDeleteDocuPostBox = false;
    }

    public function boot()
    {
        // Check if the required user fields are not empty
        if (
            !empty(auth()->user()->first_name) &&
            !empty(auth()->user()->last_name) &&
            !empty(auth()->user()->bachelor_degree)
        ) {
            // Check if a notification with the same header message already exists
            $existingNotification = Notification::where('user_id', auth()->user()->id)
                ->where('header_message', 'Verify account')
                ->first();
            // Use first() to retrieve the first matching notification

            if (!$existingNotification) {
                // If the notification doesn't exist, create a new one
                $createNotification = Notification::create([
                    'user_id' => auth()->user()->id,
                    'header_message' => 'Verify account',
                    'content_message' => 'Use your PSU email to verify your account now.',
                    'link' => route('edit-profile', ['activeTab' => 'tab3']),
                    'category' => 'system',
                ]);

                if (!$createNotification) {
                    return 'Creating a notification failed';
                }

                // Dispatch a new-notification event (assuming this is the correct usage)
                $this->dispatch('new-notification');
            }
        }
    }

    public function cancelEdit()
    {
        $this->editing = false;
    }
    public $dataItem, $editing = false;
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
                $text_image = SettingWatermark::where('is_set', 1)->first();

                if ($text_image) {
                    $text_image = 'storage/' . $text_image->file_link;
                } else {
                    return request()->session()->flash('error', 'Watermark is not found contact admin or dev.');
                }

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
        if ($isUpdated > 0) {
            request()->session()->flash('success', 'Editing document success.');
        } else {
            request()->session()->flash('error', 'Editing failed.');
        }
        $this->editing = false;
        return $this->dispatch('close-docu');
    }
    public function edit($id)
    {
        $this->toggleEdit($id);
        $this->viewDocuPost($id);
        $this->dispatch('open-docu');
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
                $this->editing = false;
                request()->session()->flash('success', 'Removing FIle URL success');
            } else {
                request()->session()->flash('error', 'Cannot found the file, contact devs.');
            }
        }
        return;
    }

    public function render()
    {
        $docu_posts = DocuPost::where('user_id', auth()->id())->paginate(3);
        $degreeLists = BachelorDegree::get();
        return view('livewire.edit-profile', [
            'docu_posts' => $docu_posts,
            'degreeLists' => $degreeLists,
        ])->layout('layout.app');
    }

}