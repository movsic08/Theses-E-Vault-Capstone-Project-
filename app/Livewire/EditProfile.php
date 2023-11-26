<?php

namespace App\Livewire;

use App\Mail\OtpEmail;
use App\Models\BachelorDegree;
use App\Models\DocuPost;
use App\Models\Notification;
use App\Models\OtpRequestHistory;
use App\Models\VerificationCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

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
        $this->showDeleteDocuPostBox = true;
        $this->docuPostID = $id;
        $this->postitle = $postTitle;
        $this->userPostID = $userPostID;
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


    public function render()
    {
        $docu_posts = DocuPost::where('user_id', auth()->id())->paginate(3);

        return view('livewire.edit-profile', [
            'docu_posts' => $docu_posts
        ])->layout('layout.app');
    }

}