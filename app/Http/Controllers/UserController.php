<?php

namespace App\Http\Controllers;

use App\Events\NewUserCreated;
use App\Models\BachelorDegree;
use App\Models\DocuPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller {
    public function register() {
        return view( 'user_pages.signup' );
    }

    //creating account

    public function create( Request $request ) {
        $validated = $request->validate( [
            'username' => [ 'required', 'min:4', Rule::unique( 'users', 'username' ) ],
            'email' => [ 'required', 'email', Rule::unique( 'users', 'email' ) ],
            'password' => 'required|confirmed|min:8',
            'role_id' => 'required',
        ] );

        $validated[ 'password' ] = Hash::make( $validated[ 'password' ] );
        // account role filtering
        if ( $validated[ 'role_id' ] === 'student' ) {
            $validated[ 'role_id' ] = 1;
        } elseif ( $validated[ 'role_id' ] === 'faculty' ) {
            $validated[ 'role_id' ] = 2;
        }

        $user = User::create( $validated );
        auth()->login( $user );
        // $this->dispatch( 'user-created', $user );
        return redirect()->route( 'index' )->with( 'message', 'Creating new account success, finish setup you account' );
    }

    //logout

    public function logout( Request $request ) {
        $is_admin = auth()->user()->is_admin;
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect based on the is_admin value
        if ( $is_admin ) {
            return redirect()->route( 'login' )->with( 'message', 'Log out successfully.' );
        } else {
            return redirect()->route( 'home' )->with( 'message', 'Log out successfully.' );
        }
    }

    //login

    public function login() {
        return view( 'user_pages.login' );
    }

    //loginProcess

    public function loginProcess( Request $request ) {
        $validated = $request->validate( [
            'email' => [ 'required', 'email' ],
            'password' => 'required',
        ] );

        $user = User::where( 'email', $validated[ 'email' ] )->first();
        if ( !$user ) {
            return back()->withErrors( [
                'email' => 'No account found with this email. Create a new account.',
            ] )->onlyInput( 'email' );
        }

        if ( auth()->attempt( $validated ) ) {
            $request->session()->regenerate();
            $user = auth()->user();
            if ( $user->is_admin ) {
                return redirect()->route( 'admin-home' )->with( 'message', 'Welcome back, Admin ' . $user->email . '!' );
            } else {
                return redirect()->intended( route( 'home' ) )->with( 'message', 'Welcome back, ' . $user->email . '!' );
            }

        }

        return back()->withErrors( [ 'email' => 'You entered invalid credentials' ] )->onlyInput( 'email' );
    }

    // public function viewProfile( $id )
    // {
    //     $user = User::findOrFail( $id );

    //     if ( $user->id !== auth()->user()->id ) {
    //         return redirect()->route( 'home' )->with( 'error', 'You are not authorized to view this profile.' );
    //     }

    //     return view( 'user_pages.profile', compact( 'user' ) );
    // }

    // show all student

    public function studentList() {
        $users = User::all();
        $bachelor_degree = BachelorDegree::all();
        // dd( $users );
        return view( 'admin.pages.user-list', compact( 'users', 'bachelor_degree' ) )->with( 'title', 'List of users' );
    }

    public function addNewUser( Request $request ) {
        // dd( $request );
        $validated = $request->validate( [
            'username' => [ 'required', 'min:4' ],
            'email' => [ 'required', 'email' ],
            'password' => 'required|confirmed|min:8',
            'account_level' => 'required',
            // 'role_id' => 'required',
        ] );
        $validated[ 'password' ] = Hash::make( $validated[ 'password' ] );

        // Account role filtering
        if ( $validated[ 'account_level' ] === 'user' ) {
            $is_admin = false;
        } elseif ( $validated[ 'account_level' ] === 'admin' ) {
            $is_admin = true;
        }

        // Merge the calculated values into the validated data
        $validated[ 'is_admin' ] = $is_admin;

        //creation of user
        $user = User::create( $validated );
        auth()->login( $user );
        return redirect()->route( 'home' )->with( 'message', 'Creating new account success, finish setup you account' );

    }

    public function viewUser ( $username ) {
        // dd( $username );

        $checkedAccount = User::where( 'username', $username )
        ->orWhere( 'id', $username )
        ->first();

        if ( $checkedAccount == ! null ) {
            $currentUserId = $checkedAccount->id;
            $fullName = $checkedAccount->first_name. ' '. $checkedAccount->last_name;
        } else {
            $currentUserId = '';
            $fullName = '';
        }

        $docuPostOfUser  = DocuPost::where( 'user_id', $checkedAccount->id )->get();

        // dd( $docuPostOfUser );
        return view( 'user_pages.profile',  [
            'currentUserId' => $currentUserId,
            'checkedAccount' => $checkedAccount,
            'fullName' => $fullName,
            'docuPostOfUser' => $docuPostOfUser,
        ] );

    }

}