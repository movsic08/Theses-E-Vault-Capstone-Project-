<?php

namespace App\Http\Livewire;

use App\Mail\OtpEmail;
use App\Models\BachelorDegree;
use App\Models\DocuPost;
use App\Models\OtpRequestHistory;
use App\Models\VerificationCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class EditProfile extends Component {

    use WithFileUploads;
    public $bachelor_degree_data, $user;
    public $facebook_url, $ms_url, $verifyEmail;
    public $first_name, $last_name, $email, $phone_no, $student_id, $username, $bachelorDegreeName, $bachelor_degree_input, $bachelor_degree,  $address, $profile_picture;

    public function mount() {
        $this->user = Auth::user();
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->email = $this->user->email;
        $this->phone_no = $this->user->phone_no;
        $this->student_id = $this->user->student_id;
        $this->username = $this->user->username;
        $this->address = $this->user->address;
        $this->facebook_url = $this->user->facebook_url;
        $this->ms_url = $this->user->ms_url;
        $this->verifyEmail = $this->user->email;
        $bachelorDegree = BachelorDegree::find( $this->user->bachelor_degree );
        $this->bachelorDegreeName = $bachelorDegree ? $bachelorDegree->name : null;
        $this->loadDocuPost();
        $this->bachelor_degree_data = BachelorDegree::all();
    }

    public function loadDocuPost() {
        $this->docu_posts = DocuPost::where( 'user_id', auth()->id() )->get();
    }

    public function updatedProfilePicture() {
        $this->validate( [
            'profile_picture' => 'image|max:1024',
        ] );
        if ( $this->profile_picture ) {
            // Save the uploaded image and update the profile picture field in the user model
            $imagePath = $this->profile_picture->store( 'profile_pictures', 'public' );
            Auth::user()->update( [ 'profile_picture' => $imagePath ] );

            $this->emit( 'profilePictureUpdated' );
            session()->flash( 'message', 'Profile picture changed successfully.' );
        } else {
            session()->flash( 'message', 'There is problem uploading your image, try again.' );
        }
    }
    protected $listeners = [ 'profilePictureUpdated' => 'refreshProfilePicture' ];

    public function refreshProfilePicture() {
        $this->user->refresh();
    }

    public function editProfile() {
        $this->validate( [
            'first_name' => [ 'required', 'min:2' ],
            'last_name' => [ 'required', 'min:2' ],
            'phone_no' => [ 'required', 'min:2' ],
            'student_id' => [ 'required', 'min:2' ],
            'username' => [ 'required', 'min:2' ],
            'address' => [ 'required', 'min:2' ],
            'bachelor_degree_input' => [ 'required' ],
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ], [
            // 'bacbachelor_degree_input.required' => 'Please select your bachelor degree',
        ] );

        // dd( $this->bachelor_degree_input );

        Auth::user()->update( [
            'first_name' => $this->first_name,
            'last_name' =>$this->last_name,
            'email' => $this->email,
            'phone_no' => $this->phone_no,
            'student_id' => $this->student_id,
            'username' => $this->username,
            'address' => $this->address,
            'bachelor_degree' => $this->bachelor_degree_input,
        ] );

        session()->flash( 'message', 'Edit profile success!' );

        $this->user->refresh();
        // Refresh the user model
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->email = $this->user->email;
        $this->phone_no = $this->user->phone_no;
        $this->student_id = $this->user->student_id;
        $this->username = $this->user->username;
        $this->address = $this->user->address;
        $this->bachelor_degree  = $this->user->bachelor_degree;
    }

    public $activeTab = 'tab1';

    public function setActiveTab( $tab ) {
        $this->activeTab = $tab;
        if ( $tab == 'tab4' ) {
            $this->loadDocuPost();
        }
    }

    public $showDeleteBox = false;
    public $confirmationInput = '';

    public function showdelBox() {
        $this->showDeleteBox = !$this->showDeleteBox;
        $this->confirmationInput = '';
        // Reset input field
    }
    public $current_password, $password, $password_confirmation;

    public function changePassword() {
        $this->validate( [
            'current_password' => 'required',
            'password' => [ 'required', 'min:8', 'confirmed', 'different:current_password' ],
        ],
        [
            'password.confirmed' =>'Password is not match!',
        ] );

        $user = Auth::user();
        if ( Hash::check( $this->current_password, $user->password ) ) {
            $user->update( [
                'password' => Hash::make( $this->password ),
            ] );
            session()->flash( 'message', 'Password changed successfully.' );
        } else {
            session()->flash( 'message', 'Incorrect old password.' );
        }
        $this->reset( [ 'current_password', 'password', 'password_confirmation' ] );

    }

    public $showDeleteConfirmation = false;

    public function toggleDeleteConfirmation() {
        $this->showDeleteConfirmation = ! $this->showDeleteConfirmation;
    }

    public function deletemyAccount() {
        Auth::user()->delete();
        return redirect()->route( 'home' )->with( 'message', 'Your account deleted successfully.' );
    }

    public function addUrl() {
        $this->validate( [
            'facebook_url' => 'required',
            'ms_url' => 'required',
        ], [
            'facebook_url.required' => 'Please provide your Faceboook URL',
            'ms_url.required' => 'Please provide your Microsoft account URL',
        ] );

        if ( ( empty( auth()->user()->facebook_url ) || empty( auth()->user()->ms_url ) ) ) {
            Auth::user()->update( [
                'facebook_url' => $this->facebook_url,
                'ms_url' => $this->ms_url,
            ] );
            session()->flash( 'message', 'Adding social media success' );
        } else {
            Auth::user()->update( [
                'facebook_url' => $this->facebook_url,
                'ms_url' => $this->ms_url,
            ] );

            session()->flash( 'message', 'Edit Social media links success!' );
        }
    }

    public $enterOtpBox = false;

    public function verifyMyEmail() {
        $this->validate( [
            'verifyEmail' => [ 'required', 'email', 'regex:/^[A-Za-z0-9._%+-]+@psu\.edu\.ph$/i' ],
        ], [
            'verifyEmail.regex' => 'Use your institutional account to verify your account.',
        ] );

        $email = $this->verifyEmail;
        $user = auth()->user();

        $todayRequests = OtpRequestHistory::where( 'user_id', $user->id )
        ->whereDate( 'request_date', now() )
        ->first();

        if ( !$todayRequests ) {
            OtpRequestHistory::create( [
                'user_id' => $user->id,
                'request_date' => now(),
                'request_count' => 1,
            ] );
        } else {
            // Increment the request count if history exists
            $todayRequests->increment( 'request_count' );
            if ( $todayRequests->request_count >= 3 ) {
                return $this->addError( 'verifyEmail', 'You have reached the OTP request limit for today. Try again tomorrow.' );
            }
        }

        $existingOTP = VerificationCode::where( 'email', $email )
        ->where( 'expire_at', '>', now() )
        ->first();

        if ( !$existingOTP ) {
            $generatedOTP  = strtoupper( Str::random( 6 ) );

            VerificationCode::create( [
                'user_id' =>auth()->id(),
                'email' => $email,
                'otp' => $generatedOTP,
                'expire_at' => now()->addMinutes( 2 ),
            ] );

            Mail::to( $email )->send( new OtpEmail( $generatedOTP ) );
            $this->enterOtpBox = true;
            // return dd( $test );
        } else {
            $this->enterOtpBox = true;
            $this->addError( 'alreadySent', ' The OTP is already sent to you, check your inbox now.' );
        }

    }

    public function closeOtpBox() {
        $this->enterOtpBox = false;
    }
    public $input1, $input2, $input3, $input4, $input5, $input6;

    public function checkOtpInput() {
        $this->validate( [
            'input1' => 'required',
            'input2' => 'required',
            'input3' => 'required',
            'input4' => 'required',
            'input5' => 'required',
            'input6' => 'required',
        ] );

        $compiledInput = $this->input1.$this->input2.$this->input3.$this->input4.$this->input5.$this->input6;
        $email = $this->verifyEmail;
        $is_existingOtp = VerificationCode::where( 'email', $email )
        ->where( 'otp', $compiledInput )
        ->first();

        if ( $is_existingOtp ) {
            if ( $is_existingOtp->expire_at < now() ) {
                $this->addError( 'validateOtp', 'The OTP is already expired, request a new one.' );
            } else {
                Auth::user()->update( [
                    'email' => $email,
                    'is_verified' => true,
                ] );

                $this->enterOtpBox = false;
                $this->verifiedBox = true;
                session()->flash( 'message', 'Account verified successfully.' );
            }
        } else {
            $this->addError( 'validateOtp', 'The OTP you entered is invalid.' );
        }
        //end of nested else if
    }

    public $verifiedBox = false;

    public function closeVerifiedBox() {
        $this->verifiedBox = false;
        $this->enterOtpBox = false;
    }
    public  $docu_posts ;

    public $showDeleteDocuPostBox = false;
    public $docuPostID, $postitle, $userPostID;

    public function deletePost( $id, $postTitle, $userPostID ) {
        $this->showDeleteDocuPostBox = true;
        $this->docuPostID = $id;
        $this->postitle = $postTitle;
        $this->userPostID = $userPostID;
    }

    public $deletedPostTitle, $deletedPostID;

    public function deleteDocuPostYes() {
        if ( $this->userPostID == auth()->user()->id ) {
            $docu_post_delete = DocuPost::find( $this->docuPostID );
            if ( $docu_post_delete ) {
                $docu_post_delete->delete();
                session()->flash( 'message', 'Post deleted successfully.' );
                $this->loadDocuPost();
            } else {
                session()->flash( 'message', "Post is not found, can't proceed." );
            }
        } else {
            session()->flash( 'message', 'You are not authorized for this, contact administrator.' );
        }
        $this->showDeleteDocuPostBox = false;
    }

    public function closeDeletePostBox() {
        $this->showDeleteDocuPostBox = false;
    }

    public function render() {
        return view( 'livewire.edit-profile' )->layout( 'layout.app' );
    }

}