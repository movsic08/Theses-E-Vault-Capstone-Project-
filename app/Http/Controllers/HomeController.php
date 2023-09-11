<?php

namespace App\Http\Controllers;

use App\Models\DocuPost;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function show() {

        $docuPostData = DocuPost::all();

        return view( 'home', compact( 'docuPostData' ) );
    }
}