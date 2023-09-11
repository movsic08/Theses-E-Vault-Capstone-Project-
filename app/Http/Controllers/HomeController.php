<?php

namespace App\Http\Controllers;

use App\Models\DocuPost;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function show() {

        $docuPostData = DocuPost::all();
        $latestDocuPostData = DocuPost::latest()->take( 5 )->get();

        return view( 'home', compact( 'docuPostData', 'latestDocuPostData' ) );
    }
}