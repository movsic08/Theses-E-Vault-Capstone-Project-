<?php

namespace App\Livewire;

use App\Models\BachelorDegree;
use App\Models\DocuPost;
use Livewire\Component;

class Home extends Component {
    public  $docuPostData, $bachelorDegree, $latestDocuPostData;
    public $skeletonData = null;

    public function boomarkItem( $id ) {
        dd( $id );
    }

    public function placeholder() {
        return view( 'skeletons.home-data-skeleton' );
    }

    public function render() {
        $this->docuPostData = DocuPost::orderBy( 'created_at', 'desc' )->get();
        $this->bachelorDegree = BachelorDegree::all();
        $this->latestDocuPostData = DocuPost::latest()->take( 5 )->get();
        return view( 'livewire.home' )->layout( 'layout.app' );
    }

}