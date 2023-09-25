<?php

namespace App\Http\Controllers;

use App\Models\BachelorDegree;
use App\Models\DocuPost;
use Illuminate\Http\Request;

class CatalogueController extends Controller {
    public function mainView() {
        $documentTypes = DocuPost::distinct()->pluck( 'document_type' );
        $bachelorDegreeList = BachelorDegree::distinct()->pluck( 'name' );
        return view( 'pages.user.catalogue' )
        ->with( [
            'document_types' => $documentTypes,
            'degree_lists' => $bachelorDegreeList,
        ] );
    }
}