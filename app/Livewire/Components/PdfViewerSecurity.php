<?php

namespace App\Livewire\Components;

use Livewire\Component;

class PdfViewerSecurity extends Component
{
    public $pdfFile, $PDFlocked = true;

    public function render()
    {
        return view('livewire.components.pdf-viewer-security');
    }
}