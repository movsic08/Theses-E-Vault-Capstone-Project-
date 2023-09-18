<?php

namespace App\Livewire\Admin;

use App\Models\DocuPost;
use Livewire\Component;
use Livewire\WithPagination;

class DocuPostPanel extends Component {
    use WithPagination;

    public function mount () {

    }
    public $listOfDucoPost;

    public function render() {
        $this->listOfDucoPost = DocuPost::latest()->get();

        return view( 'livewire.admin.docu-post-panel' )->layout( 'layout.admin' );
    }
}