<?php

namespace App\Livewire;

use App\Models\BachelorDegree;
use App\Models\DocuPost;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component {
    use WithPagination;
    public $bachelorDegree, $latestDocuPostData;
    public $skeletonData = null;

    public function boomarkItem( $id ) {
        dd( $id );
    }

    public function placeholder() {
        return view( 'skeletons.home-data-skeleton' );
    }

    public function render() {
        $docuPostData = DocuPost::orderBy( 'created_at', 'desc' )->paginate( 10 );
        $this->bachelorDegree = BachelorDegree::all();
        $this->latestDocuPostData = DocuPost::latest()->take( 5 )->get();
        return view( 'livewire.home', [
            'docuPostData' => $docuPostData
        ] )->layout( 'layout.app' );
    }

}