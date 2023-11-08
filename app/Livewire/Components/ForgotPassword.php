<?php

namespace App\Livewire\Components;

use App\Mail\OtpMailForgotPassword;
use App\Models\ForgotPasswordOtp;
use App\Models\Notification;
use App\Models\User;
use App\Models\VerificationCodePassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ForgotPassword extends Component
{

    #[Rule('required|email|exists:users,email')]
    public $email;
    public $userID;
    public function resetPassword()
    {


        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);


        $findUserByEmail = User::where('email', $this->email)->first();
        if ($findUserByEmail) {
            $this->userID = $findUserByEmail->id;
            $todayRequests = ForgotPasswordOtp::where('user_id', $this->userID)
                ->whereDate('request_date', now())
                ->first();

            if (!$todayRequests) {
                ForgotPasswordOtp::create([
                    'user_id' => $this->userID,
                    'request_date' => now(),
                    'request_count' => 1,
                ]);
            } else {
                // Increment the request count if history exists
                $todayRequests->increment('request_count');
                if ($todayRequests->request_count >= 3) {
                    return session()->flash('error', 'You have reached the OTP request limit for today. Try again tomorrow.');
                }
            }

            $existingOTP = VerificationCodePassword::where('email', $this->email)
                ->where('expire_at', '>', now())
                ->first();

            if (!$existingOTP) {
                $generatedOTP = strtoupper(Str::random(9));

                VerificationCodePassword::create([
                    'user_id' => $this->userID,
                    'email' => $this->email,
                    'otp' => $generatedOTP,
                    'expire_at' => now()->addMinutes(2),
                ]);

                Mail::to($this->email)->send(new OtpMailForgotPassword($generatedOTP));
                // $this->enterOtpBox = true;
                // return dd( $test );
                $this->dispatch('close-send');
                $this->dispatch('open-otp');
            } else {
                // $this->enterOtpBox = true;
                return session()->flash('error', ' The OTP is already sent to you, check your inbox now.');
            }
        } else {
            return session()->flash('error', 'Something went wrong retrieving your account, contact dev.');
        }

    }

    #[Rule('required|min:9|max:9')]
    public $otpInput;

    public function confirmOTP()
    {
        $this->validate([
            'otpInput' => 'required|min:9|max:9',
        ]);

        $is_existingOtp = VerificationCodePassword::where('email', $this->email)
            ->where('otp', $this->otpInput)
            ->first();

        if ($is_existingOtp) {
            if ($is_existingOtp->expire_at < now()) {
                $this->addError('validateOtp', 'The OTP is already expired, request a new one.');
                return session()->flash('error', 'The OTP is already expired, request a new one.');
            } else {
                $this->dispatch('close-otp');
                $this->Changepass = true;
                return $this->dispatch('open-pass');
            }
        } else {
            $this->addError('validateOtp', 'The OTP you entered is invalid.');
        }

    }

    public function requestNewOTp()
    {

        $todayRequests = ForgotPasswordOtp::where('user_id', $this->userID)
            ->whereDate('request_date', now())
            ->first();

        if (!$todayRequests) {
            ForgotPasswordOtp::create([
                'user_id' => $this->userID,
                'request_date' => now(),
                'request_count' => 1,
            ]);
        } else {
            // Increment the request count if history exists
            $todayRequests->increment('request_count');
            if ($todayRequests->request_count >= 3) {
                return session()->flash('error', 'You have reached the OTP request limit for today. Try again tomorrow.');
            }
        }

        $existingOTP = VerificationCodePassword::where('email', $this->email)
            ->where('expire_at', '>', now())
            ->first();

        if (!$existingOTP) {
            $generatedOTP = strtoupper(Str::random(9));

            VerificationCodePassword::create([
                'user_id' => $this->userID,
                'email' => $this->email,
                'otp' => $generatedOTP,
                'expire_at' => now()->addMinutes(2),
            ]);

            Mail::to($this->email)->send(new OtpMailForgotPassword($generatedOTP));
            return $this->addError('newOTPSent', 'New Otp send successfully.');
        } else {
            return session()->flash('error', ' The OTP is already sent to you, check your inbox now.');
        }


    }

    public $password, $password_confirmation, $Changepass = false;
    public function changePassword()
    {
        $this->validate(
            [
                'password' => [
                    'required',
                    'min:8',
                    'confirmed',
                    //  'different:current_password'
                ],
            ],
            [
                'password.confirmed' => 'Password is not match!',
            ]
        );

        $user = User::where('id', $this->userID)->first();
        if ($this->Changepass) {
            if (!Hash::check($this->password, $user->password)) {
                $user->update([
                    'password' => Hash::make($this->password),
                ]);
                $this->reset(['password', 'password_confirmation']);
                $this->Changepass = false;
                return $this->dispatch('open-del');
            } else {
                session()->flash('message', 'Incorrect, this is an old password.');
            }
        } else {

        }


        // dd($this->password . $this->password_confirmation);
        return $this->reset(['password', 'password_confirmation']);

        // return ('napalitan na ang pass, show modal an dito');
    }


    public function render()
    {
        return view('livewire.components.forgot-password');
    }
}
