<?php

namespace App\Livewire;

use App\Models\DocuPost;
use Livewire\Component;

class ViewDocuPost extends Component {
    public $parameter, $data;

    public function mount( $reference ) {
        $this->parameter = $reference;

        $this->data = DocuPost::where( 'reference', $this->parameter )->first();
    }

    public function render() {

        if ( auth()->check() ) {
            $idAdmin = auth()->user()->is_admin;
        } else {
            $idAdmin = false;
        }

        $layout = $idAdmin ? 'layout.admin' : 'layout.app';
        return view( 'livewire.view-docu-post' )->layout( $layout );
    }
}