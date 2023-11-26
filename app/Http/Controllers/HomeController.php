<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller {
    public function show() {
        $clicked = request()->query('clicked', false);

        // Get the currently authenticated user
        $user = Auth::user();

        // Pass the creation date to the view
        $createdAt = $user ? $user->created_at : null;

        // Check if the user was created at least 5 minutes ago
        $isCreatedWithin5Minutes = $createdAt && Carbon::now()->diffInMinutes($createdAt) <= 5;

        // check the value
        // dd([
        //     'isLogged' => Auth::check(),
        //     'createdAt' => $createdAt,
        //     'clicked' => $clicked,
        //     'isCreatedWithin5Minutes' => $isCreatedWithin5Minutes,
        // ]);
        // check the value end
        $showGuide = false;
        if (Auth::check() && $isCreatedWithin5Minutes && $clicked){
            $showGuide = true;
        }


        return view('home', ['showGuide' => $showGuide]);
    }
}