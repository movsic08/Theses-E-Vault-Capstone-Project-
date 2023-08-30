<?php

namespace App\Http\Livewire;

use App\Mail\OtpEmail;
use App\Models\BachelorDegree;
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

        $this->bachelor_degree_data = BachelorDegree::all();
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

    public $activeTab = 'tab3';

    public function setActiveTab( $tab ) {
        $this->activeTab = $tab;
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
        $existingOTP = VerificationCode::where( 'email', $email )->where( 'expire_at', '>', now() )->first();

        if ( !$existingOTP ) {
            $generatedOTP  = strtoupper( Str::random( 6 ) );

            $test = VerificationCode::create( [
                'user_id' =>auth()->id(),
                'email' => $email,
                'otp' => $generatedOTP,
                'expire_at' => now()->addMinutes( 2 ),
            ] );

            Mail::to( $email )->send( new OtpEmail( $generatedOTP ) );
            $this->enterOtpBox = true;
            // return dd( $test );
        } else {
            return dd( 'existing' );
        }

    }

    public function render() {
        return view( 'livewire.edit-profile' )->layout( 'layout.app' );
    }

}