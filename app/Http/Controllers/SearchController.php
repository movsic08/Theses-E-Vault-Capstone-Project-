<?php

namespace App\Http\Controllers;

use App\Models\DocuPost;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function viewBasicSearch()
    {
        $latestDocu = DocuPost::latest()
            ->where('status', 1)
            ->take(5)
            ->get();

        return view('pages.user.search')
            ->with('latestDocu', $latestDocu);
    }

    public function basicSearch(Request $request)
    {

        // $results = DocuPost::where( 'title', 'like', '%' . $query . '%' )
        // ->orWhere( 'keyword_1', 'like', '%' . $query . '%' )
        // ->orWhere( 'keyword_2', 'like', '%' . $query . '%' )
        // ->orWhere( 'keyword_3', 'like', '%' . $query . '%' )
        // ->orWhere( 'keyword_4', 'like', '%' . $query . '%' )
        // ->orWhere( 'keyword_5', 'like', '%' . $query . '%' )
        // ->orWhere( 'keyword_6', 'like', '%' . $query . '%' )
        // ->orWhere( 'keyword_7', 'like', '%' . $query . '%' )
        // ->orWhere( 'keyword_8', 'like', '%' . $query . '%' )
        // ->get();

        $search = $request->input('search_docu');

        // return redirect()->route( 'search-result-page', [
        //     'search' => $search,
        // ] );


        return redirect()
            ->route('search-result-page', ['search' => $search])
            ->with('search', $search);
    }

}