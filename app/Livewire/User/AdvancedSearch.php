<?php

namespace App\Livewire\User;

use App\Models\DocuPost;
use Livewire\Component;

class AdvancedSearch extends Component
{
    public function findResult()
    {
        dd($this->docuTypeInput);
        $this->validate([
            "search" => 'min:1',
        ]);
    }
    public $advancedSearch, $docuTypeInput;
    public function render()
    {
        $documentTypes = DocuPost::distinct('document_type')->pluck('document_type');
        $this->docuTypeInput = $documentTypes->isEmpty() ? 'default_value' : $documentTypes->first();
        return view('livewire.user.advanced-search', [
            'documentTypes' => $documentTypes,
        ]);
    }
}
