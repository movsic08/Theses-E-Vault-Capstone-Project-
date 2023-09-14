<?php

namespace App\Http\Controllers;

use App\Models\BachelorDegree;
use App\Models\DocuPost;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function show() {

        $docuPostData = DocuPost::orderBy( 'created_at', 'desc' )->get();
        $bachelorDegree = BachelorDegree::all();
        $latestDocuPostData = DocuPost::latest()->take( 5 )->get();

        return view( 'home', compact( 'docuPostData', 'latestDocuPostData', 'bachelorDegree' ) );
    }
}