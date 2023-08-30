<?php

namespace App\Http\Controllers;

use App\Models\VerificationCode;
use Illuminate\Auth\Events\Validated;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Mail\OtpEmail;
use App\Models\Otp;

class OtpAuthController extends Controller {
    public function showForm() {
        return view( 'otpForm' );
    }

    public function sendOtp( Request $request ) {
        $request->validate( [
            'email' => 'required|email'
        ] );
        $email = $request->email;

        $existingOTP = VerificationCode::where( 'email', $email )
        ->where( 'expire_at', '>', now() )
        ->first();
        if ( !$existingOTP ) {
            $otp = strtoupper( Str::random( 6 ) );

            Auth::user()->update( [
                'email' =>$request->email,
            ] );

            // Store OTP in database
            VerificationCode::create( [
                'user_id' => auth()->id(),
                'email' => $email,
                'otp' => $otp,
                'expire_at' => now()->addMinutes( 2 ),
            ] );
        } else {
            $otp = $existingOTP->otp;
            $requestedOTP = VerificationCode::where( 'otp', $otp )->first();
            return view( 'verifyOTP', compact( 'requestedOTP' ) )->with( 'success', 'OTP ALREADY SENT!' );
        }

        $requestedOTP = VerificationCode::where( 'otp', $otp )->first();
        // Mail::to( $email )->send( new OtpEmail( $otp ) );
        return view( 'verifyOTP', compact( 'requestedOTP' ) )->with( 'success', 'OTP sent successfully!' );
    }

    public function checkOTP( Request $request ) {

        $request -> validate( [
            'otp_input' => 'required|min:6|max:6',
        ] );

        $otp = $request->otp;

        if ( $request->otp_input === $otp ) {
            return 'succcess';
        } else {
            return 'invalid';
        }

    }

}