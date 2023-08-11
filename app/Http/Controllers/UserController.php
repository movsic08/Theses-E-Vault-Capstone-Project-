<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register()
    {
        return view('user_pages.signup');
    }

    //creating account
    public function create(Request $request)
    {
        $validated = $request->validate([
            "username" => ['required', 'min:4', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:8',
            'role_id' => 'required',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        // account role filtering 
        if ($validated['role_id'] === 'student') {
            $validated['role_id'] = 1;
        } elseif ($validated['role_id'] === 'faculty') {
            $validated['role_id'] = 2;
        }

        $user = User::create($validated);
        auth()->login($user);
        return redirect()->route('home')->with('message', 'Creating new account success, finish setup you account');
    }
    //logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        //return the user to previous page
        return redirect()->back()->with('message', 'Log out successfully.');
    }

    //login
    public function login()
    {
        return view('user_pages.login');
    }

    //loginProcess
    public function loginProcess(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        $user = User::where('email', $validated['email'])->first();
        if (!$user) {
            return back()->withErrors([
                'email' => 'No account found with this email. Create a new account.',
            ])->onlyInput('email');
        }


        if (auth()->attempt($validated)) {
            $request->session()->regenerate();
            $user = auth()->user();
            return redirect()->back()->with('message', 'Welcome back, ' . $user->email . '!');
        }

        return back()->withErrors(['email' => 'You entered invalid credentials'])->onlyInput('email');
    }


    public function viewProfile($id)
    {
        $user = User::findOrFail($id);

        if ($user->id !== auth()->user()->id) {
            return redirect()->route('home')->with('error', 'You are not authorized to view this profile.');
        }

        return view('user_pages.profile', compact('user'));
    }

}